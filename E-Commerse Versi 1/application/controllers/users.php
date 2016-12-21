<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends CI_Controller {
    var $template = 'template/index';

    function __construct() {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Order');

    }

    function login() {

        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User->checkLogin($email, $password);

            if (!empty($user)) {
                $sessionData['id'] = $user['id'];
                $sessionData['email'] = $user['email'];
                $sessionData['NamaDepan'] = $user['NamaDepan'];
                $sessionData['NamaBelakang'] = $user['NamaBelakang'];
                $sessionData['level'] = $user['level'];
                $sessionData['is_login'] = TRUE;

                $this->session->set_userdata($sessionData);
                $this->User->updateLastLogin($user['id']);

                if ($this->session->userdata('level') == 1) {
                    redirect('admin/dashboard');
                } else {
                    redirect('users/Beranda');
                }
            }

            $this->session->set_flashdata('error', 'Login Gagal!, Email Atau Password Tidak Cocok  ');
            redirect('users/login');
        }

        $data['content'] = 'user/login';
        $this->load->view($this->template, $data);
    }

    function register() {
      $this->form_validation->set_rules('NamaDepan', 'Nama Depan', 'trim|required');
      $this->form_validation->set_rules('NamaBelakang', 'Nama Belakang', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[16]');
      $this->form_validation->set_rules('repass', 'Re-Password', 'trim|required|matches[password]');
      $this->form_validation->set_rules('phone', 'Nomor Telp', 'trim|required|');
      $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|');
      $this->form_validation->set_rules('zip', 'zip', 'required');
      

        if ($this->form_validation->run() == TRUE) {
            $this->User->create();
            $this->session->set_flashdata('success', 'Pendaftaran Sukses !');
            redirect('users/login');
        }
        $data['content'] = 'user/register';
        $this->load->view($this->template, $data);
    }

    function profile() {

      $this->form_validation->set_rules('NamaDepan', 'Nama Depan', 'trim|required');
      $this->form_validation->set_rules('NamaBelakang', 'Nama Belakang', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[kustomer.email]');
      $this->form_validation->set_rules('phone', 'Nomor Telp', 'trim|required|');
      $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|');
      $this->form_validation->set_rules('zip', 'zip', 'required');
      if ($this->input->post('password')):
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[16]');
        $this->form_validation->set_rules('repass', 'Re-Password', 'trim|required|matches[password]');
      endif;
        $this->form_validation->set_error_delimiters('', '<br/>');
        if ($this->form_validation->run() == TRUE) {
            $this->User->update($this->session->userdata('id'));
            $this->session->set_flashdata('success', 'Profile disimpan');
            redirect('users/profile');
        }
        $data['user'] = $this->User->getUserById($this->session->userdata('id'));
        $data['content'] = 'user/profile';
        $this->load->view($this->template, $data);
    }

    function forgot_password() {
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $token = $this->general->generateRandomCode(50);
            $user = $this->User->findByEmail($email);
            if (!empty($user)) {
                $this->User->createToken($user['id'], $token);
                $userData = $this->User->getUserById($user['id']);
                $config = Array(
                       'protocol'  => 'smtp',
                       'smtp_host'    => 'ssl://smtp.googlemail.com',
                       'smtp_port'    => 465,
                       'smtp_user'    => 'giestorecom@gmail.com',
                       'smtp_pass'    => 'Shop0nline',
                       'mailtype'     => 'html',
                       'charset'      => 'iso-8859-1',
                       'newline'   => "\r\n"
                    );

         
                $this->load->library('email', $config);
                $this->email->from($this->general->getSetting('Admin.Email'), 'Admin Giestore');
                $this->email->to($email);

                $this->email->subject('Reset Password - Giestore');
                $message = '';
                $message .= 'Email Reset Password. Klik Link dibawah Untuk Mereset Password Anda :<br/>';
                $message .= '<a href="' . base_url() . 'users/reset_password/?email=' . $userData['email'] . '&token=' . $userData['reset_token'] . '">' . base_url() . 'users/reset_password/?email=' . $userData['email'] . '&token=' . $userData['reset_token'] . '</a>';
                $this->email->message($message);
                $this->email->send();
                
                $this->email->send();

                echo $this->email->print_debugger();
            }else {

            $this->session->set_flashdata('Error', 'Email Anda Tidak Ditemukan ');
            redirect('user/login');
            }
        }
        $data['content'] = 'user/forgot_password';
        $this->load->view($this->template, $data);
    }

    function reset_password($email = null, $token = null) {
        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $user = $this->User->findByEmailAndResetPasswordToken($email, $token);

        if (empty($user)) {
            $this->session->set_flashdata('error', 'Reset password token invalid !');
            redirect('users/login');
        } else {
            $data = array(
                'reset' => array(
                    'id' => $user['id'],
                    'token' => $token,
                    'email' => $email
                )
            );

            $this->session->set_userdata($data);

            $resetSession = $this->session->userdata('reset');
        }


        if (empty($resetSession)) {
            $this->session->set_flashdata('error', 'Reset password token invalid !');
            redirect('users/login');
        }

        $this->form_validation->set_rules('password', 'password', 'required|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]|xss_clean');
        $this->form_validation->set_error_delimiters('','<br/>');
        if ($this->form_validation->run() == TRUE) {
            $this->User->resetPassword($resetSession['id'], $this->input->post('password'));
            $this->User->truncateToken($resetSession['id']);
            $this->session->set_flashdata('success', 'Reset password Berhasil, Silahkan Login Dengan Password Baru Anda !');
            redirect('users/login');
        }

        $data['user'] = $user;
        $data['content'] = 'user/reset_password';
        $this->load->view($this->template, $data);
    }

    function Beranda() {
        $this->general->cekUserLogin();
        $options = array(
            'user_id' => $this->session->userdata('id')
        );
        $data['orders'] = $this->Order->getHistory($options);
        $data['paymentMethods'] = $this->Order->paymentMethods;
        $data['status'] = $this->Order->status;
        $data['content'] = 'user/userarea';
        $this->load->view($this->template, $data);
    }

    function logout() {

        $this->session->sess_destroy();
        redirect('users/login');
    }




}

?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Contactus extends CI_Controller {

	var $template = 'template/index';
    function __construct() {
        parent::__construct();
        $this->load->model('contact');
    }

    function index() {

        $data['content'] = 'user/contact';
        $this->load->view($this->template, $data);
    }

     function kirim() {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->contact->kirim();
            $this->session->set_flashdata('success', 'Pesan Terkirim !');
            redirect('contactus/index');
        }
        $data['content'] = 'user/contact';
        $this->load->view($this->template, $data);

    }

}

?>

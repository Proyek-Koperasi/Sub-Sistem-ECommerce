<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Konfirmasi extends CI_Controller {

    var $template = 'template/index';

    function __construct() {
        parent::__construct();
        $this->general->cekUserLogin();
        $this->load->model('Confirmation');
        $this->load->model('Order');
    }

    function add($orderCode = null) {
        if ($orderCode == null) {
            $orderCode = $this->input->post('code');
        }

        $this->form_validation->set_rules('sender_bank', 'Bank Pengirim', 'required');
        $this->form_validation->set_rules('bank_account_name', 'Nama Akun', 'required');
        $this->form_validation->set_rules('receiver_bank', 'Bank Penerima', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required');
        $this->form_validation->set_rules('payment_date', 'Tanggal Pembayaran', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');
        if ($this->form_validation->run() == true) {
            $order = $this->Order->getByOrderCode($orderCode);
            if ($this->input->post('total') < $order['total']) {
                $this->session->set_flashdata('error', 'Konfirmasi Gagal, Total Pembayaran Anda Kurang! ');
                redirect('konfirmasi/add/' . $orderCode);
            } else {
                $confirmation = array(
                    'sender_bank' => $this->input->post('sender_bank'),
                    'bank_account_name' => $this->input->post('bank_account_name'),
                    'receiver_bank' => $this->input->post('receiver_bank'),
                    'amount' => $this->input->post('total'),
                    'payment_date' => $this->input->post('payment_date'),
                    'status' => 0,
                    'order_id' => $order['id'],
                    'created' => date('Y-m-d H:i:s')
                );
                if ($this->Confirmation->create($confirmation)) {
                    $orderUpdate = array(
                        'status' => 4 // waiting for approval
                    );
                    $this->Order->update($orderUpdate, $order['id']);
                    $this->session->set_flashdata('success', 'Konfirmasi Sukses, Akan Segera Kami Proses. Terima Kasih');
                    redirect('orders/history');
                } else {
                    $this->session->set_flashdata('error', 'Konfirmasi Gagal, Coba Lagi !');
                    redirect('konfirmasi/add/' . $orderCode);
                }
            }
        }
        $data['content'] = 'confirmations/add';
        $data['order'] = $this->Order->getByOrderCode($orderCode);
        if (empty($data['order'])) {
            redirect('orders/history');
        }
        $data['banks'] = $this->general->getBankName();
        $this->load->view($this->template, $data);
    }

}

?>

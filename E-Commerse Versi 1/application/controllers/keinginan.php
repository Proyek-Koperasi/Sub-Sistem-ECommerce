<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Keinginan extends CI_Controller {

    var $template = 'template/index';

    function __construct() {
        parent::__construct();
        $this->general->cekUserLogin();
        $this->load->model('impian');
        $this->load->model('Products');
        
    }

    function index() {
        $user = $this->session->userdata('id');
        $data['wish'] = $this->impian->ImpianById($user);
        $data['content'] = 'impian/index';
        $this->load->view($this->template, $data);
    }

    function hapus($id) {
        $this->impian->delete($id);
        $this->session->set_flashdata('success', 'Satu Keinginan Dihapus');
        redirect('Keinginan');
    }

    function update() {

        $this->cart->update($_POST);
        $this->session->set_flashdata('success', 'Keranjang Diperbarui');
        redirect('keranjang/index');
    }

}

?>


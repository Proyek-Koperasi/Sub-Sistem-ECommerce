<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Keranjang extends CI_Controller {

    var $template = 'template/index';

    function __construct() {
        parent::__construct();
        $this->load->library('cart');
    }

    function index() {
        $data['carts'] = $this->cart->contents();
        $data['content'] = 'carts/index';
        $this->load->view($this->template, $data);
    }

    function delete($rowId) {
        $data = array('rowid' => $rowId, 'qty' => 0);

        $this->cart->update($data);
        $this->session->set_flashdata('Sukses', 'Item Dihapus');
        redirect('keranjang/index');
    }

    function update() {

        $this->cart->update($_POST);
        $this->session->set_flashdata('Sukses', 'Keranjang Diperbarui');
        redirect('keranjang/index');
    }

}

?>

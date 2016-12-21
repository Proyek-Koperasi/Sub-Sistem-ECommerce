<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Keinginan extends CI_Controller {

    var $template = 'template/index';

    function __construct() {
        parent::__construct();
        $this->load->model('kategori');
        
    }

    function index() {
        $data['category'] = $this->kategori->get_KategoriProduk("where kategori_produk != '0' order by kategori ASC")->result_array(););
        $data['content'] = 'impian/index';
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


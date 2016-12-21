<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pages extends CI_Controller {

    var $template = 'template/index';

    function __construct() {
        parent::__construct();
        $this->load->model('Products');
        $this->load->model('Page');
    }

    function home() {
        $data['produk'] = $this->Products->GetContent("where enabled = '1' order by id desc limit 6")->result_array();
        $data['produks'] = $this->Products->GetContent("where enabled = '1' order by id asc limit 6")->result_array();
        $data['content'] = 'pages/home';
        $this->load->view($this->template, $data);
    }
    function read($permalink = null) {
        if ($permalink == null) {
            $this->session->set_flashdata('message', 'Halaman tidak ditemukan');
            redirect('pages/home');
        }

        $data['page'] = $this->Page->getPagesByPermalink($permalink);
        $data['content'] = 'pages/read';
        $this->load->view($this->template, $data);
    }

    function tentangkami() {
        $data['content'] = 'pages/tentangkami';
        $this->load->view($this->template, $data);
    }


    
}

?>

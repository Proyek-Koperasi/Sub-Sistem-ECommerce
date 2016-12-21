<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Categories extends CI_Controller {

    var $template = 'admin/admin_template';

    function __construct() {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->model('kategori');
        $this->load->model('Products');
    }

    function index() {
        $data['categories'] = $this->kategori->getCategories();
        $data['content'] = 'admin/categories/index';
        $this->load->view($this->template, $data);
    }

    function add() {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->Kategori->create();
            $this->session->set_flashdata('success', 'Kategori added');
            redirect('admin/categories');
        }
        $data['content'] = 'admin/categories/add';
        $this->load->view($this->template, $data);
    }

    function edit($id = null) {
        if ($id == null) {
            $id = $this->input->post('id');
        }

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->Kategori->update($id);
            $this->session->set_flashdata('success', 'Kategori edited');
            redirect('admin/categories');
        }
        $data['category'] = $this->Kategori->getCategoryById($id);
        $data['content'] = 'admin/categories/edit';
        $this->load->view($this->template, $data);
    }

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('error', 'Invalid category');
            redirect('admin/categories');
        } else {
            $products = $this->Products->getProductsByOptions(array('kategori' => $id));
            
            if (!empty($products)) {
                $this->session->set_flashdata('error', 'Failed, this category content any products');
            } else {
                if ($this->kategori->delete($id) == 1) {
                    $this->session->set_flashdata('success', 'Category deleted');
                } else {
                    $this->session->set_flashdata('error', 'Failed, try again !');
                }
            }
            redirect('admin/categories');
        }
    }

}

?>

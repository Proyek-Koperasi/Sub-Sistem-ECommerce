<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Produk extends CI_Controller {

    var $template = 'admin/admin_template';
    var $path = 'assets/uploads/files';

    function __construct() {
        parent::__construct();
        $this->general->cekAdminLogin();
        $this->load->model('Products');
        $this->load->model('kategori');
        $this->load->library('pagination');
    }

    function index() {

        #Pagination COde ----------------------------------
        $products = $this->Products->getProducts();

        $config['uri_segment'] = 4;
        $config['total_rows'] = count($products);
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'admin/produk/index/';
        $this->pagination->initialize($config);
        if ($this->input->get('q')):
            $data['products'] = $this->Products->getProducts($config['per_page'], $this->uri->segment(4), $this->input->get('q'));
        else:
            $data['products'] = $this->Products->getProducts($config['per_page'], $this->uri->segment(4));
        endif;

        $data['pagination'] = $this->pagination->create_links();
        #end Pagination Code --------------------------

        $data['status'] = $this->Products->status;
        $data['content'] = 'admin/products/index';
        $this->load->view($this->template, $data);
    }

    function select_kategori(){
        $id_gen = $this->input->post('kategori_gender');
        $data['categories'] = $this->kategori->getDropDown($id_gen);
        $this->load->view('admin/categories/kat',$data);
    }

    function add() {
        $this->form_validation->set_rules('code', 'Kode', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', '');
        $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
                if ($_FILES['image']['error'] != 4) {
                    $config['upload_path'] = $this->path;
                    $config['allowed_types'] = $this->general->getSetting('imageAllowed');
                    $config['max_size'] = $this->general->getSetting('maxImageSize');

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload("image")) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/products/index');
                    } else {
                        $data = $this->upload->data();
                        $filename = $data['file_name'];

                         if ($this->Products->create($filename)) {
                            $this->session->set_flashdata('success', 'Produk Ditambahkan');
                            redirect('admin/produk/index');
                        } else {
                            $this->session->set_flashdata('error', 'Gagal, Coba Lagi!');
                            redirect('admin/produk/add');
                        }
                           
                      
                    }
                }
           
        }

        $data['categories_brands'] = $this->kategori->getDropDown_brands();
        $data['categories_gender'] = $this->kategori->getDropDown_gender();
        $data['status'] = $this->Products->status;
        $data['content'] = 'admin/products/add';
        $this->load->view($this->template, $data);
    }

    function edit($id = null) {

        if ($id == null) {
            $id = $this->input->post('id');
        }
       $this->form_validation->set_rules('code', 'Kode', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', '');
        $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) 
        {


                if ($_FILES['image']['error'] != 4) 
                {

                    $config['upload_path'] = $this->path;
                    $config['allowed_types'] = $this->general->getSetting('imageAllowed');
                    $config['max_size'] = $this->general->getSetting('maxImageSize');

                    $this->load->library('upload', $config);


                        if (!$this->upload->do_upload("image")) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('admin/products/index');
                    } else {
                        $data = $this->upload->data();
                        $filename = $data['file_name'];

                         if ($this->Products->edit($id,$filename)) {
                            $this->session->set_flashdata('success', 'Produk Ditambahkan');
                            redirect('admin/produk/index');
                        } else {
                            $this->session->set_flashdata('error', 'Gagal, Coba Lagi!');
                            redirect('admin/produk/add');
                        }
                           
                      
                    }
                }
                
        }
        $data['product'] = $this->Products->getProductsById($id);
        $data['categories_brands'] = $this->kategori->getDropDown_brands();
        $data['categories_gender'] = $this->kategori->getDropDown_gender();
        $data['categories'] = $this->kategori->getDropDown();
        $data['status'] = $this->Products->status;
        $data['content'] = 'admin/products/edit';
        $this->load->view($this->template, $data);
    }

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('error', 'Produk Kosong');
            redirect('admin/produk/index');
        } else {
            if ($this->Products->delete($id)) {
                $this->session->set_flashdata('success', 'Produk Berhasil Dihapus');
            } else {
                $this->session->set_flashdata('error', 'Gagal , Coba Lagi!');
            }
            redirect('admin/produk/index');
        }
    }


}

?>

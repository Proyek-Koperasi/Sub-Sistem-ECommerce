<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Product extends CI_Controller {

    var $template = 'template/index';

    function __construct() {
        parent::__construct();
        $this->load->model('Products');
        $this->load->model('impian');
        $this->load->model('kategori');
        $this->load->library('pagination');
        $this->load->model('User');
       
    }

    function index($page = null) {
        $products = $this->Products->getProductsPublished();
        $config['total_rows'] = $this->db->count_all('produk');
        $config['uri_segment'] = 4;
        $config['per_page'] = $this->general->getSetting('paginationLimit');
        $config['base_url'] = base_url() . 'product/index/lihat';
        $config['full_tag_open'] = '<div class="pagination pagination-small pagination-centered"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] =  '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        if ($this->input->get('q')) {
            $data['products'] = $this->Products->getProductsPublished($config['per_page'],$this->uri->segment(4), $this->input->get('q'));
            if (empty($data['products'])) {
                $this->session->set_flashdata('error', 'Maaf Produk yang Dicari Tidak ditemukan !');
                redirect('product');
            }
        } else {
            $data['products'] = $this->Products->getProductsPublished($config['per_page'], $this->uri->segment(4));
        }

        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = 'products/index';
        $this->load->view($this->template, $data);
    }

    function detail($permalink) {

        $data['product'] = $this->Products->getProductByPermalink($permalink);
        if (empty($data['product'])) {
            $this->session->set_flashdata('error', 'Invalid product');
            redirect('product');
        }
        $data['content'] = 'products/detail';
        $this->load->view($this->template, $data);
    }

    function testimoni() {

        $data['content'] = 'products/testimoni';
        $this->load->view($this->template, $data);
    }

    function category($permalink, $page = null) {
        $data['category'] = $this->kategori->getCategoryByPermalink($permalink);
        $products = $this->Products->getProductsByCategoryId($data['category']['id']);
        if (empty($products)) {
            $this->session->set_flashdata('error', 'Kategori Tidak Ditemukan');
            redirect('product');
        }
        $config['uri_segment'] = 4;
        $config['total_rows'] = count($products);
        $config['per_page'] = 2;
        $config['base_url'] = base_url() . 'product/category/' . $permalink . '/';
        $config['full_tag_open'] = '<div class="pagination pagination-small pagination-centered"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] =  '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $pages_count = ceil($config['total_rows'] / $config['per_page']);
        $page = ($page == 0) ? 1 : $page;
        $offset = $config['per_page'] * ($page - 1);

        $data['products'] = $this->Products->getProductsByCategoryId($data['category']['id'], $config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = 'products/category';
        $this->load->view($this->template, $data);
    }

    function brands($permalink, $page = null) {
        $data['brands'] = $this->kategori->getBrandsByPermalink($permalink);
        $products = $this->Products->getProductsByBrandsId($data['brands']['id']);
        if (empty($products)) {
            $this->session->set_flashdata('error', ' Produk dengan Brands Ini Tidak Ada');
            redirect('product');
        }
        $config['uri_segment'] = 4;
        $config['total_rows'] = count($products);
        $config['per_page'] = 2;
        $config['base_url'] = base_url() . 'product/brands/' . $permalink . '/';
        $config['full_tag_open'] = '<div class="pagination pagination-small pagination-centered"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] =  '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $pages_count = ceil($config['total_rows'] / $config['per_page']);
        $page = ($page == 0) ? 1 : $page;
        $offset = $config['per_page'] * ($page - 1);

        $data['products'] = $this->Products->getProductsByBrandsId($data['brands']['id'], $config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = 'products/brands';
        $this->load->view($this->template, $data);
    }

    function categorygender($permalink, $page = null) {
        $data['category'] = $this->kategori->getCategoryByPermalink($permalink);
        $products = $this->Products->getProductsByCategoryGender($data['category']['id']);
        if (empty($products)) {
            $this->session->set_flashdata('error', 'Kategori Tidak Ditemukan');
            redirect('product');
        }
        $config['uri_segment'] = 4;
        $config['total_rows'] = count($products);
        $config['per_page'] = 4;
        $config['base_url'] = base_url() . 'product/category/' . $permalink . '/';
        $config['full_tag_open'] = '<div class="pagination pagination-small pagination-centered"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] =  '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $pages_count = ceil($config['total_rows'] / $config['per_page']);
        $page = ($page == 0) ? 1 : $page;
        $offset = $config['per_page'] * ($page - 1);

        $data['products'] = $this->Products->getProductsByCategoryGender($data['category']['id'], $config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = 'products/category';
        $this->load->view($this->template, $data);
    }

    function add_cart($permalink) {
        $product = $this->Products->getProductByPermalink($permalink);

        $data = array(
            'id' => $product['sku'],
            'qty' => 1,
            'price' => $product['harga_net'],
            'name' => $product['nama'],
            'gambar' => $product['gambar'],
            'diskon' => $product['diskon'],
            'hargaa' => $product['harga'],
            


        );

        if ($this->cart->insert($data)) {
            $this->session->set_flashdata('success', 'Item Telah Ditambahkan Ke Keranjang Anda');
            redirect('product/detail/' . $permalink);
        }
    }
    function add_keinginan($id) {
        if ($this->general->isLogin() == FALSE) {
            $this->session->set_flashdata('error', 'Silahkan Login  !');
            redirect('users/login');
        } else {
            $user = $this->session->userdata('id');
            $product = $this->Products->getProductsById($id);
            $wis = $this->impian->ImpianByProd($user, $id);
            
                 if (empty($wis)) {
                     $data = array(
                        'id_user' => $user,
                        'id_produk' => $id,

                    );

                    if ($this->impian->add($data)) {
                        $this->session->set_flashdata('success', 'Item Telah ditambahkan Ke Daftar Keinginan');
                        redirect('product/detail/'. $product['permalink']);
                    }
                    
                
                } else {
                    $this->session->set_flashdata('error', 'Item Telah Ada di Daftar Keinginan ');
                    redirect('product/detail/'. $product['permalink']);
                    
                   
                }
        }
    }

}

?>

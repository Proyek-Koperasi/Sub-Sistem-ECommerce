<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Kategori extends CI_Model {

    var $table = 'kategori';
    var $table2 = 'brands';

    function __construct() {
        parent::__construct();
    }

    function create() {
        $data = array(
            'kategori' => $this->input->post('name'),
            'permalink' => url_title(strtolower($this->input->post('name')))
        );

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    
    function getCategories() {
        $this->db->select('*');
        $this->db->order_by('kategori','ASC');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getCategoryById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getCategoryByPermalink($permalink) {
        $this->db->select('*');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

     function getBrandsByPermalink($permalink) {
        $this->db->select('*');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get($this->table2, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getCategoryByInduk($kategori) {
        $this->db->select('*');
        $this->db->where('kategori_gender', $kategori);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getDropDown_gender($kategori=0) {
        $this->db->select('id,kategori');
        $this->db->where('kategori_produk', $kategori);
        $this->db->order_by('kategori','ASC');
        $query = $this->db->get($this->table);

        $data = array();
        foreach ($query->result_array() as $row) {
            $data[0] = '-Pilih Gender-';
            $data[$row['id']] = $row['kategori'];
        }

        return $data;
    }

    function getDropDown_brands() {
        $this->db->select('id,brands');
        $query = $this->db->get($this->table2);

        $data = array();
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = $row['brands'];
        }

        return $data;
    }
    

    function getDropDown() {
        
        $query = $this->db->query("select * from kategori where kategori_produk != 0;");


        $data = array();
        foreach ($query->result_array() as $row) {
             $data[$row['id']] = $row['kategori'];
        }

        return $data;
    }

   public function get_data($induk=0)
    {
        $data = array();
        $this->db->from('multileveldata');
        $this->db->where('induk',$induk);
        $result = $this->db->get();
    
        foreach($result->result() as $row)
        {
            $data[] = array(
                    'id'    =>$row->id,
                    'nama'  =>$row->nama,
                    // recursive
                    'child' =>$this->get_data($row->id)
                );
        }
        return $data;
    }
    
    function get_KategoriGender($produk=0){
        $this->db->select('*');
        $this->db->where('kategori_produk',$produk);
        $this->db->order_by('id','ASC');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function get_KategoriProduk($gender){
        
        $query = $this->db->query("select * from kategori where kategori_gender=$gender AND kategori_produk != 0;");

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function get_KategoriBrands(){
        $this->db->select('*');
        $this->db->order_by('id','ASC');
        $query = $this->db->get($this->table2);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

	function delete($options) {
        $this->db->where('id', $options);
        $query = $this->db->delete($this->table);
        return 1;
    }

}



?>

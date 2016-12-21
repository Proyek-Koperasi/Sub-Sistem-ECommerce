<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Products extends CI_Model {

    var $table = 'produk';
    var $status = array(
        0 => 'draft',
        1 => 'published'
    );

    function __construct() {
        parent::__construct();
    }

    function create($filename) {
        $data = array(
            'sku' => $this->input->post('code'),
            'nama' => $this->input->post('name'),
            'permalink' => url_title(strtolower($this->input->post('name'))),
            'deskripsi' => $this->input->post('description'),
            'harga' => $this->input->post('price'),
            'diskon' => $this->input->post('discount_percent'),
            'harga_net' => $this->input->post('price') - ($this->input->post('discount_percent') / 100 * $this->input->post('price')),
            'jumlah' => $this->input->post('stock'),
            'gambar' => $filename,
            'kategori_gender' => $this->input->post('kategori_gender'),
            'kategori_brands' => $this->input->post('kategori_brands'),
            'kategori' => $this->input->post('kategori'),
            'enabled' => $this->input->post('status')
            );

        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

     function update($id,$filename) {
        $data = array(
           'sku' => $this->input->post('code'),
            'nama' => $this->input->post('name'),
            'permalink' => url_title(strtolower($this->input->post('name'))),
            'deskripsi' => $this->input->post('description'),
            'harga' => $this->input->post('price'),
            'diskon' => $this->input->post('discount_percent'),
            'harga_net' => $this->input->post('price') - ($this->input->post('discount_percent') / 100 * $this->input->post('price')),
            'jumlah' => $this->input->post('stock'),
            'gambar' => $filename,
            'kategori_gender' => $this->input->post('kategori_gender'),
            'kategori_brands' => $this->input->post('kategori_brands'),
            'kategori' => $this->input->post('kategori'),
            'enabled' => $this->input->post('status')
            );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return TRUE;
    }
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function getProducts($perPage = null, $offset = null, $key = null) {
        $this->db->select('p.id, p.sku,p.nama,p.permalink, p.deskripsi,  p.harga,p.diskon,p.harga_net, p.jumlah,p.gambar, p.enabled, c.kategori as categoryName');
        $this->db->join('kategori c', 'c.id = p.kategori');
        $this->db->limit($perPage, $offset);
        if ($key != null) {
            $this->db->like('p.nama', $key);
            $this->db->or_like('p.deskripsi', $key);
        }
        $query = $this->db->get('produk p');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getProductsPublished($perPage='', $offset = 0, $key = null) {
        $this->db->select('p.id, p.sku,p.nama,p.permalink, p.deskripsi, p.harga,p.diskon,p.harga_net, p.jumlah,p.gambar, p.enabled, c.kategori as categoryName');
        $this->db->join('kategori c', 'c.id = p.kategori');
        $this->db->where('p.enabled', 1);
        $this->db->limit($perPage, $offset);
        if ($key != null) {
            $this->db->like('p.nama', $key);
            $this->db->or_like('p.kategori', $key);
        }
        $query = $this->db->get('produk p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getProductsByCategoryId($categoryId, $perPage =3, $offset = 0) {
        $this->db->select('p.id, p.sku,p.nama, p.permalink, p.deskripsi,   p.harga,p.diskon,p.harga_net, p.jumlah,p.gambar, p.enabled, c.kategori as categoryName');
        $this->db->join('kategori c', 'c.id = p.kategori');
        $this->db->where('p.kategori', $categoryId);
        $this->db->where('p.enabled', 1);

        $this->db->limit($perPage, $offset);
        $query = $this->db->get('produk p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getProductsByBrandsId($brandsid, $perPage =3, $offset = 0) {
        $this->db->select('p.id, p.sku,p.nama, p.permalink, p.deskripsi,   p.harga,p.diskon,p.harga_net, p.jumlah,p.gambar, p.enabled, c.brands as categoryName');
        $this->db->join('brands c', 'c.id = p.kategori_brands');
        $this->db->where('p.kategori_brands', $brandsid);
        $this->db->where('p.enabled', 1);

        $this->db->limit($perPage, $offset);
        $query = $this->db->get('produk p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getProductsByCategoryGender($categoryId, $perPage =3, $offset = 0) {
        $this->db->select('p.id, p.sku,p.nama, p.permalink, p.deskripsi,   p.harga,p.diskon,p.harga_net, p.jumlah,p.gambar, p.enabled, c.kategori as categoryName');
        $this->db->join('kategori c', 'c.id = p.kategori_gender');
        $this->db->where('p.kategori_gender', $categoryId);
        $this->db->where('p.enabled', 1);

        $this->db->limit($perPage, $offset);
        $query = $this->db->get('produk p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getNewProducts($limit) {
        $this->db->select('p.id, p.sku,p.nama, p.permalink, p.deskripsi, p.harga,p.diskon,p.harga_net, p.jumlah,p.gambar, p.enabled, c.kategori as categoryName');
        $this->db->join('kategori c', 'c.id = p.kategori');
        $this->db->where('enabled', 1);
        $this->db->limit($limit);
        $query = $this->db->get('produk p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    
    function getProductsById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);

        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getProductByCode($code) {
        $this->db->select('*');
        $this->db->where('sku', $code);

        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getProductByPermalink($permalink) {
       $this->db->select('p.id, p.sku,p.nama, p.permalink, p.deskripsi,p.kategori, p.harga,p.diskon,p.harga_net, p.jumlah,p.gambar, p.enabled, c.kategori as categoryName');
        $this->db->join('kategori c', 'c.id = p.kategori');
        $this->db->where('p.permalink', $permalink);
        $query = $this->db->get('produk p', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getProductsByOptions($options = array()) {
        $this->db->where($options);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    function GetContent($where = ''){
        return $this->db->query("select * from produk $where;");
    }

    


}

?>



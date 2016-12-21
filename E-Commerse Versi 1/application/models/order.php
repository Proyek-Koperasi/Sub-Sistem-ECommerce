<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Order extends CI_Model {

    var $table = 'orders';
    var $status = array(
        0 => 'Tunda',
        1 => 'Disetujui',
        2 => 'Order Dikirim',
        3 => 'Batal',
        4 => 'Menunggu Disetujui'
    );
    var $paymentMethods = array(
        1 => 'Bank Transfer'
    );

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function getOrders($options = array(), $limit = 5, $offset = 0, $key = null) {
        $this->db->where($options);
        if ($key != null) {
            $this->db->like('code', $key);
        }
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getAll() {
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getHistory($options = array(), $limit = 5, $offset = 0) {
        $this->db->where($options);
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getByOrderCode($code) {
        $this->db->where('code', $code);
        $query = $this->db->get($this->table, 1);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table, 1);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return TRUE;
    }

}

?>

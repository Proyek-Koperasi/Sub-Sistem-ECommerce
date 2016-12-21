<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Impian extends CI_Model {

    var $table = 'wishtlist';
   
    function __construct() {
        parent::__construct();
    }

    function add($data) {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    function ImpianById($user) {
        $this->db->select('*');
        $this->db->where('id_user', $user);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function ImpianByProd($user,$id) {
        $this->db->select('*');
        $this->db->where('id_user', $user);
        $this->db->where('id_produk', $id);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    function delete($id) {
        $this->db->where('id_produk', $id);
        $this->db->delete($this->table);
        if ($this->db->affected_rows() == 1) {

            return TRUE;
        }
        return FALSE;
    }

    

}

?>

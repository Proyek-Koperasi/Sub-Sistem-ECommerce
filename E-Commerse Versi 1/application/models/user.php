<?php


class User extends CI_Model {

    var $table = 'users';
    var $level = array(
        1 => 'Admin',
        0 => 'Kustomer'
    );
    var $status = array(
        1 => 'Aktif',
        0 => 'Non Aktif'
    );

    function __construct() {
        parent::__construct();
    }

    function checkLogin($username, $password) {
        $this->db->select('*');
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
        $this->db->where('status', 1);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function updateLastLogin($id) {
        $data = array(
            'last_login' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function create() {
        $data = array(
            'NamaDepan' => $this->input->post('NamaDepan'),
            'NamaBelakang' => $this->input->post('NamaBelakang'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'phone' => $this->input->post('phone'),
            'alamat' => $this->input->post('alamat'),
            'zip' => $this->input->post('zip'),
            'level' => 0,
            'status' =>1
        );

        $this->db->insert($this->table, $data);
    }

    function update($id) {
        if ($this->input->post('password')) {
            $data = array(
                'NamaDepan' => $this->input->post('NamaDepan'),
                'NamaBelakang' => $this->input->post('NamaBelakang'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'phone' => $this->input->post('phone'),
                'alamat' => $this->input->post('alamat'),
                'zip' => $this->input->post('zip'),
            );
        } else {
            $data = array(
                'NamaDepan' => $this->input->post('NamaDepan'),
                'NamaBelakang' => $this->input->post('NamaBelakang'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'alamat' => $this->input->post('alamat'),
                'zip' => $this->input->post('zip'),
            );
        }
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function getUserById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function findByEmail($email) {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function createToken($userId, $token) {
        $data = array(
            'reset_token' => $token
        );
        $this->db->where('id', $userId);
        $this->db->update($this->table, $data);
    }

    function resetPassword($id, $password) {
        $data = array(
            'password' => md5($password)
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function truncateToken($id) {
        $data = array(
            'reset_token' => null
        );
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function findByEmailAndResetPasswordToken($email, $token) {

        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('reset_token', $token);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function findAll() {
        $this->db->order_by('level', 'desc');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
	
	function delete($id)
    {
		$this->db->where('id', $id);
        $this->db->delete($this->table);
		
    }

}

?>

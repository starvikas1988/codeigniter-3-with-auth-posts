<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_user($data) {
        $this->db->insert('users', $data);
    }

    public function get_user($username) {
        return $this->db->get_where('users', array('username' => $username))->row();
    }

    public function get_Users() {
       // return $this->db->get('users')->result();
        return $this->db->get('users')->result_array();

    }
}

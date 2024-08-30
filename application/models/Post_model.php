<?php
class Post_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_posts() {
        return $this->db->get('posts')->result();
    }

    public function insert_post($data) {
        $this->db->insert('posts', $data);
    }

    public function get_post($id) {
        return $this->db->get_where('posts', array('id' => $id))->row();
    }

    public function update_post($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('posts', $data);
    }

    public function delete_post($id) {
        $this->db->where('id', $id);
        $this->db->delete('posts');
    }
}

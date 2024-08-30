<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index() {
        $data['posts'] = $this->Post_model->get_posts();
        $this->load->view('posts/index', $data);
    }

    

        public function create() {
            // Load the form validation and upload libraries
            $this->load->library('form_validation');
            $this->load->library('upload');
    
            // Set form validation rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
    
            // Run form validation
            if ($this->form_validation->run() == FALSE) {
              
                // Validation failed, load the form with errors
                $this->load->view('posts/create');
            } else {
                // Configure upload options
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2048; // Max size in KB
                $config['encrypt_name'] = TRUE; // Encrypt the file name for security
    
                $this->upload->initialize($config); //1st step
    
                // Check if file upload was successful
                if (!$this->upload->do_upload('image')) { //2nd step of check
                    // Upload failed, display error
                    $error = array('error' => $this->upload->display_errors()); //to check errors
                    
                    $this->load->view('posts/create', $error);
                } else {
                    // Upload success, process the uploaded file
                    $upload_data = $this->upload->data(); //3rd step to add entry to table
                    $image = $upload_data['file_name']; //4th step get the image name and add to the array to be uploaded
    
                    // Prepare data for database insertion
                    $data = array(
                        'title' => $this->input->post('title'),
                        'content' => $this->input->post('content'),
                        'image' => $image
                    );
    
                    // Insert data into the database
                    $this->Post_model->insert_post($data);
    
                    // Redirect to the posts page
                    redirect('posts');
                }
            }
        }
    

    public function edit($id) {
        $data['post'] = $this->Post_model->get_post($id);

        if ($this->input->post()) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            $image = $data['post']->image;
            //image upload codes
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
            }

            $update_data = array(
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'image' => $image,
            );
            $this->Post_model->update_post($id, $update_data);
            redirect('posts');
        } else {
            $this->load->view('posts/edit', $data);
        }
    }

    public function delete($id) {
        $this->Post_model->delete_post($id);
        redirect('posts');
    }

    public function view($id) {
        $data['post'] = $this->Post_model->get_post($id);
        $this->load->view('posts/view', $data);
    }
}

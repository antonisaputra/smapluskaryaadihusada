<?php

class Admin extends CI_Controller{
    public function index(){
        $data['title'] = 'Admin Dashboard';

        $data['mata_pelajaran'] = $this->db->get('mata_pelajaran')->result_array();

        $this->load->view('admin/Tamplates/header', $data);
        $this->load->view('admin/Tamplates/sidebar', $data);
        $this->load->view('admin/Dashboard/index', $data);
        $this->load->view('admin/Tamplates/footer', $data);
    }

}

?>
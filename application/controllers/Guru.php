<?php

class Guru extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Admin Guru";

        $data['guru'] = $this->db->get('detail_guru')->result_array();

        $this->load->view('admin/Tamplates/header', $data);
        $this->load->view('admin/Tamplates/sidebar', $data);
        $this->load->view('admin/Guru/index', $data);
        $this->load->view('admin/Tamplates/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = "Admin Tambah Guru";

        $data['mata_pelajaran'] = $this->db->get('mata_pelajaran')->result_array();
        $data['posisi'] = $this->db->get('posisi')->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/Tamplates/header', $data);
            $this->load->view('admin/Tamplates/sidebar', $data);
            $this->load->view('admin/Guru/tambah', $data);
            $this->load->view('admin/Tamplates/footer', $data);
        }else{

        }
    }
}

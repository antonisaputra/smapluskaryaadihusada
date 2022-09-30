<?php

class Posisi extends CI_Controller{
    public function index(){
        $data['title'] = "Admin Posisi";
        $data['posisi'] = $this->db->get('posisi')->result_array();
        $this->load->view('admin/Tamplates/header',$data);
        $this->load->view('admin/Tamplates/sidebar',$data);
        $this->load->view('admin/Posisi/index',$data);
        $this->load->view('admin/Tamplates/footer',$data);  
    }
    public function tambah(){
        $data['title'] = "Admin Posisi";

        $this->form_validation->set_rules('posisi','Posisi','required',[
            'required' => 'Mata Pelajaran Wajib Diisi'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('admin/Tamplates/header',$data);
            $this->load->view('admin/Tamplates/sidebar',$data);
            $this->load->view('admin/Posisi/tambah',$data);
            $this->load->view('admin/Tamplates/footer',$data);  
        }else{
            $data = [
                'posisi' => $this->input->post('posisi', true)
            ];

            $this->db->insert('posisi', $data);
            $this->session->set_flashdata('alert','alert-success');
            $this->session->set_flashdata('pesan','Posisi Berhasil Diisi');
            redirect('Posisi');
        }
    }
    public function edit($id){
        $data['title'] = "Admin Posisi";

        $data['posisi'] = $this->db->get_where('posisi',['id' => $id])->row_array();

        $this->form_validation->set_rules('posisi','Posisi','required',[
            'required' => 'Mata Pelajaran Wajib Diisi'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('admin/Tamplates/header',$data);
            $this->load->view('admin/Tamplates/sidebar',$data);
            $this->load->view('admin/Posisi/edit',$data);
            $this->load->view('admin/Tamplates/footer',$data);  
        }else{
            $data = [
                'posisi' => $this->input->post('posisi', true)
            ];
            $this->db->where('id',$id);
            $this->db->update('posisi', $data);
            $this->session->set_flashdata('alert','alert-warning');
            $this->session->set_flashdata('pesan','Posisi Berhasil Di Ubah');
            redirect('Posisi');
        }
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('posisi');
        $this->session->set_flashdata('alert','alert-danger');
        $this->session->set_flashdata('pesan','Posisi Berhasil Di Hapus');
        redirect('Posisi');
    }
}
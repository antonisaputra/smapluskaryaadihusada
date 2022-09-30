<?php
class Mata_pelajaran extends CI_Controller{
    public function index(){
        $data['title'] = "Admin Mata Pelajaran";

        $data['mata_pelajaran'] = $this->db->get('mata_pelajaran')->result_array();

        $this->load->view('admin/Tamplates/header',$data);
        $this->load->view('admin/Tamplates/sidebar',$data);
        $this->load->view('admin/Mata_pelajaran/index',$data);
        $this->load->view('admin/Tamplates/footer',$data);  
    }
    public function tambah(){
        $data['title'] = "Admin Tambah Mata Pelajaran";

        $this->form_validation->set_rules('mata_pelajaran','Mata Pelajaran','required',[
            'required' => 'Mata Pelajaran Wajib Diisi'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('admin/Tamplates/header',$data);
            $this->load->view('admin/Tamplates/sidebar',$data);
            $this->load->view('admin/Mata_pelajaran/tambah',$data);
            $this->load->view('admin/Tamplates/footer',$data);  
        }else{
            $data = [
                'mata_pelajaran' => $this->input->post('mata_pelajaran', true)
            ];

            $this->db->insert('mata_pelajaran', $data);
            $this->session->set_flashdata('alert','alert-success');
            $this->session->set_flashdata('pesan','Mata Pelajaran Berhasil Diisi');
            redirect('Mata_pelajaran');
        }
    }
    public function edit($id){
        $data['title'] = "Admin Edit Mata Pelajaran";
        $data['mata_pelajaran'] = $this->db->get_where('mata_pelajaran',['id' => $id])->row_array();
    
        
        $this->form_validation->set_rules('mata_pelajaran','Mata Pelajaran','required',[
            'required' => 'Mata Pelajaran Wajib Diisi'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('admin/Tamplates/header',$data);
            $this->load->view('admin/Tamplates/sidebar',$data);
            $this->load->view('admin/Mata_pelajaran/edit',$data);
            $this->load->view('admin/Tamplates/footer',$data);  
        }else{
            $data = [
                'mata_pelajaran' => $this->input->post('mata_pelajaran', true)
            ];
            $this->db->where('id',$id);
            $this->db->update('mata_pelajaran',$data);
            $this->session->set_flashdata('alert','alert-warning');
            $this->session->set_flashdata('pesan','Mata Pelajaran Berhasil Di Ubah');
            redirect('Mata_pelajaran');
        }
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('mata_pelajaran');
        $this->session->set_flashdata('alert','alert-danger');
        $this->session->set_flashdata('pesan','Mata Pelajaran Berhasil Di Hapus');
        redirect('Mata_pelajaran');
    } 
}
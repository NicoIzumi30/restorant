<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restoran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function masakan()
    {
        $data['title'] = 'Masakan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('masakan', 'Masakan', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $data['masakan'] = $this->db->get('masakan')->result();
            $this->load->view('template/header', $data);
            $this->load->view('restoran/masakan', $data);
            $this->load->view('template/footer');
        } else {
            $nmfile = "file_" . time();
            $config['upload_path']          = './assets/image/masakan/';
            $config['allowed_types']        = 'gif|jpg|jpeg';
            $config['max_size']             = 3000;
            $config['file_name'] = $nmfile;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('restoran/masakan');
            } else {
                $image = $this->upload->data();
                $image = $image['file_name'];
                $data = [
                    'nama_masakan' => htmlspecialchars($this->input->post('masakan')),
                    'image' => $image,
                    'type' => htmlspecialchars($this->input->post('type')),
                    'status_masakan' => htmlspecialchars($this->input->post('status')),
                    'harga' => htmlspecialchars($this->input->post('harga'))
                ];
                $this->db->insert('masakan', $data);
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('restoran/masakan');
            }
        }
    }
}
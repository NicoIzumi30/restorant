<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'Required');
        $this->form_validation->set_rules('icon', 'Icon', 'Required');

        if ($this->form_validation->run() == false) {
            $data['menu'] = $this->db->get('user_menu')->result();
            $this->load->view('template/header', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'menu' => htmlspecialchars($this->input->post('menu')),
                'icon' => htmlspecialchars($this->input->post('icon'))
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('flash', 'Di Tambahkan');

            redirect('menu');
        }
    }
}
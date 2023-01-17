<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
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
    public function delete_menu($id)
    {
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('flash', 'Di Hapus');
        redirect('menu');
    }
    public function update_menu($id)
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('menu');
        } else {
            $data = array(
                'menu' => htmlspecialchars($this->input->post('menu')),
                'icon' => htmlspecialchars($this->input->post('icon'))
            );
            $where = array(
                'id' => $id
            );
            $this->db->where($where);
            $this->db->update('user_menu', $data);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('menu');
        }
    }
    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('submenu', 'Submenu', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        if ($this->form_validation->run() == false) {
            $data['submenu'] = $this->M_menu->submenu();
            $data['menu'] = $this->db->get('user_menu')->result();
            $this->load->view('template/header', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else {
            if ($this->input->post('is_active') !== null) {
                $is_active = $this->input->post('is_active');
            } else {
                $is_active = 0;
            }
            $data = [
                'submenu' => htmlspecialchars($this->input->post('submenu')),
                'menu_id' => htmlspecialchars($this->input->post('menu_id')),
                'url' => htmlspecialchars($this->input->post('url')),
                'is_active' => $is_active
            ];
            $this->db->insert('user_submenu', $data);
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            redirect('menu/submenu');
        }
    }
    public function delete_submenu($id)
    {
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        $query = $this->db->delete('user_submenu');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
        }
        redirect('menu/submenu');
    }
    public function update_submenu($id)
    {
        $this->form_validation->set_rules('submenu', 'Submenu', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('menu/submenu');
        } else {
            if ($this->input->post('is_active') !== null) {
                $is_active = $this->input->post('is_active');
            } else {
                $is_active = 0;
            }
            $data = array(
                'submenu' => htmlspecialchars($this->input->post('submenu')),
                'menu_id' => htmlspecialchars($this->input->post('menu_id')),
                'url' => htmlspecialchars($this->input->post('url')),
                'is_active' => $is_active
            );
            $where = array(
                'id' => $id
            );
            $this->db->where($where);
            $this->db->update('user_submenu', $data);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('menu/submenu');
        }
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('role', 'Role', 'Required');
        if ($this->form_validation->run() == false) {
            $data['role'] = $this->db->get('user_role')->result();
            $this->load->view('template/header', $data);
            $this->load->view('menu/role', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_role', ['role' => htmlspecialchars($this->input->post('role'))]);
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            redirect('menu/role');
        }
    }
    public function delete_role($id)
    {
        $where = array(
            'id' => $id
        );
        $this->db->where($where);
        $query = $this->db->delete('user_role');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
        }
        redirect('menu/role');
    }
    public function update_role($id)
    {
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'Di Update');
        } else {
            $data = array(
                'role' => htmlspecialchars($this->input->post('role'))
            );
            $where = array(
                'id' => $id
            );
            $this->db->where($where);
            $this->db->update('user_role', $data);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('menu/role');
        }
    }
    public function access($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        // $this->db->where('id !=', 6);
        $data['menu'] = $this->db->get('user_menu')->result();
        $this->load->view('template/header', $data);
        $this->load->view('menu/access', $data);
        $this->load->view('template/footer');
    }
    public function changeaccess()
    {
        $data = [
            'role_id' => $this->input->post('roleId'),
            'menu_id' => $this->input->post('menuId')
        ];
        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('flash', 'Di Update');
    }
}
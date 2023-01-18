<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $query =  "SELECT `user`.*,`user_role`.`role`
            FROM `user` JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`";
            $data['users'] = $this->db->query($query)->result();
            $data['role'] = $this->db->get('user_role')->result();
            $this->load->view('template/header', $data);
            $this->load->view('users/index', $data);
            $this->load->view('template/footer');
        } else {
            function getRandomString($n)
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';

                for ($i = 0; $i < $n; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $randomString .= $characters[$index];
                }

                return $randomString;
            }
            $email = htmlspecialchars($this->input->post('email-h'));
            $password = getRandomString(10);
            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'email' => $email,
                'telp' => htmlspecialchars($this->input->post('telp')),
                'image' => 'default.png',
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role')),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('flash-user', true);
            $this->session->set_flashdata('flash-email', $email);
            $this->session->set_flashdata('flash-password', $password);
            redirect('users');
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('role', 'role_id', 'required');
        $this->form_validation->set_rules('active', 'Active', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('users');
        } else {
            $data = [
                'role_id' => htmlspecialchars($this->input->post('role')),
                'is_active' => htmlspecialchars($this->input->post('active'))
            ];
            $where = [
                'id' => $id
            ];
            $this->db->where($where);
            $this->db->update('user', $data);
            $this->session->set_flashdata('flash', 'Di Update');
            redirect('users');
        }
    }
    public function delete($id)
    {
        $where = [
            'id' => $id
        ];
        $query = $this->db->get_where('user', $where)->row_array();
        if ($query['image'] !== 'default.png') {
            $image = unlink(FCPATH . 'assets/image/profile/' . $query['image']);
            if ($image) {
                $this->db->where($where);
                $this->db->delete('user');
                $this->session->set_flashdata('flash', 'Di Hapus');
                redirect('users');
            } else {
                $this->session->set_flashdata('flash', 'Gagal Hapus');
                redirect('users');
            }
        } else {
            $this->db->where($where);
            $this->db->delete('user');
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('users');
        }
    }
}
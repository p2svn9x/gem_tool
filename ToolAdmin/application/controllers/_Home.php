<?php
Class Home extends MY_Controller
{
    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run()) {
                $user = $this->_get_user_info();
                $this->session->set_userdata('user_id_login', $user->ID);
                redirect('admin/home');
            }
        }
        $this->lang->load('admin/home');
        $this->data['temp'] = 'admin/index';
        $this->load->view('admin/login/index', $this->data);
    }
    function check_login()
    {
        $user = $this->_get_user_info();
        if ($user) {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }
    private function _get_user_info()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $this->load->model('admin_model');
        $where = array('UserName' => $username, 'Password' => $password);
        $user = $this->admin_model->get_info_rule($where);
        return $user;
    }
}
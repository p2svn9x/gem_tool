<?php
Class Usertranfer extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usertranfer_model');

    }

    function index(){
        $this->data['temp'] = 'tranfer/usertranfer/index';
        $this->load->view('admin/main', $this->data);
    }
    function logout()
    {

        if ($this->session->userdata('user_tranfer_login')) {
            $this->session->unset_userdata('user_tranfer_login');
        }
        redirect(tranfer_url('login'));
    }
}
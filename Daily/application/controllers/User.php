<?php

Class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('useragent_model');

    }

    function index()
    {
        $this->data['temp'] = 'admin/user/index';
        $this->load->view('admin/main', $this->data);
    }
    function transaction()
    {
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = null;
        $end_time = null;
        if ($this->input->post('toDate')) {
            $start_time = $this->input->post('toDate');
        }

        if ($this->input->post('fromDate')) {
            $end_time = $this->input->post('fromDate');
        }

        if ($start_time === null) {
            $start_time = date('Y-m-d', strtotime('-3 days'));
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['temp'] = 'admin/user/transaction';
        $this->load->view('admin/main', $this->data);
    }
	function transactionagent()
    {
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = null;
        $end_time = null;
        if ($this->input->post('toDate')) {
            $start_time = $this->input->post('toDate');
        }

        if ($this->input->post('fromDate')) {
            $end_time = $this->input->post('fromDate');
        }

        if ($start_time === null) {
            $start_time = date('Y-m-d', strtotime('-3 days'));
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['temp'] = 'admin/user/transactionagent';
        $this->load->view('admin/main', $this->data);
        
    }
	function transactiontongdaily()
    {
		 date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = null;
        $end_time = null;
        if ($this->input->post('toDate')) {
            $start_time = $this->input->post('toDate');
        }

        if ($this->input->post('fromDate')) {
            $end_time = $this->input->post('fromDate');
        }

        if ($start_time === null) {
            $start_time = date('Y-m-d', strtotime('-3 days'));
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['temp'] = 'admin/user/transactiontongdaily';
        $this->load->view('admin/main', $this->data);
        
    }
    function logout()
    {


        if ($this->session->userdata('user_admindaily_login')) {
            $this->session->unset_userdata('user_admindaily_login');
        }
        if ($this->session->userdata('vin')) {
            $this->session->unset_userdata('vin');
        }
        redirect(base_url('login'));
    }

}
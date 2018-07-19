<?php
Class Freeze extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function index()
    {
        $this->data['temp'] = 'admin/dongbang/index';
        $this->load->view('admin/main', $this->data);
    }
}
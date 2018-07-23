<?php
Class Home extends MY_Controller
{
    function index()
    {
        $this->lang->load('admin/home');
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
}
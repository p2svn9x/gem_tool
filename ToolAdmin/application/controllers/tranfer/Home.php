<?php
Class Home extends MY_Controller
{
    function index()
    {
        $this->lang->load('tranfer/home');
        $this->data['temp'] = 'tranfer/home/index';
        $this->load->view('tranfer/main', $this->data);
    }
}
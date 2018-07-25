<?php
Class Login extends MY_Controller
{

    function index()
    {
        $this->data['temp'] = 'news/login/index';
        $this->load->view('news/login/index', $this->data);
    }

}
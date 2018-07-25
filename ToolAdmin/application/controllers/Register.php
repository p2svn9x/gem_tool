<?php

Class Register extends MY_Controller
{


    function __construct()
    {
        parent::__construct();


    }

// This function show values in view page and check captcha value.
    function created(){
        $vals = array(
            'word' => '',
            'word_length' => 3,
            'img_path' => './pub/captcha/',
            'img_url' => base_url('pub/').'/captcha/',
            'font_path' => base_url('system/font').'/texb.ttf',
            'img_width' => 100,
            'img_height' => 30,
            'expiration' => 7200
        );
        $cap = create_captcha($vals);
        $this->session->set_userdata($cap);
        //$_SESSION['captchaWord'] = $cap['word'];
        echo $cap['image'];
    }
    function index()
    {





        $this->data['temp'] = 'site/register/index';
        $this->load->view('site/layout', $this->data);
    }
}
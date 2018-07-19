<?php
Class Home extends MY_Controller
{
    function index()
    {
        $this->lang->load('admin/home');
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
    function updatevin(){

        $vinch = intval($this->input->post('vinch'));
        if($vinch != null){
             $vin = $this->session->userdata('vin');
            $new_vin = intval($vin) - intval($vinch);
            $this->session->set_userdata("vin", $new_vin);
        }



    }
}
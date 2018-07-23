<?php

Class Pokertour extends MY_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->model('admin_model');
    }

    function  add()
    {
        $this->data['temp'] = 'admin/ticketpoker/add';
        $this->load->view('admin/main', $this->data);
    }

    function  addajax()
    {

        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = $this->session->userdata('nicknameadmin');

        $date = urlencode($this->input->post("date"));
        $quantity = urlencode($this->input->post("quantity"));
        $typecode = $this->input->post("typecode");
        $menhgiacode = $this->input->post("menhgiacode");
        $typeotp = $this->input->post("typeotp");
        $otp = $this->input->post("otp");
       // var_dump($this->config->item('api_url') . '?c=24&gn=PokerTour&qty=' . $quantity . '&am=' . $menhgiacode . '&ct=' . $typecode . '&ep=' . $date . '&act=' . $nickname. '&otp=' . $otp . '&ot=' . $typeotp);
        $datainfo = $this->curl->simple_get($this->config->item('api_url') . '?c=24&gn=PokerTour&qty=' . $quantity . '&am=' . $menhgiacode . '&ct=' . $typecode . '&ep=' . $date . '&act=' . $nickname . '&otp=' . $otp . '&ot=' . $typeotp);


        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function  updatecode()
    {
        $this->data['temp'] = 'admin/ticketpoker/updatecode';
        $this->load->view('admin/main', $this->data);
    }

    function  updateajax()
    {

        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = $this->session->userdata('nicknameadmin');

        $id = urlencode($this->input->post("id"));
        $idlocode = urlencode($this->input->post("idlocode"));
        $code = urlencode($this->input->post("code"));
        $status = urlencode($this->input->post("status"));
        $typecode = $this->input->post("typecode");
        $menhgiacode = $this->input->post("menhgiacode");
        $typeotp = $this->input->post("typeotp");
        $otp = $this->input->post("otp");
        if($id == ""){
            $id = -1;
        }


        $datainfo = $this->curl->simple_get($this->config->item('api_url') . '?c=28&gn=PokerTour&id=' .$id .'&co='.$code.'&pkid='.$idlocode.'&st='.$status.'&am=' . $menhgiacode . '&ct=' . $typecode. '&nn=' . $nickname . '&otp=' . $otp . '&ot=' . $typeotp);

        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }


}
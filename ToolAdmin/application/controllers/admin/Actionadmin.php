<?php
Class Actionadmin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('logadmin_model');
        $this->load->model('log_loginadmin_model');
    }
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $list = $this->logadmin_model->listlogadmin();
        $this->data['list'] = $list["rows"];
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        //load view
        $this->data['temp'] = 'admin/action/admin';
        $this->load->view('admin/main', $this->data);
    }

    function loglogin(){
        $list = $this->log_loginadmin_model->listlogloginadmin();

       
        $this->data['list'] = $list["rows"];
        //lay nội dung của biến message

        //load view
        $this->data['temp'] = 'admin/admin/loglogin';
        $this->load->view('admin/main', $this->data);
    }
}

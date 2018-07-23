<?php
Class Logaction extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('logadmin_model');
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
        $this->data['temp'] = 'admin/logaction/index';
        $this->load->view('admin/main', $this->data);
    }
}

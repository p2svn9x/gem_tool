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
        $list = $this->logadmin_model->get_list();
        $this->data['list'] = $list;
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        //load view
        $this->data['temp'] = 'tranfer/logaction/index';
        $this->load->view('tranfer/main', $this->data);
    }
}

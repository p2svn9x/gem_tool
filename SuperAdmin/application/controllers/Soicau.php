<?php
Class Soicau extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('resulttaixiu_model');
    }
    function index()
    {

        $total = $this->resulttaixiu_model->soicau();
        $this->data['couttai'] = $total['num_rows'];
        $list = $this->resulttaixiu_model->soicau();
        $this->data['list'] = $list["rows"];

        $this->data['temp'] = 'admin/soicau/index';
        $this->load->view('admin/main', $this->data);
    }

}
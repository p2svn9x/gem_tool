<?php
Class Congtien extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usergame_model');
        $this->load->model('logadmin_model');
        $this->load->model('actionadmin_model');
        $this->load->model('usertranfer_model');
    }
    function index(){
        $action = $this->actionadmin_model->get_list();
        $this->data['action'] = $action;
        $this->data['temp'] = 'tranfer/congtien/index';
        $this->load->view('tranfer/main', $this->data);

    }
    public function user_data_submit()
    {
        $admin_login = $this->session->userdata('user_tranfer_login');
        $admin_info = $this->usertranfer_model->get_info($admin_login);

        // insert vao db
        $data = array(
            'money' => $this->input->post('money'),
            'account_name' => $this->input->post('account_name'),
            'money_type' => $this->input->post('money_type'),
            'username' => $admin_info->username,
            'action' => $this->input->post('action')
        );
        $this->logadmin_model->create($data);

    }
}

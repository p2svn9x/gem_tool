<?php

Class Login extends MY_controller
{
    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run()) {
                $user = $this->_get_user_info();
                $this->session->set_userdata('user_admintransfer_login', $user->ID);
                redirect(base_url(''));
            }
        }
        $this->load->view('admin/login/index');
    }

    function loginajax(){
        $username = $this->input->post('username');
        $password =  $this->input->post('password');
        $datainfo = $this->curl->simple_get($this->config->item('api_url2').'?c=701&un='.$username.'&pw=' . $password);
		 $data = json_decode($datainfo);
        if($data->success == true){
            //$this->log_login_admin($username,"Thành công",0);
			 $nickname = json_decode(base64_decode($data->sessionKey))->nickname;
            $this->session->set_userdata('nicknameadmin', $nickname);
			   if($this->infouser($nickname) == true){
                $this->log_login_admin($username,"Thành công",0);
            }
        }else{
            if($data->errorCode == 1001){
                $this->log_login_admin($username,"Hệ thống gián đoạn",1);
            }
            if($data->errorCode == 1005){
                $this->log_login_admin($username,"Username không tồn tại",1);
            }
            if($data->errorCode == 1007){
                $this->log_login_admin($username,"Password không đúng",1);
            }
            if($data->errorCode == 1109){
                $this->log_login_admin($username,"Tài khoản bị khóa đăng nhập",1);
            }
            if($data->errorCode == 1114){
                $this->log_login_admin($username,"Hệ thống bảo trì",1);
            }
            if($data->errorCode == 2001){
                $this->log_login_admin($username,"Tài khoản chưa cập nhật nickname",1);
            }
            if($data->errorCode == 1012){
                $this->log_login_admin($username,"Tài khoản đăng nhập bằng OTP",1);
            }
        }
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function getodpajax(){
        $nickname = $this->input->post('nickname');
        $datainfo = $this->curl->simple_get($this->config->item('api_url').'?c=34&nn='.$nickname);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function loginodpajax(){
        $nickname = $this->input->post('nickname');
		 $username = $this->input->post('username');
        $otp =  $this->input->post('otp');
        $datainfo = $this->curl->simple_get($this->config->item('api_url').'?c=35&nn='.$nickname.'&otp='. $otp);

       if($datainfo == 0){
            if($this->infouser($nickname) == true){
                echo json_encode("1");
                $this->log_login_admin($username,"Login ODP",0);
            }else{
                $this->log_login_admin($username,"Tài khoản chưa được phân quyền",1);
                echo json_encode("2");
            }
        }
           else if($datainfo == 1){
               $this->log_login_admin($username,"Hệ thống gián đoạn",1);
                echo json_encode("3");
            }
            else if($datainfo == 2){
                $this->log_login_admin($username,"Nickname không tồn tại",1);
                echo json_encode("4");
            }
           else if($datainfo == 3){
               $this->log_login_admin($username,"Nickname không phải là admin",1);
                echo json_encode("5");
            }
           else if($datainfo == 4){
               $this->log_login_admin($username,"Tài khoản chưa đăng ký bảo mật trên trang Gem.club",1);
                echo json_encode("6");
            }
           else if($datainfo == 5){
               $this->log_login_admin($username,"ODP sai",1);
                echo json_encode("7");
            }
           else if($datainfo == 6){
               $this->log_login_admin($username,"ODP hết hạn",1);
               echo json_encode("8");
           }
    }
    private function _get_user_info()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $this->load->model('admin_model');
        $where = array('UserName' => $username, 'Password' => $password);
        $user = $this->admin_model->get_info_rule($where);
        return $user;
    }
    /*
     * Kiem tra username va password co chinh xac khong
     */
    function check_login()
    {
        $user = $this->_get_user_info();
        if ($user) {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }
    function infouser($nickname){
        $this->load->model('admin_model');
        $where = array('FullName' => $nickname);
        $user = $this->admin_model->get_info_rule($where);
        if($user == false){
            echo json_encode("Tài khoản chưa được phân quyền hoặc đang bị khóa");
            return false;
        }else{
			 $this->load->model('logadmin_model');
            $data = array(
                'account_name' => $user->FullName,
                'username' => $user->UserName,
                'action' => "Đăng nhập tool SuperAdmin từ đia chỉ IP:  ".$this->get_client_ip(),
            );
            $this->logadmin_model->create($data);
            $this->session->set_userdata('user_admintransfer_login', $user->ID);
            return true;
        }

    }
	  function log_login_admin($username,$action,$status){
        $this->load->model('admin_model');
        $this->load->model('log_loginadmin_model');
        $where = array('UserName' => $username);
        $user = $this->admin_model->get_info_rule($where);
        if($user == true){
            $username = $user->UserName;
            $nickname = $user->FullName;
        }else{
            $nickname = "";
        }
        $data = array(
            'username' =>$username,
            'nickname' => $nickname,
            'ip' => $this->get_client_ip(),
            'status'=>$status,
            'agent' => $_SERVER['HTTP_USER_AGENT'],
            'action' => $action,
            'tool' => "Super Admin"

        );
        $this->log_loginadmin_model->create($data);

    }

}
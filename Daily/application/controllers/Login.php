<?php

Class Login extends MY_controller
{
    function index()
    {
        $this->data['errors'] = '';
        $this->data['message'] = '';
        $this->data['flag'] = '';
        $this->data['nickname'] = '';
        $this->data['vintotal'] = '';
        $this->data['temp'] = 'admin/login/index';
        $this->load->view('admin/login/index', $this->data);
    }

    private function _get_user_info()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $this->load->model('useragent_model');
        $where = array('username' => $username, 'password' => $password);
        $user = $this->useragent_model->get_info_rule($where);
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

    function infouser($nickname, $vin,$vippoint,$vippointsave,$accessToken)
    {

        $this->load->model('useragent_model');
        $where = array('nickname' => $nickname, 'active' => 1,"parentid"=>-1);
        $user = $this->useragent_model->get_info_rule($where);
       // $user = $this->useragent_model->check_login_daily_c2($nickname);

        if ($user == false) {
            echo json_encode("Tài khoản chưa được phân quyền hoặc đang bị khóa");
        } else {

            $this->session->set_userdata("vin", $vin);
			  $this->session->set_userdata("vippoint", $vippoint);
            $this->session->set_userdata("vippointsave", $vippointsave);
            $this->session->set_userdata('user_admindaily_login', $user->id);
			 $this->session->set_userdata('accessToken', $accessToken);
              $this->session->set_userdata("nickname", $nickname);
        }
    }

    function  acceptlogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $userinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=701&un=' . $username . '&pw=' . md5($password));
        if ($userinfo) {
            echo $userinfo;
        } else {
            echo json_encode(array('errorCode' => "1001"));
        }
           
    }

    function  getODP()
    {
        $nickname= $this->input->post('hdnusername');
        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=34&nn=' . $nickname);
         if ($optinfo) {
            echo $optinfo;
        } else {
             echo json_encode(array('errorCode' => "1001"));
        }
           
    }

    function loginODP()
    {
        $nickname= $this->input->post('hdnusername');
        $otp= $this->input->post('odplogin');
        $vin = $this->input->post('hndvin');
        $vippoint = $this->input->post('hndvippoint');
        $vippointsave = $this->input->post('hndvippointsave');
        $this->data['vintotal'] = '';
        $message='';
        $odpinfo = file_get_contents($this->config->item('api_url') . '?c=35&nn=' . $nickname . '&otp=' . $otp.'&vin='.$vin);
        if ($odpinfo) {
            echo $odpinfo;
        } else {
            echo json_encode(array('errorCode' => "1001"));
        }
    }
    function saveUserLogin(){
        $nickname= $this->input->post('hdnusername');
        $hdnaccesstoken= $this->input->post('hdnaccesstoken');
        $vin = $this->input->post('hndvin');
        $vippoint = $this->input->post('hndvippoint');
        $vippointsave = $this->input->post('hndvippointsave');
        $this->infouser($nickname, $vin,$vippoint,$vippointsave,$hdnaccesstoken);
        echo "0";
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
            'tool' => "Đại lý"
        );
        $this->log_loginadmin_model->create($data);

    }
}
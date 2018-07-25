<?php

Class Usergame extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
     //   $this->load->model('usergame_model');
        $this->load->model('logadmin_model');
        $this->load->model('actionadmin_model');
        $this->load->library('paginationlib');
    }
    /*
     * Lay danh sach admin
     */
    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/usergame/index';
        $this->load->view('admin/main', $this->data);
    }
    function indexajax(){
        $username = urlencode($this->input->post("username"));
        $nickname = urlencode($this->input->post("nickname"));
        $phone =  urlencode($this->input->post("phone"));
        $fieldname =  $this->input->post("fieldname");
        $timkiemtheo = $this->input->post("timkiemtheo");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $typetaikhoan = $this->input->post("typetaikhoan");
        $pages = $this->input->post("pages");
        $record =  $this->input->post("record");
        $taikhoanbot =  $this->input->post("taikhoanbot");
		  $typetk = $this->input->post("typetk");
        $email = $this->input->post("email");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=104&un='.$username.'&nn='.$nickname.'&m='.$phone.'&fd='.$fieldname.'&srt='.$timkiemtheo.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&dl='.$typetaikhoan.'&p='.$pages.'&tr='.$record.'&bt='.$taikhoanbot.'&email='.$email.'&lk='.$typetk);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function  uservippoint(){
        $this->data['temp'] = 'admin/usergame/uservippoint';
        $this->load->view('admin/main', $this->data);
    }
    function  userdaily1(){
        $this->data['temp'] = 'admin/usergame/userdaily1';
        $this->load->view('admin/main', $this->data);
    }
    function  userdaily2(){
        $this->data['temp'] = 'admin/usergame/userdaily2';
        $this->load->view('admin/main', $this->data);
    }
    function  useradmin(){
        $this->data['temp'] = 'admin/usergame/useradmin';
        $this->load->view('admin/main', $this->data);
    }
    function  uservinplay(){
        $this->data['temp'] = 'admin/usergame/uservinplay';
        $this->load->view('admin/main', $this->data);
    }
    function uservinplayajax(){
        $username = urlencode($this->input->post("username"));
        $nickname = urlencode($this->input->post("nickname"));
        $phone =  urlencode($this->input->post("phone"));
        $fieldname =  $this->input->post("fieldname");
        $timkiemtheo = $this->input->post("timkiemtheo");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $typetaikhoan = $this->input->post("typetaikhoan");
        $pages = $this->input->post("pages");
        $record =  $this->input->post("record");
		$typetk = $this->input->post("typetk");
        $email = $this->input->post("email");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=104&un='.$username.'&nn='.$nickname.'&m='.$phone.'&fd='.$fieldname.'&srt='.$timkiemtheo.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&dl='.$typetaikhoan.'&p='.$pages.'&tr='.$record.'&bt=0'.'&email='.$email.'&lk='.$typetk);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function  userbot(){
        $this->data['temp'] = 'admin/usergame/userbot';
        $this->load->view('admin/main', $this->data);
    }
    function userbotajax(){
        $username = urlencode($this->input->post("username"));
        $nickname = urlencode($this->input->post("nickname"));
        $phone =  urlencode($this->input->post("phone"));
        $fieldname =  $this->input->post("fieldname");
        $timkiemtheo = $this->input->post("timkiemtheo");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $typetaikhoan = $this->input->post("typetaikhoan");
        $pages = $this->input->post("pages");
        $record =  $this->input->post("record");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=104&un='.$username.'&nn='.$nickname.'&m='.$phone.'&fd='.$fieldname.'&srt='.$timkiemtheo.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&dl='.$typetaikhoan.'&p='.$pages.'&tr='.$record.'&bt=1'.'&email=&lk=0');
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function userlogin()
    {

        $this->data['temp'] = 'admin/usergame/userlogin';
        $this->load->view('admin/main', $this->data);
    }
    function userloginajax()
    {

        $nickname = urlencode($this->input->post("nickname"));
        $iplogin = urlencode($this->input->post("iplogin"));
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $status = $this->input->post("status");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=109&nn='.$nickname.'&ip='.$iplogin.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&type='.$status.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function topcaothu()
    {

        $this->data['temp'] = 'admin/usergame/topcaothu';
        $this->load->view('admin/main', $this->data);
    }
    function topcaothuajax()
    {
        $display = $this->input->post("display");
        $money = $this->input->post("money");
        $date =  $this->input->post("date");
        $datainfo = file_get_contents($this->config->item('api_backend').'?c=13&n='.$display.'&mt='.$money.'&date='.$date);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function topuserbot()
    {

        $this->data['temp'] = 'admin/usergame/topuserbot';
        $this->load->view('admin/main', $this->data);
    }
    function topuserbotajax()
    {
        $display = $this->input->post("display");
        $gamename = $this->input->post("gamename");
        $toDate =  $this->input->post("toDate");
        $fromDate =  $this->input->post("fromDate");
		//var_dump($this->config->item('api_backend2').'?c=12&n='.$display.'&ac='.$gamename.'&ts='.$toDate.'&te='.$fromDate);
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=12&n='.$display.'&ac='.$gamename.'&ts='.$toDate.'&te='.$fromDate);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	 function topuserrecharge()
    {

        $this->data['temp'] = 'admin/usergame/topuserrechagre';
        $this->load->view('admin/main', $this->data);
    }

    function topuserrechargeajax()
    {
        $display = $this->input->post("display");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $datainfo = $this->get_data_curl($this->config->item('api_backend') . '?c=12&n=' . $display . '&ac=RechargeByCard' . '&ts=' . $toDate . '&te=' . $fromDate);
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function sendmail()
    {

        $this->data['temp'] = 'admin/usergame/sendmail';
        $this->load->view('admin/main', $this->data);
    }


    function lockuser(){
        $nickname  = $this->uri->rsegment('3');
        $status = $this->uri->rsegment('4');
        $allstatus =  str_repeat( '0', 40-strlen(decbin($status)) ).decbin($status);
        $dao = $this->mb_strrev($allstatus,$encoding="utf-8");
        $this->data['daochuoi'] = $dao;
        $this->data['nickname'] = $nickname;
        $this->data['status'] = $status;
        $this->data['temp'] = 'admin/usergame/lockuser';
        $this->load->view('admin/main', $this->data);
    }
    function messlockuser(){
        $this->session->set_flashdata('message', 'Câp  nhật thành công');

    }
    function lockuserajax(){
        $nickname = $this->input->post("nickname");
        $action = $this->input->post("action");
        $type =  $this->input->post("type");
        $datainfo = file_get_contents($this->config->item('api_backend').'?c=105&nn='.$nickname.'&ac='.$action.'&type='.$type);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	 function loglockuser(){
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $lydo =  $this->input->post("txtlydo");
        $nickname = $this->input->post("nickname");
        $txtaction = $this->input->post("txtaction");
        $statuslock = $this->input->post("statuslock");
        $data = array(
            'reason' => $lydo,
            'account_name' => $nickname,
            'username' => $admin_info->UserName,
            'action' => $txtaction,
            'status' => $statuslock,
        );
        $this->logadmin_model->create($data);
    }
    function search_usergame()
    {
        $query_array = array(
            'name' => $this->input->post('name'),
            'nickname' => $this->input->post('nickname'),
            'sdt' => $this->input->post('sdt')

        );
        $query_id = $this->input->save_query($query_array);
        redirect("admin/usergame/index/$query_id");
    }
	
	 function lockalluser()
    {
        $this->data['error'] = "";
		$rand=rand(1, 15);
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/nicknamelock.csv')) {
//                unlink('public/admin/uploads/nicknamelock.csv');
//            }
            $temp = explode(".", $_FILES["filexls"]["name"]);
            $extension = end($temp);
            if ($extension == "csv") {
                $config = array("");
                $config['upload_path'] = './public/admin/uploads';
                $config['allowed_types'] = '*';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] = TRUE;
                $config['file_name'] = 'nicknamelock';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('filexls')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error'] = "Bạn chưa chọn file hoặc không được phân quyền";

                } else {
                    $this->data['error'] = "";
                    $data = array('upload_data' => $this->upload->data());

                    $this->data['error'] = "Upload file thành công";
                }
            } else {
                $this->data['error'] = "Bạn chưa chọn file hoặc không chọn đúng file csv";
            }

        }
        if (file_exists(FCPATH . "public/admin/uploads/nicknamelock.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH . "public/admin/uploads/nicknamelock.csv");
            $listnn = array();
            foreach ($result as $row) {
                if (isset($row["Nickname"])) {
                    array_push($listnn, $row["Nickname"]);
                }

            }
            $this->data['listnn'] = implode(',', $listnn);
            unlink('public/admin/uploads/nicknamelock.csv');
        } else {
            $this->data['listnn'] = "";
        }
        $this->data['temp'] = 'admin/usergame/lockalluser';
        $this->load->view('admin/main', $this->data);
    }
    function upload()
    {
        if (file_exists(FCPATH."public/admin/uploads/nickname.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH."public/admin/uploads/nickname.csv");
            $listnn = array();
            foreach ($result as $row) {
                if ($row["Nickname"]) {
                    array_push($listnn, $row["Nickname"]);
                }

            }
            $this->data['listnn'] = implode(',',$listnn);
            echo json_encode(array(array("er"=>0),array("nn"=>implode(',',$listnn))));
        } else {
            echo json_encode(array(array("er"=>1)));
        }
    }
     function lockalluserajax()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $lydo = $this->input->post("txtlydo");
        $nickname = $this->input->post("nickname");
        $action = $this->input->post("action");
        $type = $this->input->post("type");
        $txtaction = $this->input->post("txtaction");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend') . '?c=125&nn=' . $nickname . '&ac=' . $action . '&type=' . $type);
        if (isset($datainfo)) {
            echo $datainfo;
            $data = array(
                'reason' => $lydo,
                'account_name' => $nickname,
                'username' => $admin_info->UserName,
                'action' => $txtaction,
                'status' => $type,
            );
            $this->logadmin_model->create($data);
        } else {
            echo "Bạn không được hack";
        }

    }
	 function checkusername(){
        $this->data['error']="";
		  $rand=rand(1, 15);
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/checknickname.csv?v='.$rand)) {
//                unlink('public/admin/uploads/checknickname.csv');
//            }
            $temp = explode(".", $_FILES["filexls"]["name"]);
            $extension = end($temp);
            if ($extension == "csv") {
                $config = array("");
                $config['upload_path'] = './public/admin/uploads';
                $config['allowed_types'] = '*';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] = TRUE;
                $config['file_name'] = 'checknickname';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('filexls')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error'] = "Bạn chưa chọn file hoặc không được phân quyền";

                } else {
                    $this->data['error']="";
                    $data = array('upload_data' => $this->upload->data());

                    $this->data['error'] = "Upload file thành công";
                }
            } else {
                $this->data['error'] = "Bạn chưa chọn file hoặc không chọn đúng file csv";
            }

        }
		if (file_exists(FCPATH."public/admin/uploads/checknickname.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH."public/admin/uploads/checknickname.csv");
            $listnn = array();
            foreach ($result as $row) {
                if (isset($row["Nickname"])) {
                    array_push($listnn, $row["Nickname"]);
                }

            }
            $this->data['listnn'] = implode(',',$listnn);
            unlink('public/admin/uploads/checknickname.csv');
        }else{
            $this->data['listnn'] = "";
        }
        $this->data['temp'] = 'admin/usergame/checkusername';
        $this->load->view('admin/main', $this->data);
    }

    function checkusernameajax(){
		 $nickname = urlencode($this->input->post("nickname"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_backend'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"c=126&nn=".$nickname);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        if(isset($server_output)) {
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
        curl_close ($ch);

    }
	 function detailgc(){
        $nickname = $this->uri->rsegment('3');
        $this->data['nickname'] = $nickname;
        $this->load->view('admin/usergame/detailgc', $this->data);
    }

    function detailgcajax(){
        $nickname = $this->input->post("nickname");
        $datainfo = file_get_contents($this->config->item('api_backend').'?c=135&nn='.$nickname.'&p=1');
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	 function updateinfo(){
        $this->data['temp'] = 'admin/usergame/updateinfo';
        $this->load->view('admin/main', $this->data);
    }
    function updateinfoajax(){
		 $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = urlencode($this->input->post("nickname"));
        $birthday = $this->input->post("birthday");
        $gioitinh = $this->input->post("gioitinh");
        $address = urlencode($this->input->post("address"));
        $datainfo = file_get_contents($this->config->item('api_backend').'?c=15&nn='.$nickname.'&bd='.$birthday.'&gd='.$gioitinh.'&address='.$address);
        if(isset($datainfo)) {
			 if ($datainfo == 0) {
                $data = array(
                    'account_name' => $nickname,
                    'username' => $admin_info->UserName,
                    'action' => "Cập nhập thông tin tài khoản",
                );
                $this->logadmin_model->create($data);
            }
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	
	 function congxu()
    {
        $this->data['temp'] = 'admin/usergame/congxu';
        $this->load->view('admin/main', $this->data);
    }

    function congxuajax()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = urlencode($this->input->post("nickname"));
        $money = $this->input->post("money");
        $reason = urlencode($this->input->post("reason"));
        $otp = urlencode($this->input->post("otp"));
        $typeotp = $this->input->post("typeotp");
        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=100&nn=' . $nickname . '&mn=' . $money . '&mt=' . "xu" . '&nns=' . $admin_info->FullName . '&rs=' . $reason . '&otp=' . $otp . '&type=' . $typeotp);
        $data = json_decode($datainfo);
        if (isset($data->success)) {
            if ($data->success == true) {
                if ($data->errorCode == 0) {
                    $data = array(
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName,
                        'action' => "Cộng xu",
                        'money' => $money,
                        'money_type' => 'Xu'
                    );
                    $this->logadmin_model->create($data);
                    echo json_encode("1");
                }
            } else {
                if ($data->errorCode == 1001) {
                    echo json_encode("2");
                } elseif ($data->errorCode == 1002) {
                    echo json_encode("3");
                } elseif ($data->errorCode == 1008) {
                    echo json_encode("4");
                } elseif ($data->errorCode == 1021) {
                    echo json_encode("5");
                } elseif ($data->errorCode == 2001) {
                    echo json_encode("6");
                }
            }

        } else {
            echo "Bạn không được hack";
        }

    }

    function truxuajax()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = urlencode($this->input->post("nickname"));
        $money = $this->input->post("money");
        $reason = urlencode($this->input->post("reason"));
        $otp = urlencode($this->input->post("otp"));
        $typeotp = $this->input->post("typeotp");
        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=100&nn=' . $nickname . '&mn=' . $money . '&mt=' . "xu" . '&nns=' . $admin_info->FullName . '&rs=' . $reason . '&otp=' . $otp . '&type=' . $typeotp);
        $data = json_decode($datainfo);
        if (isset($data->success)) {
            if ($data->success == true) {
                if ($data->errorCode == 0) {
                    $data = array(
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName,
                        'action' => "Trừ xu",
                        'money' => $money,
                        'money_type' => 'Xu'
                    );
                    $this->logadmin_model->create($data);
                    echo json_encode("1");
                }
            } else {
                if ($data->errorCode == 1001) {
                    echo json_encode("2");
                } elseif ($data->errorCode == 1002) {
                    echo json_encode("3");
                } elseif ($data->errorCode == 1008) {
                    echo json_encode("4");
                } elseif ($data->errorCode == 1021) {
                    echo json_encode("5");
                } elseif ($data->errorCode == 2001) {
                    echo json_encode("6");
                }
            }

        } else {
            echo "Bạn không được hack";
        }

    }
	
	 function logchangemobile(){
        $this->data['temp'] = 'admin/usergame/logchangemobile';
        $this->load->view('admin/main', $this->data);
    }

    function logchangemobileajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $mobilenew = urlencode($this->input->post("mobilenew"));
        $mobileold = urlencode($this->input->post("mobileold"));
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2') . '?c=509&nn=' . $nickname . '&m=' . $mobilenew . '&mo=' . $mobileold . '&p=' . $pages);
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
	
	 function checkinfo()
    {

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = null;
        $end_time = null;
        if ($this->input->post('toDate')) {
            $start_time = $this->input->post('toDate');
        }

        if ($this->input->post('fromDate')) {
            $end_time = $this->input->post('fromDate');
        }

        if ($start_time === null) {
            $start_time = date('d-m-Y');
        }
        if ($end_time === null) {
            $end_time = date('d-m-Y');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['error'] = "";
		$rand=rand(1, 15);
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/checkinfo.csv')) {
//                unlink('public/admin/uploads/checkinfo.csv');
//            }
            $temp = explode(".", $_FILES["filexls"]["name"]);
            $extension = end($temp);
            if ($extension == "csv") {
                $config = array("");
                $config['upload_path'] = './public/admin/uploads';
                $config['allowed_types'] = '*';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] = TRUE;
                $config['file_name'] = 'checkinfo';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('filexls')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error'] = "Bạn chưa chọn file hoặc không được phân quyền";

                } else {
                    $this->data['error'] = "";
                    $data = array('upload_data' => $this->upload->data());

                    $this->data['error'] = "Upload file thành công";
                    //

                }
            } else {
                $this->data['error'] = "Bạn chưa chọn file hoặc không chọn đúng file csv";
            }

        }
        if (file_exists(FCPATH . "public/admin/uploads/checkinfo.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH . "public/admin/uploads/checkinfo.csv");
            $listnn = array();
            foreach ($result as $row) {
                if (isset($row["Nickname"])) {
                    array_push($listnn, $row["Nickname"]);
                }

            }
            $this->data['listnn'] = implode(',', $listnn);
            unlink(FCPATH . "public/admin/uploads/checkinfo.csv");
        } else {
            $this->data['listnn'] = "";
        }
        $this->data['temp'] = 'admin/usergame/checkinfo';
        $this->load->view('admin/main', $this->data);
    }

    function checkinfoajax()
    {
        $nickname = urlencode($this->input->post("nickname"));
        $todate = urlencode($this->input->post("todate"));
        $fromdate = urlencode($this->input->post("fromdate"));
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2') . '?c=606&nn=' . $nickname . '&ts=' . $todate . '&te=' .$fromdate);


        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }

    }
	
	 function checkmobile()
    {
        $this->data['error'] = "";
		$rand=rand(1, 15);
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/checkmobile.csv')) {
//                unlink('public/admin/uploads/checkmobile.csv');
//				$this->data['error'] = "Bạn xoa file cu thanh cong";
//            }else{
            $temp = explode(".", $_FILES["filexls"]["name"]);
            $extension = end($temp);
            if ($extension == "csv") {
                $config = array("");
                $config['upload_path'] = './public/admin/uploads';
                $config['allowed_types'] = '*';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] = TRUE;
                $config['file_name'] = 'checkmobile';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('filexls')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error'] = "Bạn chưa chọn file hoặc không được phân quyền";

                } else {
                    $this->data['error'] = "";
                    $data = array('upload_data' => $this->upload->data());

                    $this->data['error'] = "Upload file thành công";
                    //

                }
            } else {
                $this->data['error'] = "Bạn chưa chọn file hoặc không chọn đúng file csv";
            }
//		}

        }
        if (file_exists(FCPATH . "public/admin/uploads/checkmobile.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH . "public/admin/uploads/checkmobile.csv");
            $listmb = array();
            foreach ($result as $row) {
                if (isset($row["Sdt"])) {
                    array_push($listmb, $row["Sdt"]);
                }

            }
            $this->data['listmb'] = implode(',', $listmb);
            unlink(FCPATH . "public/admin/uploads/checkmobile.csv");
        } else {
            $this->data['listmb'] = "";
        }
        $this->data['temp'] = 'admin/usergame/checkmobile';
        $this->load->view('admin/main', $this->data);
    }

    function checkmobileajax()
    {
        $mobile = urlencode($this->input->post("mobile"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->config->item('api_backend2'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c=608&m=" .$mobile);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        if (isset($server_output)) {
            echo $server_output;
        } else {
            echo "Bạn không được hack";
        }
        curl_close($ch);

    }
	
}
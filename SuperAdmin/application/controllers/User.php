<?php

Class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('useragent_model');
        $this->load->model('logadmin_model');
		  $this->load->model('sourcegiftcode_model');


    }

    function index()
    {
        $this->data['temp'] = 'admin/user/index';
        $this->load->view('admin/main', $this->data);
    }
    function congtrutien()
    {

        $this->data['temp'] = 'admin/user/congtrutien';
        $this->load->view('admin/main', $this->data);
    }
    function congtienajax(){
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $otpselectcong = $this->input->post("otpselectcong");
        $tienchuyen = $this->input->post("tienchuyen");
        $money_type = $this->input->post("money_type");
        $reasonchuyen = $this->input->post("reasonchuyen");
        $maotpcong = $this->input->post("maotpcong");
        $nickname = $this->input->post("nickname");
		  $action = $this->input->post("actionname");
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=100&nn=' . $nickname . '&mn=' . $tienchuyen .'&mt=' . $money_type. '&rs=' . urlencode($reasonchuyen). '&otp=' . $maotpcong . '&type=' . $otpselectcong.'&ac='.$action);
		
        $data = json_decode($datainfo);
        if (isset($data->success)) {
            if ($data->success == true) {
                if ($data->errorCode == 0) {
                    echo json_encode("1");
                     if($action == "Admin")
                    $this->logadmin_model->create($this->logadmingiftcode(12, $nickname, $admin_info->UserName,"",$tienchuyen,$money_type));
                    elseif($action == "EventVP"){
                        $this->logadmin_model->create($this->logadmingiftcode(19, $nickname, $admin_info->UserName,"",$tienchuyen,$money_type));
                    }
                }
            } else {
                if ($data->errorCode == 1001) {
                    echo json_encode("2");
                }elseif($data->errorCode == 1002) {
                    echo json_encode("3");
                }elseif($data->errorCode == 1008) {
                    echo json_encode("4");
                }elseif($data->errorCode == 1021) {
                    echo json_encode("5");
                }elseif($data->errorCode == 2001) {
                    echo json_encode("6");
                }
            }
        }else{
            echo "Bạn không được hack";
        }
    }
    function trutienajax(){
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $otpselecttru = $this->input->post("otpselecttru");
        $tienchuyen = $this->input->post("tienchuyen");
        $money_type = $this->input->post("money_type");
        $reasonchuyen = $this->input->post("reasonchuyen");
        $maotptru = $this->input->post("maotptru");
        $nickname = $this->input->post("nickname");
		  $action = $this->input->post("actionname");
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=100&nn=' . $nickname . '&mn=' . $tienchuyen .'&mt=' . $money_type. '&rs=' . urlencode($reasonchuyen) . '&otp=' . $maotptru . '&type=' . $otpselecttru.'&ac='.$action);
        $data = json_decode($datainfo);
        if (isset($data->success)) {
            if ($data->success == true) {
                if ($data->errorCode == 0) {
                    echo json_encode("1");
                    if($action == "Admin")
                    $this->logadmin_model->create($this->logadmingiftcode(12, $nickname, $admin_info->UserName,"",$tienchuyen,$money_type));
                    elseif($action == "EventVP"){
                        $this->logadmin_model->create($this->logadmingiftcode(19, $nickname, $admin_info->UserName,"",$tienchuyen,$money_type));
                    }
                }
            } else {
                if ($data->errorCode == 1001) {
                    echo json_encode("2");
                }elseif($data->errorCode == 1002) {
                    echo json_encode("3");
                }elseif($data->errorCode == 1008) {
                    echo json_encode("4");
                }elseif($data->errorCode == 1021) {
                    echo json_encode("5");
                }elseif($data->errorCode == 2001) {
                    echo json_encode("6");
                }
            }
        }else{
            echo "Bạn không được hack";
        }
    }

function getnicknameajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=716&nn=' . $nickname);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    /*
     * Ham chinh sua thong tin quan tri vien
     */


    function logout()
    {
        if ($this->session->userdata('user_admintransfer_login')) {
            $this->session->unset_userdata('user_admintransfer_login');
        }
        redirect(base_url('login'));
    }
	 function resetpw(){
        $this->data['temp'] = 'admin/user/resetpw';
        $this->load->view('admin/main', $this->data);
    }
    function resetpwajax(){
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = urlencode($this->input->post("nickname"));
        $type = $this->input->post("type");
        $otp = urlencode($this->input->post("otp"));
        $datainfo = file_get_contents($this->config->item('api_url').'?c=14&nn='.$nickname.'&otp='.$otp.'&type='.$type);
        if(isset($datainfo)) {
            if($datainfo == 0){
                $data = array(
                    'account_name' => $nickname,
                    'username' => $admin_info->UserName,
                    'action' => "Reset password"
                );
                $this->logadmin_model->create($data);
            }
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function updatevpevent(){
        $this->data['temp'] = 'admin/user/updatevpevent';
        $this->load->view('admin/main', $this->data);
    }
    function updatevpajax(){
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = urlencode($this->input->post("nickname"));
        $type = $this->input->post("type");
        $value = urlencode($this->input->post("value"));
        $otp = urlencode($this->input->post("otp"));
        $typeotp = $this->input->post("typeotp");
        $datainfo = file_get_contents($this->config->item('api_url').'?c=726&nn='.$nickname.'&tu='.$type.'&va='.$value.'&otp='.$otp.'&type='.$typeotp);
        if(isset($datainfo)) {
            if($datainfo == 0){
                if($type == 0){
                    $data = array(
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName,
                        'action' => "Trừ vippoint event",
                        'money' => -$value
                    );
                }else{
                    $data = array(
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName,
                        'action' => "Cộng vippoint event",
                        'money' => $value
                    );
                }

                $this->logadmin_model->create($data);
            }
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	  function refundbonus(){
		   date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = null;
        if ($start_time === null) {
            $start_time = date('d-m-Y');
        }
        $this->data['start_time'] = $start_time;
        $this->data['temp'] = 'admin/agent/index';
        $this->load->view('admin/main', $this->data);
    }

    function refundajax(){
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $otp = urlencode($this->input->post("otp"));
        $type = $this->input->post("type");
          $te = $this->input->post("te");
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=711&otp=' . $otp . '&type=' . $type.'&te='.$te);
        if(isset($datainfo)) {
            if($datainfo == 0){
            $data = array(
                'username' => $admin_info->UserName,
                'action' => "Hoàn trả phí đại lý"
            );
            $this->logadmin_model->create($data);}
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
      function bonusajax()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $otp = urlencode($this->input->post("otp"));
        $type = $this->input->post("type");
        $ts = urlencode($this->input->post("ts"));
        $te = urlencode($this->input->post("te"));
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=724&otp=' . $otp . '&type=' . $type.'&ts='.$ts.'&te='.$te);
        if (isset($datainfo)) {
            if ($datainfo == 0) {
                $data = array(
                    'username' => $admin_info->UserName,
                    'action' => "Trả thưởng top doanh số đại lý"
                );
                $this->logadmin_model->create($data);
            }
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function update(){

        $this->data['temp'] = 'admin/agent/update';
        $this->load->view('admin/main', $this->data);
    }

    function updatedsajax()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $otp = urlencode($this->input->post("otp"));
        $type = $this->input->post("type");

        $ts = urlencode($this->input->post("ts"));
        $te = urlencode($this->input->post("te"));
        $tu = $this->input->post("tu");
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=32&otp=' . $otp . '&type=' . $type.'&ts='.$ts.'&te='.$te.'&tu='.$tu);

        if (isset($datainfo)) {
            if ($datainfo == 0) {
                $data = array(
                    'username' => $admin_info->UserName,
                    'action' => "Update doanh số tất cả đại lý"
                );
                $this->logadmin_model->create($data);
            }
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
	
	  function reportgc(){
        $datainfo = json_decode(file_get_contents($this->config->item('api') . '?c=10'));
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $source = $this->sourcegiftcode_model->get_source_gift_code_marketing_view();
        $this->data['source'] = $source;
        $sourcevh = $this->sourcegiftcode_model->get_source_gift_code_vanhanh_view();
        $this->data['sourcevh'] = $sourcevh;
        $list = $this->useragent_model->get_admin_gift_code();
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/user/reportgc';
        $this->load->view('admin/main', $this->data);
    }

    function reportgcajax()
    {
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $nguonxuat = $this->input->post("nguonxuat");
        $fromDate = urlencode($this->input->post("fromDate"));
        $toDate = urlencode($this->input->post("toDate"));
        $money = $this->input->post("money");
        $filterdate = $this->input->post("filterdate");
        if($money == 1){
            $datainfo = $this->get_data_curl($this->config->item('api_url2').'?c=304&gp='.$roomvin.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=&tt='.$filterdate.'&bl=');
			
        }
        elseif($money == 0){
            $datainfo = $this->get_data_curl($this->config->item('api_url2').'?c=304&gp='.$roomxu.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=&tt='.$filterdate.'&bl=');
        }
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

        function reportgcmktajax(){
            $roomvin = $this->input->post("roomvin");
            $roomxu = $this->input->post("roomxu");
            $nguonxuat = $this->input->post("nguonxuat");
            $fromDate = urlencode($this->input->post("fromDate"));
            $toDate = urlencode($this->input->post("toDate"));
            $money = $this->input->post("money");
             $filterdate = $this->input->post("filterdate");
            if($money == 1){
                $datainfo = $this->get_data_curl($this->config->item('api_url2').'?c=304&gp='.$roomvin.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=2&tt='.$filterdate.'&bl=');
            }
            elseif($money == 0){
                $datainfo = $this->get_data_curl($this->config->item('api_url2').'?c=304&gp='.$roomxu.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=2&tt='.$filterdate.'&bl=');
            }
            if(isset($datainfo)) {
                echo $datainfo;
            }else{
                echo "Bạn không được hack";
            }
        }

    function reportgcvhajax(){
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $nguonxuat = $this->input->post("nguonxuat");
        $fromDate = urlencode($this->input->post("fromDate"));
        $toDate = urlencode($this->input->post("toDate"));
        $money = $this->input->post("money");
        $filterdate = $this->input->post("filterdate");
        if($money == 1){
            $datainfo = $this->get_data_curl($this->config->item('api_url2').'?c=304&gp='.$roomvin.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=3&tt='.$filterdate.'&bl=');
        }
        elseif($money == 0){
            $datainfo = $this->get_data_curl($this->config->item('api_url2').'?c=304&gp='.$roomxu.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=3&tt='.$filterdate.'&bl=');
        }
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function reportgcdlajax(){
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $nguonxuat = $this->input->post("nguonxuat");
        $fromDate = urlencode($this->input->post("fromDate"));
        $toDate = urlencode($this->input->post("toDate"));
        $money = $this->input->post("money");
        $filterdate = $this->input->post("filterdate");
        if($money == 1){
            $datainfo = $this->get_data_curl($this->config->item('api_url2').'?c=304&gp='.$roomvin.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=1&tt='.$filterdate.'&bl=');
        }
        elseif($money == 0){
            $datainfo = $this->get_data_curl($this->config->item('api_url2').'?c=304&gp='.$roomxu.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=1&tt='.$filterdate.'&bl=');
        }
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	
	 function delgiftcode()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api') . '?c=10'));
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $source = $this->sourcegiftcode_model->get_source_gift_code_marketing_view();
        $this->data['source'] = $source;
        $sourcevh = $this->sourcegiftcode_model->get_source_gift_code_vanhanh_view();
        $this->data['sourcevh'] = $sourcevh;
        $this->data['temp'] = 'admin/user/delgiftcode';
        $this->load->view('admin/main', $this->data);
    }

    function delgiftcodeajax()
    {    $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $fromdate = urlencode($this->input->post("fromdate"));
        $todate = urlencode($this->input->post("todate"));
        $source = urlencode($this->input->post("nguonxuat"));
        $price = urlencode($this->input->post("roomvin"));

        $datainfo = $this->get_data_curl($this->config->item('api_url').'?c=604&gp='.$price.'&ts=' . $fromdate . '&te=' . $todate .'&gs=' .$source);
        $data = json_decode($datainfo);
        $num = $data->transactions->countGiftCode;
        if(isset($datainfo)) {
           if( $num > 0){
                if($source == "" && $price == ""){
                    $action = "Thu hồi giftcode được tạo từ ngày ".$this->input->post("fromdate")." đến ngày ".$this->input->post("todate")." số lượng: ".$num;
                }else if($source == "" && $price != ""){
                    $action = "Thu hồi giftcode được tạo từ ngày ".$this->input->post("fromdate")." đến ngày ".$this->input->post("todate")." số lượng: ".$num." mệnh giá ".$price." K Vin";
                }
                else if($source != "" && $price == ""){
                    $action = "Thu hồi giftcode được tạo từ ngày ".$this->input->post("fromdate")." đến ngày ".$this->input->post("todate")." số lượng: ".$num." mã ".$source;
                }
                else if($source != "" && $price != ""){
                    $action = "Thu hồi giftcode được tạo từ ngày ".$this->input->post("fromdate")." đến ngày ".$this->input->post("todate")." số lượng: ".$num." mệnh giá ".$price." K Vin , mã ".$source;
                }
               $data = array(
                   'username' => $admin_info->UserName,
                   'account_name' =>$admin_info->FullName,
                   'action' => $action
               );
               $this->logadmin_model->create($data);
           }
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	
	 function congtientaixiu()
    {
        $this->data['error'] = "";
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/congtientaixiu.csv')) {
//                unlink('public/admin/uploads/congtientaixiu.csv');
//                $this->data['error'] = "Bạn xóa file cũ thành công";
//            } else {
                $temp = explode(".", $_FILES["filexls"]["name"]);
                $extension = end($temp);
                if ($extension == "csv") {
                    $config = array("");
                    $config['upload_path'] = './public/admin/uploads';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 1024 * 8;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = 'congtientaixiu';
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
//            }
        }
        if (file_exists(FCPATH . "public/admin/uploads/congtientaixiu.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH . "public/admin/uploads/congtientaixiu.csv");
            $data = array();
            foreach ($result as $row) {
                if (isset($row["Nickname"]) && isset($row["Money"])) {
                    array_push($data,array(trim($row["Nickname"])=> intval($row["Money"])));
                }
            }
            $this->data['listnn'] = json_encode($data);
            unlink(FCPATH . 'public/admin/uploads/congtientaixiu.csv');

        } else {
            $this->data['listnn'] = "";
        }
        $this->data['temp'] = 'admin/user/congtientaixiu';
        $this->load->view('admin/main', $this->data);
    }

    function congtientaixiuajax()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = $this->input->post("nickname");
        $lydo = urlencode($this->input->post("lydo"));
        $money = urlencode($this->input->post("money"));
        $otp = urlencode($this->input->post("otp"));
        $typeotp = $this->input->post("typeotp");
		  $action = $this->input->post("action");
		
        $server_output = $this->get_data_curl($this->config->item('api_url')."?c=17&data=".$nickname."&mt=".$money."&rs=".$lydo."&otp=".$otp."&type=".$typeotp);
		
		
        $data = json_decode($server_output);

        if(isset($server_output)) {

            if ($data->errorCode == 0) {
                if($action == "Admin"){
                    $this->logadmin_model->create($this->logadmingiftcode(20, $nickname, $admin_info->UserName,"",0,$money));
                }elseif($action == "EventVP"){
                    $this->logadmin_model->create($this->logadmingiftcode(19, $nickname, $admin_info->UserName,"",0,$money));
                }
				
            }
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
    

    }
	function delsecuser()
    {
        $this->data['temp'] = 'admin/user/delsecuser';
        $this->load->view('admin/main', $this->data);
    }
    function  huybaomat(){
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = $this->input->post('nickname');
        $ac = $this->input->post('ac');
        $type = $this->input->post('type');
        $otp = $this->input->post('otp');
        $action = $this->input->post('action');
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=22&nn=' . urlencode($nickname) . '&otp=' . $otp . '&type=' . $type.'&ac='.$ac.'&tu='.$action);
        $data = json_decode($datainfo);
        if(isset($datainfo)) {

            if ($data->errorCode == 0) {
                if($ac == 4 && $action == 0){
                    $data = array(
                        'action' => "Hủy bảo mật điện thoại",
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName
                    );

                }elseif($ac == 5 && $action == 0){
                    $data = array(
                        'action' => "Hủy bảo mật email",
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName
                    );

                }elseif($ac == 5 && $action == 1){
                    $data = array(
                        'action' => "Đăng ký bảo mật email",
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName
                    );

                }elseif($ac == 4 && $action == 1){
                    $data = array(
                        'action' => "Đăng ký bảo mật điện thoại",
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName
                    );

                }
				elseif($ac == 7 && $action == 1){
                    $data = array(
                        'action' => "Đăng ký bảo mật đăng nhập",
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName
                    );

                }
				elseif($ac == 7 && $action == 0){
                    $data = array(
                        'action' => "Hủy bảo mật đăng nhập",
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName
                    );

                }
                $this->logadmin_model->create($data);
            }
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	
	function congtruslot()
    {
        $this->data['temp'] = 'admin/user/congtruslot';
        $this->load->view('admin/main', $this->data);
    }

    function congtruslotajax(){
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = $this->input->post('nickname');
        $number = $this->input->post('number');
        $type = $this->input->post('type');
        $otp = $this->input->post('otp');
        $slot = $this->input->post('slot');
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=30&nn=' . urlencode($nickname) . '&otp=' . $otp . '&type=' . $type.'&r=100&am='.$number.'&gn='.$slot);
        $data = json_decode($datainfo);
        if(isset($datainfo)) {

            if ($data->errorCode == 0) {
               if($number > 0){
                    $data = array(
                        'action' => "Cộng ".$number."  lượt quay slot ".$slot,
                        'account_name' => $nickname,
                        'username' => $admin_info->UserName
                    );

                }else{
                   $data = array(
                       'action' => "Trừ ".(-$number)."  lượt quay slot ".$slot,
                       'account_name' => $nickname,
                       'username' => $admin_info->UserName
                   );
               }
                $this->logadmin_model->create($data);
            }
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	
	function congtrutienbot()
    {
        $this->data['temp'] = 'admin/user/congtrutienbot';
        $this->load->view('admin/main', $this->data);
    }


    function congtrutienbotajax()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $tienchuyen = $this->input->post("tienchuyen");
        $otp = $this->input->post("otp");
        $nickname = $this->input->post("nickname");
        $type = $this->input->post("typeotp");
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=1994&nn=' . $nickname . '&mn=' . $tienchuyen . '&otp=' . $otp . '&type=' . $type);
        $data = json_decode($datainfo);
        if ($data == 0) {
            echo json_encode("1");
            if ($tienchuyen > 0) {
                $this->logadmin_model->create($this->logadmingiftcode(23, $nickname, $admin_info->UserName, "", -$tienchuyen, "Vin"));
            } else {
                $this->logadmin_model->create($this->logadmingiftcode(24, $nickname, $admin_info->UserName, "", -$tienchuyen, "Vin"));
            }
        } elseif ($data == 1001) {
            echo json_encode("2");
        } elseif ($data == 1002) {
            echo json_encode("3");
        } elseif ($data == 1008) {
            echo json_encode("4");
        } elseif ($data == 1021) {
            echo json_encode("5");
        } elseif ($data == 2001) {
            echo json_encode("6");
        } else {
            echo "Bạn không được hack";
        }
    }
	
	function blacklist()
    {
        $this->data['temp'] = 'admin/user/blacklist';
        $this->load->view('admin/main', $this->data);
    }
    function blacklistajax()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nickname = $this->input->post("nickname");
        $ac = $this->input->post("ac");
        if($ac == "r"){
            $datainfo = file_get_contents($this->config->item('api_url') . '?c=2000&bl=&ac='.$ac);

        }else  if($ac == "w"){
            $datainfo = file_get_contents($this->config->item('api_url') . '?c=2000&bl='.$nickname.'&ac='.$ac);
            $this->logadmin_model->create($this->logadmingiftcode(25, $nickname, $admin_info->UserName, "","", ""));
        }
        if(isset($datainfo)){
            echo json_encode($datainfo);
        }else{
            echo "Bạn không được hack";
        }

    }
	 function logictaixiu()
    {
        $this->data['temp'] = 'admin/user/logictaixiu';
        $this->load->view('admin/main', $this->data);
    }
    function logictaixiuajax()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $al = $this->input->post("al");
        $ac = $this->input->post("ac");
        if($ac == "r"){
            $datainfo = file_get_contents($this->config->item('api_url') . '?c=2001&al=&ac='.$ac);


        }else  if($ac == "w"){
            $datainfo = file_get_contents($this->config->item('api_url') . '?c=2001&al='.$al.'&ac='.$ac);
            $this->logadmin_model->create($this->logadmingiftcode(26, "", $admin_info->UserName, "","", ""));
        }
        if(isset($datainfo)){
            echo json_encode($datainfo);
        }else{
            echo "Bạn không được hack";
        }

    }
	function blacklistslot()
    {
        $this->data['temp'] = 'admin/user/blacklistslot';
        $this->load->view('admin/main', $this->data);
    }
    function blacklistslotajax()
    {
        $nickname = $this->input->post("nickname");
        $ac = $this->input->post("ac");
        $key = $this->input->post("key");
        if($ac == "r"){
            $datainfo = file_get_contents($this->config->item('api_url') . '?c=2000&bl=&ac='.$ac.'&k='.$key);

        }else  if($ac == "w"){
            $datainfo = file_get_contents($this->config->item('api_url') . '?c=2000&bl='.$nickname.'&ac='.$ac.'&k='.$key);
        }
        if(isset($datainfo)){
            echo json_encode($datainfo);
        }else{
            echo "Bạn không được hack";
        }

    }

}
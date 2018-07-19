<?php

Class TranferAjax extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('useragent_model');
        $this->load->model('logadmin_model');
        $this->load->helper(array("form", "url"));
        $this->load->library('upload');
    }

    function  listTotalDoanhsoAgent()
    {
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=181&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend));
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

    function  listdoanhsoAgent()
    {
        $nickName = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $status = $this->input->post('status');
		 $month = $this->input->post('month');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=107&nn=' . $nickName . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&st=' . $status.'&month='.$month);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
    function  listdoanhsoAdmin()
    {
        $nickName = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $status = $this->input->post('status');
		 $month = $this->input->post('month');
        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=138&nn=' . $nickName . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&st=' . $status.'&month='.$month);
		
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
   //mua vin
   function  historyTransferAgent()
    {
        $nickname = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $status = $this->input->post('status');
        $page = $this->input->post('p');
        $topds = $this->input->post('topds');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=139&nn=' . $nickname . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&st=' . $status .'&tds='.$topds. '&p=' . $page .'&type=2');
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

    function  historyTransferAdmin()
    {
        $nickname = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $status = $this->input->post('status');
        $page = $this->input->post('p');
        $topds = $this->input->post('topds');
		
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=139&nn=' . $nickname . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&st=' . $status .'&tds='.$topds. '&p=' . $page.'&type=2');
		
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
	//ban vin
   function  historyTransferAgent1()
    {
        $nickname = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $status = $this->input->post('status');
        $page = $this->input->post('p');
        $topds = $this->input->post('topds');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=139&nn=' . $nickname . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&st=' . $status .'&tds='.$topds. '&p=' . $page .'&type=1');
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

    function  historyTransferAdmin1()
    {
        $nickname = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $status = $this->input->post('status');
        $page = $this->input->post('p');
        $topds = $this->input->post('topds');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=139&nn=' . $nickname . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&st=' . $status .'&tds='.$topds. '&p=' . $page.'&type=1');
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
 function  historyTransferBuy()
    {
        $nicknamegui = $this->input->post('nicknamegui');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $status = $this->input->post('status');
        $page = $this->input->post('p');
        $topds = $this->input->post('topds');
		 $month = $this->input->post('month');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=106&nns=' . $nicknamegui .'&nnr=&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&st=' . $status .'&tds='.$topds. '&p=' . $page.'&type=2&month='.$month);

        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
    function  historyTransferSale()
    {
        $nicknamenhan = $this->input->post('nicknamenhan');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $status = $this->input->post('status');
        $page = $this->input->post('p');
        $topds = $this->input->post('topds');
		 $month = $this->input->post('month');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=106&nns=&nnr='.$nicknamenhan.'&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&st=' . $status .'&tds='.$topds. '&p=' . $page.'&type=1&month='.$month);
      
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
    /*top doanh số*/
    function topDoanhSo()
    {
        $nickName = $this->input->post('nickName');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
		 $month = $this->input->post('month');
		 
        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=110&nn=' . $nickName . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend).'&month='. urlencode($month));
		
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
/*top doanh số cap 2*/
    function topDoanhSoCap2()
    {
        $nickName = $this->input->post('nickName');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=140&nn=' . $nickName . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend));
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
    function topDoanhSoAdmin()
    {
        $nickName = $this->input->post('nickName');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
		$month = $this->input->post('month');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=110&nn=' . $nickName . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend).'&month='. urlencode($month));
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
    function topDoanhSoBan(){
        $nickName = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $month = $this->input->post('month');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=36&nn=' . $nickName . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend).'&month='. urlencode($month));
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo json_encode(array('errorCode' => "1001"));
        }
    }
    // thêm đại lý
    function AgentAdd()
    {
		$accesstoken = $this->session->userdata('accessToken');
         $nicknameLogin=$this->session->userdata('nickname');
        $nickName = $this->input->post('nickname');
       $options = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Authorization:".base64_encode($accesstoken.'|'.$nicknameLogin.'|'.'fU3z7wP0IeFOPntKXcRifUDTGbV8AXyI')
            )
        );
		
        $context = stream_context_create($options);
        $optinfo = file_get_contents($this->config->item('api_url') . '?c=102&nn=' . $nickName,false, $context);
		
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

    function getTransactionHistory()
    {
        $nickname = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $moneytype = $this->input->post('moneytype');
        $actiongame = $this->input->post('actionname');
        $servicename = $this->input->post('servicename');
        $page = $this->input->post('page');
        $like = $this->input->post('like');
		 $record = $this->input->post('record');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=3&nn=' . $nickname . '&un=&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&mt=' . $moneytype . '&ag=' . $actiongame . '&sn=' . $servicename . '&p=' . $page . '&lk=' . $like.'&tr='.$record);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

    function  setLevelAgent()
    {
        $nickname = $this->input->post('nickname');
        $status = $this->input->post('status');
        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=' . $status);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

    function stopAgent()
    {
        $nickname = $this->input->post('nickname');
        $status = $this->input->post('status');
        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=' . $status);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

   function loadGiftCode()
    {
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admininfo = $this->useragent_model->get_info($admin_login);
        $source = $admininfo->key;
        $nickname = urlencode($this->input->post("nickname"));
        $giftcode = urlencode($this->input->post("giftcode"));
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $fromDate = urlencode($this->input->post("fromDate"));
        $toDate = urlencode($this->input->post("toDate"));
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $gcuse = $this->input->post("gcuse");
        $record = $this->input->post("record");
        $release = $this->input->post("release");
        $timeType = $this->input->post("timeType");
        if ($money == 1) {
            $datainfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=303&nn=' . $nickname . '&gc=' . $giftcode . '&gp=' . $roomvin . '&gs=' . $source . '&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&p=' . $pages . '&ug=' . $gcuse . '&tr=' . $record . '&type=1&rl=' . $release.'&tt='.$timeType);

        } elseif ($money == 0) {
            $datainfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=303&nn=' . $nickname . '&gc=' . $giftcode . '&gp=' . $roomxu . '&gs=' . $source . '&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&p=' . $pages . '&ug=' . $gcuse . '&tr=' . $record . '&type=1&rl=' . $release.'&tt='.$timeType);
        }
        if ($datainfo) {
            echo $datainfo;
        } else {
            echo "1001";
        }
    }

    function loadGiftCodeUse()
    {
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admininfo = $this->useragent_model->get_info($admin_login);
        $source = $admininfo->key;
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $fromDate = $this->input->post("fromDate");
        $toDate = $this->input->post("toDate");
        $money = $this->input->post("money");
        $timeType = $this->input->post("timeType");
		  $block = $this->input->post("block");
        if ($money == 1) {
            $datainfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=304&gp=' . $roomvin . '&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&gs=' . $source . '&type=1&tt='.$timeType.'&bl='.$block);
			
        } elseif ($money == 0) {
            $datainfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=304&gp=' . $roomxu . '&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&gs=' . $source . '&type=1&tt='.$timeType.'&bl='.$block);
        }
        if ($datainfo) {
            echo $datainfo;
        } else {
            echo "1001";
        }
    }

    function searchGiftCodeByNickName()
    {
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admininfo = $this->useragent_model->get_info($admin_login);
        $source = $admininfo->key;
        $nickname = $this->input->post("nickname");
        $fromDate = $this->input->post("fromDate");
        $toDate = $this->input->post("toDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $timeType = $this->input->post("timeType");
        $datainfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=305&nn=' . $nickname . '&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&gs=' . $source . '&tt='.$timeType.'&p=' . $pages);
     
        if ($datainfo) {
            echo $datainfo;
        } else {
            echo "1001";
        }
    }

    function  nickNameUseGiftCode()
    {
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admininfo = $this->useragent_model->get_info($admin_login);
        $source = $admininfo->key;
		
        $fromDate = $this->input->post("fromDate");
        $toDate = $this->input->post("toDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $timeType = $this->input->post("timeType");
        $datainfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=309&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&gs=' . $source . '&type=1'. '&tt='.$timeType.'&p='. $pages);
        if ($datainfo) {
            echo $datainfo;
        } else {
            echo "1001";
        }
    }

    function listAgent()
    {
        $nickname = $this->input->post('nickname');
        $status = $this->input->post('status');
        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=0');
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

//check nickName
    function checknickname()
    {
        $nickname = $this->input->post('nickname');
        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=716&nn=' . $nickname);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

    function getfee()
    {
        $optinfo = $this->curl->simple_get($this->config->item('api_url_odp') . '?c=130');
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }

    function addgiftcode()
    {
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $money = $this->input->post("money");
        $quantity = urlencode($this->input->post("quantity"));
        $version = $this->input->post("version");
        $otp = $this->input->post("otp");
        $typeotp = $this->input->post("typeotp");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->config->item('api_url'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'c=311&gp=' . $money . '&gq=' . $quantity . '&gs=' . $admin_info->key . '&gl=' . $version . '&mt=1&type=1&nn=' . $admin_info->nickname . '&otp=' . $otp . '&ta=' . $typeotp);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
        $server_output = curl_exec($ch);
        $data = json_decode($server_output);

        if (isset($data->success)) {
            if ($data->success == true) {
                if ($data->errorCode == 0) {
                    $this->logadmin_model->create($this->logadmingiftcode(11, $admin_info->nickname, $admin_info->username, $quantity, $money * 1000, "Vin"));
                    $new_vin = $data->transactions->CurrentMoney;
                    $this->session->set_userdata("vin", $new_vin);
                    echo json_encode("1");
                }
            } else {

                if ($data->errorCode == "10002") {
                    echo json_encode("2");
                } elseif ($data->errorCode == "10003") {
                    echo json_encode("3");
                } elseif ($data->errorCode == "10004") {
                    echo json_encode("4");
                } elseif ($data->errorCode == "10005") {
                    echo json_encode("5");
                }
            }
        } else {
            echo "Bạn không được hack";
        }
        curl_close($ch);
    }
	//update process lich su giao dich
function UpdateProcess()
{
    $nicknamesend = urlencode($this->input->post("nicknamesend"));
    $nicknamereceive = urlencode($this->input->post("nicknamereceive"));
    $timelog = $this->input->post("date");
    $status = $this->input->post("status");
    $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=507&nns='.$nicknamesend.'&nnr='.$nicknamereceive.'&t='.urlencode($timelog).'&st='.$status);
    if ($optinfo) {
        echo $optinfo;
    } else {
        echo "1001";
    }
}
//top doanh số cấp 2
    function doanhsocap2Admin()
    {
        $nickName = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
		 $month = $this->input->post('month');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=605&nn=' . $nickName . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend).'&month='.$month);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
    function doanhsocap2()
    {
        $nickName = $this->input->post('nickname');
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
		 $month = $this->input->post('month');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=605&nn=' . $nickName . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend).'&month='.$month);
	
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
    //danh sach dong bang dai ly
    function freezeAgent()
    {
        $nickName = $this->input->post('nickname');
        $page = $this->input->post('page');
        $freeze = $this->input->post('freeze');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=513&nn=' .$nickName . '&p=' .$page . '&ifm='.$freeze);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
    //danh sach dong bang dai ly
    function freezeAdmin()
    {
        $nickName = "all";
        $page = $this->input->post('page');
        $freeze = $this->input->post('freeze');
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=513&nn=' .$nickName . '&p=' .$page . '&ifm='.$freeze);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
    //đóng băng giao dịch
    function closeFreeze(){
        $transNo = $this->input->post('transactionNo');
        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=143&tno=' .$transNo);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
	//lịch sử giao dịch của tổng đại lý
    function tranferTongdaily(){
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $pages = $this->input->post("page");
        $optinfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=3&nn=tongdaily&un=' . "" . '&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend) . '&mt=vin&ag=Admin&sn=' . "" . '&p=' . $pages . '&lk=1&tr=50');
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }
    }
	//set dai ly cap 1
	function  setLevelAgent2()
    {
        $nickname = $this->input->post('nickname');
        $status = $this->input->post('status');
        $parentid = $this->input->post('parentid');
        if(empty($parentid)){
            echo "1001";die;
        }
        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=' . $status);
        $datainfo = json_decode($optinfo);
        $num_daily2 = $this->curl->simple_get($this->config->item('api_portal') . '?c=10');
        $numdl2 = json_decode($num_daily2)->number_dl2;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $info = $this->useragent_model->get_info_admin($this->input->post('username'));
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);

        $input = array();
        $input['where'] = array("parentid" => $parentid, "active" => 1);
        $total = $this->useragent_model->get_total($input);

        // insert vao db
        $data = array(
            'username' => $this->input->post('username'),
            'nickname' => $this->input->post('nickname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('mobile'),
            'status' => "D",
            'parentid' => $parentid,
            'createtime' => date("Y-m-d H:i:s"),
            'updatetime' => date("Y-m-d H:i:s")
        );
        if ($optinfo) {
            if ($info != false) {
                $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=0');
                $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Nick name đã là đại lý </label></div>');
                echo json_encode("0");
                die();
            } else if ($total >= $numdl2) {
                $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=0');
                $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn đã thêm quá  ' . $numdl2 . ' đại lý </label></div>');
                echo json_encode("1");
                die();
            } else if ($total < $numdl2 && $datainfo->errorCode == 0) {
                $this->logadmin_model->create($this->logadmindata(1, $this->input->post('nickname'), $admin_info->username));
                if(!$this->useragent_model->create($data)){
                    $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=0');
                    $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Thêm đại lý không thất bại. </label></div>');
                    echo json_encode("1");
                    die();
                }
                $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn thêm đại lý thành công</label></div>');
                echo json_encode("2");
            }else if($datainfo->errorCode == 1001){
                $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=0');
                $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Nick name không tồn tại </label></div>');
                echo json_encode("3");
                die();
            }


        } else {
            echo "1001";
        }
    }

    function  setLevelAgent1()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $info = $this->useragent_model->get_info_admin($this->input->post('username'));
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        // insert vao db

        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $this->input->post('nickname') . '&st=1');
        $datainfo = json_decode($optinfo);
        $data = array(
            'username' => $this->input->post('username'),
            'nickname' => $this->input->post('nickname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phonedaily'),
            'status' => "D",
            'parentid' => -1,
            'key' => $this->rand_string(2),
            'nameagent' => $this->input->post('namedaily'),
            'address' => $this->input->post('addressdaily'),
            'facebook' => $this->input->post('facebookdaily'),
            'namebank' => $this->input->post('namebank'),
            'nameaccount' => strtoupper($this->input->post('usernamebank')),
            'numberaccount' => $this->input->post('numberbank'),
            'show' => $this->input->post('show'),
            'createtime' => date("Y-m-d H:i:s"),
            'updatetime' => date("Y-m-d H:i:s"),

        );
        if ($optinfo) {
            if ($info != false) {
                $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Nick name đã là đại lý </label></div>');
                echo json_encode("0");
                die();
            } else if ($datainfo->errorCode == 0) {
                $this->logadmin_model->create($this->logadmindata(1, $this->input->post('nickname'), $admin_info->username));
                $this->useragent_model->create($data);
                $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn thêm đại lý thành công</label></div>');
                echo json_encode("2");
            }else if($datainfo->errorCode == 1001){
                $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Nick name không tồn tại </label></div>');
                echo json_encode("3");
                die();
            }
        }
    }
}

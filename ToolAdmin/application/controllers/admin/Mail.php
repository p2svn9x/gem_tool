<?php

Class Mail extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('eventgiftcode_model');
    }
    /*
     * Lay danh sach admin
     */
    function index()
    {

        $this->data['temp'] = 'admin/mail/index';
        $this->load->view('admin/main', $this->data);
    }
    function indexajax(){
        $nickname = $this->input->post("nickname");
        $pages =  $this->input->post("pages");
        $datainfo = $this->get_data_curl($this->config->item('api_backend').'?c=402&nn='.$nickname.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }


    function sendmail()
    {

        $this->data['temp'] = 'admin/mail/sendmail';
        $this->load->view('admin/main', $this->data);
    }
    function sendmailajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $title = urlencode($this->input->post("title"));
        $content =  $this->input->post("content");
        $datainfo = $this->get_data_curl($this->config->item('api_backend').'?c=401&nn='.$nickname.'&tm='.$title.'&cm='.urlencode($content));
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function sendmailgc()
    {
        $this->data['error']="";
		$rand=rand(1, 15);
        if ($this->input->post("ok")) {
//			if (file_exists('public/admin/uploads/marketinggc.csv')) {
//                unlink('public/admin/uploads/marketinggc.csv');
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
					$config['file_name'] = 'marketinggc';
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
//			}

        }
        if (file_exists(FCPATH."public/admin/uploads/marketinggc.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH."public/admin/uploads/marketinggc.csv");
            $listnn = array();
            $listgc = array();
            foreach ($result as $row) {
                if (isset($row["Nickname"])) {
                    array_push($listnn, $row["Nickname"]);
                }

                if (isset($row["Giftcode"])) {
                    array_push($listgc, $row["Giftcode"]);
                }
            }
            $this->data['listnn'] = implode(',',$listnn);
            $this->data['listgc'] = implode(',',$listgc);
            unlink(FCPATH."public/admin/uploads/marketinggc.csv");
        } else {
            $this->data['listnn'] = "";
            $this->data['listgc'] = "";
        }
        $this->data['temp'] = 'admin/mail/sendmailgc';
        $this->load->view('admin/main', $this->data);
    }

    function sendmailgcajax(){
         $nickname = urlencode($this->input->post("nickname"));
        $giftcode = urlencode($this->input->post("giftcode"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_backend'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"c=111&nn=".$nickname."&gc=".$giftcode."&type=1&gp=".'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);
        $server_output = curl_exec ($ch);
        if(isset($server_output)) {
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
        curl_close ($ch);
      
    }

    function sendmailgctrian()
    {
       $this->data['error']="";
	   $rand=rand(1, 15);
        if ($this->input->post("ok")) {
//			if (file_exists('public/admin/uploads/marketinggctrian.csv')) {
//                unlink('public/admin/uploads/marketinggctrian.csv');
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
					$config['file_name'] = 'marketinggctrian';
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
//			}

        }
        if (file_exists(FCPATH."public/admin/uploads/marketinggctrian.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH."public/admin/uploads/marketinggctrian.csv");
            $listnn = array();
            $listgc = array();
            foreach ($result as $row) {
                if (isset($row["Nickname"])) {
                    array_push($listnn, $row["Nickname"]);
                }

                if (isset($row["Giftcode"])) {
                    array_push($listgc, $row["Giftcode"]);
                }
            }
            $this->data['listnn'] = implode(',',$listnn);
            $this->data['listgc'] = implode(',',$listgc);
            unlink(FCPATH."public/admin/uploads/marketinggctrian.csv");
        } else {
            $this->data['listnn'] = "";
            $this->data['listgc'] = "";
        }
        $this->data['temp'] = 'admin/mail/sendmailgctrian';
        $this->load->view('admin/main', $this->data);
    }
    function sendmailgctrianajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $giftcode = urlencode($this->input->post("giftcode"));
        $money = $this->input->post("money");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_backend'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"c=111&nn=".$nickname."&gc=".$giftcode."&type=2&gp=".$money);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);
        $server_output = curl_exec ($ch);
        if(isset($server_output)) {
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
        curl_close ($ch);
       
    }
    function upload()
    {
        if (file_exists(FCPATH."public/admin/uploads/marketinggc.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH."public/admin/uploads/marketinggc.csv");
            $listnn = array();
            $listgc = array();
            $list = array();
            foreach ($result as $row) {
                if ($row["NickName"]) {
                    array_push($listnn, $row["NickName"]);
                }

                if ($row["GiftCode"]) {
                    array_push($listgc, $row["GiftCode"]);
                }
            }
            $this->data['listnn'] = implode(',',$listnn);
            $this->data['listgc'] = implode(',',$listgc);
            echo json_encode(array(array("er"=>0),array("nn"=>implode(',',$listnn)),array("gc"=>implode(',',$listgc))));
        } else {
            echo json_encode(array(array("er"=>1)));
        }
    }

    function messageagent(){
		$this->data['error']="";
        $rand=rand(1, 15);
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/messagegc1.csv'))
//            {
//                unlink('public/admin/uploads/messagegc1.csv');
//                $this->data['error'] = "Bạn xóa file cũ thành công";
//            }else{
                $temp = explode(".", $_FILES["filexls"]["name"]);
                $extension = end($temp);
                if ($extension == "csv") {
                    $config = array("");
                    $config['upload_path'] = './public/admin/uploads';
                    $config['allowed_types'] = '*';
                    $config['max_size'] = 1024 * 8;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = 'messagegc1';
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
//            }
        }
        if (file_exists(FCPATH."public/admin/uploads/messagegc1.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH."public/admin/uploads/messagegc1.csv");
            $listsdt = array();
            foreach ($result as $row) {
                if (isset($row["Sdt"])) {
                    if(substr($row["Sdt"],0,2) == "84"){
                        array_push($listsdt,"0". substr($row["Sdt"],2,14));
                    }
                    else if(substr($row["Sdt"],0,1) != "0"){
                        array_push($listsdt,"0". substr($row["Sdt"],0,14));
                    } else if(substr($row["Sdt"],0,1) == "0"){
                        array_push($listsdt,$row["Sdt"]);
                    }
                }
            }
            $this->data['listsdt'] = implode(',',$listsdt);
            unlink(FCPATH."public/admin/uploads/messagegc1.csv");
        } else {
            $this->data['listsdt'] = "";

        }
        $this->data['temp'] = 'admin/mail/messageagent';
        $this->load->view('admin/main', $this->data);
    }
    function getmobiledaily(){
        $datainfo = $this->get_data_curl($this->config->item('api_backend').'?c=104&un='."".'&nn='."".'&m='."".'&fd='."".'&srt='."".'&ts='."".'&te='."".'&dl=1&p=1&tr=50&bt=0');
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function messageagentajax(){
       $mobile = $this->input->post("mobile");
        $content = urlencode($this->input->post("content"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_backend'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"c=718&m=".$mobile."&ct=".$content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);
        $server_output = curl_exec ($ch);

        if(isset($server_output)) {
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
        curl_close ($ch);

    }
	
	 function messageagent1ajax()
    {
        $mobile = $this->input->post("mobile");
        $content = urlencode($this->input->post("content"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_backend'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"c=179&m=".$mobile."&ct=".$content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);
        $server_output = curl_exec ($ch);

        if(isset($server_output)) {
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
        curl_close ($ch);
    }
     function sendmessagegc()
    {
        $this->data['error']="";
//		   $rand=rand(1, 15);
		   $rand=time();
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/messagegc.csv'))
//            {
//                unlink('public/admin/uploads/messagegc.csv');
//				  $this->data['error'] = "Bạn xóa file cũ thành công";
//            }else{
				$temp = explode(".", $_FILES["filexls"]["name"]);
				$extension = end($temp);
				if ($extension == "csv") {
					$config = array("");
					$config['upload_path'] = './public/admin/uploads';
					$config['allowed_types'] = '*';
					$config['max_size'] = 1024 * 8;
					$config['overwrite'] = TRUE;
					$config['file_name'] = 'messagegc';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if (!$this->upload->do_upload('filexls')) {
						$error = array('error' => $this->upload->display_errors());
						$this->data['error'] = "Bạn chưa chọn file hoặc không được phân quyền";

					} else {
						$this->data['error']="";
						$data = array('upload_data' => $this->upload->data());

						$this->data['error'] = "Upload file thành công, hãy nhập nội dung và nhấn Gửi tin nhắn";
					}
				} else {
					$this->data['error'] = "Bạn chưa chọn file hoặc không chọn đúng file csv";
				}
//			}
        }
        if (file_exists(FCPATH."public/admin/uploads/messagegc.csv") != false) {
//            echo 1;die;
            $this->load->library('csvreader');
//            print_r($this->csvreader->parse_file(FCPATH."public/admin/uploads/messagegc.csv"));die;

            $result = $this->csvreader->parse_file(FCPATH."public/admin/uploads/messagegc.csv");
            $listsdt = array();
            $listgc = array();
//            print_r($result);die;
            foreach ($result as $row) {
//                print_r($row);die;
                if (isset($row["Sdt"])) {
                    if(substr($row["Sdt"],0,2) == "84"){
                        array_push($listsdt,"0". substr($row["Sdt"],2,14));
                    }
                    else if(substr($row["Sdt"],0,1) != "0"){
                        array_push($listsdt,"0". substr($row["Sdt"],0,14));
                    } else if(substr($row["Sdt"],0,1) == "0"){
                        array_push($listsdt,$row["Sdt"]);
                    }
                }


                if (isset($row["Giftcode"])) {
                    array_push($listgc, $row["Giftcode"]);
                }
            }
            $this->data['listsdt'] = implode(',',$listsdt);
            $this->data['listgc'] = implode(',',$listgc);
            unlink('public/admin/uploads/messagegc.csv');
        } else {
            $this->data['listsdt'] = "";
            $this->data['listgc'] = "";
        }
        $this->data['temp'] = 'admin/mail/sendmessagegc';
        $this->load->view('admin/main', $this->data);
    }

    function sendmessagegcajax()
    {
		$mobile = $this->input->post("mobile");
        $content = urlencode($this->input->post("content"));
        $giftcode = $this->input->post("giftcode");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_backend'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"c=11&m=".$mobile."&gc=".$giftcode."&ct=".$content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);
        $server_output = curl_exec ($ch);

        if(isset($server_output)) {
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
        curl_close ($ch);
        
    }
	
	
	 function sendmessagegc1ajax()
    {
        $mobile = $this->input->post("mobile");
        $content = urlencode($this->input->post("content"));
        $giftcode = $this->input->post("giftcode");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_backend'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"c=178&m=".$mobile."&gc=".$giftcode."&ct=".$content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);
        $server_output = curl_exec ($ch);

        if(isset($server_output)) {
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
        curl_close ($ch);

    }

    function uploadgc()
    {
        if (file_exists(FCPATH."public/admin/uploads/messagegc.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH."public/admin/uploads/messagegc.csv");
            $listsdt = array();
            $listgc = array();
            $list = array();
            foreach ($result as $row) {
                if ($row["Sdt"]) {
                    if(substr($row["Sdt"],0,2) == "84"){
                    array_push($listsdt,"0". substr($row["Sdt"],2,14));
                    }
                    else if(substr($row["Sdt"],0,1) != "0"){
                        array_push($listsdt,"0". substr($row["Sdt"],0,14));
                    } else if(substr($row["Sdt"],0,1) == "0"){
                        array_push($listsdt,$row["Sdt"]);
                    }
                }

                if ($row["Giftcode"]) {
                    array_push($listgc, $row["Giftcode"]);
                }
            }
            echo json_encode(array(array("er"=>0),array("sdt"=>implode(',',$listsdt)),array("gc"=>implode(',',$listgc))));
        } else {
            echo json_encode(array(array("er"=>1)));
        }
    }

    function blockchat()
    {
        $this->data['temp'] = 'admin/mail/blockchat';
        $this->load->view('admin/main', $this->data);
    }
    function blockchatajax()
    {
        $nickname = urlencode($this->input->post("nickname"));
        $time = urlencode($this->input->post("time"));
        $datainfo =  $this->get_data_curl($this->config->item('api_backend').'?c=1993&nn='.$nickname.'&t='.$time);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	 function sendmailfull(){
        $this->data['error']="";
		$rand=rand(1, 15);
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/marketinggcfull.csv'))
//            {
//                unlink('public/admin/uploads/marketinggcfull.csv');
//				$this->data['error'] = "Bạn xóa file cũ thành công";
//            }else{
				$temp = explode(".", $_FILES["filexls"]["name"]);
				$extension = end($temp);
				if ($extension == "csv") {
					$config = array("");
					$config['upload_path'] = './public/admin/uploads';
					$config['allowed_types'] = '*';
					$config['max_size'] = 1024 * 8;
					$config['overwrite'] = TRUE;
					$config['file_name'] = 'marketinggcfull';
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
//			}

        }
        if (file_exists(FCPATH."public/admin/uploads/marketinggcfull.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH."public/admin/uploads/marketinggcfull.csv");
            $listnn = array();
            $listgc = array();
            foreach ($result as $row) {
                if (isset($row["Nickname"])) {
                    array_push($listnn, $row["Nickname"]);
                }

                if (isset($row["Giftcode"])) {
                    array_push($listgc, $row["Giftcode"]);
                }
            }
            $this->data['listnn'] = implode(',',$listnn);

            $this->data['listgc'] = implode(',',$listgc);
            unlink(FCPATH."public/admin/uploads/marketinggcfull.csv");

        } else {
            $this->data['listnn'] = "";
            $this->data['listgc'] = "";
        }
        $this->data['temp'] = 'admin/mail/sendmailfull';
        $this->load->view('admin/main', $this->data);
    }
    function sendmailfullajax()
    {
        $nickname = $this->input->post("nickname");
        $title = urlencode($this->input->post("title"));
        $content = urlencode($this->input->post("content"));
        $giftcode = $this->input->post("giftcode");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_backend'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"c=136&nn=".$nickname."&gc=".$giftcode."&cm=".$content."&tm=".$title);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);

        $server_output = curl_exec ($ch);

        if(isset($server_output)) {
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
        curl_close ($ch);
       
    }
	 function sendmailvincard()
    {
        $this->data['error'] = "";
		$rand=rand(1, 15);
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/marketingvincard.csv')) {
//                unlink('public/admin/uploads/marketingvincard.csv');
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
                    $config['file_name'] = 'marketingvincard';
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
        if (file_exists(FCPATH . "public/admin/uploads/marketingvincard.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH . "public/admin/uploads/marketingvincard.csv");
            $listnn = array();
            $listsr = array();
            $listpin = array();
            foreach ($result as $row) {
                if (isset($row["Nickname"])) {
                    array_push($listnn, $row["Nickname"]);
                }

                if (isset($row["Seri"])) {
                    array_push($listsr, $row["Seri"]);
                }
                if (isset($row["Pin"])) {
                    array_push($listpin, trim($row["Pin"]));
                }
            }
            $this->data['listnn'] = implode(',', $listnn);

            $this->data['listsr'] = implode(',', $listsr);
            $this->data['listpin'] = implode(',', $listpin);
            unlink('public/admin/uploads/marketingvincard.csv');

        } else {
            $this->data['listnn'] = "";
            $this->data['listsr'] = "";
            $this->data['listpin'] = "";
        }
        $this->data['temp'] = 'admin/mail/sendmailvincard';
        $this->load->view('admin/main', $this->data);
    }

    function sendmailvincardajax()
    {
        $nickname = $this->input->post("nickname");
        $title = urlencode($this->input->post("title"));
        $content = urlencode($this->input->post("content"));
        $seri = urlencode($this->input->post("seri"));
        $pin = urlencode($this->input->post("pin"));
        $server_output = $this->get_data_curl($this->config->item('api_backend')."?c=607&nn=".$nickname."&sr=".$seri."&pn=".$pin."&cm=".$content."&tm=".$title);
        $data = json_decode($server_output);
        if(isset($server_output)) {
            if ($data->errorCode == 0) {
                if (file_exists('public/admin/uploads/marketingvincard.csv')) {
                    unlink('public/admin/uploads/marketingvincard.csv');
                }
            }
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }

    }
	
	
}
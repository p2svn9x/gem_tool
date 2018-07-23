<?php

Class Giftcodevh extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('useragent_model');
        $this->load->model('logadmin_model');
        $this->load->model('sourcegiftcode_model');
        $this->load->helper(array("form", "url"));
        $this->load->library('upload');

    }



    function giftcodeusevh()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api') . '?c=10'));
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $list = $this->useragent_model->get_admin_gift_code();
        $this->data['list'] = $list;
        $source = $this->sourcegiftcode_model->get_source_gift_code_vanhanh_view();
        $this->data['source'] = $source;
        $this->data['temp'] = 'admin/giftcodevh/giftcodeusevh';
        $this->load->view('admin/main', $this->data);
    }


    function giftcodeusevhajax()
    {
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $nguonxuat = $this->input->post("nguonxuat");
        $fromDate = $this->input->post("fromDate");
        $toDate = $this->input->post("toDate");
        $money = $this->input->post("money");
         $filterdate = $this->input->post("filterdate");
        if($money == 1){
            $datainfo = $this->curl->simple_get($this->config->item('api_url2').'?c=304&gp='.$roomvin.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=3&tt='.$filterdate.'&bl=');
        }
        elseif($money == 0){
            $datainfo = $this->curl->simple_get($this->config->item('api_url2').'?c=304&gp='.$roomxu.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money .'&gs=' .$nguonxuat .'&type=3&tt='.$filterdate.'&bl=');
        }
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }




    function vhadd()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api') . '?c=10'));
        $this->data['listversion'] = $datainfo->giftcode_version;
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $list = $this->useragent_model->get_admin_gift_code();
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/giftcodevh/vhadd';
        $this->load->view('admin/main', $this->data);
    }

    function vhaddajax()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $money = $this->input->post("money");
        $quantity = $this->input->post("quantity");
        $version = $this->input->post("version");
        $moneytype = $this->input->post("moneytype");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_url'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'c=306&gp=' . $money . '&gq=' . $quantity . '&gl=' . $version . '&mt=' . $moneytype . '&gs=GVH&type=3');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);
        $server_output = curl_exec ($ch);
        $data = json_decode($server_output);
        if (isset($data->success)) {
            if ($data->success == true) {
                if ($data->errorCode == 0) {
                    if ($moneytype == 1) {
                        $this->logadmin_model->create($this->logadmingiftcode(17, "", $admin_info->UserName, $quantity, $money * 1000, "Vin"));
                    } else {
                        $this->logadmin_model->create($this->logadmingiftcode(17, "", $admin_info->UserName, $quantity, $money * 1000000, "Xu"));
                    }
                    echo json_encode("1");
                }
            } else {
                if ($data->errorCode == 1001) {
                    echo json_encode("2");
                }
            }
        } else {
            echo "Bạn không được hack";
        }
        curl_close ($ch);
    }

    function vhaddgc()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api') . '?c=10'));
        $this->data['listversion'] = $datainfo->giftcode_version;
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $list = $this->useragent_model->get_admin_gift_code();
        $this->data['list'] = $list;
        $source = $this->sourcegiftcode_model->get_source_gift_code_vanhanh();
        $this->data['source'] = $source;
        $this->data['temp'] = 'admin/giftcodevh/vhaddgc';
        $this->load->view('admin/main', $this->data);
    }

    function vhaddgcajax()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $money = $this->input->post("money");
        $quantity = $this->input->post("quantity");
        $source = $this->input->post("source");
        $version = $this->input->post("version");
        $moneytype = $this->input->post("moneytype");
        $nickname = $this->input->post("nickname");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_url'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,'c=301&gp=' . $money . '&gq=' . $quantity . '&gs=' . $source . '&gl=' . $version . '&mt=' . $moneytype . '&type=3');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);
        $server_output = curl_exec ($ch);
        $data = json_decode($server_output);
        if (isset($data->success)) {
            if ($data->success == true) {
                if ($data->errorCode == 0) {
                    if ($moneytype == 1) {
                        $this->logadmin_model->create($this->logadmingiftcode(18, $nickname, $admin_info->UserName, $quantity, $money * 1000, "Vin"));
                    } else {
                        $this->logadmin_model->create($this->logadmingiftcode(18, $nickname, $admin_info->UserName, $quantity, $money * 1000000, "Xu"));
                    }
                    echo json_encode("1");
                }
            } else {
                if ($data->errorCode == 10003) {
                    echo json_encode("2");
                }
            }
        } else {
            echo "Bạn không được hack";
        }
        curl_close ($ch);
    }

    function giftcodevh()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api') . '?c=10'));
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $list = $this->useragent_model->get_admin_gift_code();
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/giftcodevh/giftcodevh';
        $this->load->view('admin/main', $this->data);
    }
    function giftcodevhajax()
    {
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $fromDate = $this->input->post("fromDate");
        $toDate = $this->input->post("toDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $gcuse = $this->input->post("gcuse");
        $displaygc = $this->input->post("displaygc");
        if($money == 1) {
            $datainfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=307&gp=' . $roomvin . '&gs=GVH&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&p=' . $pages . '&ug=' . $gcuse . '&tr=' . $displaygc);
        }
        elseif($money == 0){
            $datainfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=307&gp=' . $roomxu . '&gs=GVH&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&p=' . $pages . '&ug=' . $gcuse . '&tr=' . $displaygc);
        }
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function giftcodevhuse()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api') . '?c=10'));
        $this->data['listversion'] = $datainfo->giftcode_version;
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $list = $this->useragent_model->get_admin_gift_code();
        $this->data['list'] = $list;
        $source = $this->sourcegiftcode_model->get_source_gift_code_vanhanh_view();
        $this->data['source'] = $source;
        $this->data['temp'] = 'admin/giftcodevh/giftcodevhuse';
        $this->load->view('admin/main', $this->data);
    }
    function giftcodevhuseajax()
    {
        $nickname = $this->input->post("nickname");
        $giftcode = $this->input->post("giftcode");
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $nguonxuat = $this->input->post("nguonxuat");
        $fromDate = urlencode($this->input->post("fromDate"));
        $toDate = urlencode($this->input->post("toDate"));
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $gcuse = $this->input->post("gcuse");
        $record = $this->input->post("record");
        $release = $this->input->post("release");
         $filterdate = $this->input->post("filterdate");
		    $block = $this->input->post("block");
        if($money == 1) {
            $datainfo = $this->curl->simple_get($this->config->item('api_url2') . '?c=303&nn=' . $nickname . '&gc=' . $giftcode . '&gp=' . $roomvin . '&gs=' . $nguonxuat . '&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&p=' . $pages . '&ug=' . $gcuse . '&tr=' . $record . '&type=3&rl=' . $release.'&tt='.$filterdate.'&bl='.$block);
		//	echo $this->config->item('api_url') . '?c=303&nn=' . $nickname . '&gc=' . $giftcode . '&gp=' . $roomvin . '&gs=' . $nguonxuat . '&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&p=' . $pages . '&ug=' . $gcuse . '&tr=' . $record . '&type=3&rl=' . $release.'&tt='.$filterdate;
        }
        elseif($money == 0){
            $datainfo = $this->curl->simple_get($this->config->item('api_url') . '?c=303&nn=' . $nickname . '&gc=' . $giftcode . '&gp=' . $roomxu . '&gs=' . $nguonxuat . '&ts=' . $fromDate . '&te=' . $toDate . '&mt=' . $money . '&p=' . $pages . '&ug=' . $gcuse . '&tr=' . $record . '&type=3&rl=' . $release.'&tt='.$filterdate.'&bl='.$block);
        }
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }



    function giftcodeusevanhanh()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api') . '?c=10'));
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $list = $this->useragent_model->get_admin_gift_code();
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/giftcodevh/giftcodeusevanhanh';
        $this->load->view('admin/main', $this->data);
    }
    function giftcodeusevanhanhajax()
    {
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $fromDate = $this->input->post("fromDate");
        $toDate = $this->input->post("toDate");
        $money = $this->input->post("money");
        if($money == 1){
            $datainfo = $this->curl->simple_get($this->config->item('api_url2').'?c=308&gp='.$roomvin.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' .$money.'&type=3&bl=');
        }
        elseif($money == 0){
            $datainfo = $this->curl->simple_get($this->config->item('api_url2').'?c=308&gp='.$roomxu.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' .$money.'&type=3&bl=');
        }
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }



    function nicknameusegiftcodevh()
    {
        $list = $this->useragent_model->get_admin_gift_code();
        $this->data['list'] = $list;
        $source = $this->sourcegiftcode_model->get_source_gift_code_vanhanh_view();
        $this->data['source'] = $source;
        $this->data['temp'] = 'admin/giftcodevh/nicknameusegiftcodevh';
        $this->load->view('admin/main', $this->data);
    }
    function nicknameusegiftcodevhajax()
    {
        $nguonxuat = $this->input->post("nguonxuat");
        $fromDate = $this->input->post("fromDate");
        $toDate = $this->input->post("toDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $filterdate = $this->input->post("filterdate");
		    $block = $this->input->post("block");
        $datainfo = $this->curl->simple_get($this->config->item('api_url2').'?c=309&ts=' . $fromDate . '&te=' . $toDate . '&mt=' .$money.'&gs='.$nguonxuat.'&type=3&p='.$pages.'&tt='.$filterdate.'&bl='.$block);
     
		if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }


    function usergiftcodevh()
    {
        $list = $this->useragent_model->get_admin_gift_code();
        $this->data['list'] = $list;
        $source = $this->sourcegiftcode_model->get_source_gift_code_vanhanh_view();
        $this->data['source'] = $source;
        $this->data['temp'] = 'admin/giftcodevh/usergiftcodevh';
        $this->load->view('admin/main', $this->data);
    }
    function usergiftcodevhajax()
    {
        $nguonxuat = $this->input->post("nguonxuat");
        $nickname = $this->input->post("nickname");
        $fromDate = $this->input->post("fromDate");
        $toDate = $this->input->post("toDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $filterdate = $this->input->post("filterdate");
		     $block = $this->input->post("block");
        $datainfo = $this->curl->simple_get($this->config->item('api_url2').'?c=305&nn='.$nickname.'&ts=' . $fromDate . '&te=' . $toDate . '&mt=' .$money.'&gs='.$nguonxuat.'&p='.$pages.'&tt='.$filterdate.'&bl='.$block);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function marketingaddmoney()
    {
        if ($this->input->post("ok")) {
            $temp = explode(".", $_FILES["filexls"]["name"]);
            $extension = end($temp);
            if ($extension == "csv") {
                $config = array("");
                $config['upload_path'] = './public/admin/uploads';
                $config['allowed_types'] = '*';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] = TRUE;
                $config['file_name'] = 'marketing';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('filexls')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error'] = "Bạn chưa chọn file";
                    var_dump($this->data['error']);
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->data['succes'] = "Upload file thành công";
                }
            } else {
                $this->data['error'] = "Không chọn đúng file csv";
            }

        }
        $this->data['temp'] = 'admin/giftcode/marketingaddmoney';
        $this->load->view('admin/main', $this->data);

    }

    function upload()
    {

        if (file_exists(FCPATH . "public/admin/uploads/marketing.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(public_url('admin/marketing.csv'));
            $list = array();
            $lists = array();
            $listdup = array();
            $listexit = array();
            foreach ($result as $row) {
                if ($row["NickName"]) {
                    array_push($list, $row["NickName"]);
                }
            }
            if (count($list) !== count(array_unique($list))) {
                $duplicate = array_diff_assoc($list, array_unique($list));
                foreach ($duplicate as $key => $value) {
                    array_push($listdup, $value);
                }
                $strings = implode(',', $listdup);
                array_push($listexit, array('nickname' => $strings, 'dup' => 1));
                echo json_encode($listexit);
            } else {
                $string = implode(',', $list);
                array_push($lists, array('nickname' => $string, 'dup' => 0));
                echo json_encode($lists);
            }
        } else {
            $lists = array();
            array_push($lists, array('message' => "error", 'dup' => 2));
            echo json_encode($lists);
        }
    }

    function delgiftcodevh()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api') . '?c=10'));
        $this->data['listversion'] = $datainfo->giftcode_version;
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $source = $this->sourcegiftcode_model->get_source_gift_code_vanhanh_view();
        $this->data['source'] = $source;
        $this->data['error'] = "";
        if ($this->input->post("ok")) {
            if (file_exists('public/admin/uploads/giftcodemkt.csv'))
            {
                unlink('public/admin/uploads/giftcodemkt.csv');
            }
            $temp = explode(".", $_FILES["filexls"]["name"]);
            $extension = end($temp);
            if ($extension == "csv") {
                $config = array("");
                $config['upload_path'] = './public/admin/uploads';
                $config['allowed_types'] = '*';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] = TRUE;
                $config['file_name'] = 'giftcodemkt';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('filexls')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error'] = "Bạn chưa chọn file";

                } else {
                    $this->data['error'] = "";
                    $data = array('upload_data' => $this->upload->data());

                    $this->data['error'] = "Upload file thành công";
                }
            } else {
                $this->data['error'] = "Bạn chưa chọn file hoặc không chọn đúng file csv";
            }

        }
        if (file_exists(FCPATH . "public/admin/uploads/giftcodemkt.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(public_url('admin/uploads/giftcodemkt.csv'));
            $listgc = array();
            $list = array();
            foreach ($result as $row) {
                if (isset($row["Giftcode"])) {
                    array_push($listgc, $row["Giftcode"]);
                }
            }
            $this->data['listgc'] = implode(',', $listgc);
        } else {
            $this->data['listgc']  = "";
        }
        $this->data['temp'] = 'admin/giftcodevh/delgiftcodevh';
        $this->load->view('admin/main', $this->data);

    }

    function delgiftcodevhajax()
    {
        $giftcode = $this->input->post("giftcode");
        $nguonxuat = $this->input->post("nguonxuat");
        $roomvin = $this->input->post("roomvin");
        $roomxu = $this->input->post("roomxu");
        $phathanh = $this->input->post("phathanh");
        $money = $this->input->post("money");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->config->item('api_url'));
        curl_setopt($ch, CURLOPT_POST, 1);
        if($money == 1){
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                "c=120&gc=".$giftcode."&gs=".$nguonxuat."&gp=".$roomvin."&gl=".$phathanh);
        }else if($money == 0){
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                "c=120&gc=".$giftcode."&gs=".$nguonxuat."&gp=".$roomxu."&gl=".$phathanh);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_TIMEOUT,3600);

        $server_output = curl_exec ($ch);
        if(isset($server_output)) {
            echo $server_output;
        }else{
            echo "Bạn không được hack";
        }
        curl_close ($ch);
//        if($money == 1){
//            $datainfo = file_get_contents($this->config->item('api_url').'?c=120&gc='.$giftcode.'&gs=' . $nguonxuat . '&gp=' . $roomvin .'&gl='.$phathanh);
//        }else if($money == 0){
//            $datainfo = file_get_contents($this->config->item('api_url').'?c=120&gc='.$giftcode.'&gs=' . $nguonxuat . '&gp=' . $roomxu.'&gl='.$phathanh);
//        }
//        if(isset($datainfo)) {
//            echo $datainfo;
//        }else{
//            echo "Bạn không được hack";
//        }
    }


    function uploadgc()
    {

        if (file_exists(FCPATH . "public/admin/uploads/giftcode.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(public_url('admin/uploads/giftcode.csv'));
            $listgc = array();
            $list = array();
            foreach ($result as $row) {
                if (isset($row["Giftcode"])) {
                    array_push($listgc, $row["Giftcode"]);
                }
            }
            $this->data['listgc'] = implode(',', $listgc);
            echo json_encode(array(array("er" => 0), array("gc" => implode(',', $listgc))));
        } else {
            echo json_encode(array(array("er" => 1)));
        }
    }

    function maradd()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $money = $this->input->post('money');
        $nickname = $this->input->post('nickname');
        $quantity = count(explode(',', $nickname));
        $account = $this->input->post('account');
        $type = $this->input->post('type');
        $this->logadmin_model->create($this->logadmingiftcode(11, $account, $admin_info->UserName, $quantity, $money, $type));
    }


}
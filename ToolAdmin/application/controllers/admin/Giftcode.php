<?php

Class Giftcode extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array("form", "url"));
        $this->load->library('upload');
        $this->load->model('sourcegiftcode_model');
		$this->load->model('useragent_model');

    }

    function index()
    {
        $this->data['temp'] = 'admin/giftcode/index';
        $this->load->view('admin/main', $this->data);
    }
    function giftcodemktuse()
    {
        $source = $this->sourcegiftcode_model->get_list();
        $this->data['source'] = $source;
        $this->data['temp'] = 'admin/giftcode/giftcodemktuse';
        $this->load->view('admin/main', $this->data);
    }
    function giftcodemktuseajax()
    {

        $menhgiavin = urlencode($this->input->post("menhgiavin"));
        $menhgiaxu = urlencode($this->input->post("menhgiaxu"));
        $source = urlencode($this->input->post("source"));
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $money = urlencode($this->input->post("money"));
        $filterdate = $this->input->post("filterdate");
        if($money == 1){
            $datainfo = $this->get_data_curl($this->config->item('api_backend2').'?c=304&gp='.$menhgiavin.'&gs='.$source.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&mt='.$money.'&type='.$source.'&tt='.$filterdate.'&bl=');
        }elseif($money == 0){
            $datainfo = $this->get_data_curl($this->config->item('api_backend2').'?c=304&gp='.$menhgiaxu.'&gs='.$source.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&mt='.$money.'&type='.$source.'&tt='.$filterdate.'&bl=');
        }

        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function giftcodemkt()
    {
       $sourcemkt = $this->sourcegiftcode_model->get_source_gift_code_marketing_view();
        $sourcevh = $this->sourcegiftcode_model->get_source_gift_code_vanhanh();
        $sourcedl = $this->useragent_model->get_admin_gift_code();
        $this->data['sourcemkt'] = $sourcemkt;
        $this->data['sourcevh'] = $sourcevh;
        $this->data['sourcedl'] = $sourcedl;
        $this->data['temp'] = 'admin/giftcode/giftcodemkt';
        $this->load->view('admin/main', $this->data);
    }

    function giftcodemktajax()
    {
            $nickname = urlencode($this->input->post("nickname"));
            $giftcode = urlencode($this->input->post("giftcode"));
            $menhgiavin = urlencode($this->input->post("menhgiavin"));
            $menhgiaxu = urlencode($this->input->post("menhgiaxu"));
            $source = urlencode($this->input->post("source"));
            $toDate = $this->input->post("toDate");
            $fromDate = $this->input->post("fromDate");
            $money = urlencode($this->input->post("money"));
            $gcuse = urlencode($this->input->post("gcuse"));
            $pages = urlencode($this->input->post("pages"));
             $filterdate = $this->input->post("filterdate");
        $typegc = $this->input->post("typegc");
            if($money == 1){
                $datainfo = $this->get_data_curl($this->config->item('api_backend2').'?c=303&nn='.$nickname.'&gc='.$giftcode.'&gp='.$menhgiavin.'&gs='.$source.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&mt='.$money.'&p='.$pages.'&ug='.$gcuse.'&tr=50&type='.$typegc.'&rl='."".'&tt='.$filterdate);
            }elseif($money == 0){
                $datainfo = $this->get_data_curl($this->config->item('api_backend2').'?c=303&nn='.$nickname.'&gc='.$giftcode.'&gp='.$menhgiaxu.'&gs='.$source.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&mt='.$money.'&p='.$pages.'&ug='.$gcuse.'&tr=50&type='.$typegc.'&rl='."".'&tt='.$filterdate);
            }

            if(isset($datainfo)) {
                echo $datainfo;
            }else{
                echo "Bạn không được hack";
            }
    }
	
	 function checkgiftcode()
    {
        $this->data['error'] = "";
		$rand=rand(1, 15);
        if ($this->input->post("ok")) {
//            if (file_exists('public/admin/uploads/checkgiftcode.csv')) {
//                unlink('public/admin/uploads/checkgiftcode.csv');
//            }
            $temp = explode(".", $_FILES["filexls"]["name"]);
            $extension = end($temp);
            if ($extension == "csv") {
                $config = array("");
                $config['upload_path'] = './public/admin/uploads';
                $config['allowed_types'] = '*';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] = TRUE;
                $config['file_name'] = 'checkgiftcode';
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
        if (file_exists(FCPATH . "public/admin/uploads/checkgiftcode.csv") != false) {
            $this->load->library('csvreader');
            $result = $this->csvreader->parse_file(FCPATH . "public/admin/uploads/checkgiftcode.csv");
            $listnn = array();
            foreach ($result as $row) {
                if (isset($row["Giftcode"])) {
                    array_push($listnn, $row["Giftcode"]);
                }

            }
            $this->data['listnn'] = implode(',', $listnn);
            unlink(FCPATH . "public/admin/uploads/checkgiftcode.csv");
        } else {
            $this->data['listnn'] = "";
        }
        $this->data['temp'] = 'admin/giftcode/checkgiftcode';
        $this->load->view('admin/main', $this->data);
    }

    function checkgiftcodeajax()
    {
        $giftcode = urlencode($this->input->post("giftcode"));
        $pages = urlencode($this->input->post("pages"));
        $display = urlencode($this->input->post("display"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->config->item('api_backend2'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c=319&gc=" . $giftcode."&p=".$pages.'&tr='.$display);
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
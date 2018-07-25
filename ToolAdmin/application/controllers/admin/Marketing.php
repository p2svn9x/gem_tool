<?php

Class Marketing extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('urlbuilder_model');
        $this->load->model('utmcampain_model');
        $this->load->model('utmsource_model');
        $this->load->model('utmmedium_model');
		   $this->load->model('sourcegiftcode_model');
    }
    function index()
    {
        $list = $this->urlbuilder_model->get_list();
        $this->data['list'] = $list;
        //lay tổng số bản ghi
        $total = $this->urlbuilder_model->get_total();
        $this->data['total'] = $total;
        $this->data['temp'] = 'admin/marketing/index';
        $this->load->view('admin/main', $this->data);
    }

    function  add(){

        $this->load->library('form_validation');
        $this->load->helper('form');
        $utm_campain = $this->utmcampain_model->get_list_game();
        $this->data['utm_campain'] = $utm_campain;
        $utm_medium = $this->utmmedium_model->get_list_game();
        $this->data['utm_medium'] = $utm_medium;
        $utm_source = $this->utmsource_model->get_list_game();
        $this->data['utm_source'] = $utm_source;
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('url_web', 'url web', 'required');
            $this->form_validation->set_rules('utm_source', 'Nguồn chiến dịch', 'required');
            $this->form_validation->set_rules('utm_medium', 'Phương tiện chiến dịch', 'required');
            $this->form_validation->set_rules('utm_campaign', 'Tên chiến dịch', 'required');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                $url_web = $this->input->post('url_web');
                $utm_source = $this->input->post('utm_source');

                $utm_medium = $this->input->post('utm_medium');
                $utm_campaign = $this->input->post('utm_campaign');
                $utm_term = $this->input->post('utm_term');
                $utm_content = $this->input->post('utm_content');
                $link_genarate="";
                if($url_web!="" && $utm_source!="" && $utm_medium!="" && $utm_campaign!="" && $utm_term!="" &&$utm_content=="") {
                    $link_genarate = $url_web."?utm_source=" . $utm_source . "&utm_medium=". $utm_medium ."&utm_term=".$utm_term."&utm_campaign=" .$utm_campaign;
                }
               else if($url_web!="" && $utm_source!="" && $utm_medium!="" && $utm_campaign!="" && $utm_term=="" &&$utm_content!="") {
                   $link_genarate= $url_web . "?utm_source=" . $utm_source . "&utm_medium=" . $utm_medium ."&utm_content=".$utm_content. "&utm_campaign=" . $utm_campaign;
                }
               else if($url_web!="" && $utm_source!="" && $utm_medium!="" && $utm_campaign!="" && $utm_term!="" && $utm_content!="") {
                   $link_genarate= $url_web . "?utm_source=" . $utm_source . "&utm_medium=" . $utm_medium ."&utm_term=".$utm_term."&utm_content=".$utm_content. "&utm_campaign=" . $utm_campaign;
               }
                else{
                    $link_genarate = $url_web . "?utm_source=". $utm_source . "&utm_medium=" . $utm_medium. "&utm_campaign=" . $utm_campaign;

                }

                $data = array(
                    'url_web' => $url_web,
                    'utm_source' => $utm_source,
                    'utm_medium' => $utm_medium,
                    'utm_campaign' => $utm_campaign,
                    'utm_term' => $utm_term,
                    'utm_content' => $utm_content,
                    'url_generate' => $link_genarate
                );
                if ($this->urlbuilder_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('marketing'));
            }
        }
        $this->data['temp'] = 'admin/marketing/add';
        $this->load->view('admin/main', $this->data);
    }
    function  edit(){
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        $utm_campain = $this->utmcampain_model->get_list_game();
        $this->data['utm_campain'] = $utm_campain;
        $utm_medium = $this->utmmedium_model->get_list_game();
        $this->data['utm_medium'] = $utm_medium;
        $utm_source = $this->utmsource_model->get_list_game();
        $this->data['utm_source'] = $utm_source;
        $id = $this->uri->rsegment(3);
        $info = $this->urlbuilder_model->get_info($id);
        $this->data['info'] = $info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('url_web', 'url web', 'required');
            $this->form_validation->set_rules('utm_source', 'Nguồn chiến dịch', 'required');
            $this->form_validation->set_rules('utm_medium', 'Phương tiện chiến dịch', 'required');
            $this->form_validation->set_rules('utm_campaign', 'Tên chiến dịch', 'required');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                $url_web = $this->input->post('url_web');
                $utm_source = $this->input->post('utm_source');
                $utm_medium = $this->input->post('utm_medium');
                $utm_campaign = $this->input->post('utm_campaign');
                $utm_term = $this->input->post('utm_term');
                $utm_content = $this->input->post('utm_content');
                $link_genarate="";
                if($url_web!="" && $utm_source!="" && $utm_medium!="" && $utm_campaign!="" && $utm_term!="" && $utm_content=="") {
                    $link_genarate = $url_web."?utm_source=" . $utm_source . "&utm_medium=". $utm_medium ."&utm_term=".$utm_term."&utm_campaign=" .$utm_campaign;
                }
                else if($url_web!="" && $utm_source!="" && $utm_medium!="" && $utm_campaign!="" && $utm_term=="" && $utm_content!="") {
                    $link_genarate= $url_web . "?utm_source=" . $utm_source . "&utm_medium=" . $utm_medium ."&utm_content=".$utm_content. "&utm_campaign=" . $utm_campaign;
                }
                else if($url_web!="" && $utm_source!="" && $utm_medium!="" && $utm_campaign!="" && $utm_term!="" && $utm_content!="") {
                    $link_genarate= $url_web . "?utm_source=" . $utm_source . "&utm_medium=" . $utm_medium ."&utm_term=".$utm_term."&utm_content=".$utm_content. "&utm_campaign=" . $utm_campaign;
                }
                else{
                    $link_genarate = $url_web . "?utm_source=". $utm_source . "&utm_medium=" . $utm_medium. "&utm_campaign=" . $utm_campaign;

                }
                $data = array(
                    'url_web' => $url_web,
                    'utm_source' => $utm_source,
                    'utm_medium' => $utm_medium,
                    'utm_campaign' => $utm_campaign,
                    'utm_term' => $utm_term,
                    'utm_content' => $utm_content,
                    'url_generate' => $link_genarate
                );
                if ($this->urlbuilder_model->update($id,$data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('marketing'));
            }
        }
        $this->data['temp'] = 'admin/marketing/edit';
        $this->load->view('admin/main', $this->data);
    }
    function delete()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->urlbuilder_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('marketing'));
    }

    function listcampaing()
	
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
            $start_time = date('Y-m-d');
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $utm_campain = $this->utmcampain_model->get_list_game();
       $this->data['utm_campain'] = $utm_campain;
        $utm_medium = $this->utmmedium_model->get_list_game();
       $this->data['utm_medium'] = $utm_medium;
        $utm_source = $this->utmsource_model->get_list_game();
        $this->data['utm_source'] = $utm_source;
        $this->data['temp'] = 'admin/marketing/listcampaing';
        $this->load->view('admin/main', $this->data);

    }
	
	 function listcampaingajax()
    {
        $utm_campaign =  urlencode($this->input->post("utm_campaign"));
                $utm_medium = urlencode($this->input->post("utm_medium"));
                $utm_source = urlencode($this->input->post("utm_source"));
                $toDate =  $this->input->post("toDate");
                $fromDate = $this->input->post("fromDate");
         $datainfo = file_get_contents($this->config->item('api_backend').'?c=6&utm_campaign='.$utm_campaign.'&utm_medium='.$utm_medium.'&utm_source='.$utm_source.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate));
		 
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function addcampain(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('recampain', 'Tên utm_campain request', 'required');
            $this->form_validation->set_rules('discampain', 'Tên utm_campain hiển thị', 'required');
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('recampain');
                $disname = $this->input->post('discampain');
                $data = array(
                    'name' => $name,
                    'name_display' => $disname
                );
                if ($this->utmcampain_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('marketing'));
            }
        }
        $this->data['temp'] = 'admin/marketing/addcampain';
        $this->load->view('admin/main', $this->data);

    }
    function addsource(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('resource', 'Tên utm_source request', 'required');
            $this->form_validation->set_rules('dissource', 'Tên utm_source hiển thị', 'required');
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('resource');
                $disname = $this->input->post('dissource');
                $data = array(
                    'name' => $name,
                    'name_display' => $disname
                );
                if ($this->utmsource_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('marketing'));
            }
        }
        $this->data['temp'] = 'admin/marketing/addsource';
        $this->load->view('admin/main', $this->data);

    }
    function addmedium(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('remedium', 'Tên utm_medium request', 'required');
            $this->form_validation->set_rules('dismedium', 'Tên utm_medium hiển thị', 'required');
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('remedium');
                $disname = $this->input->post('dismedium');
                $data = array(
                    'name' => $name,
                    'name_display' => $disname
                );
                if ($this->utmmedium_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('marketing'));
            }
        }
        $this->data['temp'] = 'admin/marketing/addmedium';
        $this->load->view('admin/main', $this->data);

    }
    function addDate(){
        $startdate = $this->input->post('startdate');
        $enddate =  $this->input->post('enddate');
        echo $this->dateDiff($startdate,$enddate);

    }
    function detailsmar(){

        $this->data['temp'] = 'admin/marketing/detailsmar';
        $this->load->view('admin/main', $this->data);
    }

 function campain(){

        $list = $this->utmcampain_model->get_list_game();
        $this->data['list'] = $list;
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/marketing/campain';
        $this->load->view('admin/main', $this->data);
    }
    function medium(){

        $list = $this->utmmedium_model->get_list_game();
        $this->data['list'] = $list;
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/marketing/medium';
        $this->load->view('admin/main', $this->data);
    }
    function source(){

        $list = $this->utmsource_model->get_list_game();
        $this->data['list'] = $list;
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/marketing/source';
        $this->load->view('admin/main', $this->data);
    }

    function editcampain(){
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay thong cua quan trị viên
        $info = $this->utmcampain_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(admin_url('marketing/campain'));
        }
        $this->data['info'] = $info;
        if ($this->input->post()) {

                $name = $this->input->post('name');
                $display_name = $this->input->post('display_name');
                $data = array(
                    'name' => $name,
                    'name_display' => $display_name
                );
                //neu ma thay doi mat khau thi moi gan du lieu
                if ($this->utmcampain_model->update($id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(admin_url('marketing/campain'));

        }

        $this->data['temp'] = 'admin/marketing/editcampain';
        $this->load->view('admin/main', $this->data);
    }
    function editmedium(){
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay thong cua quan trị viên
        $info = $this->utmmedium_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(admin_url('marketing/medium'));
        }
        $this->data['info'] = $info;
        if ($this->input->post()) {

            $name = $this->input->post('name');
            $display_name = $this->input->post('display_name');
            $data = array(
                'name' => $name,
                'name_display' => $display_name
            );
            //neu ma thay doi mat khau thi moi gan du lieu
            if ($this->utmmedium_model->update($id, $data)) {
                //tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
            } else {
                $this->session->set_flashdata('message', 'Không cập nhật được');
            }
            //chuyen tới trang danh sách quản trị viên
            redirect(admin_url('marketing/medium'));

        }

        $this->data['temp'] = 'admin/marketing/editmedium';
        $this->load->view('admin/main', $this->data);
    }
    function editsource(){
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay thong cua quan trị viên
        $info = $this->utmsource_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(admin_url('marketing/source'));
        }
        $this->data['info'] = $info;
        if ($this->input->post()) {

            $name = $this->input->post('name');
            $display_name = $this->input->post('display_name');
            $data = array(
                'name' => $name,
                'name_display' => $display_name
            );
            //neu ma thay doi mat khau thi moi gan du lieu
            if ($this->utmsource_model->update($id, $data)) {
                //tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
            } else {
                $this->session->set_flashdata('message', 'Không cập nhật được');
            }
            //chuyen tới trang danh sách quản trị viên
            redirect(admin_url('marketing/source'));

        }

        $this->data['temp'] = 'admin/marketing/editsource';
        $this->load->view('admin/main', $this->data);
    }

    function deletecampain()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->utmcampain_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('marketing/campain'));
    }
    function deletemedium()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->utmmedium_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('marketing/medium'));
    }
    function deletesource()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->utmsource_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('marketing/source'));
    }
	
 function addsourcegiftcode(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('sourcegiftcode', 'Tên nguồn giftcode', 'required');
            $this->form_validation->set_rules('keygiftcode', 'Key  giftcode', 'required');
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                 $name = $this->input->post('sourcegiftcode');
                $key = $this->input->post('keygiftcode');
                $type = $this->input->post('typegiftcode');
                $display = $this->input->post('displaygc');
                $data = array(
                    'name' => $name,
                    'key' => strtoupper($key),
                    'type' => $type,
                    'display'=>$display

                );
                if ($this->sourcegiftcode_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                redirect(admin_url('marketing/sourcegiftcode'));
            }
        }
        $this->data['temp'] = 'admin/marketing/addsourcegiftcode';
        $this->load->view('admin/main', $this->data);

    }
	 function editsourcegiftcode(){
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay thong cua quan trị viên
        $info = $this->sourcegiftcode_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(admin_url('marketing/sourcegiftcode'));
        }
        $this->data['info'] = $info;
        if ($this->input->post()) {

             $name = $this->input->post('sourcegiftcode');
            $key = $this->input->post('keygiftcode');
            $type = $this->input->post('typegiftcode');
            $display = $this->input->post('displaygc');
            $data = array(
                'name' => $name,
                'key' => strtoupper($key),
                'type' => $type,
                'display'=>$display

            );
            //neu ma thay doi mat khau thi moi gan du lieu
            if ($this->sourcegiftcode_model->update($id, $data)) {
                //tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
            } else {
                $this->session->set_flashdata('message', 'Không cập nhật được');
            }
            //chuyen tới trang danh sách quản trị viên
            redirect(admin_url('marketing/sourcegiftcode'));

        }

        $this->data['temp'] = 'admin/marketing/editsourcegiftcode';
        $this->load->view('admin/main', $this->data);
    }
	 function deletesourcegiftcode()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $this->sourcegiftcode_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('marketing/sourcegiftcode'));
    }

    function sourcegiftcode(){

        $list = $this->sourcegiftcode_model->get_list();
        $this->data['list'] = $list;
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/marketing/sourcegiftcode';
        $this->load->view('admin/main', $this->data);
    }
	
	 function  rechargevnd(){
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
        $this->data['temp'] = 'admin/report/rechargevnd';
        $this->load->view('admin/main', $this->data);
    }
    function  rechargevndajax(){

        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
		
        $datainfo = file_get_contents($this->config->item('api_backend').'?c=7&ts='.urlencode($toDate).'&te='.urlencode($fromDate));
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	 function  reportmarketing(){
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
            $start_time = date('Y-m-d 00:00:00');
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d H:i:s');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['temp'] = 'admin/marketing/reportmarketing';
        $this->load->view('admin/main', $this->data);
    }
    function  reportmarketingajax(){

        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $datainfo = file_get_contents($this->config->item('api_backend2').'?c=142&ts='.urlencode($toDate).'&te='.urlencode($fromDate));
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	
}
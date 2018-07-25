<?php

Class Logminigame extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
     //   $this->load->model('resulttaixiu_model');
        $this->load->model('logadmin_model');
     //   $this->load->model('eventminigame_model');
        $this->load->model('usergame_model');
    }

    function index()
    {
       
     
        $this->data['temp'] = 'admin/logminigame/index';
        $this->load->view('admin/main', $this->data);
    }
	
	function indexajax()
    {
        $phientx = urlencode($this->input->post("phientx"));
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=137&rid='.$phientx.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function accounttaixiu()
    {
       
        $this->data['temp'] = 'admin/logminigame/accounttaixiu';
        $this->load->view('admin/main', $this->data);
    }
    function accounttaixiuajax()
    {
        $phientx = urlencode($this->input->post("phientx"));
        $nickname = urlencode($this->input->post("nickname"));
        $cuadat =  $this->input->post("cuadat");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=505&rid='.$phientx.'&nn='.$nickname.'&bs='.$cuadat.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function setcau()
    {
        $this->load->helper("url");
        // you can change the location of your file wherever you want
        $list = file(public_url('admin/taixiu.dat'));
        $list = array_filter($list);
        krsort($list);
        $counttai = 0;
        foreach ($list as $li) {
            $counttai += substr_count($li, 1);
        }
        $this->data['counttai'] = $counttai;
        $countxiu = 0;
        foreach ($list as $li) {
            $countxiu += substr_count($li, 0);
        }
        $this->data['countxiu'] = $countxiu;
        $this->data['total_rows'] = count(array_filter($list));
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/logminigame/setcau';
        $this->load->view('admin/main', $this->data);
    }

    function setcauedit()
    {
        $id = $this->uri->rsegment('3');
        $this->load->helper("url");
        // you can change the location of your file wherever you want
        $list = file(public_url('admin/taixiu.dat'));


        $this->data['list'] = $list[$id];
        $this->data['key'] = $id;
        //   $this->data['temp'] = 'admin/logminigame/setcau';
        $this->load->view('admin/logminigame/setcauedit', $this->data);
    }

    function setcauadd()
    {
        $this->load->view('admin/logminigame/setcauadd', $this->data);
    }

    function getcauadd()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $code = $this->input->post('code');
        $MyFile = file('public/admin/taixiu.dat');
        if ($code == null) {
            echo "Bạn chưa nhập cầu tài xỉu";
            die();
        } else {
            foreach ($MyFile as $item) {
                $item = (preg_replace("/\r|\n/", "", $item));
                if ($code == $item) {
                    echo "Bạn nhập trùng cầu tài xỉu rồi";
                    die();
                }
            }
        }
        file_put_contents('public/admin/taixiu.dat', $code."\n", FILE_APPEND);
        echo "Bạn thêm cầu tài xỉu thành công";
        $data = array(
            'action' => " Thêm cầu tài xỉu",
            'username' => $admin_info->UserName
        );
        $this->logadmin_model->create($data);
    }

    function getcauedit()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $code = $this->input->post('code');
        $key = $this->input->post('key');
        $MyFile = file('public/admin/taixiu.dat');
        foreach ($MyFile as $item) {
            $item = (preg_replace("/\r|\n/", "", $item));
            if ($code == $item) {
                echo "Bạn nhập trùng cầu tài xỉu rồi";
                die();
            }
        }
        if ($MyFile[$key] != "") {
            $arr2 = array($key => $code . "\n");
            $abc = array_replace_recursive($MyFile, $arr2);
            file_put_contents('public/admin/taixiu.dat', $abc);

            echo "Bạn sửa cầu tài xỉu thành công";
            $data = array(
                'action' => " Sửa cầu tài xỉu",
                'username' => $admin_info->UserName
            );
            $this->logadmin_model->create($data);

        }
    }

    function delete()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $id = $this->uri->rsegment('3');
        $MyFile = file('public/admin/taixiu.dat');
        $arr2 = array($id => "");
        $abc = array_replace_recursive($MyFile, $arr2);
        file_put_contents('public/admin/taixiu.dat', $abc);
        $data = array(
            'action' => " Xóa cầu tài xỉu",
            'username' => $admin_info->UserName
        );
        $this->logadmin_model->create($data);
        redirect(admin_url('logminigame/setcau'));

    }

    function  reportthanhdu()
    {

        $list = $this->resulttaixiu_model->thanh_du();
        $this->data['list'] = $list['rows'];
        if($list['rows'] != null){
            $str = "";
            $this->data['str'] = $str;
        }
        else{
            $str = "<h1 style='position: absolute;top: 50%;left: 50%' id='resultsearch'>Không tìm thấy kết quả</h1>";
            $this->data['str'] = $str;
        }
        $this->data['temp'] = 'admin/logminigame/reportthanhdu';
        $this->load->view('admin/main', $this->data);

    }

    function  logvqmm()
    {

        $this->data['temp'] = 'admin/logminigame/logvqmm';
        $this->load->view('admin/main', $this->data);

    }
    function  logvqmmajax()
    {
        $nickname = urlencode($this->input->post('nickname'));
        $pages = $this->input->post('pages');
        $todate = urlencode($this->input->post('todate'));
        $fromdate = urlencode($this->input->post('fromdate'));
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=409&nn='.$nickname.'&p='.$pages.'&ts='.$todate.'&te='.$fromdate);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function  logvqvip()
    {

        $this->data['temp'] = 'admin/logminigame/logvqvip';
        $this->load->view('admin/main', $this->data);

    }
    function  logvqvipajax()
    {
        $nickname = urlencode($this->input->post('nickname'));
        $pages = $this->input->post('pages');
        $todate = urlencode($this->input->post('todate'));
        $fromdate = urlencode($this->input->post('fromdate'));
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=408&nn='.$nickname.'&p='.$pages.'&ts='.$todate.'&te='.$fromdate);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function  bonuscandy()
    {
        $list = $this->eventminigame_model->get_list_bonus_candy_slot_free();
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/logminigame/bonuscandy';
        $this->load->view('admin/main', $this->data);
    }

   function detailphientaixiu(){
       $phien = $this->uri->rsegment('3');
       $this->data['phien'] = $phien;
       $this->data['temp'] = 'admin/logminigame/detailphientaixiu';
       $this->load->view('admin/main', $this->data);
   }

    function detailphientaixiuajax(){
        $phientx = urlencode($this->input->post("phientx"));
        $nickname = urlencode($this->input->post("nickname"));
        $cuadat =  $this->input->post("cuadat");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=506&nn='.$nickname.'&rid='.$phientx.'&bs='.$cuadat.'&mt='.$money.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function logcaothap(){
      $this->data['temp'] = 'admin/logminigame/logcaothap';
      $this->load->view('admin/main', $this->data);
    }
    function logcaothapajax(){
        $phienbc = urlencode($this->input->post("phienbc"));
        $nickname = urlencode($this->input->post("nickname"));
        $roomvin =  $this->input->post("roomvin");
        $roomxu =  $this->input->post("roomxu");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        if($money == 1){
            $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=503&nn='.$nickname.'&tid='.$phienbc.'&r='.$roomvin.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        }else if($money == 0){
            $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=503&nn='.$nickname.'&tid='.$phienbc.'&r='.$roomxu.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        }

        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }

    function logminipoker(){

        $this->data['temp'] = 'admin/logminigame/logminipoker';
        $this->load->view('admin/main', $this->data);
    }
    function logminipokerajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $roomvin =  $this->input->post("roomvin");
        $roomxu =  $this->input->post("roomxu");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        if($money == 1){
            $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=504&nn='.$nickname.'&r='.$roomvin.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        }else if($money == 0){
            $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=504&nn='.$nickname.'&r='.$roomxu.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        }

        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function logphienbaucua(){

        $this->data['temp'] = 'admin/logminigame/logphienbaucua';
        $this->load->view('admin/main', $this->data);
    }

    function logphienbaucuaajax(){
        $phienbc = urlencode($this->input->post("phienbc"));
        $room =  $this->input->post("room");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=119&rid='.$phienbc.'&r='.$room.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function logbaucua(){

        $this->data['temp'] = 'admin/logminigame/logbaucua';
        $this->load->view('admin/main', $this->data);
    }
    function logbaucuaajax(){
        $phienbc = urlencode($this->input->post("phienbc"));
        $nickname = urlencode($this->input->post("nickname"));
        $roomvin =  $this->input->post("roomvin");
        $roomxu =  $this->input->post("roomxu");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        if($money == 1){
            $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=501&nn='.$nickname.'&rid='.$phienbc.'&r='.$roomvin.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        }else if($money == 0){
            $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=501&nn='.$nickname.'&rid='.$phienbc.'&r='.$roomxu.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        }

        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function detailbaucua()
    {
        $rid = $this->uri->segment('4');
        $this->data['rid'] = $rid;
        $this->data['temp'] = 'admin/logminigame/detailbaucua';
        $this->load->view('admin/main', $this->data);
    }

    function detailbaucuaajax(){
        $phienbc = $this->input->post("phienbc");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=502&rid='.$phienbc.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function logpokego()
    {
        $this->data['temp'] = 'admin/logminigame/logpokego';
        $this->load->view('admin/main', $this->data);
    }
    function logpokegoajax(){
        $phienbc = urlencode($this->input->post("phienbc"));
        $nickname = urlencode($this->input->post("nickname"));
        $roomvin =  $this->input->post("roomvin");
        $roomxu =  $this->input->post("roomxu");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
        if($money == 1){
            $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=121&un='.$nickname.'&rid='.$phienbc.'&bv='.$roomvin.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        }else if($money == 0){
            $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=121&un='.$nickname.'&rid='.$phienbc.'&bv='.$roomxu.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&mt='.$money.'&p='.$pages);
        }

        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function logkhobau()
    {
        $this->data['temp'] = 'admin/logminigame/logkhobau';
        $this->load->view('admin/main', $this->data);
    }
    function logkhobauajax(){
        $phienbc = urlencode($this->input->post("phienbc"));
        $nickname = urlencode($this->input->post("nickname"));
        $roomvin =  $this->input->post("roomvin");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=122&un='.$nickname.'&rid='.$phienbc.'&bv='.$roomvin.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&p='.$pages.'&gn=KhoBau');
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function lognudiepvien()
    {
        $this->data['temp'] = 'admin/logminigame/lognudiepvien';
        $this->load->view('admin/main', $this->data);
    }
    function lognudiepvienajax(){
        $phienbc = urlencode($this->input->post("phienbc"));
        $nickname = urlencode($this->input->post("nickname"));
        $roomvin =  $this->input->post("roomvin");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=122&un='.$nickname.'&rid='.$phienbc.'&bv='.$roomvin.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&p='.$pages.'&gn=NuDiepVien');
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function logavenger()
    {
        $this->data['temp'] = 'admin/logminigame/logavenger';
        $this->load->view('admin/main', $this->data);
    }
    function logavengerajax(){
        $phienbc = urlencode($this->input->post("phienbc"));
        $nickname = urlencode($this->input->post("nickname"));
        $roomvin =  $this->input->post("roomvin");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=122&un='.$nickname.'&rid='.$phienbc.'&bv='.$roomvin.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&p='.$pages.'&gn=SieuAnhHung');
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }

    function logvuongquocvin()
    {
        $this->data['temp'] = 'admin/logminigame/logvuongquocvin';
        $this->load->view('admin/main', $this->data);
    }
    function logvuongquocvinajax(){
        $phienbc = urlencode($this->input->post("phienbc"));
        $nickname = urlencode($this->input->post("nickname"));
        $roomvin =  $this->input->post("roomvin");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=122&un='.$nickname.'&rid='.$phienbc.'&bv='.$roomvin.'&ts='.urlencode($toDate).'&te='.urlencode($fromDate).'&p='.$pages.'&gn=VuongQuocVin');
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
}

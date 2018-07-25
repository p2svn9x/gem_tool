<?php

Class Event extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
//        $this->load->model('eventminigame_model');
        $this->load->model('admin_model');
        $this->load->model('usergame_model');
        $this->load->model('logadmin_model');
    }
    function index(){
        $this->data['temp'] = 'admin/event/index';
        $this->load->view('admin/main', $this->data);
    }
    function addrotate()
    {
        if ($this->input->post()) {
            $name = $this->input->post('name');
            $info = $this->eventminigame_model->get_info_rotate($name);
            $this->data['info'] = $info;

        }
        $this->data['temp'] = 'admin/event/addrotate';
        $this->load->view('admin/main', $this->data);
    }
    function insertrotate(){

        $info = $this->usergame_model->get_info_nickname($this->input->post('nickname'));
        if ($info != false) {
            foreach($info as $row){
                $data = array(
                    'user_id' => $row->id,
                    'nick_name' => $row->nick_name,
                    'rotate_free' => $this->input->post('numadd')
                );
                $this->eventminigame_model->create($data);
            }
            echo json_encode( "Bạn thêm số vòng quay thành công" );
        }else{

            echo json_encode( "Nick name không tồn tại!" );
        }
    }
    function updaterotate(){
        $name = $this->input->post('nickname');
        $info = $this->eventminigame_model->get_info_rotate($name);
        $this->data['info'] = $info;
        if ($info != false) {
            foreach($info as $row){
                $data = array(
                    'rotate_free' => $row->rotate_free +  $this->input->post('numupdate')
                );
                $this->eventminigame_model->update($this->input->post('nickname'),$data);
            }
            echo json_encode( "Bạn thêm số vòng quay thành công" );
        }else{

            echo json_encode( "Nick name không tồn tại!" );
        }

    }
    function vippoint(){
        $this->data['temp'] = 'admin/event/vippoint';
        $this->load->view('admin/main', $this->data);
    }
    function uservippoint(){
        $this->data['temp'] = 'admin/event/uservippoint';
        $this->load->view('admin/main', $this->data);
    }
    function vippointajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $value = $this->input->post("value");
        $type = $this->input->post("type");
        $pages = $this->input->post("pages");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $account = $this->input->post("account");
        $datainfo = file_get_contents($this->config->item('api_backend').'?c=130&nn='.$nickname.'&va='.$value.'&type='.$type.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&bt='.$account.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }

    function uservippointajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $sort = $this->input->post("sort");
        $field = $this->input->post("field");
        $pages = $this->input->post("pages");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $account = $this->input->post("account");
        $datainfo = file_get_contents($this->config->item('api_backend').'?c=131&nn='.$nickname.'&srt='.$sort.'&fd='.$field.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&bt='.$account.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;

        }else{
            echo "Bạn không được hack";
        }

    }
    function addbotcaothap(){
        $this->data['temp'] = 'admin/event/addbotcaothap';
        $this->load->view('admin/main', $this->data);
    }

    function addbotcaothapajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $room = $this->input->post("room");
        $prize = urlencode($this->input->post("prize"));
        $labai = $this->input->post("labai");
        $datainfo = file_get_contents($this->config->item('api_backend').'?c=1995&nn='.$nickname.'&cr='.$labai.'&bv='.$room.'&pz='.$prize);

        if(isset($datainfo)) {
            echo $datainfo;

        }else{
            echo "Bạn không được hack";
        }

    }

    function getnicknameajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=716&nn=' . $nickname);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function listbossxocdia(){

        $this->data['temp'] = 'admin/event/listbossxocdia';
        $this->load->view('admin/main', $this->data);
    }
    function listbossxocdiaajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $money = urlencode($this->input->post("money"));
        $room = urlencode($this->input->post("room"));
        $status = urlencode($this->input->post("status"));
        if($room == "" && $money != ""){
           $room = -1;
        }elseif($room != "" && $money == ""){
            $money = -1;
        }elseif($room == "" && $money == ""){
            $room = -1;
            $money = -1;

        }
        $datainfo = file_get_contents($this->config->item('api_backend2') . '?c=21&nn='.$nickname.'&r='.$room.'&st='.$status.'&mn='.$money);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function listbonusnhiemvu(){

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
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['temp'] = 'admin/event/listbonusnhiemvu';
        $this->load->view('admin/main', $this->data);
    }
    function listbonusnhiemvuajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $money = urlencode($this->input->post("money"));
        $gamename = urlencode($this->input->post("gamename"));
        $toDate = urlencode($this->input->post("toDate"));
        $fromDate = urlencode($this->input->post("fromDate"));
        $pages = $this->input->post("pages");
        $datainfo = file_get_contents($this->config->item('api_backend2') . '?c=160&nn='.$nickname.'&gn='.$gamename.'&mt='.$money.'&mn='.$money.'&ts='.$toDate.'&te='.$fromDate.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function topthanhdu(){
//        echo 1;die;
//        $accesstoken = $this->session->userdata('accessToken');
//        $day= '2018-03-02';
//        $type = 1;
//        echo $this->config->item('api_url') . '?c=103&date='.$day.'&type='.$type.'&at='.$accesstoken[0];die;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $month = null;
        $day = null;
        if ($this->input->post('txtmonth')) {
            $month = $this->input->post('txtmonth');
        }

        if ($this->input->post('txtday')) {
            $day = $this->input->post('txtday');
        }

        if ($month === null) {
            $month = date('Y-m');
        }
        if ($day === null) {
            $day = date('Y-m-d');
        }
        $this->data['month'] = $month;
        $this->data['day'] = $day;
        $this->data['temp'] = 'admin/event/topthanhdu';
        $this->load->view('admin/main', $this->data);
    }

    function topthanhduajax(){
        $month = urlencode($this->input->post("month"));
        $day = urlencode($this->input->post("day"));
        $type = urlencode($this->input->post("type"));
        $top = urlencode($this->input->post("top"));
        $page = urlencode($this->input->post("pages"));
        $limit = urlencode($this->input->post("limit"));
        $accesstoken = $this->session->userdata('accessToken');
        if($top == 1){
            $datainfo = file_get_contents($this->config->item('api_backend') . '?c=410&date='.$day.'&type='.$type.'&at='.$accesstoken[0].'&lm='.$limit.'&p='.$page);
        }elseif($top == 0){
            $datainfo = file_get_contents($this->config->item('api_backend') . '?c=410&month='.$month.'&type='.$type.'&at='.$accesstoken[0].'&lm='.$limit.'&p='.$page);
        }

        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function deletethanhduajax(){
        $ids = urlencode($this->input->post("ids"));
        $accesstoken = $this->session->userdata('accessToken');
        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=411&id='.$ids.'&at='.$accesstoken[0]);
        echo $datainfo;
    }

    function thungphasanh(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $month = null;
        $day = null;
        if ($this->input->post('txtmonth')) {
            $month = $this->input->post('txtmonth');
        }

        if ($this->input->post('txtday')) {
            $day = $this->input->post('txtday');
        }

        if ($month === null) {
            $month = date('Y-m');
        }
        if ($day === null) {
            $day = date('Y-m-d');
        }
        $this->data['month'] = $month;
        $this->data['day'] = $day;
        $this->data['temp'] = 'admin/event/thungphasanh';
        $this->load->view('admin/main', $this->data);
    }

    function thungphasanhajax(){
        $month = urlencode($this->input->post("month"));
        $day = urlencode($this->input->post("day"));
        $top = urlencode($this->input->post("top"));
        $limit = urlencode($this->input->post("limit"));
        $page = $this->input->post("pages") ? urlencode($this->input->post("pages")) : 1;
        $accesstoken = $this->session->userdata('accessToken');
//        echo $this->config->item('api_backend') . '?c=412&date='.$day.'&type=0&at='.$accesstoken[0].'&p='.$page,'&lm='.$limit;die;
        if($top == 1){
            $datainfo = file_get_contents($this->config->item('api_backend') . '?c=412&date='.$day.'&type=0&at='.$accesstoken[0].'&p='.$page.'&lm='.$limit);
        }elseif($top == 0){
            $datainfo = file_get_contents($this->config->item('api_backend') . '?c=412&month='.$month.'&type=1&at='.$accesstoken[0].'&p='.$page.'&lm='.$limit);
        }

        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }

    function deletecaothapjax(){
        $ids = urlencode($this->input->post("ids"));
        $accesstoken = $this->session->userdata('accessToken');
        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=413&id='.$ids.'&at='.$accesstoken[0]);
        echo $datainfo;
    }

    function toichontom(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $day = null;
        if ($this->input->post('txtday')) {
            $day = $this->input->post('txtday');
        }

        if ($day === null) {
            $day = date('Y-m-d');
        }
        $this->data['day'] = $day;
        $this->data['temp'] = 'admin/event/toichontom';
        $this->load->view('admin/main', $this->data);
    }

    function toichontomajax(){
        $day = urlencode($this->input->post("day"));
        $page = $this->input->post("pages") ? urlencode($this->input->post("pages")) : 1;
        $limit = urlencode($this->input->post("limit"));
        $accesstoken = $this->session->userdata('accessToken');
        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=414&date='.$day.'&at='.$accesstoken[0].'&p='.$page.'&lm='.$limit);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function deletetoichontomjax(){
        $ids = urlencode($this->input->post("ids"));
        $accesstoken = $this->session->userdata('accessToken');
        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=415&id='.$ids.'&at='.$accesstoken[0]);
        echo $datainfo;
    }


}
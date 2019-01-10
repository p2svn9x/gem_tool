<?php
Class Transaction extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
       // $this->load->model('freemoney_model');
		 $this->load->model('logadmin_model');
		    $this->load->model('sourcegiftcode_model');
        $this->load->model('useragent_model');

    }
    function  index(){
		
		set_time_limit(40);
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
            $start_time = date('Y-m-d', strtotime('-3 days'));
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['temp'] = 'admin/transaction/index';
        $this->load->view('admin/main', $this->data);
}

    function indexajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $toDate  = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $money = $this->input->post("money");
        $servicename = urlencode($this->input->post("servicename"));
        $pages = $this->input->post("pages");
		  $record = urlencode($this->input->post("record"));
		
		  $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=3&nn='.$nickname.'&un='."".'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) .'&mt='.$money.'&ag='.$servicename.'&sn='."".'&p='.$pages.'&lk=1&tr='.$record);
      //  $datainfo = $this->CallAPI("POST",$this->config->item('api_backend2').'?c=3&nn='.$nickname.'&un='."".'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) .'&mt='.$money.'&ag='.$servicename.'&sn='."".'&p='.$pages.'&lk=1&tr='.$record);
		
	
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function  logtranfer(){
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
        $this->data['temp'] = 'admin/transaction/logtranfer';
        $this->load->view('admin/main', $this->data);
    }
    function  logtranferajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $toDate  = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $type = $this->input->post("type");
        $pages = $this->input->post("pages");
        $old = $this->input->post("old");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=405&nn='.$nickname.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) .'&p='.$pages.'&type='.$type."&old=".$old);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
	function  logtranferdailytong()
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
            $start_time = date('Y-m-d 00:00:00');
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['temp'] = 'admin/transaction/logtranferdailytong';
        $this->load->view('admin/main', $this->data);
    }

    function  logtranferdailytongajax()
    {

       $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $nickname = $this->input->post("nickname");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2') . '?c=155&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) . '&p=' . $pages . '&nnr=tongdaily&tds=&st=&nns='.$nickname);
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
	
	
    function usergiftcode(){
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
            $start_time ="";
        }
        if ($end_time === null) {
            $end_time = "";
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
		$sourcemkt = $this->sourcegiftcode_model->get_source_gift_code_marketing_view();
        $sourcevh = $this->sourcegiftcode_model->get_source_gift_code_vanhanh();
        $sourcedl = $this->useragent_model->get_admin_gift_code();
        $this->data['sourcemkt'] = $sourcemkt;
        $this->data['sourcevh'] = $sourcevh;
        $this->data['sourcedl'] = $sourcedl;
        $this->data['temp'] = 'admin/transaction/usergiftcode';
        $this->load->view('admin/main', $this->data);
    }
    function usergiftcodeajax(){
        $nickname = urlencode($this->input->post("nickname"));
	
        $toDate  = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $money = $this->input->post("money");
        $pages = $this->input->post("pages");
	
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=3&nn='.$nickname.'&un='."".'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) .'&mt='.$money.'&ag=GiftCode&sn='."".'&p='.$pages.'&lk=1');
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function  freemoney(){
       
        $this->data['temp'] = 'admin/transaction/freemoney';
        $this->load->view('admin/main', $this->data);
    }
    function freemoneyajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $namegame  = $this->input->post("namegame");
        $money = $this->input->post("money");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=713&nn='.$nickname.'&mt='.$money.'&gn='.$namegame.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function openmoney(){

        $this->data['temp'] = 'admin/transaction/openmoney';
        $this->load->view('admin/main', $this->data);
    }

    function checkopenmoneyajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $namegame  = $this->input->post("namegame");
        $money = $this->input->post("money");
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=713&nn='.$nickname.'&mt='.$money.'&gn='.$namegame.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate));
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
     function openmoneyajax(){
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $sid = $this->input->post("sid");
        $nickname = $this->input->post("nickname");
        $gamename = $this->input->post("gamename");
        $room = $this->input->post("room");
        $money = $this->input->post("money");

        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=714&sid='.$sid);
        if(isset($datainfo)) {
            if($datainfo == 0){
                $data = array(
                    'account_name' => $admin_info->FullName,
                    'username' => $admin_info->UserName,
                    'action' => "Mở đóng băng tiền cho  tài khoản ".$nickname." ,game ".$gamename." , phòng ".$room." ,số tiền ".$money,
                );
                $this->logadmin_model->create($data);
            }
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	
	
    function checkopenmoney(){
            $nickname = $this->input->post('nickname');
            $info =   $list = $this->freemoney_model->get_info_freemoney($nickname);
        if($info != false){
            echo json_encode("Mở khóa đóng băng thành công");

        }
        else{
            echo json_encode("Không tồn tại nick name");
        }

    }
	
	
	
    function agentbuy(){
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
        $this->data['temp'] = 'admin/transaction/agentbuy';
        $this->load->view('admin/main', $this->data);
    }
    function agentbuyajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $pages = $this->input->post("pages");
		$record =  $this->input->post("record");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=118&nn='.$nickname.'&type='."2".'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&p='.$pages.'&tr='.$record);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function agentsale(){
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
        $this->data['temp'] = 'admin/transaction/agentsale';
        $this->load->view('admin/main', $this->data);
    }
    function agentsaleajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $pages = $this->input->post("pages");
		$record =  $this->input->post("record");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=118&nn='.$nickname.'&type='."1".'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&p='.$pages.'&tr='.$record);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function refundfee(){
        $this->data['temp'] = 'admin/transaction/refundfee';
        $this->load->view('admin/main', $this->data);
    }
    function refundfeeajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $month  = $this->input->post("month");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=712&nn='.$nickname.'&month='.$month);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	 function refundfeeagent(){
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=711');
        if(isset($datainfo)) {
            $data = array(
                'username' => $admin_info->UserName,
                'action' => "Hoàn trả phí đại lý"
            );
            $this->logadmin_model->create($data);
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function bonusds(){
        $this->data['temp'] = 'admin/transaction/bonusds';
        $this->load->view('admin/main', $this->data);
    }
    function bonusdsajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $month  = $this->input->post("month");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=725&nn='.$nickname.'&month='.$month);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function bonusagent(){
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=724');
        if(isset($datainfo)) {
            $data = array(
                'username' => $admin_info->UserName,
                'action' => "Trả thưởng top doanh số đại lý"
            );
            $this->logadmin_model->create($data);
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	 function huydoanhso(){
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
        $this->data['temp'] = 'admin/transaction/huydoanhso';
        $this->load->view('admin/main', $this->data);
    }
    function huydoanhsoajax(){
        $nickname = urlencode($this->input->post("nickname"));
        $nicknamere = urlencode($this->input->post("nicknamere"));
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $status = $this->input->post("status");
        $topds = $this->input->post("topds");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'?c=155&nns='.$nickname.'&nnr='.$nicknamere.'&st=' . $status.'&tds='.$topds.'&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate).'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    function doanhsoajax(){
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $nicknamesend = urlencode($this->input->post("ns"));
        $nicknamerecive = urlencode($this->input->post("nr"));
        $date = $this->input->post("date");
        $tds = $this->input->post("tds");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend').'?c=127&nns='.$nicknamesend.'&nnr=' . $nicknamerecive.'&t=' . urlencode($date) . '&tds='.$tds);
        if(isset($datainfo)) {
            echo $datainfo;
            if($tds == 1){
                $txtaction = "Cộng doanh số đại lý";
            }elseif ($tds == 0){
                $txtaction = "Trừ doanh số đại lý";
            }
            $data = array(
                 'account_name' => $nicknamesend.",".$nicknamerecive,
                'username' => $admin_info->UserName,
                'action' => $txtaction
            );
            $this->logadmin_model->create($data);
        }else{
            echo "Bạn không được hack";
        }
    }
	function  refundi2b()
    {
        $this->data['temp'] = 'admin/transaction/refundi2b';
        $this->load->view('admin/main', $this->data);
    }

    function  refundi2bajax()
    {
         $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $token = urlencode($this->input->post("token"));
        $datainfo = $this->curl->simple_get('http://wspay.xeng.club:18081/i2b?error_code=00&token=' . $token);
        if (isset($datainfo)) {
            $data = array(
                'account_name' => $admin_info->UserName,
                'username' => $admin_info->FullName,
                'action' => "Cập nhật giao dịch ngân lượng"
            );
            $this->logadmin_model->create($data);
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
	
	 function  freemoneyagent()
    {

        $this->data['temp'] = 'admin/transaction/freemoneyagent';
        $this->load->view('admin/main', $this->data);
    }

    function freemoneyagentajax()
    {
        $nickname = urlencode($this->input->post("nickname"));
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $pages = $this->input->post("pages");
        $status = $this->input->post("status");
        $display = $this->input->post("display");
        $act = $this->input->post("act");

        $datainfo = $this->curl->simple_get($this->config->item('api_backend2') . '?c=144&nn=' . $nickname . '&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) . '&p=' . $pages.'&st='.$status.'&n='.$display.'&act=' . urlencode($act) );
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
    function exportfreemoneyagent(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $nickname = urlencode($this->input->post("nickname"));
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $status = $this->input->post("status");
//        echo $this->config->item('api_backend2') . '?c=144&nn=' . $nickname . '&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) . '&p=1&st='.$status;die;
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2') . '?c=144&nn=' . $nickname . '&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) . '&p=1&st='.$status);
        $data = json_decode($datainfo);
//        print_r($data);die;
        $this->load->library('PHPExcel');
        $objPHPExcel = new PHPExcel();
        $BStyle = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Session Id')
            ->setCellValue('C1', 'Nickname')
            ->setCellValue('D1', 'Tiền đóng băng')
            ->setCellValue('E1', 'Thời gian')
            ->getStyle('B6:G6')->applyFromArray($BStyle);


        foreach ($data as $k=>$row) {
            $num = $k+2;
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $num, $num)
                ->setCellValue('B' . $num, $row->sessionId)
                ->setCellValue('C' . $num, $row->nickname)
                ->setCellValue('D' . $num, $row->money)
                ->setCellValue('E' . $num, date('d/m/Y H:i',$row->createTime/1000));
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="lichsudongbangdaily.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
	function openmoneyagentajax()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $sid = $this->input->post("sid");
        $nickname = $this->input->post("nickname");
        $money = $this->input->post("money");

        $datainfo = $this->curl->simple_get($this->config->item('api_backend') . '?c=145&sid=' . $sid);
        if (isset($datainfo)) {
            if ($datainfo == 0) {
                $data = array(
                    'account_name' => $admin_info->FullName,
                    'username' => $admin_info->UserName,
                    'action' => "Mở đóng băng tiền đại lý chuyển khoản cho  tài khoản " . $nickname . " ,số tiền " . $money,
                );
                $this->logadmin_model->create($data);
            }
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
	
	function  ratioagent()
    {
        $this->data['temp'] = 'admin/transaction/ratioagent';
        $this->load->view('admin/main', $this->data);
    }

    function  ratioagentajax()
    {
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2') . '?c=156');
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
    function  ratioajax()
    {
        $nickname = urlencode($this->input->post("nickname"));
        $ratio = urlencode($this->input->post("ratio"));
        $datainfo = $this->curl->simple_get($this->config->item('api_backend') . '?c=157&nn='.$nickname.'&per='.$ratio);
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
	
	function  logchuyendoivinngoc()
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
            $start_time = date('Y-m-d 00:00:00');
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['temp'] = 'admin/transaction/logchuyendoivinngoc';
        $this->load->view('admin/main', $this->data);
    }

    function logchuyendoivinngocajax()
    {

        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $nickname = urlencode($this->input->post("nickname"));
        $pages = $this->input->post("pages");
        $mid = $this->input->post("mid");
        $tid = urlencode($this->input->post("tid"));
        $tno = urlencode($this->input->post("tno"));
        $type = $this->input->post("type");
        $code = $this->input->post("code");
        $old = $this->input->post("old");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend') . '?c=29&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) . '&p=' . $pages . '&mid='.$mid.'&tid='.$tid.'&tno='.$tno.'&type='.$type.'&co='.$code.'&nn='.$nickname."&old=".$old);
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }

    }
	
	 function topdoanhso(){
        $this->data['temp'] = 'admin/transaction/topdoanhso';
        $this->load->view('admin/main', $this->data);
    }

    function topdoanhsoban(){
        $this->data['temp'] = 'admin/transaction/topdoanhso';
        $this->load->view('admin/main', $this->data);
    }
    function topdoanhsoajax(){
        $timestart = $this->input->post('timestart');
        $timeend = $this->input->post('timeend');
        $month = $this->input->post('month');
        $optinfo = $this->curl->simple_get($this->config->item('api_backend') . '?c=110&nn='.'&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend).'&month='. urlencode($month));
//        echo $this->config->item('api_backend') . '?c=110&nn='.'&ts=' . urlencode($timestart) . '&te=' . urlencode($timeend).'&month='. urlencode($month);
        if ($optinfo) {
            echo $optinfo;
        } else {
            echo "1001";
        }

    }

	 function  logtranferagenttodailytong()
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
            $start_time = date('Y-m-d 00:00:00');
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;
        $this->data['temp'] = 'admin/transaction/logtranferagenttodailytong';
        $this->load->view('admin/main', $this->data);
    }

    function  logtranferagenttodailytongajax()
    {

        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $nickname = $this->input->post("nickname");
        $pages = $this->input->post("pages");
        $datainfo = $this->get_data_curl($this->config->item('api_backend2') . '?c=155&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) . '&p=' . $pages . '&nnr='.$nickname.'&tds=&st=&nns=tongdaily');
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }

    }
	function sumrefundfee()
    {

        $this->data['temp'] = 'admin/transaction/sumrefundfee';
        $this->load->view('admin/main', $this->data);
    }
	 function logsmsnotifi(){
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
        $this->data['temp'] = 'admin/transaction/logsmsnotifi';
        $this->load->view('admin/main', $this->data);
    }

    function logsmsnotifiajax(){
        $toDate = $this->input->post("toDate");
        $fromDate = $this->input->post("fromDate");
        $sdt = urlencode($this->input->post("sdt"));
        $pages = $this->input->post("pages");
        $tid = urlencode($this->input->post("tid"));
        $status = urlencode($this->input->post("status"));
        $datainfo = $this->curl->simple_get($this->config->item('api_backend') . '?c=180&ts=' . urlencode($toDate) . '&te=' . urlencode($fromDate) . '&p=' . $pages .'&tid='.$tid.'&n='.$sdt.'&st='.$status);
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
	 function openfreezemoney(){

        $this->data['temp'] = 'admin/transaction/openfreezemoney';
        $this->load->view('admin/main', $this->data);
    }

    function openfreezemoneyajax(){
        $nickname = $this->input->post("nickname");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend') . '?c=33&nn=' . urlencode($nickname) . '&type=0');

        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
    function openfreezemoney1ajax(){
        $nickname = $this->input->post("nickname");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend') . '?c=33&nn=' . urlencode($nickname) . '&type=1');


        if (isset($datainfo)) {
            echo ($datainfo);
        } else {
            echo "Bạn không được hack";
        }
    }
	function userotp(){

    $this->data['temp'] = 'admin/transaction/userotp';
    $this->load->view('admin/main', $this->data);
    }

    function userotpajax(){
        $mobile = $this->input->post("mobile");
        $type = $this->input->post("type");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend') . '?c=37&m=' . urlencode($mobile) . '&type='.$type);


        if (isset($datainfo)) {
            echo ($datainfo);
        } else {
            echo "Bạn không được hack";
        }
    }

	
}
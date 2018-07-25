<?php

Class MY_Controller extends CI_Controller
{
    //bien gui du lieu sang ben view
    public $data = array();

    function __construct()
    {
        //ke thua tu CI_Controller
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        $controller = $this->uri->segment(1);
		  ini_set('max_execution_time', 0);
        switch ($controller) {
            case 'admin' : {
               // $this->output->cache(120);
                $linkapi = $this->config->item('api_backend');
                $this->data['linkapi'] = $linkapi;
                $api = $this->config->item('api');
                $this->data['api'] = $api;
                $this->load->helper('language');
                $this->lang->load('admin/common');
                $admin_login = $this->session->userdata('user_id_login');
                $this->data['login'] = $admin_login;
                //neu da dang nhap thi lay thong tin cua thanh vien
                //xu ly cac du lieu khi truy cap vao trang admin
				  $this->load->library('curl');
                $this->load->helper('admin');
                if ($admin_login) {
                     $this->load->model('admin_model');
                    $this->load->model('userrole_model');
                    $this->load->model('menurole_model');
					 $this->load->model('menu_model');
                    $admin_info = $this->admin_model->get_info($admin_login);
                    $this->data['admin_info'] = $admin_info;
                    $link1 = $this->uri->rsegment('1');
                    $link2 = $this->uri->rsegment('2');
                    if($link2 != "index"){
                        if($this->menu_model->get_menu_id($link1.'/'.$link2)) {
                            $menu_id = $this->menu_model->get_menu_id($link1 . '/' . $link2);
                            $this->data['role'] = $this->get_role_user($admin_login,$menu_id[0]->id);
                        }else{
                            $this->data['role'] = false;
                        }
                    }else{
                        if($this->menu_model->get_menu_id($link1)) {
                            $menu_id = $this->menu_model->get_menu_id($link1);
                            $this->data['role'] = $this->get_role_user($admin_login,$menu_id[0]->id);
                        }else{
                            $this->data['role'] = false;
                        }
                    }
                        $list = $this->GetMenuLeftByUser($admin_info->ID);
                        $this->data['menu_list'] = $list;
                }
                $this->_check_login();
                break;
            }
            case'tranfer':{
                $this->load->helper('language');
                $this->lang->load('tranfer/common');
                $this->load->helper('tranfer');
                $this->_check_login_tranfer();

                break;
            }
            default: {
            $this->load->helper('news_helper');
            $this->load->model('news_model');
            $this->load->model('tag_model');
            $this->load->model('catalog_model');
            $input = array();
            $input1 = array();
            $input1['order'] = array('sort_order', 'ASC');
            $catalog_list = $this->catalog_model->get_list($input1);
            $tag_list = $this->tag_model->get_list($input1);
            $this->data['catalog_list'] = $catalog_list;
            $this->data['tag_list'] = $tag_list;
            $input['limit'] = array(5, 0);
            $news_list = $this->news_model->get_list($input);
            $this->data['news_list'] = $news_list;

            }

        }
    }

    /*
     * Kiem tra trang thai dang nhap cua admin
     */
    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('user_id_login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if ($login && $controller == 'login') {
            redirect(admin_url('home'));
        }
    }
    private function _check_login_tranfer()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('user_tranfer_login');

        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if (!$login && $controller != 'login') {
            redirect(tranfer_url('login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if ($login && $controller == 'login') {
            redirect(tranfer_url('home'));
        }
    }


   function GetMenuLeftByUser($user_id)
    {
        $this->load->model('admin_model');
        $this->load->model('userrole_model');
        $this->load->model('menurole_model');
        $str = "";
            //lấy group_id theo userid
            $list_group_id = $this->userrole_model->get_list_role_by_userid($user_id);

            if (!empty($list_group_id)) {
                foreach ($list_group_id as $group_id_item) {
                    //lấy danh sách các menu_id theo group id
                    $list_menu = $this->menurole_model->get_list_menu_id_by_group($group_id_item->Group_ID);
                    if (!empty($list_menu)) {
                        //lấy ra tên menu theo menu id
                        foreach ($list_menu as $menu_item) {
                            $list_name = $this->menu_model->get_list_menu_name_by_menu_id($menu_item->Menu_ID);
                            if (!empty($list_name)) {
                                foreach ($list_name as $menu_name_item) {
                                    $list_menu_child = $this->menu_model->get_list_menu_name_by_parrent_id($menu_item->Menu_ID, $group_id_item->Group_ID);
                                    $arraylink = array();
                                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                    if (!empty($list_menu_child)) {
                                    foreach ($list_menu_child as $menu_child_item) {
                                        if($actual_link == admin_url($menu_child_item->Link) ){
                                            array_push($arraylink,admin_url($menu_child_item->Link));}
                                    }
                                    }
                                    $result = implode(' ', $arraylink);
                                    if($result == $actual_link ){
                                        $str .= "<li class='arrow-up'>";
                                        $str .= "<a href=".admin_url($menu_name_item->Link)."><span class=\"gw-menu-text\">".$menu_name_item->Name."</span> <b class=\"gw-arrow\"></b></a>";
                                        if (!empty($list_menu_child)) {
                                            $str .= "<ul class=\"gw-submenu\"style = 'display:block' >";
                                            foreach ($list_menu_child as $menu_child) {
                                                $str .= "<li><a href=".admin_url($menu_child->Link).">$menu_child->Name</a></li>";
                                            }
                                            $str .= "</ul>";
                                        }
                                        $str .= " </li>";
                                    }else{
                                        $str .= "<li class='init-arrow-down'>";
                                        $str .= "<a href=".admin_url($menu_name_item->Link)."><span class=\"gw-menu-text\">".$menu_name_item->Name."</span> <b class=\"gw-arrow\"></b></a>";
                                        if (!empty($list_menu_child)) {
                                            $str .= "<ul class=\"gw-submenu\" >";
                                            foreach ($list_menu_child as $menu_child) {
                                                $str .= "<li><a href=".admin_url($menu_child->Link).">$menu_child->Name</a></li>";
                                            }
                                            $str .= "</ul>";
                                        }
                                        $str .= " </li>";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        return $str;
    }
	function get_role_user($user_id,$menu_id){
        $this->load->model('userrole_model');
        $role = $this->userrole_model->get_list_role_menu($user_id,$menu_id);
        return $role;
    }

    function Check_Url_Admin($current_url)
    {
        $this->load->model('accesslink_model');
        //lấy id của user đăng nhập
        $admin_login = $this->session->userdata('user_id_login');
        //lấy tất cả các link của user đó
        $list_link = $this->accesslink_model->get_list_linkacess_userid($admin_login);

        //lấy url hiện tại
        $stack = array();
        if(!empty($list_link)){
        foreach ($list_link as $item) {
            array_push($stack, $item->Link);
        }}
        if (in_array($current_url, $stack)) {
            return true;
        } else {
            return false;
        }
    }

    function create_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    public function init_pagination($base_url, $total_rows, $per_page = 100, $segment)
    {
        $ci =& get_instance();
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config["uri_segment"] = $segment;
        $config['next_link'] = 'Trang kế tiếp';
        $config['prev_link'] = 'Trang trước';
        $ci->pagination->initialize($config);
        return $config;
    }
    function dateDiff($start, $end) {
        date_default_timezone_set('Asia/Bangkok');
        $start_ts = strtotime($start);
        $end_ts = strtotime($end);
        $diff = $end_ts - $start_ts;
        return round($diff / 86400);
    }


    function rand_string( $length ) {
    $str = "";
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $size = strlen( $chars );
    for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
    }
    return $str;
}
    function mb_strrev($str, $encoding="utf-8")
    {
        $ret = "";
        for($i=mb_strlen($str, $encoding)-1; $i >= 0; $i--) {
            $ret .= mb_substr($str, $i, 1, $encoding);
        }
        return $ret;
    }
	
	function get_data_curl($url){
          $ch = curl_init();
    $timeout = 1000;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
    }
	
	 function get_client_ip() {
      foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe

                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
    }
	
	function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}

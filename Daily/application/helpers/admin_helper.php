<?php
//tao ra cac link trong admin
function admin_url($url = '')
{
    return base_url('admin/'.$url);
}
function Check_Url_Admin($current_url)
{
    $this->load->model('accesslink_model');
    //lấy id của user đăng nhập
    $admin_login = $this->session->userdata('user_id_login');
    $this->data['login'] = $admin_login;
    //lấy tất cả các link của user đó
    $list_link = $this->accesslink_model->get_list_linkacess_userid($admin_login->ID);
    //lấy url hiện tại
    foreach($list_link as $item)
    {
        if($item !=$current_url)
        {
            return false;
        }
    }
}
function readURLAPI($url) {
    $ch = curl_init();
    $timeout = 1000;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}
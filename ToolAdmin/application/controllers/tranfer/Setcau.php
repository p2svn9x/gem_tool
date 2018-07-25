<?php
Class Setcau extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('usertranfer_model');
        $this->load->model('logadmin_model');



    }

    function index()
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
        $this->data['temp'] = 'tranfer/setcau/index';
        $this->load->view('tranfer/main', $this->data);
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
        $this->load->view('tranfer/setcau/setcauedit', $this->data);
    }

    function setcauadd()
    {
        $this->load->view('tranfer/setcau/setcauadd', $this->data);
    }

    function getcauadd()
    {
        $admin_login = $this->session->userdata('user_tranfer_login');
        $admin_info = $this->usertranfer_model->get_info($admin_login);
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
        file_put_contents('public/admin/taixiu.dat', $code . "\n", FILE_APPEND);
        echo "Bạn thêm cầu tài xỉu thành công";
        $data = array(
            'action' => " Thêm cầu tài xỉu",
            'username' => $admin_info->username
        );
        $this->logadmin_model->create($data);
    }

    function getcauedit()
    {
        $admin_login = $this->session->userdata('user_tranfer_login');
        $admin_info = $this->usertranfer_model->get_info($admin_login);

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
                'username' => $admin_info->username
            );
            $this->logadmin_model->create($data);

        }
    }

    function delete()
    {
        $admin_login = $this->session->userdata('user_tranfer_login');
        $admin_info = $this->usertranfer_model->get_info($admin_login);
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
        redirect(tranfer_url('setcau/index'));

    }
}

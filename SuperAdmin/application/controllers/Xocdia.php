<?php
Class Xocdia extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('logadmin_model');



    }

    function index()
    {
        $this->load->helper("url");
        // you can change the location of your file wherever you want
        $list = file('public/admin/xocdia.dat');
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
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/xocdia/index';
        $this->load->view('admin/main', $this->data);
    }

    function setcauedit()
    {
        $id = $this->uri->rsegment('3');
        $this->load->helper("url");
        // you can change the location of your file wherever you want
        $list = file('public/admin/xocdia.dat');


        $this->data['list'] = $list[$id];
        $this->data['key'] = $id;
        //   $this->data['temp'] = 'admin/logminigame/setcau';
        $this->load->view('admin/xocdia/setcauedit', $this->data);
    }

    function setcauadd()
    {
        $this->load->view('admin/xocdia/setcauadd', $this->data);
    }

    function getcauadd()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $code = $this->input->post('code');
        $MyFile = file('public/admin/xocdia.dat');
        if ($code == null) {
            echo "Bạn chưa nhập cầu xóc đĩa";
            die();
        } else {
            foreach ($MyFile as $item) {
                $item = (preg_replace("/\r|\n/", "", $item));
                if ($code == $item) {
                    echo "Bạn nhập trùng cầu xóc đĩa rồi";
                    die();
                }
            }
        }
        file_put_contents('public/admin/xocdia.dat', $code . "\n", FILE_APPEND);
        $data = array(
            'action' => " Thêm cầu xóc đĩa",
            'username' => $admin_info->UserName
        );
        $this->logadmin_model->create($data);
        $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn thêm cầu xóc đĩa thành công</label></div>');
        echo json_encode("Bạn thêm cầu xóc đĩa thành công");
    }

    function getcauedit()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);

        $code = $this->input->post('code');
        $key = $this->input->post('key');
        $MyFile = file('public/admin/xocdia.dat');
        foreach ($MyFile as $item) {
            $item = (preg_replace("/\r|\n/", "", $item));
            if ($code == $item) {
                echo "Bạn nhập trùng cầu xóc đĩa rồi";
                die();
            }
        }
        if ($MyFile[$key] != "") {
            $arr2 = array($key => $code . "\n");
            $abc = array_replace_recursive($MyFile, $arr2);
            file_put_contents('public/admin/xocdia.dat', $abc);
            $data = array(
                'action' => " Sửa cầu xóc đĩa",
                'username' => $admin_info->UserName
            );
            $this->logadmin_model->create($data);
            $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn sửa cầu xóc đĩa thành công</label></div>');
            echo json_encode("Bạn sửa cầu xóc đĩa thành công");
        }
    }

    function delete()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $id = $this->uri->rsegment('3');
        $MyFile = file('public/admin/xocdia.dat');
        $arr2 = array($id => "");
        $abc = array_replace_recursive($MyFile, $arr2);
        file_put_contents('public/admin/xocdia.dat', $abc);
        $data = array(
            'action' => " Xóa cầu xóc đĩa",
            'username' => $admin_info->UserName
        );
        $this->logadmin_model->create($data);
        $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn xóa cầu xóc đĩa thành công</label></div>');
        redirect(base_url('xocdia'));

    }
}

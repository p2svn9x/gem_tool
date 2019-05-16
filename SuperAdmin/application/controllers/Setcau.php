<?php
Class Setcau extends MY_Controller
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
        $list = file('public/admin/taixiu.dat');
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
        $this->data['temp'] = 'admin/setcau/index';
        $this->load->view('admin/main', $this->data);
    }

    function setcauedit()
    {
        $id = $this->uri->rsegment('3');
        $this->load->helper("url");
        // you can change the location of your file wherever you want
        $list = file('public/admin/taixiu.dat');


        $this->data['list'] = $list[$id];
        $this->data['key'] = $id;
        //   $this->data['temp'] = 'admin/logminigame/setcau';
        $this->load->view('admin/setcau/setcauedit', $this->data);
    }

    function setcauadd()
    {
        $this->load->view('admin/setcau/setcauadd', $this->data);
    }

    function getcauadd()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $code = $this->input->post('code');
        $MyFile = file('public/admin/taixiu.dat');
        if ($code == null) {
            echo "Bạn chưa nhập cầu tài xỉu";
            die();
        } else {
            foreach ($MyFile as $item) {
                $item = (preg_replace("/\r|\n/", "", $item));
//                if ($code == $item) {
//                    echo "Bạn nhập trùng cầu tài xỉu rồi";
//                    die();
//                }
            }
        }
        file_put_contents('public/admin/taixiu.dat', $code . "\n", FILE_APPEND);
        $data = array(
            'action' => " Thêm cầu tài xỉu",
            'username' => $admin_info->UserName
        );
        $this->logadmin_model->create($data);
        $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn thêm cầu tài xỉu thành công</label></div>');
        echo json_encode("Bạn thêm cầu tài xỉu thành công");
    }

    function getcauedit()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
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
            $data = array(
                'action' => " Sửa cầu tài xỉu",
                'username' => $admin_info->UserName
            );
            $this->logadmin_model->create($data);
            $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn sửa cầu tài xỉu thành công</label></div>');
            echo json_encode("Bạn sửa cầu tài xỉu thành công");
        }
    }

    function delete()
    {
        $admin_login = $this->session->userdata('user_admintransfer_login');
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
        $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn xóa cầu tài xỉu thành công</label></div>');
        redirect(base_url('setcau'));

    }

    function uploadfiletaixiu()
    {
        $this->data['error'] = "";

        if ($this->input->post("ok")) {
            if (file_exists(FCPATH . "public/admin/taixiu.dat") != false) {
                unlink(FCPATH . 'public/admin/taixiu.dat');
            }
            $temp = explode(".", $_FILES["filedat"]["name"]);
            $extension = end($temp);
            if ($extension == "dat") {
                $config = array("");
                $config['upload_path'] = './public/admin';
                $config['allowed_types'] = '*';
                $config['max_size'] = 1024 * 8;
                $config['overwrite'] = TRUE;
                $config['file_name'] = 'taixiu';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('filedat')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->data['error'] = "Bạn chưa chọn file hoặc không được phân quyền";

                } else {
                    $this->data['error'] = "";
                    $data = array('upload_data' => $this->upload->data());

                    $this->data['error'] = "Upload file thành công";
                }
            } else {
                $this->data['error'] = "Bạn chưa chọn file hoặc không chọn đúng file .dat";
            }
//            }
        }


        $this->data['temp'] = 'admin/setcau/uploadfile';
        $this->load->view('admin/main', $this->data);
    }
}

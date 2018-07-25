<?php

Class Action extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('actionadmin_model');
    }
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $list = $this->actionadmin_model->get_list();
        $this->data['list'] = $list;
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        //load view
        $this->data['temp'] = 'admin/action/index';
        $this->load->view('admin/main', $this->data);
    }
    /*
     * Them moi du lieu
     */
    function add()
    {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('name');
                //luu du lieu can them
                $data = array(
                    'action' => $name,
                );
                //them moi vao csdl
                if ($this->actionadmin_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('action'));
            }
        }
        $this->data['temp'] = 'admin/action/add';
        $this->load->view('admin/main', $this->data);
    }
    /*
     * Cập nhật du lieu
     */
    function edit()
    {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->actionadmin_model->get_info($id);
        if (!$info) {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('tag'));
        }
        $this->data['info'] = $info;
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('name');
                //luu du lieu can them
                $data = array(
                    'action' => $name,
                );
                //them moi vao csdl
                if ($this->actionadmin_model->update($id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('action'));
            }
        }
        //lay danh sach danh muc cha
        $this->data['temp'] = 'admin/action/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Xoa danh mục
     */
}

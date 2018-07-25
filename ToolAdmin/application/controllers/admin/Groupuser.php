<?php

Class Groupuser extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('groupuser_model');
        $this->load->model('menurole_model');

    }
    /*
     * Lay danh sach admin
     */
    function index()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $url = $this->router->fetch_class();
        if ($this->Check_Url_Admin($url)) {
            $input = array();
            $list = $this->groupuser_model->get_list($input);
            $this->data['list'] = $list;
            //lay tổng số bản ghi
            $total = $this->groupuser_model->get_total();
            $this->data['total'] = $total;
            //lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $this->data['temp'] = 'admin/groupuser/index';
            $this->load->view('admin/main', $this->data);
        } elseif ($admin_info->Status == "A") {
            $input = array();
            $list = $this->groupuser_model->get_list($input);
            $this->data['list'] = $list;
            //lay tổng số bản ghi
            $total = $this->groupuser_model->get_total();
            $this->data['total'] = $total;

            //lay nội dung của biến message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $this->data['temp'] = 'admin/groupuser/index';
            $this->load->view('admin/main', $this->data);
        } else {
            $this->data['list'] = null;
            $this->data['temp'] = 'admin/groupuser/index';
            $this->load->view('admin/main', $this->data);
        }
    }

    /*
         * Thêm mới quản trị viên
         */
    function add()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        // $url= substr($_SERVER['REQUEST_URI'],18,strlen($_SERVER['REQUEST_URI'])-18);
        $url = $this->router->fetch_class();
        if ($this->Check_Url_Admin($url)) {
            $this->load->library('form_validation');
            $this->load->helper('form');
            //neu ma co du lieu post len thi kiem tra
            if ($this->input->post()) {
                $this->form_validation->set_rules('name', 'Tên nhóm', 'required');
                //nhập liệu chính xác
                if ($this->form_validation->run()) {
                    //them vao csdl
                    $name = $this->input->post('name');
                    $description = $this->input->post('description');
                    $data = array(
                        'name' => $name,
                        'description' => $description,
                    );
                    if ($this->groupuser_model->create($data)) {
                        //tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    //chuyen tới trang danh sách quản trị viên
                    redirect(admin_url('groupuser'));
                }
            }
            $this->data['temp'] = 'admin/groupuser/add';
            $this->load->view('admin/main', $this->data);
        } elseif ($admin_info->Status == "A") {
            $this->load->library('form_validation');
            $this->load->helper('form');
            //neu ma co du lieu post len thi kiem tra
            if ($this->input->post()) {
                $this->form_validation->set_rules('name', 'Tên nhóm', 'required');
                //nhập liệu chính xác
                if ($this->form_validation->run()) {
                    //them vao csdl
                    $name = $this->input->post('name');
                    $description = $this->input->post('description');
                    $data = array(
                        'name' => $name,
                        'description' => $description,
                    );
                    if ($this->groupuser_model->create($data)) {
                        //tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    //chuyen tới trang danh sách quản trị viên
                    redirect(admin_url('groupuser'));
                }
            }
            $this->data['temp'] = 'admin/groupuser/add';
            $this->load->view('admin/main', $this->data);

        } else {
            $this->data['list'] = null;
            $this->data['temp'] = 'admin/groupuser/index';
            $this->load->view('admin/main', $this->data);
        }
    }
    function edit()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        // $url= substr($_SERVER['REQUEST_URI'],18,strlen($_SERVER['REQUEST_URI'])-18);
        $url = $this->router->fetch_class();
        //lay id cua quan tri vien can chinh sua
        if ($this->Check_Url_Admin($url)) {
            $id = $this->uri->rsegment('3');
            $id = intval($id);
            $this->load->library('form_validation');
            $this->load->helper('form');
            //lay thong cua quan trị viên
            $info = $this->groupuser_model->get_info($id);
            if (!$info) {
                $this->session->set_flashdata('message', 'Không tồn tại nhóm người dùng');
                redirect(admin_url('groupuser'));
            }
            $this->data['info'] = $info;
            if ($this->input->post()) {
                $this->form_validation->set_rules('name', 'Tên nhóm', 'required');
                if ($this->form_validation->run()) {
                    $name = $this->input->post('name');
                    $description = $this->input->post('description');
                    $data = array(
                        'name' => $name,
                        'description' => $description,
                    );
                    if ($this->groupuser_model->update($id, $data)) {
                        //tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Không cập nhật được');
                    }
                    //chuyen tới trang danh sách quản trị viên
                    redirect(admin_url('groupuser'));
                }
            }
            $this->data['temp'] = 'admin/groupuser/edit';
            $this->load->view('admin/main', $this->data);
        } elseif ($admin_info->Status == "A") {
            $id = $this->uri->rsegment('3');
            $id = intval($id);
            $this->load->library('form_validation');
            $this->load->helper('form');
            //lay thong cua quan trị viên
            $info = $this->groupuser_model->get_info($id);
            if (!$info) {
                $this->session->set_flashdata('message', 'Không tồn tại nhóm người dùng');
                redirect(admin_url('groupuser'));
            }
            $this->data['info'] = $info;
            if ($this->input->post()) {
                $this->form_validation->set_rules('name', 'Tên nhóm', 'required');
                if ($this->form_validation->run()) {
                    $name = $this->input->post('name');
                    $description = $this->input->post('description');
                    $data = array(
                        'name' => $name,
                        'description' => $description,
                    );
                    if ($this->groupuser_model->update($id, $data)) {
                        //tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Không cập nhật được');
                    }
                    //chuyen tới trang danh sách quản trị viên
                    redirect(admin_url('groupuser'));
                }
            }
            $this->data['temp'] = 'admin/groupuser/edit';
            $this->load->view('admin/main', $this->data);
        } else {
            $this->data['list'] = null;
            $this->data['temp'] = 'admin/groupuser/index';
            $this->load->view('admin/main', $this->data);
        }
    }
//xóa dữ liệu nhóm người dùng
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        //lay thong tin cua quan tri vien
        $info = $this->groupuser_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại nhóm người dùng');
            redirect(admin_url('groupuser'));
        }
        //thuc hiện xóa
        $this->groupuser_model->delete($id);

        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('groupuser'));
    }
    function  role()
    {
        //load model
        $this->load->model('admin_model');
        $this->load->model('menu_model');
        $this->load->model('accesslink_model');
        $group_id = $this->uri->rsegment('3');
        $group_id = intval($group_id);
        $list = $this->get_list_role($group_id);
        $this->data['list'] = $list;
        //lây user_id của session khi login vào
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        if ($this->input->post()) {
            $where = array('Group_ID' => $group_id);
            $this->menurole_model->del_rule($where);
            //lay thong cua menu role
            $name = $_POST['rolegroup'];
            foreach ($name as $menu_item) {
                $data = array(
                    'Menu_ID' => $menu_item,
                    'Group_ID' => $group_id,
                );
                $this->menurole_model->Create($data);
            }
            $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
            redirect(admin_url('groupuser'));
        }
        $this->data['temp'] = 'admin/groupuser/role';
        $this->load->view('admin/main', $this->data);
    }
    //danh sach menu trang index
    function get_list_role($menuid)
    {
        $str = "";
        $this->load->model('menu_model');
        $roles = $this->menu_model->get_category();
        foreach ($roles as $role) {
            $roles1 = $this->menurole_model->get_list_role_menu($menuid, $role->id);
            $str .= "<ul>";
            if ($roles1 != null) {
                $str .= " <li><input type='checkbox' name=\"rolegroup[]\"  checked value='$role->id' > $role->Name";
                $str .= $this->get_sub_list_role($menuid, $role->id);
                $str .= "</li>";
            } else {
                $str .= " <li><input type='checkbox' name=\"rolegroup[]\"  value='$role->id' > $role->Name";
                $str .= $this->get_sub_list_role($menuid, $role->id);
                $str .= "</li>";
            }
            $str .= "</ul>";
        }
        return $str;
    }
    function get_sub_list_role($menuid, $roleid)
    {
        $str = "";
        //$sub_roles = $this->menu_model->get_list_role_group_user_sub($roleid,$menuid);
        $sub_roles = $this->menu_model->get_subcategory($roleid);
        if ($sub_roles) {
            $stt = 1;
            foreach ($sub_roles as $sub_role) {
                $roles1 = $this->menurole_model->get_list_role_menu($menuid, $sub_role->id);
                //kiem tra get subcategory co ton ai hay

                $str .= "<ul style='margin-left: 25px;'>";
                if ($roles1 != null) {
                    $str .= " <li><input type='checkbox' name=\"rolegroup[]\" checked value='$sub_role->id'>$sub_role->Name</li>";
                } else {
                    $str .= " <li><input type='checkbox' name=\"rolegroup[]\" value='$sub_role->id'>$sub_role->Name</li>";
                }
                $str .= "</ul>";
            }
            return $str;
        }
    }
}

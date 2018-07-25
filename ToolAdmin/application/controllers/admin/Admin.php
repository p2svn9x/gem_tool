<?php

Class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('groupuser_model');
        $this->load->model('userrole_model');
        $this->load->model('menurole_model');
        $this->load->model('accesslink_model');
    }

    /*
     * Lay danh sach admin
     */
    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $input = "";

        $list = $this->admin_model->get_list_admin();

        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);

    }

    /*
     * Kiểm tra username đã tồn tại chưa
     */
    function check_username()
    {
        $username = $this->input->post('username');
        $where = array('username' => $username);
        //kiêm tra xem username đã tồn tại chưa
        if ($this->admin_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
            return false;
        }
        return true;
    }

    /*
     * Thêm mới quản trị viên
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $listrole = $this->groupuser_model->get_list();
        $this->data['listrole'] = $listrole;
        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);
    }

     function addadmin()
    {
        $info = $this->admin_model->get_info_admin($this->input->post('username'));
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        // insert vao db
        $data = array(
            'UserName' => $this->input->post('username'),
            'FullName' => $this->input->post('nickname'),
            'ID' => $this->input->post('iduser'),
            'Status' => $this->input->post('chucnang')
        );

        if ($info != false) {
            $this->session->set_flashdata('message', 'Tài khoản đã tồn tại');
            echo json_encode("0");
            die();
        } else {
            // $this->logadmin_model->create($this->logadmindata(1, $this->input->post('nickname'), $admin_info->username));
            $this->admin_model->create($data);
            if ($this->input->post('role') != null) {
                $where = array('FullName' =>  $this->input->post('nickname'));
                $user = $this->admin_model->get_info_rule($where);
                $data1 = array(
                    'User_ID' => $user->ID,
                    'Group_ID' => $this->input->post('role')
                );
                $this->userrole_model->create($data1);
            }
            $this->session->set_flashdata('message', ' Bạn thêm người dùng thành công');
            echo json_encode("2");
        }
    }
function addadminajax(){
        $nickname = urlencode($this->input->post('nickname'));
        $datainfo = file_get_contents($this->config->item('api_backend').'?c=103&nn='.$nickname.'&st=100&pr=');
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }

    }
    function getinfoajax(){
         $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $accesstoken = $this->session->userdata('accessToken');
        $nickname = urlencode($this->input->post('nickname'));
       // var_dump(base64_encode($accesstoken.'|'.$admin_info->FullName.'|'.'fU3z7wP0IeFOPntKXcRifUDTGbV8AXyI'));
        $options = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"Authorization:".base64_encode($accesstoken[0].'|'.$accesstoken[1].'|'.'fU3z7wP0IeFOPntKXcRifUDTGbV8AXyI')
            )
        );
        $context = stream_context_create($options);
        $datainfo = file_get_contents($this->config->item('api_backend2').'?c=102&nn='.$nickname,false, $context);
        if(isset($datainfo)) {

            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
    /*
     * Ham chinh sua thong tin quan tri vien
     */
    function edit()
    {
        //lay id cua quan tri vien can chinh sua
       $id = $this->uri->rsegment('3');
        $id = intval($id);

        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay thong cua quan trị viên
        $info = $this->admin_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(admin_url('admin'));
        }
        $this->data['info'] = $info;
        if ($this->input->post()) {
                $status = $this->input->post('typeaccount');
                $data = array(
                    'Status' => $status

                );
                if ($this->admin_model->update($id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách quản trị viên
               redirect(admin_url('admin'));

        }

        $this->data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/main', $this->data);
    }

    /*
     * Hàm xóa dữ liệu
     */


    function role()
    {
        $id = $this->uri->rsegment('3');
        //$user_id = intval($id);
        $this->load->library('form_validation');
        $this->load->helper('form');
        $info = $this->admin_model->get_info($id);
        $this->data['info'] = $info;
        $list = $this->get_list_role($id);
        $this->data['list'] = $list;
        // $list = $this->userrole_model->get_list($id);

        if ($this->input->post()) {

            $this->load->model('userrole_model');
            $where = array('User_ID' => $id);
            $this->userrole_model->del_rule($where);
            $name = $_POST['chbpr'];
            if (isset($_POST['chbpr'])) {
                foreach ($name as $value) {
                    $data = array(
                        'User_ID' => $id,
                        'Group_ID' => $value
                    );
                }

                $where = array('User_ID' => $id);
                $this->accesslink_model->del_rule($where);
                foreach ($name as $value) {
                    $list_rolemenu_item = $this->menurole_model->get_list_menu_id_by_group($value);

                    foreach ($list_rolemenu_item as $rolemenu) {
                        $list_menu_item = $this->menu_model->get_info($rolemenu->Menu_ID);

                        $dataaccesslink = array(
                            'Menu_ID' => $rolemenu->Menu_ID,
                            'Group_ID' => $value,
                            'User_ID' => $id,
                            'Link' => $list_menu_item->Link
                        );
                        $this->accesslink_model->Create($dataaccesslink);
                    }
                }
                if ($this->userrole_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                redirect(admin_url('admin'));
            }

        }
        $this->data['temp'] = 'admin/admin/role';
        $this->load->view('admin/main', $this->data);
    }

    function get_list_role($id)
    {
        $str = "";
        $input = array();
        $grouproles = $this->groupuser_model->get_list($input);
        foreach ($grouproles as $grouprole) {
            $roles = $this->userrole_model->get_list_role_user($id, $grouprole->Id);
            if ($roles != null) {

                $str .= "<ul>";
                $str .= " <li><input type='radio' id='chbprcheked'  checked value='$grouprole->Id' name='chbpr[]'> $grouprole->Name</span>";
                $str .= "</li></ul>";
            } else {

                $str .= "<ul>";
                $str .= " <li><input type='radio' id='chbprno'  value='$grouprole->Id' name='chbpr[]'> $grouprole->Name</span>";
                $str .= "</li></ul>";
            }

        }

        return $str;
    }

    function delete()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $nickname = $this->uri->rsegment('4');

        //lay thong tin cua quan tri vien
        $info = $this->admin_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(admin_url('admin'));
        }
        //thuc hiện xóa
        if($admin_info->ID == $id) {
            $this->session->set_flashdata('message', 'Bạn không được xóa chính mình');
            redirect(admin_url('admin'));
        }else{
            $this->admin_model->delete($id);
            $where = array("User_ID"=>$id);
            $this->userrole_model->del_rule($where);
             file_get_contents($this->config->item('api_backend').'?c=103&nn='.$nickname.'&st=0&pr=');
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        }
        redirect(admin_url('admin'));
    }

    /*
     * Thuc hien dang xuat
     */
    function logout()
    {
        if ($this->session->userdata('user_id_login')) {
            $this->session->unset_userdata('user_id_login');
        }
        redirect(admin_url('login'));
    }
}

<?php

Class Menu extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
    }

    /*
     * Lay danh sach admin
     */
    function index()
    {
        $list = $this->get_list_menu();
        $this->data['list'] = $list;
        //lay tổng số bản ghi
        $total = $this->menu_model->get_total();
        $this->data['total'] = $total;
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/menu/index';
        $this->load->view('admin/main', $this->data);
    }

    /*
         * Thêm mới quản trị viên
         */
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $list = $this->get_category();
        $this->data['list'] = $list;
        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
             $this->form_validation->set_rules('name', 'Tên menu', 'required');
            $this->form_validation->set_rules('param', 'Số thứ tự', 'required');
            $this->form_validation->set_rules('link', 'Đường dẫn', 'required');
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $name = $this->input->post('name');
                $param = $this->input->post('param');
                $link = $this->input->post('link');
                $parent_id = $this->input->post('ParentID');
                $isthuong = $this->input->post('displaytkthuong');
                $issuper = $this->input->post('displaytksuper');
                if (isset($_POST['Status'])) {
                    $status = 'A';
                } else {
                    $status = 'W';
                }
                $data = array(
                    'name' => $name,
                    'param' => $param,
                    'link' => $link,
                    'parrent_id' => $parent_id,
                    'isThuong' => $isthuong,
                    'isSuper' => $issuper,
                    'Status' => $status,
                );
                if ($this->menu_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(admin_url('menu'));
        }
		}
        $this->data['temp'] = 'admin/menu/add';
        $this->load->view('admin/main', $this->data);
    }
    function edit()
    {
        //lay id cua quan tri vien can chinh sua
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $list = $this->get_category_edit($id);
        $this->data['list'] = $list;
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay thong cua quan trị viên
        $info = $this->menu_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại menu');
            redirect(admin_url('menu'));
        }
        $this->data['info'] = $info;

        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên menu', 'required');
            $this->form_validation->set_rules('param', 'Số thứ tự', 'required');
            $this->form_validation->set_rules('link', 'Đường dẫn', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $param = $this->input->post('param');
                $link = $this->input->post('link');
                $parent_id = $this->input->post('ParentID');
                $isthuong = $this->input->post('displaytkthuong');
                $issuper = $this->input->post('displaytksuper');

                if (isset($_POST['Status'])) {
                    $status = 'A';
                } else {
                    $status = 'W';
                }
                $data = array(
                    'name' => $name,
                    'param' => $param,
                    'link' => $link,
                    'parrent_id' => $parent_id,
                    'isThuong' => $isthuong,
                    'isSuper' => $issuper,
                    'Status' => $status,
                );

                if ($this->menu_model->update($id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(admin_url('menu'));
            }
        }
        $this->data['temp'] = 'admin/menu/edit';
        $this->load->view('admin/main', $this->data);
    }

//xóa dữ liệu nhóm người dùng
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        //lay thong tin cua quan tri vien
        $info = $this->menu_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại menu');
            redirect(admin_url('menu'));
        }
        //thuc hiện xóa
        $this->menu_model->delete($id);

        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('menu'));
    }

//select category
    function get_category()
    {
        $str = "";
        $this->load->model('menu_model');
        $categorys = $this->menu_model->get_category();
        $str .= "<select id='ParentID' name='ParentID' style='width: 200px'>";
        if ($categorys != null) {
            $str .= "<option value='-1' >Root</option>";
            foreach ($categorys as $category) {

                $str .= "<option value='$category->id' >";
                $str .= $category->Name;
                $str .= $this->get_subcategory($category->id, $i = 0);
                $str .= "</option>";
            }
        } else {
            $str .= "<option value='-1' >Root</option>";
        }
        $str .= "</select>";
        return $str;
    }

    function get_subcategory($category_ids, $i = 0)
    {
        $str = "";
        $sub_categorys = $this->menu_model->get_subcategory($category_ids);
        //kiem tra get subcategory co ton ai hay
        if ($sub_categorys) {
            foreach ($sub_categorys as $sub_category) {
                //kiem tra con parent hay ko
                $str .= "<option value='$sub_category->id'>";
                $str .= "........... " . $sub_category->Name;
                $str .= "</option>";
            }
        }
        return $str;
    }

    //danh sach menu trang index
    function get_list_menu()
    {
        $str = "";
        $this->load->model('menu_model');
        $categorys = $this->menu_model->get_category();
        $stt = 1;
        foreach ($categorys as $category) {
            $str .= "<tr>";
            $str .= "<td class=\"textC\">$stt</td>";
            $str .= " <td><span class=\"tipS\" original-title=" . $category->Name . "> $category->Name</span></td>";
			 $str .= " <td><span class=\"tipS\" original-title=" . $category->Param . "> $category->Param</span></td>";
            $str .= " <td class=\"option\">";
            $str .= "           <a href=" . admin_url('menu/edit/' . $category->id) . " class=\"tipS \" original-title=\"Chỉnh sửa\">";
            $str .= "      <img src=" . public_url('admin') . "/images/icons/color/edit.png>";
            $str .= "       </a>";
            $str .= "     <a href=" . admin_url('menu/delete/' . $category->id) . " class=\"tipS verify_action\" original-title=\"Xóa\">";
            $str .= "     <img src=" . public_url('admin') . "/images/icons/color/delete.png>";
            $str .= "     </a>";
            $str .= " </td>";
            $str .= "</tr>";
            $str .= $this->get_sub_list_menu($category->id, $i = 0);
            $stt++;
        }
        return $str;
    }

    function get_sub_list_menu($category_ids, $i = 0)
    {
        $str = "";
        $sub_categorys = $this->menu_model->get_subcategory($category_ids);
        //kiem tra get subcategory co ton ai hay
        if ($sub_categorys) {
            $stt = 1;
            foreach ($sub_categorys as $sub_category) {
                $str .= "<tr>";
                //kiem tra con parent hay ko
                $str .= "<td class=\"textC\">$stt</td>";
                $str .= " <td><span class=\"tipS\" original-title=" . $sub_category->Name . "> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;$sub_category->Name</span></td>";
				 $str .= " <td><span class=\"tipS\" original-title=" . $sub_category->Param . "> $sub_category->Param</span></td>";
                $str .= " <td class=\"option\">";
                $str .= "           <a href=" . admin_url('menu/edit/' . $sub_category->id) . " class=\"tipS \" original-title=\"Chỉnh sửa\">";
                $str .= "      <img src=" . public_url('admin') . "/images/icons/color/edit.png>";
                $str .= "       </a>";
                $str .= "     <a href=" . admin_url('menu/delete/' . $sub_category->id) . " class=\"tipS verify_action\" original-title=\"Xóa\">";
                $str .= "     <img src=" . public_url('admin') . "/images/icons/color/delete.png>";
                $str .= "     </a>";
                $str .= " </td>";
                $str .= "</tr>";

                if ($sub_category->id) {
                    $str .= $this->get_sub_list_menu($sub_category->id, $i++);
                }
                $stt++;
            }

        }
        return $str;
    }

    function get_category_edit($id)
    {
        $str = "";
        $this->load->model('menu_model');
        $categorys = $this->menu_model->get_category();
        $str .= "<select id='ParentID' name='ParentID' style='width: 200px'>";
        if ($categorys != null) {
            $str .= "<option value='-1' >Root</option>";
            foreach ($categorys as $category) {
                $sub_categorys = $this->menu_model->get_subcategory($category->id);
                $menu_select = $this->menu_model->get_info($id);
                if ($menu_select->Parrent_ID == $category->id) {
                    $str .= "<option value='$category->id' selected>";
                    $str .= $category->Name;
                    $str .= "</option>";
                } else {
                    $str .= "<option value='$category->id'>";
                    $str .= $category->Name;
                    $str .= "</option>";
                }
                if (!empty($sub_categorys)){
                foreach ($sub_categorys as $sub_category) {
                    $str .= "<option value='$sub_category->id'>";
                    $str .= "........... " . $sub_category->Name;
                    $str .= "</option>";
                }}
            }
        } else {
            $str .= "<option value='-1' >Root</option>";
        }
        $str .= "</select>";
        return $str;
    }
}

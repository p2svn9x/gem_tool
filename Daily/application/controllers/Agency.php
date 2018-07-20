<?php

Class Agency extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('useragent_model');
        // $this->load->model('usergame_model');
        $this->load->model('logadmin_model');
        $this->load->model('tranfermoney_model');


    }

    function index()
    {

        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $nickname = $this->session->flashdata('nickname');
        $this->data['nickname'] = $nickname;
        $this->data['status'] = $admin_info->status;
        $input = array();
        if ($admin_info->status == "D") {
            $input['where'] = array("parentid" => $admin_info->id, "active" => 1);
            $list = $this->useragent_model->get_list($input);
            $this->data['list2'] = $list;
            $list3 = $this->get_list_usertong();
            $this->data['list3'] = $list3;
            $this->data['temp'] = 'admin/agency/index';
            $this->load->view('admin/main', $this->data);
        } else {
            $list = $this->get_list_user();
            $this->data['list1'] = $list;
            $this->data['temp'] = 'admin/agency/index';
            $this->load->view('admin/main', $this->data);
        }
        $this->data['errors'] = '';
    }

    function get_list_user()
    {
        $str = "";
        $input['where'] = array("nickname" => "tongdailymb","active"=>1);
        $mb = $this->useragent_model->get_list($input);
        foreach ($mb as $list) {
            $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $list->nickname);
            $data = json_decode($optinfo);
            $info = $data->transactions;
            $totalVin = number_format($info->totalVin);
            $safe = number_format($info->safe);
            $vippoint = number_format($info->vippoint);
            $vippointsave = number_format($info->vippointsave);
            $str .= "<tr>";
            $str .= " <td>1</td>";
            $str .= " <td>$list->nameagent</td>";
            $str .= " <td>";
            $str .= "<a href=" . base_url('agency/listtranfer/' . $list->nickname) . " style='color: #37ca1e'>$list->nickname</a>";
            $str .= "</td>";
            $str .= " <td style='display:none'>$list->email</td>";
            $str .= " <td>$list->phone</td>";
            $str .= " <td>$list->address</td>";
            $str .= " <td>Đang hoạt động</td>";
            $str .= " <td>$totalVin</td>";
            $str .= " <td>$safe</td>";
            $str .= " <td>$vippoint</td>";
            $str .= " <td>$vippointsave</td>";

            $str .= " <td class='total-combat' style='color:#ff0000;font-weight:bold'></td>";
            $str .= "<td>";
            $str .= "<a href = " . base_url('agency/doanhso/' . $list->nickname . '/' . $list->id) . ">Chi tiết</a>";
            $str .= " </td>";
            $str .= "<td>";
            $str .= "<a href = " . base_url('agency/editinfo/' . $list->id) . ">";
            $str .= "<img src=" . public_url('admin/images/edit.png') . " />";
            $str .= "</a>";
            $str .= "&nbsp;&nbsp;<a class ='verify_action' href = " . base_url('agency/delete/' . $list->id . '/' . $list->nickname) . " data-id=" . $list->nickname . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
            $str .= "</td>";
        }

        $lists = $this->useragent_model->get_list_daily_2_mien("tongdailymb");
        if (!empty($lists)) {
            $i = 1;
            foreach ($lists as $list) {
                if ($list->active == 1) {
                    $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $list->nickname);
                    $data = json_decode($optinfo);
                    $info = $data->transactions;
                    $totalVin = number_format($info->totalVin);
                    $safe = number_format($info->safe);
                    $vippoint = number_format($info->vippoint);
                    $vippointsave = number_format($info->vippointsave);
                    //level2
                    $input['where'] = array("parentid" => $list->id);
                    $sub_list = $this->useragent_model->get_list($input);

                    $str .= "<tr>";
                    $str .= " <td>$i</td>";
                    $str .= " <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;$list->nameagent</td>";
                    $str .= " <td>";
                    $str .= "<a href=" . base_url('agency/listtranfer/' . $list->nickname) . " style='color: #37ca1e'>$list->nickname</a>";
                    $str .= "</td>";
                    $str .= " <td style='display:none'>$list->email</td>";
                    $str .= " <td>$list->phone</td>";
                    $str .= " <td>$list->address</td>";
                    $str .= " <td>Đang hoạt động</td>";
                    $str .= " <td>$totalVin</td>";
                    $str .= " <td>$safe</td>";
                    $str .= " <td>$vippoint</td>";
                    $str .= " <td>$vippointsave</td>";

                    $str .= " <td class='total-combat' style='color:#ff0000;font-weight:bold'></td>";
                    $str .= "<td>";
                    $str .= "<a href = " . base_url('agency/doanhso/' . $list->nickname . '/' . $list->id) . ">Chi tiết</a>";
                    $str .= " </td>";
                    $str .= "<td>";
                    $str .= "<a href = " . base_url('agency/editinfo/' . $list->id) . ">";
                    $str .= "<img src=" . public_url('admin/images/edit.png') . " />";
                    $str .= "</a>";
                    $str .= "&nbsp;&nbsp;<a class ='verify_action' href = " . base_url('agency/delete/' . $list->id . '/' . $list->nickname) . " data-id=" . $list->nickname . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
                    $str .= "&nbsp;&nbsp;<a class='btn btn-sm btn-info' href = " . base_url('agency/add2?dl1=' . $list->id) . ">Thêm đại lý cấp 2</a>";
                    $str .= "</td>";
                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;

                                $str .= "<td class='combat' style='display:none'>$info1->totalVin";

                                $str .= "</td>";
                            }
                        }
                    }
                    $str .= " <td class='combat' style='display:none'>$info->totalVin</td>";
                    $str .= " <td class='combat' style='display:none'>$info->safe</td>";
                    $str .= "</tr>";

                    //kiem tra get subcategory co ton ai hay
                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;
                                $totalVin1 = number_format($info1->totalVin);
                                $safe1 = number_format($info1->safe);
                                $vippoint1 = number_format($info1->vippoint);
                                $vippointsave1 = number_format($info1->vippointsave);
                                $str .= "<tr >";  //kiem tra con parent hay ko
                                $str .= " <td>$i</td>";
                                $str .= " <td>$row->nameagent</td>";
                                $str .= " <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href=" . base_url('agency/listtranfer/' . $row->nickname) . " style='color: #1b00ff'>$row->nickname</a></td>";
                                $str .= " <td style='display:none'>$row->email</td>";
                                $str .= " <td>$row->phone</td>";
                                $str .= " <td>$row->address</td>";
                                $str .= " <td>Đang hoạt động</td>";
                                $str .= " <td>$totalVin1 </td>";
                                $str .= " <td>$safe1</td>";
                                $str .= " <td>$vippoint1</td>";
                                $str .= " <td>$vippointsave1</td>";
                                $str .= " <td >$totalVin1 </td>";
                                $str .= " <td>";
                                $str .= "<a href = " . base_url('agency/doanhso/' . $row->id . '/' . $row->nickname) . ">Chi tiết</a>";
                                $str .= "</td>";
                                $str .= " <td>";
                                $str .= "<a class ='verify_action'href = " . base_url('agency/delete/' . $row->id . '/' . $row->nickname) . " data-id=" . $row->nickname . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
                                $str .= " </td>";
                                $str .= "</tr>";

                            }

                        }
                    }
                    $i++;
                }
            }

        }

        $input['where'] = array("nickname" => "tongdailymn","active"=>1);
        $mn = $this->useragent_model->get_list($input);
        foreach ($mn as $list) {
            $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $list->nickname);
            $data = json_decode($optinfo);
            $info = $data->transactions;
            $totalVin = number_format($info->totalVin);
            $safe = number_format($info->safe);
            $vippoint = number_format($info->vippoint);
            $vippointsave = number_format($info->vippointsave);
            $str .= "<tr>";
            $str .= " <td>1</td>";
            $str .= " <td>$list->nameagent</td>";
            $str .= " <td>";
            $str .= "<a href=" . base_url('agency/listtranfer/' . $list->nickname) . " style='color: #37ca1e'>$list->nickname</a>";
            $str .= "</td>";
            $str .= " <td style='display:none'>$list->email</td>";
            $str .= " <td>$list->phone</td>";
            $str .= " <td>$list->address</td>";
            $str .= " <td>Đang hoạt động</td>";
            $str .= " <td>$totalVin</td>";
            $str .= " <td>$safe</td>";
            $str .= " <td>$vippoint</td>";
            $str .= " <td>$vippointsave</td>";

            $str .= " <td class='total-combat' style='color:#ff0000;font-weight:bold'></td>";
            $str .= "<td>";
            $str .= "<a href = " . base_url('agency/doanhso/' . $list->nickname . '/' . $list->id) . ">Chi tiết</a>";
            $str .= " </td>";
            $str .= "<td>";
            $str .= "<a href = " . base_url('agency/editinfo/' . $list->id) . ">";
            $str .= "<img src=" . public_url('admin/images/edit.png') . " />";
            $str .= "</a>";
            $str .= "&nbsp;&nbsp;<a class ='verify_action' href = " . base_url('agency/delete/' . $list->id . '/' . $list->nickname) . " data-id=" . $list->nickname . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
            $str .= "</td>";
        }

        $lists = $this->useragent_model->get_list_daily_2_mien("tongdailymn");
        if (!empty($lists)) {
            $i = 1;
            foreach ($lists as $list) {
                if ($list->active == 1) {
                    $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $list->nickname);
                    $data = json_decode($optinfo);
                    $info = $data->transactions;
                    $totalVin = number_format($info->totalVin);
                    $safe = number_format($info->safe);
                    $vippoint = number_format($info->vippoint);
                    $vippointsave = number_format($info->vippointsave);
                    //level2
                    $input['where'] = array("parentid" => $list->id);
                    $sub_list = $this->useragent_model->get_list($input);

                    $str .= "<tr>";
                    $str .= " <td>$i</td>";
                    $str .= " <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;$list->nameagent</td>";
                    $str .= " <td>";
                    $str .= "<a href=" . base_url('agency/listtranfer/' . $list->nickname) . " style='color: #37ca1e'>$list->nickname</a>";
                    $str .= "</td>";
                    $str .= " <td style='display:none'>$list->email</td>";
                    $str .= " <td>$list->phone</td>";
                    $str .= " <td>$list->address</td>";
                    $str .= " <td>Đang hoạt động</td>";
                    $str .= " <td>$totalVin</td>";
                    $str .= " <td>$safe</td>";
                    $str .= " <td>$vippoint</td>";
                    $str .= " <td>$vippointsave</td>";

                    $str .= " <td class='total-combat' style='color:#ff0000;font-weight:bold'></td>";
                    $str .= "<td>";
                    $str .= "<a href = " . base_url('agency/doanhso/' . $list->nickname . '/' . $list->id) . ">Chi tiết</a>";
                    $str .= " </td>";
                    $str .= "<td>";
                    $str .= "<a href = " . base_url('agency/editinfo/' . $list->id) . ">";
                    $str .= "<img src=" . public_url('admin/images/edit.png') . " />";
                    $str .= "</a>";
                    $str .= "&nbsp;&nbsp;<a class ='verify_action' href = " . base_url('agency/delete/' . $list->id . '/' . $list->nickname) . " data-id=" . $list->nickname . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
                    $str .= "&nbsp;&nbsp;<a class='btn btn-sm btn-info' href = " . base_url('agency/add2?dl1=' . $list->id) . ">Thêm đại lý cấp 2</a>";
                    $str .= "</td>";
                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;

                                $str .= "<td class='combat' style='display:none'>$info1->totalVin";

                                $str .= "</td>";
                            }
                        }
                    }
                    $str .= " <td class='combat' style='display:none'>$info->totalVin</td>";
                    $str .= " <td class='combat' style='display:none'>$info->safe</td>";
                    $str .= "</tr>";

                    //kiem tra get subcategory co ton ai hay
                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;
                                $totalVin1 = number_format($info1->totalVin);
                                $safe1 = number_format($info1->safe);
                                $vippoint1 = number_format($info1->vippoint);
                                $vippointsave1 = number_format($info1->vippointsave);
                                $str .= "<tr >";  //kiem tra con parent hay ko
                                $str .= " <td>$i</td>";
                                $str .= " <td>$row->nameagent</td>";
                                $str .= " <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href=" . base_url('agency/listtranfer/' . $row->nickname) . " style='color: #1b00ff'>$row->nickname</a></td>";
                                $str .= " <td style='display:none'>$row->email</td>";
                                $str .= " <td>$row->phone</td>";
                                $str .= " <td>$row->address</td>";
                                $str .= " <td>Đang hoạt động</td>";
                                $str .= " <td>$totalVin1 </td>";
                                $str .= " <td>$safe1</td>";
                                $str .= " <td>$vippoint1</td>";
                                $str .= " <td>$vippointsave1</td>";
                                $str .= " <td >$totalVin1 </td>";
                                $str .= " <td>";
                                $str .= "<a href = " . base_url('agency/doanhso/' . $row->id . '/' . $row->nickname) . ">Chi tiết</a>";
                                $str .= "</td>";
                                $str .= " <td>";
                                $str .= "<a class ='verify_action'href = " . base_url('agency/delete/' . $row->id . '/' . $row->nickname) . " data-id=" . $row->nickname . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
                                $str .= " </td>";
                                $str .= "</tr>";

                            }

                        }
                    }
                    $i++;
                }
            }

        }

        return $str;
    }

    function get_list_usertong()
    {
        $str = "";
        $input['where'] = array("nickname" => "tongdailymb","active"=>1);
        $mb = $this->useragent_model->get_list($input);
        foreach ($mb as $list) {
            $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $list->nickname);
            $data = json_decode($optinfo);
            $info = $data->transactions;
            $totalVin = number_format($info->totalVin);
            $safe = number_format($info->safe);
            $vippoint = number_format($info->vippoint);
            $vippointsave = number_format($info->vippointsave);
            $str .= "<tr>";
            $str .= " <td>1</td>";
            $str .= " <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;$list->nameagent</td>";
            $str .= " <td>";
            $str .= "<a href=" . base_url('agency/listtranfer/' . $list->nickname) . " style='color: #37ca1e'>$list->nickname</a>";
            $str .= "</td>";
            $str .= " <td style='display:none'>$list->email</td>";
            $str .= " <td>$list->phone</td>";
            $str .= " <td>$list->address</td>";
            $str .= " <td>Đang hoạt động</td>";
            $str .= " <td>$totalVin</td>";
            $str .= " <td>$safe</td>";
            $str .= " <td>$vippoint</td>";
            $str .= " <td>$vippointsave</td>";

            $str .= " <td class='total-combat' style='color:#ff0000;font-weight:bold'></td>";
            $str .= "<td>";
            $str .= "<a href = " . base_url('agency/doanhso/' . $list->nickname . '/' . $list->id) . ">Chi tiết</a>";
            $str .= " </td>";
            $str .= "<td>";
            $str .= "<a href = " . base_url('agency/editinfo/' . $list->id) . ">";
            $str .= "<img src=" . public_url('admin/images/edit.png') . " />";
            $str .= "</a>";
            $str .= "&nbsp;&nbsp;<a class ='verify_action' href = " . base_url('agency/delete/' . $list->id . '/' . $list->nickname) . " data-id=" . $list->nickname . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
            $str .= "</td>";
        }

        $lists = $this->useragent_model->get_list_daily_2_mien("tongdailymb");
        if (!empty($lists)) {
            $i = 1;
            foreach ($lists as $list) {
                if ($list->active == 1) {
                    $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $list->nickname);
                    $data = json_decode($optinfo);
                    $info = $data->transactions;
                    $totalVin = number_format($info->totalVin);
                    $safe = number_format($info->safe);
                    $vippoint = number_format($info->vippoint);
                    $vippointsave = number_format($info->vippointsave);
                    //level2
                    $input['where'] = array("parentid" => $list->id);
                    $sub_list = $this->useragent_model->get_list($input);

                    $str .= "<tr>";
                    $str .= " <td>$i</td>";
                    $str .= " <td>$list->nameagent</td>";
                    $str .= " <td>";
                    $str .= "<a href=" . base_url('agency/listtranfer/' . $list->nickname) . " style='color: #37ca1e'>$list->nickname</a>";
                    $str .= "</td>";
                    $str .= " <td style='display:none'>$list->email</td>";
                    $str .= " <td>$list->phone</td>";
                    $str .= " <td>$list->address</td>";
                    $str .= " <td>Đang hoạt động</td>";
                    $str .= " <td>$totalVin</td>";
                    $str .= " <td>$safe</td>";
                    $str .= " <td>$vippoint</td>";
                    $str .= " <td>$vippointsave</td>";

                    $str .= " <td class='total-combat' style='color:#ff0000;font-weight:bold'></td>";
                    $str .= "<td style='display:none'>";
                    $str .= "<a href = " . base_url('agency/doanhso/' . $list->nickname . '/' . $list->id) . ">Chi tiết</a>";
                    $str .= " </td>";
                    $str .= "<td style='display:none'>";
                    $str .= "<a href = " . base_url('agency/editinfo/' . $list->id) . ">";
                    $str .= "<img src=" . public_url('admin/images/edit.png') . " />";
                    $str .= "</a>";
                    $str .= "<a class ='verify_action'href = " . base_url('agency/delete/' . $list->id . '/' . $list->nickname) . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
                    $str .= "</td>";
                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;

                                $str .= "<td class='combat' style='display:none'>$info1->totalVin";

                                $str .= "</td>";
                            }
                        }
                    }
                    $str .= " <td class='combat' style='display:none'>$info->totalVin</td>";
                    $str .= " <td class='combat' style='display:none'>$info->safe</td>";
                    $str .= "</tr>";

                    //kiem tra get subcategory co ton ai hay
                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;
                                $totalVin1 = number_format($info1->totalVin);
                                $safe1 = number_format($info1->safe);
                                $vippoint1 = number_format($info1->vippoint);
                                $vippointsave1 = number_format($info1->vippointsave);
                                $str .= "<tr >";  //kiem tra con parent hay ko
                                $str .= " <td>$i</td>";
                                $str .= " <td>$row->nameagent</td>";
                                $str .= " <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href=" . base_url('agency/listtranfer/' . $row->nickname) . " style='color: #1b00ff'>$row->nickname</a></td>";
                                $str .= " <td style='display:none'>$row->email</td>";
                                $str .= " <td>$row->phone</td>";
                                $str .= " <td>$row->address</td>";
                                $str .= " <td>Đang hoạt động</td>";
                                $str .= " <td>$totalVin1 </td>";
                                $str .= " <td>$safe1</td>";
                                $str .= " <td>$vippoint1</td>";
                                $str .= " <td>$vippointsave1</td>";
                                $str .= " <td >$totalVin1 </td>";
                                $str .= " <td style='display:none'>";
                                $str .= "<a href = " . base_url('agency/doanhso/' . $list->id . '/' . $list->nickname) . ">Chi tiết</a>";
                                $str .= "</td>";
                                $str .= " <td style='display:none'>";
                                $str .= "<a class ='verify_action'href = " . base_url('agency/delete/' . $row->id . '/' . $row->nickname) . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
                                $str .= " </td>";
                                $str .= "</tr>";

                            }

                        }
                    }
                    $i++;
                }
            }

        }

        $input['where'] = array("nickname" => "tongdailymn","active"=>1);
        $mb = $this->useragent_model->get_list($input);
        foreach ($mb as $list) {
            $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $list->nickname);
            $data = json_decode($optinfo);
            $info = $data->transactions;
            $totalVin = number_format($info->totalVin);
            $safe = number_format($info->safe);
            $vippoint = number_format($info->vippoint);
            $vippointsave = number_format($info->vippointsave);
            $str .= "<tr>";
            $str .= " <td>1</td>";
            $str .= " <td>$list->nameagent</td>";
            $str .= " <td>";
            $str .= "<a href=" . base_url('agency/listtranfer/' . $list->nickname) . " style='color: #37ca1e'>$list->nickname</a>";
            $str .= "</td>";
            $str .= " <td style='display:none'>$list->email</td>";
            $str .= " <td>$list->phone</td>";
            $str .= " <td>$list->address</td>";
            $str .= " <td>Đang hoạt động</td>";
            $str .= " <td>$totalVin</td>";
            $str .= " <td>$safe</td>";
            $str .= " <td>$vippoint</td>";
            $str .= " <td>$vippointsave</td>";

            $str .= " <td class='total-combat' style='color:#ff0000;font-weight:bold'></td>";
            $str .= "<td>";
            $str .= "<a href = " . base_url('agency/doanhso/' . $list->nickname . '/' . $list->id) . ">Chi tiết</a>";
            $str .= " </td>";
            $str .= "<td>";
            $str .= "<a href = " . base_url('agency/editinfo/' . $list->id) . ">";
            $str .= "<img src=" . public_url('admin/images/edit.png') . " />";
            $str .= "</a>";
            $str .= "&nbsp;&nbsp;<a class ='verify_action' href = " . base_url('agency/delete/' . $list->id . '/' . $list->nickname) . " data-id=" . $list->nickname . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
            $str .= "</td>";
        }

        $lists = $this->useragent_model->get_list_daily_2_mien("tongdailymn");
        if (!empty($lists)) {
            $i = 1;
            foreach ($lists as $list) {
                if ($list->active == 1) {
                    $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $list->nickname);
                    $data = json_decode($optinfo);
                    $info = $data->transactions;
                    $totalVin = number_format($info->totalVin);
                    $safe = number_format($info->safe);
                    $vippoint = number_format($info->vippoint);
                    $vippointsave = number_format($info->vippointsave);
                    //level2
                    $input['where'] = array("parentid" => $list->id);
                    $sub_list = $this->useragent_model->get_list($input);

                    $str .= "<tr>";
                    $str .= " <td>$i</td>";
                    $str .= " <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;$list->nameagent</td>";
                    $str .= " <td>";
                    $str .= "<a href=" . base_url('agency/listtranfer/' . $list->nickname) . " style='color: #37ca1e'>$list->nickname</a>";
                    $str .= "</td>";
                    $str .= " <td style='display:none'>$list->email</td>";
                    $str .= " <td>$list->phone</td>";
                    $str .= " <td>$list->address</td>";
                    $str .= " <td>Đang hoạt động</td>";
                    $str .= " <td>$totalVin</td>";
                    $str .= " <td>$safe</td>";
                    $str .= " <td>$vippoint</td>";
                    $str .= " <td>$vippointsave</td>";

                    $str .= " <td class='total-combat' style='color:#ff0000;font-weight:bold'></td>";
                    $str .= "<td style='display:none'>";
                    $str .= "<a href = " . base_url('agency/doanhso/' . $list->nickname . '/' . $list->id) . ">Chi tiết</a>";
                    $str .= " </td>";
                    $str .= "<td style='display:none'>";
                    $str .= "<a href = " . base_url('agency/editinfo/' . $list->id) . ">";
                    $str .= "<img src=" . public_url('admin/images/edit.png') . " />";
                    $str .= "</a>";
                    $str .= "<a class ='verify_action'href = " . base_url('agency/delete/' . $list->id . '/' . $list->nickname) . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
                    $str .= "</td>";
                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;

                                $str .= "<td class='combat' style='display:none'>$info1->totalVin";

                                $str .= "</td>";
                            }
                        }
                    }
                    $str .= " <td class='combat' style='display:none'>$info->totalVin</td>";
                    $str .= " <td class='combat' style='display:none'>$info->safe</td>";
                    $str .= "</tr>";

                    //kiem tra get subcategory co ton ai hay
                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;
                                $totalVin1 = number_format($info1->totalVin);
                                $safe1 = number_format($info1->safe);
                                $vippoint1 = number_format($info1->vippoint);
                                $vippointsave1 = number_format($info1->vippointsave);
                                $str .= "<tr >";  //kiem tra con parent hay ko
                                $str .= " <td>$i</td>";
                                $str .= " <td>$row->nameagent</td>";
                                $str .= " <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href=" . base_url('agency/listtranfer/' . $row->nickname) . " style='color: #1b00ff'>$row->nickname</a></td>";
                                $str .= " <td style='display:none'>$row->email</td>";
                                $str .= " <td>$row->phone</td>";
                                $str .= " <td>$row->address</td>";
                                $str .= " <td>Đang hoạt động</td>";
                                $str .= " <td>$totalVin1 </td>";
                                $str .= " <td>$safe1</td>";
                                $str .= " <td>$vippoint1</td>";
                                $str .= " <td>$vippointsave1</td>";
                                $str .= " <td >$totalVin1 </td>";
                                $str .= " <td style='display:none'>";
                                $str .= "<a href = " . base_url('agency/doanhso/' . $list->id . '/' . $list->nickname) . ">Chi tiết</a>";
                                $str .= "</td>";
                                $str .= " <td style='display:none'>";
                                $str .= "<a class ='verify_action'href = " . base_url('agency/delete/' . $row->id . '/' . $row->nickname) . "><img src=" . public_url('admin/images/delete.png') . " /></a>";
                                $str .= " </td>";
                                $str .= "</tr>";

                            }

                        }
                    }
                    $i++;
                }
            }

        }

        return $str;
    }

    function listnoactive()
    {
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $nickname = $this->session->flashdata('nickname');
        $this->data['nickname'] = $nickname;
        $this->data['status'] = $admin_info->status;
        $input = array();
        if ($admin_info->status == "A") {
            $input['where'] = array("active" => 0);
            $list = $this->useragent_model->get_list($input);
            $this->data['list1'] = $list;
        } else {
            $input['where'] = array("active" => 0, "parentid" => $admin_info->id);
            $list = $this->useragent_model->get_list($input);
            $this->data['list1'] = $list;
        }
        $this->data['temp'] = 'admin/agency/listnoactive';
        $this->load->view('admin/main', $this->data);
    }

    function add()
    {
        $this->data['temp'] = 'admin/agency/add';
        $this->load->view('admin/main', $this->data);
    }

    function add2()
    {
        $daily1Id = $this->input->get('dl1');
//        $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $daily1Nickname);
//        print_r($optinfo);die;
        $this->data['daily1'] = $this->useragent_model->get_info($daily1Id);
//        print_r($this->data['daily1']);die;
        $this->data['temp'] = 'admin/agency/add2';
        $this->load->view('admin/main', $this->data);
    }

    function infodaily()
    {

        $info = $this->useragent_model->get_info_admin_nickname($this->input->post('nickname'));

        if ($info == false) {
            echo json_encode("1");
        } else {
            echo json_encode("2");
        }
    }

    function listinfodaily()
    {
        try {
            $daily2Arr = explode(',', $this->input->post('nickname'));
//        print_r($daily2Arr);die;
//            $input = array();
//            $input['where_in'] = array("nickname",$daily2Arr);
            $list = $this->useragent_model->get_list_by_array_nickname($daily2Arr);
            print_r($list);
            die;
        } catch (Exception $e) {
            print_r($e);
            die;
        }

        $info = $this->useragent_model->get_info_admin_nickname($this->input->post('nickname'));

        if ($info == false) {
            echo json_encode("1");
        } else {
            echo json_encode("2");
        }
    }

    function daily1()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $info = $this->useragent_model->get_info_admin($this->input->post('username'));
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        // insert vao db
        $data = array(
            'username' => $this->input->post('username'),
            'nickname' => $this->input->post('nickname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phonedaily'),
            'status' => "D",
            'parentid' => -1,
            'key' => $this->rand_string(2),
            'nameagent' => $this->input->post('namedaily'),
            'address' => $this->input->post('addressdaily'),
            'facebook' => $this->input->post('facebookdaily'),
            'namebank' => $this->input->post('namebank'),
            'nameaccount' => strtoupper($this->input->post('usernamebank')),
            'numberaccount' => $this->input->post('numberbank'),
            'show' => $this->input->post('show'),
            'createtime' => date("Y-m-d H:i:s"),
            'updatetime' => date("Y-m-d H:i:s"),

        );
        if ($info != false) {
            $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Nick name đã là đại lý </label></div>');
            echo json_encode("0");
            die();
        } else {
            $this->logadmin_model->create($this->logadmindata(1, $this->input->post('nickname'), $admin_info->username));
            $this->useragent_model->create($data);
            $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn thêm đại lý thành công</label></div>');
            echo json_encode("2");
        }
    }

    function daily2()
    {
        $num_daily2 = file_get_contents($this->config->item('api_portal') . '?c=10');
        $numdl2 = json_decode($num_daily2)->number_dl2;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $info = $this->useragent_model->get_info_admin($this->input->post('username'));
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $input = array();
        $input['where'] = array("parentid" => $admin_info->id, "active" => 1);
        $total = $this->useragent_model->get_total($input);

        // insert vao db
        $data = array(
            'username' => $this->input->post('username'),
            'nickname' => $this->input->post('nickname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('mobile'),
            'status' => "D",
            'parentid' => $admin_login,
            'createtime' => date("Y-m-d H:i:s"),
            'updatetime' => date("Y-m-d H:i:s")
        );
        if ($info != false) {
            $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Nick name đã là đại lý </label></div>');
            echo json_encode("0");
            die();
        } else if ($total >= $numdl2) {
            $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn đã thêm quá  ' . $numdl2 . ' đại lý </label></div>');
            echo json_encode("1");
            die();
        } else if ($total < $numdl2) {
            $this->logadmin_model->create($this->logadmindata(1, $this->input->post('nickname'), $admin_info->username));
            $this->useragent_model->create($data);
            $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn thêm đại lý thành công</label></div>');
            echo json_encode("2");
        }
    }

    function delete()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $nickname = $this->uri->rsegment('4');
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $info = $this->useragent_model->get_info($id);
        $input['where'] = array("parentid" => $id, "active" => 1);
        $info_parent = $this->useragent_model->get_list($input);

        $data = array(
            'active' => 0,
            'updatetime' => date("Y-m-d H:i:s")
        );
        $this->data['info'] = $info;

        if ($info_parent == false) {
            if ($this->useragent_model->update($id, $data)) {

                file_get_contents($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=0&pr=');
                $this->logadmin_model->create($this->logadmindata(3, $info->nickname, $admin_info->username));
                $this->session->set_flashdata('nickname', $info->nickname);
                $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Xóa dữ liệu thành công</label></div>');
                echo "Success";
            }
        } else {
            $this->session->set_flashdata('message', ' <div class="form-group has-error"><label class="control-label" for="inputSuccess"><i class="fa fa-warning"></i> Taì khoản vẫn tồn tại đại lý cấp 2. Hủy đại lý không tành công</label></div>');
            echo "Error";
        }
    }

    function  update()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $nickname = $this->uri->rsegment('4');
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $info = $this->useragent_model->get_info($id);
        $data = array(
            'active' => 1,
            'updatetime' => date("Y-m-d H:i:s")

        );
        $this->data['info'] = $info;
        if ($this->useragent_model->update($id, $data)) {
            $this->logadmin_model->create($this->logadmindata(12, $info->nickname, $admin_info->username));
            if ($admin_info->status == "A") {
                file_get_contents($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=1&pr='.$admin_info->parent);
            } else if ($admin_info->status == "D") {
                file_get_contents($this->config->item('api_url') . '?c=103&nn=' . $nickname . '&st=2&pr='.$admin_info->parent);
            }
            $this->session->set_flashdata('nickname', $info->nickname);

            $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Up date dữ liệu thành công</label></div>');
            echo "Success";
        } else {
            echo "Error";
        }
    }

    function listtranfer()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = null;
        $end_time = null;
        if ($this->input->post('toDate')) {
            $end_time = $this->input->post('toDate');
        }

        if ($this->input->post('fromDate')) {
            $start_time = $this->input->post('fromDate');
        }

        if ($start_time === null) {
            $start_time = date('Y-m-d', strtotime('-0 days'));
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;

        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $nickname = $this->uri->rsegment('3');
        $this->data['nickname'] = $nickname;
        if ($nickname != "") {
            $info = $this->useragent_model->get_info_admin_nickname($nickname);
        } else {
            $info = $this->useragent_model->get_info_admin_nickname($admin_info->nickname);
        }
        if ($info != null) {
            foreach ($info as $row) {

                $this->data['parrentid'] = $row->parentid;
            }
        } else {
            $this->data['parrentid'] = "0";
        }

        $input['where'] = array("parentid" => -1, "show" => 1, "status" => "D", "active" => 1);
        $list = $this->useragent_model->get_list($input);
        $input1['where'] = array("parentid !=" => -1, "active" => 1, "status" => "D");
        $list1 = $this->useragent_model->get_list($input);
        $listnn = array();
        $listnn1 = array();
        if ($list != "") {
            foreach ($list as $row) {
                array_push($listnn, $row->nickname);
            }
            $this->data['listnn'] = implode(",", $listnn);
        }
        if ($list1 != "") {
            foreach ($list1 as $row1) {
                array_push($listnn1, $row1->nickname);
            }
            $this->data['listnn1'] = implode(",", $listnn1);
        }
        $this->data['temp'] = 'admin/agency/listtranfer';
        $this->load->view('admin/main', $this->data);
    }

    function listtranfersellvin()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = null;
        $end_time = null;
        if ($this->input->post('toDate')) {
            $end_time = $this->input->post('toDate');
        }

        if ($this->input->post('fromDate')) {
            $start_time = $this->input->post('fromDate');
        }

        if ($start_time === null) {
            $start_time = date('Y-m-d', strtotime('-0 days'));
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;

        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $nickname = $this->uri->rsegment('3');
        $this->data['nickname'] = $nickname;
        if ($nickname != "") {
            $info = $this->useragent_model->get_info_admin_nickname($nickname);
        } else {
            $info = $this->useragent_model->get_info_admin_nickname($admin_info->nickname);
        }
        if ($info != null) {
            foreach ($info as $row) {

                $this->data['parrentid'] = $row->parentid;
            }
        } else {
            $this->data['parrentid'] = "0";
        }

        $input['where'] = array("parentid" => -1, "show" => 1, "status" => "D", "active" => 1);
        $list = $this->useragent_model->get_list($input);
        $input1['where'] = array("parentid !=" => -1, "active" => 1, "status" => "D");
        $list1 = $this->useragent_model->get_list($input);
        $listnn = array();
        $listnn1 = array();
        if ($list != "") {
            foreach ($list as $row) {
                array_push($listnn, $row->nickname);
            }
            $this->data['listnn'] = implode(",", $listnn);
        }
        if ($list1 != "") {
            foreach ($list1 as $row1) {
                array_push($listnn1, $row1->nickname);
            }
            $this->data['listnn1'] = implode(",", $listnn1);
        }
        $this->data['temp'] = 'admin/agency/listtranfersellvin';
        $this->load->view('admin/main', $this->data);
    }

    function listtranfersale()
    {
        $now = new \DateTime('now');
        $month = $now->format('m') - 1;
        $year = $now->format('Y');
        $start_time = null;
        $end_time = null;
        if ($this->input->post('toDate')) {
            $end_time = $this->input->post('toDate');
        }

        if ($this->input->post('fromDate')) {
            $start_time = $this->input->post('fromDate');
        }

        if ($start_time === null) {
            $start_time = $this->firstDay($month, $year);
        }
        if ($end_time === null) {
            $end_time = $this->lastDay($month, $year);
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;

        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $nickname = $this->uri->rsegment('3');
        $this->data['nickname'] = $nickname;
        $input['where'] = array("parentid" => -1, "show" => 1, "status" => "D", "active" => 1);
        $list = $this->useragent_model->get_list($input);
        $input1['where'] = array("parentid !=" => -1, "active" => 1, "status" => "D");
        $list1 = $this->useragent_model->get_list($input);
        $listnn = array();
        $listnn1 = array();
        if ($list != "") {
            foreach ($list as $row) {
                array_push($listnn, $row->nickname);
            }
            $this->data['listnn'] = implode(",", $listnn);
        }
        if ($list1 != "") {
            foreach ($list1 as $row1) {
                array_push($listnn1, $row1->nickname);
            }
            $this->data['listnn1'] = implode(",", $listnn1);
        }
        $this->data['temp'] = 'admin/agency/listtranfersale';
        $this->load->view('admin/main', $this->data);
    }

    function listtranferbuy()
    {

        $now = new \DateTime('now');
        $month = $now->format('m') - 1;
        $year = $now->format('Y');
        $start_time = null;
        $end_time = null;
        if ($this->input->post('toDate')) {
            $end_time = $this->input->post('toDate');
        }

        if ($this->input->post('fromDate')) {
            $start_time = $this->input->post('fromDate');
        }

        if ($start_time === null) {
            $start_time = $this->firstDay($month, $year);
        }
        if ($end_time === null) {
            $end_time = $this->lastDay($month, $year);
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;

        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $nickname = $this->uri->rsegment('3');
        $this->data['nickname'] = $nickname;
        $input['where'] = array("parentid" => -1, "show" => 1, "status" => "D", "active" => 1);
        $list = $this->useragent_model->get_list($input);
        $input1['where'] = array("parentid !=" => -1, "active" => 1, "status" => "D");
        $list1 = $this->useragent_model->get_list($input);
        $listnn = array();
        $listnn1 = array();
        if ($list != "") {
            foreach ($list as $row) {
                array_push($listnn, $row->nickname);
            }
            $this->data['listnn'] = implode(",", $listnn);
        }
        if ($list1 != "") {
            foreach ($list1 as $row1) {
                array_push($listnn1, $row1->nickname);
            }
            $this->data['listnn1'] = implode(",", $listnn1);
        }
        $this->data['temp'] = 'admin/agency/listtranferbuy';
        $this->load->view('admin/main', $this->data);
    }

    function  topdoanhso()
    {
        $this->data['temp'] = 'admin/agency/topdoanhso';
        $this->load->view('admin/main', $this->data);
    }

    function  topdoanhsocap2()
    {
        $this->data['temp'] = 'admin/agency/topdoanhsocap2';
        $this->load->view('admin/main', $this->data);
    }

    function topdoanhsoban()
    {
        $this->data['temp'] = 'admin/agency/topdoanhsoban';
        $this->load->view('admin/main', $this->data);
    }

    function  doanhso()
    {
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admininfo = $this->useragent_model->get_info($admin_login);
        $nickname = $this->uri->rsegment('3');
        $id = $this->uri->rsegment('4');

        if ($admininfo->status == "A") {
            if ($nickname != null && $id != null) {
                $this->data['nickname'] = $nickname;
                $this->data['id'] = $id;
                $info = $this->useragent_model->get_info($id);
                $input['where'] = array("parentid" => $info->id);
                $list = $this->useragent_model->get_list($input);

                $listnn = array();
                $listnn1 = array();

                if ($list != "") {
                    array_push($listnn, $info->nickname);

                    foreach ($list as $row) {
                        array_push($listnn1, $row->nickname);
                    }
                    $this->data['listnn1'] = implode(",", $listnn);
                    $this->data['listnn2'] = implode(",", $listnn1);

                }
            } else {
                $this->data['nickname'] = $nickname;
                $this->data['id'] = $id;
                $info = $this->useragent_model->get_info($id);
                $listnn = array();
                $listnn1 = array();
                if ($info != "") {
                    array_push($listnn, $info->nickname);
                    $this->data['listnn1'] = implode(",", $listnn);
                } else {

                    $input['where'] = array("parentid" => -1, "status" => "D", "active" => 1, "show" => 1);
                    $list = $this->useragent_model->get_list($input);
                    foreach ($list as $row) {
                        array_push($listnn, $row->nickname);
                    }
                    $this->data['listnn1'] = implode(",", $listnn);

                    $input1['where'] = array("parentid !=" => -1, "status" => "D");
                    $list1 = $this->useragent_model->get_list($input1);
                    foreach ($list1 as $row) {
                        array_push($listnn1, $row->nickname);
                    }
                    $this->data['listnn2'] = implode(",", $listnn1);
                }


            }


        } else if ($admininfo->status == "D" && $admininfo->nickname != "tongdailymb" && $admininfo->nickname != "tongdailymn") {
            $input['where'] = array("parentid" => $admininfo->id);
            $list = $this->useragent_model->get_list($input);
            $listnn = array();
            $listnn1 = array();
            if ($list != "") {
                array_push($listnn, $admininfo->nickname);

                foreach ($list as $row) {
                    array_push($listnn1, $row->nickname);
                }
                $this->data['listnn1'] = implode(",", $listnn);
                $this->data['listnn2'] = implode(",", $listnn1);
            } else {
                array_push($listnn, $admininfo->nickname);
                $this->data['listnn1'] = implode(",", $listnn);
            }

        }
        else if ($admininfo->nickname == "tongdailymb" || $admininfo->nickname == "tongdailymn" ) {

            $list = $this->useragent_model->get_list_daily_2_mien($admininfo->nickname);
            $listnn = array();
            $listnn1 = array();
            if ($list != "") {
                array_push($listnn, $admininfo->nickname);

                foreach ($list as $row) {
                    array_push($listnn1, $row->nickname);
                }
                $this->data['listnn1'] = implode(",", $listnn);
                $this->data['listnn2'] = implode(",", $listnn1);
            } else {
                array_push($listnn, $admininfo->nickname);
                $this->data['listnn1'] = implode(",", $listnn);
            }

        }


        $this->data['temp'] = 'admin/agency/doanhso';
        $this->load->view('admin/main', $this->data);

    }

    function tranfermoney()
    {


        $this->data['errors'] = '';
        $this->data['flag'] = '';
        $this->data['temp'] = 'admin/agency/tranfermoney';
        $this->load->view('admin/main', $this->data);
    }

    function editinfo()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $lstagentlevel2 = '';
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admininfo = $this->useragent_model->get_info($admin_login);
        if ($admininfo->status == "A") {
            $info = $this->useragent_model->get_info($id);
            $infosub = $this->useragent_model->get_info_admin_parent($id);
            $this->data['infolv2'] = $infosub;
            $this->data['info'] = $info;
            if ($this->input->post()) {
                //lưu sms dai ly cap 2
                $j = 0;
                foreach ($infosub as $row) {
                    $datalv = array(
                        'sms' => intval($this->input->post("lvlmoney_$j"))
                    );
                    $this->useragent_model->update($row->id, $datalv);
                    $this->logadmin_model->create($this->logadmindata(2, $row->nickname, $row->username));
                    $j++;
                }
                ////
                //them vao csdl;
                $data = array(
                    'nameagent' => $this->input->post("nameagentdl"),
                    'facebook' => $this->input->post("facebookdl"),
                    'address' => $this->input->post("addressdl"),
                    'phone' => $this->input->post("phonedl"),
                    'namebank' => $this->input->post("namebank"),
                    'nameaccount' => strtoupper($this->input->post("usernamebank")),
                    'numberaccount' => $this->input->post("numberbank"),
                    'show' => intval($this->input->post("displayname")),
                    'order' => intval($this->input->post("ordername")),
                    'updatetime' => date("Y-m-d H:i:s"),
                    'sms' => intval($this->input->post("txtmoney"))
                );
                //neu ma thay doi mat khau thi moi gan du lieu
                if ($this->useragent_model->update($id, $data)) {
                    $this->logadmin_model->create($this->logadmindata(2, $info->nickname, $admininfo->username));
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn cập nhật dữ liệu thành công</label></div>');;
                } else {
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(base_url(''));

            }
        } elseif ($admininfo->status == "D") {
            $info = $this->useragent_model->get_info($admininfo->id);
            $infosub = $this->useragent_model->get_info_admin_parent_lv2($admininfo->id);
            $this->data['info'] = $info;
            $this->data['infolv2'] = $infosub;
            if ($this->input->post()) {
                //lưu sms dai ly cap 2
                $j = 0;
                foreach ($infosub as $row) {
                    $datalv = array(
                        'sms' => intval($this->input->post("lvlmoney_$j"))
                    );
                    $this->useragent_model->update($row->id, $datalv);
                    $this->logadmin_model->create($this->logadmindata(2, $row->nickname, $row->username));
                    $j++;
                }
                ////
                //them vao csdl;
                $data = array(
                    'nameagent' => $this->input->post("nameagentdl"),
                    'facebook' => $this->input->post("facebookdl"),
                    'address' => $this->input->post("addressdl"),
                    'phone' => $this->input->post("phonedl"),
                    'namebank' => $this->input->post("namebank"),
                    'nameaccount' => $this->input->post("usernamebank"),
                    'numberaccount' => $this->input->post("numberbank"),
                    'updatetime' => date("Y-m-d H:i:s"),
                    'sms' => intval($this->input->post("txtmoney"))
                );
                //neu ma thay doi mat khau thi moi gan du lieu

                if ($this->useragent_model->update(intval($info->id), $data)) {
                    //tạo ra nội dung thông báo
                    $this->logadmin_model->create($this->logadmindata(2, $info->nickname, $info->username));
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', ' <div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Bạn cập nhật dữ liệu thành công</label></div>');;
                } else {
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(base_url(''));
            }
        }
        $this->data['temp'] = 'admin/agency/editinfo';
        $this->load->view('admin/main', $this->data);
    }


    function giftcode()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api_url_odp') . '?c=10'));
        $this->data['listversion'] = $datainfo->giftcode_version;
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $this->data['temp'] = 'admin/agency/giftcode';
        $this->load->view('admin/main', $this->data);
    }

    function giftcodeuse()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api_url_odp') . '?c=10'));
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $this->data['temp'] = 'admin/agency/giftcodeuse';
        $this->load->view('admin/main', $this->data);
    }

    function usergiftcode()
    {
        $this->data['temp'] = 'admin/agency/usergiftcode';
        $this->load->view('admin/main', $this->data);
    }

    function nicknameusegiftcode()
    {
        $this->data['temp'] = 'admin/agency/nicknameusegiftcode';
        $this->load->view('admin/main', $this->data);
    }

    function checkuser()
    {
        $nickname = $this->input->post('nn');
        $info = $this->useragent_model->get_dai_ly_by_name($nickname);
        if ($info != false) {
            if ($info[0]->parentid == '-1') {
                // dai ly cap 1
                echo json_encode('<div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Tài khoản đại lý cấp 1</label></div>');
            } else {
                // dai ly cap 2
                echo json_encode('<div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Tài khoản đại lý cấp 2</label></div>');
            }
        } else {
            // tai khoan thuong
            echo json_encode('<div class="form-group has-success successful"><label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Không phải đại lý</label></div>');
        }
    }


    function  CheckUserName()
    {
        $nickname = $this->input->get('nn');
        $optinfo = file_get_contents($this->config->item('api_url') . '?c=716&nn=' . $nickname);
        $result = json_decode($optinfo);
        if ($result == 100) {
            $message = "Tài khoản thường";

        } else if ($result == -1) {
            $message = "Nickname không tồn tại";
        } else if ($result == 0) {
            $message = "Tài khoản thường";
        } else if ($result == 1) {
            $message = "Đại lý cấp 1";
        } else if ($result == 2) {
            $message = "Đại lý cấp 2";
        } else if ($result == -2) {
            $message = "Hệ thống gián đoạn";
        };
        $this->data['errors'] = $message;
        $this->data['result'] = $result;
        $this->data['error'] = '';
        $this->data['flag'] = '';
        $this->data['temp'] = 'admin/agency/tranfermoney';
        $this->load->view('admin/main', $this->data);
    }

    function chuyenvin()
    {
        $message = '';
        $vaild = false;
        $nns = $this->input->post('nicknamesend');
        $nnr = $this->input->post('nickname');
        $mn = $this->input->post('vinchuyen');
        $rs = $this->input->post('reasonchuyen');
        $otp = $this->input->post('maotp');
        $type = $this->input->post('otpselect');
        //check nick name
        $optinfo = file_get_contents($this->config->item('api_url') . '?c=716&nn=' . $nnr);
        $getconfig = json_decode(file_get_contents($this->config->item('api_url_odp') . '?c=130'));
        $result1 = trim($optinfo);
        if ($result1 == "100") {
            $message = "Tài khoản thường";
            $vaild = true;
        } else if ($result1 == "-1") {
            $message = "Nickname không tồn tại";
            $vaild = false;
        } else if ($result1 == "0") {
            $message = "Tài khoản thường";
            $vaild = true;
        } else if ($result1 == "1") {
            $message = "Đại lý cấp 1";
            $vaild = true;
        } else if ($result1 == "2") {
            $message = "Đại lý cấp 2";
            $vaild = true;
        } else if ($result1 == "-2") {
            $message = "Hệ thống gián đoạn";
            $vaild = true;
        };
        if ($vaild) {

            if ($result1 == "100") {
                $money = round($mn / $getconfig->ratio_transfer_dl_1);
            } else if ($result1 == "0") {
                $money = round($mn / $getconfig->ratio_transfer_dl_1);
            } else if ($result1 == "1") {
                $money = round($mn / $getconfig->r_tf_11);
            } else if ($result1 == "2") {
                $money = round($mn / $getconfig->r_tf_12);
            }
            $url = $this->config->item('api_url') . '?c=706&nns=' . $nns . '&nnr=' . $nnr . '&mn=' . $money . '&rs=' . urlencode($rs) . '&otp=' . $otp . '&type=' . $type;
            $optinfo = file_get_contents($url);
            if ($optinfo) {
                $data = json_decode($optinfo);
                $result = $data->errorCode;
                if ($result == "0") {
                    $vinch = intval($this->input->post('vinchuyen'));
                    if ($vinch != null) {
                        $vin = $this->session->userdata('vin');
                        $new_vin = intval($vin) - intval($vinch);
                        $this->session->set_userdata("vin", $new_vin);
                        echo "<script>alert('Chuyển vin thành công');document.location='tranfermoney'</script>";
                    }
                }
                if ($result == "1") {
                    $message = "Hệ thống gián đoạn.Vui lòng liên hệ 19006896";

                } else if ($result == "3") {
                    $message = "Chưa đăng ký bảo mật";

                } else if ($result == "4") {
                    $message = "Tài khoản không đủ tiền";

                } else if ($result == "5") {
                    $message = "Tài khoản bị cấm chuyển vin";

                } else if ($result == "6") {
                    $message = "Nick name nhận vin không tồn tại";

                } else if ($result == "7") {
                    $message = "OTP sai";

                } else if ($result == "8") {
                    $message = "OTP hết hạn";

                } else if ($result == "10") {
                    $message = "Tài khoản đăng ký chưa bảo mật quá 24h";

                } else if ($result == "11") {
                    $message = "Số vin chuyển từ 1.000.000 Vin đến 100.000.000 Vin ";

                } else if ($result == "12") {
                    $message = "Giao dịch thất bại, Số dư giao dịch của đại lý cấp 1 sau khi giao dịch với Tổng đại lý phải đảm bảo >= 500.000.000 Vin";

                }else if ($result == "14") {
                    $message = "Bạn không thể chuyển khoản cho tài khoản này";

                }
            } else {
                $message = "Lỗi hệ thống, Vui lòng liên hệ tổng đài 19006896";
            }
        }
        $this->data['errors'] = $message;
        $this->data['error'] = '';
        $this->data['flag'] = '';
        $this->data['temp'] = 'admin/agency/tranfermoney';
        $this->load->view('admin/main', $this->data);

    }

    function addgiftcode()
    {
        $datainfo = json_decode(file_get_contents($this->config->item('api_url_odp') . '?c=10'));
        $this->data['listversion'] = $datainfo->giftcode_version;
        $this->data['listvin'] = $datainfo->giftcode_vin;
        $this->data['listxu'] = $datainfo->giftcode_xu;
        $this->data['temp'] = 'admin/giftcode/addgiftcode';
        $this->load->view('admin/main', $this->data);
    }

    function  deleteagent()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $info = $this->useragent_model->get_info($id);
        $this->logadmin_model->create($this->logadmindata(13, $info->nickname, $admin_info->username));
        $this->useragent_model->delete($id);
//        $optinfo = $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $info->nickname . '&st=0');
//        $datainfo = json_decode($optinfo);
        echo "Success";
    }

// top doanh số cấp 2
    function  topdscap2()
    {
        $this->data['temp'] = 'admin/agency/topdscap2';
        $this->load->view('admin/main', $this->data);
    }

    function lastday($month = '', $year = '')
    {
        if (empty($month)) {
            $month = date('m');
        }
        if (empty($year)) {
            $year = date('Y');
        }
        $result = strtotime("{$year}-{$month}-01");
        $result = strtotime('-1 second', strtotime('+1 month', $result));
        return date('Y-m-d 23:59:59', $result);
    }

    function firstDay($month = '', $year = '')
    {
        if (empty($month)) {
            $month = date('m');
        }
        if (empty($year)) {
            $year = date('Y');
        }
        $result = strtotime("{$year}-{$month}-01");
        return date('Y-m-d 00:00:00', $result);
    }

    function listdoanhso()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = null;
        $end_time = null;
        if ($this->input->post('toDate')) {
            $end_time = $this->input->post('toDate');
        }

        if ($this->input->post('fromDate')) {
            $start_time = $this->input->post('fromDate');
        }

        if ($start_time === null) {
            $start_time = date('Y-m-d', strtotime('-0 days'));
        }
        if ($end_time === null) {
            $end_time = date('Y-m-d 23:59:59');
        }
        $this->data['start_time'] = $start_time;
        $this->data['end_time'] = $end_time;

        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        if ($admin_info->status == "A") {
            $this->data['temp'] = 'admin/agency/listdoanhso';
            $this->load->view('admin/main', $this->data);
        }
    }

    function getinfo()
    {
        $st = $this->curl->simple_get($this->config->item('api_url') . '?c=103&nn=' . $this->input->get('nickname') . '&st=0&pr=');
        print_r($st);
        die;

        $input = array();
        $input2 = array();
        $input['where'] = array("nick_name" => $this->input->get('nickname'));
        $input2['where'] = array("nickname" => $this->input->get('nickname'));
//        print_r($this->usergame_model->get_list($input));
        print_r($this->useragent_model->get_list($input2));

    }


    function listdailymien()
    {

        $admin_login = $this->session->userdata('user_admindaily_login');
        $admin_info = $this->useragent_model->get_info($admin_login);
        $list = $this->get_list_dl1($admin_info->nickname);
        $this->data['list1'] = $list;
        $this->data['temp'] = 'admin/user/listdlbacnam';
        $this->load->view('admin/main', $this->data);
    }

    function get_list_dl1($nickname)
    {
        $str = "";
        $lists = $this->useragent_model->get_list_daily_2_mien($nickname);
        if (!empty($lists)) {
            $i = 1;
            foreach ($lists as $list) {
                if ($list->active == 1) {
                    $optinfo = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $list->nickname);
                    $data = json_decode($optinfo);
                    $info = $data->transactions;
                    $totalVin = number_format($info->totalVin);
                    $safe = number_format($info->safe);
                    $vippoint = number_format($info->vippoint);
                    $vippointsave = number_format($info->vippointsave);
                    //level2
                    $input['where'] = array("parentid" => $list->id);
                    $sub_list = $this->useragent_model->get_list($input);

                    $str .= "<tr>";
                    $str .= " <td>$i</td>";
                    $str .= " <td>$list->nameagent</td>";
                    $str .= " <td>";
                    $str .= "<a href=" . base_url('agency/listtranfer/' . $list->nickname) . " style='color: #37ca1e'>$list->nickname</a>";
                    $str .= "</td>";
                    $str .= " <td style='display:none'>$list->email</td>";
                    $str .= " <td>$list->phone</td>";
                    $str .= " <td>$list->address</td>";
                    $str .= " <td>Đang hoạt động</td>";
                    $str .= " <td>$totalVin</td>";
                    $str .= " <td>$safe</td>";
                    $str .= " <td>$vippoint</td>";
                    $str .= " <td>$vippointsave</td>";

                    $str .= " <td class='total-combat' style='color:#ff0000;font-weight:bold'></td>";
                    $str .= "<td>";
                    $str .= "<a href = " . base_url('agency/doanhso/' . $list->nickname . '/' . $list->id) . ">Chi tiết</a>";
                    $str .= " </td>";

                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;

                                $str .= "<td class='combat' style='display:none'>$info1->totalVin";

                                $str .= "</td>";
                            }
                        }
                    }
                    $str .= " <td class='combat' style='display:none'>$info->totalVin</td>";
                    $str .= " <td class='combat' style='display:none'>$info->safe</td>";
                    $str .= "</tr>";

                    //kiem tra get subcategory co ton ai hay
                    if (!empty($sub_list)) {
                        foreach ($sub_list as $row) {
                            if ($row->active == 1) {
                                $optinfo1 = readURLAPI($this->config->item('api_url') . '?c=407&nn=' . $row->nickname);
                                $data1 = json_decode($optinfo1);
                                $info1 = $data1->transactions;
                                $totalVin1 = number_format($info1->totalVin);
                                $safe1 = number_format($info1->safe);
                                $vippoint1 = number_format($info1->vippoint);
                                $vippointsave1 = number_format($info1->vippointsave);
                                $str .= "<tr >";  //kiem tra con parent hay ko
                                $str .= " <td>$i</td>";
                                $str .= " <td>$row->nameagent</td>";
                                $str .= " <td>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href=" . base_url('agency/listtranfer/' . $row->nickname) . " style='color: #1b00ff'>$row->nickname</a></td>";
                                $str .= " <td style='display:none'>$row->email</td>";
                                $str .= " <td>$row->phone</td>";
                                $str .= " <td>$row->address</td>";
                                $str .= " <td>Đang hoạt động</td>";
                                $str .= " <td>$totalVin1 </td>";
                                $str .= " <td>$safe1</td>";
                                $str .= " <td>$vippoint1</td>";
                                $str .= " <td>$vippointsave1</td>";
                                $str .= " <td >$totalVin1 </td>";
                                $str .= " <td>";
                                $str .= "<a href = " . base_url('agency/doanhso/' . $row->id . '/' . $row->nickname) . ">Chi tiết</a>";
                                $str .= "</td>";

                                $str .= "</tr>";

                            }

                        }
                    }
                    $i++;
                }
            }

        }
        return $str;
    }


    function toplienminhmien()
    {

        $this->data['temp'] = 'admin/topdoanhso/toplienminh';
        $this->load->view('admin/main', $this->data);
    }

    function topdoanhsobanmien()
    {

        $this->data['temp'] = 'admin/topdoanhso/topdsban';
        $this->load->view('admin/main', $this->data);
    }


    function topdsban2mien()
    {

        $this->data['temp'] = 'admin/topdoanhso/topdsban2mien';
        $this->load->view('admin/main', $this->data);
    }

    function toplienminh2mien()
    {

        $this->data['temp'] = 'admin/topdoanhso/toplienminh2mien';
        $this->load->view('admin/main', $this->data);
    }
    

}
<?php

Class Resulttaixiu_model extends MY_Model
{
    public $table = 'result_tai_xiu';
    var $key = 'id';
    // Order mac dinh (VD: $order = array('id', 'desc))
    var $order = '';
    // Cac field select mac dinh khi get_list (VD: $select = 'id, name')
    var $select = '';

    function __construct()
    {
        parent::__construct();
        $this->db2 = $this->load->database('vinplay_minigame', TRUE);
    }

    function get_total_game($input = array())
    {
        $this->get_list_set_input_game($input);
        $query = $this->db2->get($this->table);
        return $query->num_rows();
    }

    function get_list_game($input = array())
    {
        //xu ly ca du lieu dau vao
        $this->get_list_set_input_game($input);
        //thuc hien truy van du lieu
        $query = $this->db2->get($this->table);
        return $query->result();
    }

    /**
     * Gan cac thuoc tinh trong input khi lay danh sach
     * $input : mang du lieu dau vao
     */

    protected function get_list_set_input_game($input = array())
    {
        // Thêm điều kiện cho câu truy vấn truyền qua biến $input['where']
        //(vi du: $input['where'] = array('email' => 'hocphp@gmail.com'))
        if ((isset($input['where'])) && $input['where']) {
            $this->db2->where($input['where']);
        }
        //tim kiem like
        // $input['like'] = array('name' , 'abc');
        if ((isset($input['like'])) && $input['like']) {
            $this->db2->like($input['like'][0], $input['like'][1]);
        }
        // Thêm sắp xếp dữ liệu thông qua biến $input['order']
        //(ví dụ $input['order'] = array('id','DESC'))
        if (isset($input['order'][0]) && isset($input['order'][1])) {
            $this->db2->order_by($input['order'][0], $input['order'][1]);
        } else {
            //mặc định sẽ sắp xếp theo id giảm dần
            $order = ($this->order == '') ? array($this->table . '.' . $this->key, 'desc') : $this->order;
            $this->db2->order_by($order[0], $order[1]);
        }
        // Thêm điều kiện limit cho câu truy vấn thông qua biến $input['limit']
        //(ví dụ $input['limit'] = array('10' ,'0'))
        if (isset($input['limit'][0]) && isset($input['limit'][1])) {
            $this->db2->limit($input['limit'][0], $input['limit'][1]);
        }
    }

    function update($id, $data)
    {
        if (!$id) {
            return FALSE;
        }
        $where = array();
        $where[$this->key] = $id;
        $this->update_rule($where, $data);
        return TRUE;
    }

    function update_rule($where, $data)
    {
        if (!$where) {
            return FALSE;
        }
        $this->db2->where($where);
        $this->db2->update($this->table, $data);
        return TRUE;
    }

    function get_info($id, $field = '')
    {
        if (!$id) {
            return FALSE;
        }
        $where = array();
        $where[$this->key] = $id;
        return $this->get_info_rule($where, $field);
    }

    /**
     * Lay thong tin cua row tu dieu kien
     * $where: Mảng điều kiện
     * $field: Cột muốn lấy dữ liệu
     */
    function get_info_rule($where = array(), $field = '')
    {
        if ($field) {
            $this->db2->select($field);
        }
        $this->db2->where($where);
        $query = $this->db2->get($this->table);
        if ($query->num_rows()) {
            return $query->row();
        }
        return FALSE;
    }

    function search()
    {
        $sort_order = "desc";
        $sort_by = 'id';
        $q = $this->db2->select('*')
            ->from('result_tai_xiu')
            ->order_by($sort_by, $sort_order)
            ->limit(1000);
        if ($this->input->get('phien')) {
            $q->where('reference_id', $this->input->get('phien'));
        }
        if ($this->input->get('money') != "") {
            $q->where('money_type', $this->input->get('money'));
        } else {
            $q->where('money_type', "1");
        }
        if ($this->input->get('created') && $this->input->get('created_to')) {
            $time = get_time_between_day($this->input->get('created'), $this->input->get('created_to'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" . "'" . $time['start'] . "'" . "AND " . "'" . $time['end'] . "'");
        }
        $q->where('total_xiu !=', 'null');
        $q->or_where('total_tai !=', 'null');
        if ($this->input->get('phien')) {
            $q->where('reference_id', $this->input->get('phien'));
        }
        if ($this->input->get('money') != "") {
            $q->where('money_type', $this->input->get('money'));
        } else {
            $q->where('money_type', "1");
        }
        if ($this->input->get('created') && $this->input->get('created_to')) {
            $time = get_time_between_day($this->input->get('created'), $this->input->get('created_to'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" . "'" . $time['start'] . "'" . "AND " . "'" . $time['end'] . "'");
        }
        //nếu dữ liệu trả về hợp lệ
        $ret['rows'] = $q->get()->result();
        return $ret;
    }

    function account_taixiu()
    {
        $sort_order = 'desc';
        $sort_by = 'id';
        $q = $this->db2->select('*')
            ->from('transaction_tai_xiu')
            ->order_by($sort_by, $sort_order)
            ->limit(1000);
        if ($this->input->get('name')) {
            $q->like('user_name', $this->input->get('name'));
        }
        if ($this->input->get('money') != "") {
            $q->where('money_type', $this->input->get('money'));
        } else {
            $q->where('money_type', 1);
        }
        if ($this->input->get('created') && $this->input->get('created_to')) {
            $time = get_time_between_day($this->input->get('created'), $this->input->get('created_to'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" . "'" . $time['start'] . "'" . "AND " . "'" . $time['end'] . "'");
        }
        //nếu dữ liệu trả về hợp lệ
        $ret['rows'] = $q->get()->result();
        return $ret;
    }

    function thanh_du()
    {
        $sort_order = 'desc';
        $sort_by = 'number';
        $q = $this->db2->select('*')
            ->from('thanh_du')
            ->order_by($sort_by, $sort_order);
        if ($this->input->get('name')) {
            $q->like('user_name', $this->input->get('name'));
        }
        if ($this->input->get('result') != '') {
            $q->where('type', $this->input->get('result'));
        } else {
            $q->where('type', "0");
        }
        if ($this->input->get('created') && $this->input->get('created_to')) {
            $time = get_time_between_day($this->input->get('created'), $this->input->get('created_to'));
            $q->where("DATE_FORMAT(`last_update`, '%Y-%m-%d') BETWEEN" . "'" . $time['start'] . "'" . "AND " . "'" . $time['end'] . "'");
        }
        $ret['rows'] = $q->get()->result();
        return $ret;
    }

    function detailtai($phien, $money)
    {
        $sort_order = 'asc';
        $sort_by = 'timestamp';
        $q = $this->db2->select('*')
            ->from('transaction_detail_tai_xiu')
            ->order_by($sort_by, $sort_order);
        $q->where('reference_id', $phien);
        $q->where('money_type', $money);
        $q->where('bet_side', 1);
        $ret['rows'] = $q->get()->result();
        return $ret;

    }

    function detailxiu($phien, $money)
    {
        $sort_order = 'asc';
        $sort_by = 'timestamp';
        $q = $this->db2->select('*')
            ->from('transaction_detail_tai_xiu')
            ->order_by($sort_by, $sort_order);
        $q->where('reference_id', $phien);
        $q->where('money_type', $money);
        $q->where('bet_side', 0);
        $ret['rows'] = $q->get()->result();
        return $ret;

    }

    function soicau()
    {
        $sort_order = "desc";
        $sort_by = 'id';
        $q = $this->db2->select('*')
            ->from('result_tai_xiu')
            ->order_by($sort_by, $sort_order)
            ->limit(2000);
        $q->where('money_type', 1);
        $ret['rows'] = $q->get()->result();
        $q = $this->db2->select('COUNT(*) as count from (select * from result_tai_xiu where `money_type` = 1 order by `id` DESC limit 2000) as tbl where tbl.result = 1', FALSE);
        $tmp = $q->get()->result();
        $ret['num_rows'] = $tmp[0]->count;
        return $ret;

    }

}


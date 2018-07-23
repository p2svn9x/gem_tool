<?php
Class Logadmin_model extends MY_Model
{
    var $table = 'log_admin';
	function listlogadmin()
    {
        $sort_order = 'desc';
        $sort_by = 'id';
        $q = $this->db->select('*')
            ->from('log_admin')
            ->order_by($sort_by, $sort_order)
            ->limit(1000);
        if ($this->input->post('name')) {
            $q->like('username', $this->input->post('name'));
            $q->or_like('account_name', $this->input->post('name'));
        }
		 if ($this->input->post('action')) {
            $q->like('action', $this->input->post('action'));
        }
        if ($this->input->post('fromDate') && $this->input->post('toDate')) {
            $time = get_time_between_day($this->input->post('fromDate'), $this->input->post('toDate'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" . "'" . $time['start'] . "'" . "AND " . "'" . $time['end'] . "'");
        }
        //nếu dữ liệu trả về hợp lệ
        $ret['rows'] = $q->get()->result();
        return $ret;
    }
}
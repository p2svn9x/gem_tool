<?php
Class Log_loginadmin_model extends MY_Model
{
    var $table = 'log_loginadmin';
    function listlogloginadmin()
    {
        $sort_order = 'desc';
        $sort_by = 'id';
        $q = $this->db->select('*')
            ->from('log_loginadmin')
            ->order_by($sort_by, $sort_order)
            ->limit(1000);
        if ($this->input->post('username')) {
            $q->like('username', $this->input->post('username'));
            // $q->or_like('account_name', $this->input->post('name'));
        }
        if ($this->input->post('nickname')) {
            $q->like('nickname', $this->input->post('nickname'));
        }
        if ($this->input->post('ststatus') != "") {
            $q->where('status', $this->input->post('ststatus'));
        }else{
            $q->where('status',0);
        }
        if ($this->input->post('fromDate') && $this->input->post('toDate')) {
            $time = get_time_between_day($this->input->post('toDate'), $this->input->post('fromDate'));
            $q->where("DATE_FORMAT(`createdate`, '%Y-%m-%d') BETWEEN" . "'" . $time['start'] . "'" . "AND " . "'" . $time['end'] . "'");
        }
        $ret['rows'] = $q->get()->result();
        return $ret;
    }
}
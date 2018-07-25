<?php
Class Tranfermoney_model extends MY_Model
{
    var $table = 'tranfer_money_history';

    function get_list_tranfer_money_daily($username){

        $sort_order =  'desc';
        $sort_by = 'id';
        $q =    $this->db->select('*')
            ->from('tranfer_money_history')
            ->order_by($sort_by,$sort_order);
        if($this->input->get('created') && $this->input->get('created_to') ){
            $time = get_time_between_day($this->input->get('created'),$this->input->get('created_to'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" ."'".$time['start']."'"."AND "."'".$time['end']."'");
        }
        $q->where('nick_name_tranfer',$username);
        $q->or_where('nick_name_receive',$username);
        if($this->input->get('created') && $this->input->get('created_to') ){
            $time = get_time_between_day($this->input->get('created'),$this->input->get('created_to'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" ."'".$time['start']."'"."AND "."'".$time['end']."'");
        }
        $ret['rows'] = $q->get()->result();
        $q = $this->db->select('COUNT(*) as count',FALSE)
            ->from('tranfer_money_history');
        if($this->input->get('created') && $this->input->get('created_to') ){
            $time = get_time_between_day($this->input->get('created'),$this->input->get('created_to'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" ."'".$time['start']."'"."AND "."'".$time['end']."'");
        }
        $q->where('nick_name_tranfer',$username);
        $tmp = $q->get()->result();
        $ret['num_row_tr'] = $tmp[0]->count;
        $q = $this->db->select('COUNT(*) as count',FALSE)
            ->from('tranfer_money_history');
        if($this->input->get('created') && $this->input->get('created_to') ){
            $time = get_time_between_day($this->input->get('created'),$this->input->get('created_to'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" ."'".$time['start']."'"."AND "."'".$time['end']."'");
        }
        $q->where('nick_name_receive',$username);
        $tmp = $q->get()->result();
        $ret['num_row_re'] = $tmp[0]->count;
        return $ret;
    }


    function  get_list_tranfer_money(){
        $sort_order =  'desc';
        $sort_by = 'id';
        $q =    $this->db->select('*')
            ->from('tranfer_money_history')
            ->order_by($sort_by,$sort_order);
        if($this->input->get('name')){
            $q->like('nick_name_tranfer',$this->input->get('name'));

        }
        if($this->input->get('namece')){
            $q->like('nick_name_receive',$this->input->get('namece'));
        }
        if($this->input->get('created') && $this->input->get('created_to') ){
            $time = get_time_between_day($this->input->get('created'),$this->input->get('created_to'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" ."'".$time['start']."'"."AND "."'".$time['end']."'");

        }
        $ret['rows'] = $q->get()->result();
        return $ret;
    }

    function get_list_tranfer_doanh_so($username){

        $sort_order =  'desc';
        $sort_by = 'id';
        $q =    $this->db->select('*')
            ->from('tranfer_money_history')
            ->order_by($sort_by,$sort_order);
        if($this->input->get('created') && $this->input->get('created_to') ){
            $time = get_time_between_day($this->input->get('created'),$this->input->get('created_to'));
            $q->where("DATE_FORMAT(`timestamp`, '%Y-%m-%d') BETWEEN" ."'".$time['start']."'"."AND "."'".$time['end']."'");
        }
        $q->where('nick_name_tranfer',$username);
        $q->or_where('nick_name_receive',$username);
        $ret['rows'] = $q->get()->result();
        return $ret;
    }
}
<?php
Class Freemoney_model extends MY_Model
{

    public $table = "freeze_money";
    function __construct()
    {
        parent::__construct();
        $this->db1 = $this->load->database('vinplay', TRUE);
    }
    function get_list_freemoney(){
        $sort_order =  'desc';
        $sort_by = 'create_time';
        $q =    $this->db1->select('*')
            ->from('freeze_money')
            ->order_by($sort_by,$sort_order);
        $q->where('status',1);
        if($this->input->get('name')){
            $q->like('nick_name',$this->input->get('name'));
        }
        if($this->input->get('session')){
            $q->like('session_id',$this->input->get('session'));
        }
        if($this->input->get('money')){
            $q->where('money_type',$this->input->get('money'));
        }
        if($this->input->get('created') && $this->input->get('created_to') ){
            $time = get_time_between_day($this->input->get('created'),$this->input->get('created_to'));
            $q->where("DATE_FORMAT(`create_time`, '%Y-%m-%d') BETWEEN" ."'".$time['start']."'"."AND "."'".$time['end']."'");

        }
        $ret['rows'] = $q->get()->result();
        return $ret;
    }

    function  get_info_freemoney($username){
        $this->db1->where('nick_name',$username);
        $this->db1->where('status',1);
        $query = $this->db1->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
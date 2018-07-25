<?php

Class Eventminigame_model extends MY_Model
{    public $table = 'lucky_rotation';
    function __construct()
    {
        parent::__construct();
        $this->db1 = $this->load->database('vinplay', TRUE);
        $this->db2 = $this->load->database('vinplay_minigame', TRUE);
    }

    function create($data = array())
    {
        if($this->db2->insert($this->table, $data))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function update($nickname,$data = array()){
        $this->db2->where('nick_name', $nickname);
        $this->db2->update('lucky_rotation', $data);
    }


    function  get_info_rotate($username){

        $this->db2->where('nick_name',$username);
        $query = $this->db2->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function get_list_rotate_free()
    {
        $sort_order = 'desc';
        $sort_by = 'rotate_free';
        $q = $this->db2->select('*')
            ->from('lucky_rotation')
            ->order_by($sort_by, $sort_order);
        if ($this->input->get('name')) {
            $q->like('nick_name', $this->input->get('name'));
        }
        $ret['rows'] = $q->get()->result();
        return $ret;
    }
    function  get_list_bonus_candy_slot_free(){
        $this->db1->select('vinplay_minigame.rotate_slot_free.user_id,vinplay_minigame.rotate_slot_free.game_name,vinplay_minigame.rotate_slot_free.rotate_free,vinplay_minigame.rotate_slot_free.max_winning,vinplay_minigame.rotate_slot_free.update_time,vinplay.users.nick_name');
        $this->db1->from('vinplay.users');
        $this->db1->join('vinplay_minigame.rotate_slot_free','vinplay.users.id = vinplay_minigame.rotate_slot_free.user_id');
        $query = $this->db1->get();
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
<?php
Class Accesslink_model extends MY_Model
{
    var $table = 'access_link';
    function  get_list_linkacess_userid($user_id){
        $this->db->select('Link');
        $this->db->where('User_ID',$user_id);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
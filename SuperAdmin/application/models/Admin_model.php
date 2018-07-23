<?php
Class Admin_model extends MY_Model
{
    var $table = 'user';

    function  get_info_admin($username){

        $this->db->where('UserName',$username);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function  get_info_admin_nickname($username){

        $this->db->where('FullName',$username);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function  get_info_admin_parent($parentid){

        $this->db->where('ParentID',$parentid);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_admin_gift_code(){

        $this->db->where('Key!=',null);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
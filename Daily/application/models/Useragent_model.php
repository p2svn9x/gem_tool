<?php
Class Useragent_model extends MY_Model
{
    var $table = 'useragent';
    function  get_info_admin($username){

        $this->db->where('username',$username);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function  get_info_admin_nickname($username){

        $this->db->where('nickname',$username);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function  get_info_admin_parent($parentid){

        $this->db->where('parentid',$parentid);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_admin_gift_code(){

        $this->db->where('key!=',null);
        $this->db->where('parentid',-1);
        $this->db->where('show',1);
        $this->db->where('active',1);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
	function get_dai_ly_by_name($nickname) {
        $this->db->where('nickname',$nickname);
        $this->db->where('status','D');
        $this->db->where('active', 1);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function check_key_agent($key){
        $this->db->where('key',$key);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
	 function  get_info_admin_parent_lv2($parentid){

        $this->db->where('parentid',$parentid);
        $this->db->where('active',1);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
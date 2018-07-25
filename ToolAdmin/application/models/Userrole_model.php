<?php
Class Userrole_model extends MY_Model
{
    var $table = 'userrole';
    function  get_list_role_user($user_id,$group_id){
        $this->db->where('User_ID',$user_id);
        $this->db->where('Group_ID',$group_id);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_list_role_by_userid($user_id){
        $this->db->where('User_ID',$user_id);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_list_role_menu($user_id,$menu_id){
        $this->db->where('User_ID',$user_id);
        $this->db->where('Menu_ID',$menu_id);
        $this->db->join('rolemenu','userrole.Group_ID = rolemenu.Group_ID');
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
<?php
Class Menu_model extends MY_Model
{
    var $table = 'menu';
    //get role by menu
    function  get_list_role_group_user($menu_id){
        $this->db->where('Menu_ID',$menu_id);
        $this->db->where('Parrent_ID','-1');
        $this->db->join('rolemenu','rolemenu.Role_ID=menu.ID');
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_list_role_group_user_sub($menu_id,$role_id){
        $this->db->where('Menu_ID',$role_id);
        $this->db->where('Parrent_ID',$menu_id);
        $this->db->join('rolemenu','rolemenu.Role_ID=menu.ID');
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_list_menu_name_by_menu_id($menu_id){
        $this->db->where('id',$menu_id);
        $this->db->where('Parrent_ID','-1');
        $this->db->where('isThuong','1');
        $this->db->order_by('Param','ASC');
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_list_menu_name_by_parrent_id($menu_id,$group_id){
        $this->db->where('Parrent_ID',$menu_id);
        $this->db->where('Group_ID',$group_id);
        $this->db->where('isThuong','1');
        $this->db->join('rolemenu','menu.id=rolemenu.Menu_ID');
        $this->db->order_by('Param','ASC');
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_menu_id($link){
        $this->db->where('Link',$link);
        $this->db->where('isThuong',1);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }

}
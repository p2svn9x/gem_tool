<?php
Class Menurole_model extends MY_Model
{
    var $table = 'rolemenu';
    function  get_list_role_menu($group_id,$menu_id){
        $this->db->where('Group_ID',$group_id);
        $this->db->where('Menu_ID',$menu_id);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_list_menu_id_by_group($group_id){
        $this->db->where('Group_ID',$group_id);
        $this->db->join('menu','menu.id = rolemenu.Menu_ID');
        $this->db->order_by('Param','ASC');
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
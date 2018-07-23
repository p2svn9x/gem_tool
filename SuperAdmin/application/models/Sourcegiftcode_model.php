<?php
Class Sourcegiftcode_model extends MY_Model
{
    var $table = 'source_giftcode';

    function  get_source_gift_code_marketing(){
        $this->db->where('type',1);
        $this->db->where('display',1);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_source_gift_code_minigame(){
        $this->db->where('type',2);
        $this->db->where('display',1);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function  get_source_gift_code_vanhanh(){
        $this->db->where('type',3);
        $this->db->where('display',1);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_source_gift_code_marketing_view(){
        $this->db->where('type',1);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_source_gift_code_minigame_view(){
        $this->db->where('type',2);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function  get_source_gift_code_vanhanh_view(){
        $this->db->where('type',3);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }

}
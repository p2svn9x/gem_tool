<?php
Class News_model extends MY_Model
{
    var $table = 'news';
    function  get_list_news_relate($id,$catalog_id){
        $this->db->where('catalog_id',$catalog_id);
        $this->db->where('id != ',$id);
        $this->db->limit(3,0);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_list_news_by_catalog_id($catalog_id){
        $this->db->where('catalog_id',$catalog_id);
        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function  get_list_news_by_tag_id($tag_id){
        $this->db->where('tag_id',$tag_id);

        $query = $this->db->get($this->table);
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function search($query_array,$limit,$offset,$sort_by,$sort_order){
        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_column = array('title','id');
        $sort_by = (in_array($sort_by,$sort_column))? $sort_by : 'id';
        $q =    $this->db->select('*')
            ->from('news')
            ->limit($limit,$offset)
            ->order_by($sort_by,$sort_order);
        if(strlen($query_array['name'])){
            $q->like('title',$query_array['name']);
        }
        $ret['rows'] = $q->get()->result();
        $q = $this->db->select('COUNT(*) as count',FALSE)
            ->from('news');
        if(strlen($query_array['name'])){
            $q->like('title',$query_array['name']);
        }
        $tmp = $q->get()->result();
        $ret['num_rows'] = $tmp[0]->count;
        return $ret;
    }
}
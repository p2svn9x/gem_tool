<?php
class Paginationlib {
    //put your code here
    function __construct() {
        $this->ci =& get_instance();
    }

    public function initPagination($base_url,$total_rows,$per_page,$segment){
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config["uri_segment"] = $segment;
        $config['next_link'] = 'Trang kế tiếp';
        $config['prev_link'] = 'Trang trước';
        $this->ci->pagination->initialize($config);
        return $config;
    }

}
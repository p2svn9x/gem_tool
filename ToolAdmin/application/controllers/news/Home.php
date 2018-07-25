<?php
Class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('news_helper');
        $this->load->model('news_model');

        $this->load->model('catalog_model');
    }
    function index()
    {

        $total_rows = $this->news_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac bài viết tren website
        $config['base_url']   = news_url('home/index'); //link hien thi ra danh sach bài viết
        $config['per_page']   = 5;//so luong bài viết hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);


        $list = $this->news_model->get_list($input);
        $this->data['list'] = $list;


        $this->data['temp'] = 'news/home/index';
        $this->load->view('news/main', $this->data);

    }


    function search($query_id = 0, $sort_by = 'id', $sort_order = 'desc',$offset = 0) {
        $limit = 20;
        $query_array = array(
            'name' => $this->input->post('name'),

        );

        $data['page'] = ($this->uri->segment(7)) ? $this->uri->segment(7) : $offset;
        $list = $this->news_model->search($query_array,$limit,$data['page'],$sort_by,$sort_order);
        $this->data['list'] = $list['rows'];

        $this->data['temp'] = 'news/home/search';
        $this->load->view('news/main', $this->data);

    }

    function catagory(){
        //  $id = $this->uri->rsegment('3');
        $last = end($this->uri->segments);
        if(preg_match_all('/\d+/', $last, $numbers))
            $id = end($numbers[0]);

        $info =   $this->catalog_model->get_info($id);
        $this->data['info'] = $info;

        $news_list = $this->news_model->get_list_news_by_catalog_id($id);

        $this->data['listnews'] = $news_list;

        $this->data['temp'] = 'news/home/catagory';
        $this->load->view('news/main', $this->data);

    }

    function tag(){
//        $id = $this->uri->rsegment('3');
//        $id = intval($id);
        $last = end($this->uri->segments);
        if(preg_match_all('/\d+/', $last, $numbers))
            $id = end($numbers[0]);
        $info =   $this->tag_model->get_info($id);
        $this->data['info'] = $info;

        $news_list = $this->news_model->get_list_news_by_tag_id($id);

        $this->data['listnews'] = $news_list;

        $this->data['temp'] = 'news/home/tag';
        $this->load->view('news/main', $this->data);

    }

    function detail(){
//        $id = $this->uri->rsegment('3');
//
//        $id = intval($id);
        $last = end($this->uri->segments);
        if(preg_match_all('/\d+/', $last, $numbers))
            $id = end($numbers[0]);
        $info = $this->news_model->get_info($id);
        $cateinfo =  $this->catalog_model->get_info($info->catalog_id);
        $listnews = $this->news_model->get_list_news_relate($info->id,$info->catalog_id);
        $this->data['listnews'] = $listnews;
        $this->data['info'] = $info;
        $this->data['cateinfo'] = $cateinfo;
        $data['count_view'] = $info->count_view + 1;
        $this->news_model->update($id, $data);
        $this->data['temp'] = 'news/home/detail';
        $this->load->view('news/main', $this->data);
        }
}
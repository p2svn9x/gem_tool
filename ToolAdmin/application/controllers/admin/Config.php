<?php

Class Config extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('gameconfig_model');
        $this->load->model('logadmin_model');
    }

    function index()
    {
        $id = "1";
        $this->load->library('form_validation');
        $this->load->helper('form');
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $update = array("Not Update", "Recommend Update", "Force Update");
        $this->data['update'] = $update;
        $status = array("Running", "Maintain");
        $this->data['status'] = $status;
        //lay thong cua quan trị viên
        $info = $this->gameconfig_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại config');
            redirect(admin_url('config'));
        }
        $this->data['info'] = $info;
        if ($this->input->post()) {

            //them vao csdl
            $data = array(
                'version_ios' => $this->input->post('version_ios'),
                'update_ios' => $this->input->post('hdnios'),
                'url_update_ios' => $this->input->post('url_update_ios'),
                'version_android' => $this->input->post('version_android'),
                'update_android' => $this->input->post('hdnadroid'),
                'url_update_android' => $this->input->post('url_update_android'),
                'version_wp' => $this->input->post('version_wp'),
                'update_wp' => $this->input->post('hdnwp'),
                'version_ios' => $this->input->post('version_ios'),
                'url_update_wp' => $this->input->post('url_update_wp'),
                'version_web' => $this->input->post('version_web'),
                'update_web' => $this->input->post('hdnweb'),
                'url_update_web' => $this->input->post('url_update_web'),
                'server_minigame' => $this->input->post('server_minigame'),
                'port_minigame' => $this->input->post('port_minigame'),
                'status_minigame' => $this->input->post('hdnminigame'),
                'server_sam' => $this->input->post('server_sam'),
                'port_sam' => $this->input->post('port_sam'),
                'status_sam' => $this->input->post('hdnsam'),
                'server_bacay' => $this->input->post('server_bacay'),
                'port_bacay' => $this->input->post('port_bacay'),
                'status_bacay' => $this->input->post('hdnbacay'),
                'server_binh' => $this->input->post('server_binh'),
                'port_binh' => $this->input->post('port_binh'),
                'status_binh' => $this->input->post('hdnbinh'),
                'server_tlmn' => $this->input->post('server_tlmn'),
                'port_tlmn' => $this->input->post('port_tlmn'),
                'status_tlmn' => $this->input->post('hdntlmn'),
                'url_help' => $this->input->post('urlhelp'),
                'phone' => $this->input->post('phone'),
                'facebook' => $this->input->post('facebook')
            );

            if ($this->gameconfig_model->update($id, $data)) {
                //tạo ra nội dung thông báo
                $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
            } else {
                $this->session->set_flashdata('message', 'Không cập nhật được');
            }
            redirect(admin_url('config'));

        }
        $this->data['temp'] = 'admin/config/index';
        $this->load->view('admin/main', $this->data);
    }

    function add()
    {
        $this->data['temp'] = 'admin/config/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {
        $namecf = $this->uri->rsegment('3');
        $this->data['namecf'] = $namecf;
        $plat = $this->uri->rsegment('4');
        $this->data['plat'] = $plat;
        $id = $this->uri->rsegment('5');
        $this->data['id'] = $id;
        $this->data['temp'] = 'admin/config/edit';
        $this->load->view('admin/main', $this->data);
    }

    function getdata()
    {
        $txtversion = $this->input->post("txtversion");
        $txtupdate = intval($this->input->post("txtupdate"));
        $txturlupdate = $this->input->post("txturlupdate");
        $txtmesupdate = $this->input->post("txtmesupdate");
        $txtistcp = $this->input->post("txtistcp");
        $txtstatusmini = intval($this->input->post("txtstatusmini"));
        $txtstatusgame = intval($this->input->post("txtstatusgame"));
        $txtcallcm = intval($this->input->post("txtcallcm"));
        $txtrecharge = intval($this->input->post("txtrecharge"));
        $txtcashout = intval($this->input->post("txtcashout"));
        $txtipmini = $this->input->post("txtipmini");
        $txtportmini = intval($this->input->post("txtportmini"));
        $txtstatussam = intval($this->input->post("txtstatussam"));
        $txtipsam = $this->input->post("txtipsam");
        $txtportsam = intval($this->input->post("txtportsam"));
        $txtstatusbacay = intval($this->input->post("txtstatusbacay"));
        $txtipbacay = $this->input->post("txtipbacay");
        $txtportbacay = intval($this->input->post("txtportbacay"));
        $txtstatusbinh = intval($this->input->post("txtstatusbinh"));
        $txtipbinh = $this->input->post("txtipbinh");
        $txtportbinh = intval($this->input->post("txtportbinh"));
        $txtstatustlmn = intval($this->input->post("txtstatustlmn"));
        $txtiptlmn = $this->input->post("txtiptlmn");
        $txtporttlmn = intval($this->input->post("txtporttlmn"));
        $txtstatusbc = intval($this->input->post("txtstatusbc"));
        $txtipbc = $this->input->post("txtipbc");
        $txtportbc = intval($this->input->post("txtportbc"));
        $txtstatuslieng = intval($this->input->post("txtstatuslieng"));
        $txtiplieng = $this->input->post("txtiplieng");
        $txtportlieng = intval($this->input->post("txtportlieng"));
        $txtstatuspoker = intval($this->input->post("txtstatuspoker"));
        $txtippoker = $this->input->post("txtippoker");
        $txtportpoker = intval($this->input->post("txtportpoker"));
        $txtstatustala = intval($this->input->post("txtstatustala"));
        $txtiptala = $this->input->post("txtiptala");
        $txtporttala = intval($this->input->post("txtporttala"));
        $txtstatusxito = intval($this->input->post("txtstatusxito"));
        $txtipxito = $this->input->post("txtipxito");
        $txtportxito = intval($this->input->post("txtportxito"));
        $txtstatusxoc = intval($this->input->post("txtstatusxoc"));
        $txtipxoc = $this->input->post("txtipxoc");
        $txtportxoc = intval($this->input->post("txtportxoc"));
        $txtstatuskb = intval($this->input->post("txtstatuskb"));
        $txtipkb = $this->input->post("txtipkb");
        $txtportkb = intval($this->input->post("txtportkb"));
        $txtstatusmnn = intval($this->input->post("txtstatusmnn"));
        $txtipmnn = $this->input->post("txtipmnn");
        $txtportmnn = intval($this->input->post("txtportmnn"));
        $txtstatusave = intval($this->input->post("txtstatusave"));
        $txtipave = $this->input->post("txtipave");
        $txtportave = intval($this->input->post("txtportave"));
        $txtstatusndv = intval($this->input->post("txtstatusndv"));
        $txtipndv = $this->input->post("txtipndv");
        $txtportndv = intval($this->input->post("txtportndv"));
        $txtweb = $this->input->post("txtweb");
        $txthotline = $this->input->post("txthotline");
        $txtsmsotp = $this->input->post("txtsmsotp");
        $txtemail = $this->input->post("txtemail");
        $txtfacebook = $this->input->post("txtfacebook");
        $txturlhelp = $this->input->post("txturlhelp");
        $txtbanner = array_map('strval', explode(',', $this->input->post("txtbanner")));
        $txtotpdf = $this->input->post("txtotpdf");
        $txtotpurlsmt = $this->input->post("txtotpurlsmt");
        $txtotpip = $this->input->post("txtotpip");
        $txtotpurlrmo = $this->input->post("txtotpurlrmo");
        $txtotpdelay = $this->input->post("txtotpdelay");
        $txtmessotp = $this->input->post("txtmessotp");
        $txtmessodp = $this->input->post("txtmessodp");
        $txtmessapp = $this->input->post("txtmessapp");
        $txtmesserrorm = $this->input->post("txtmesserrorm");
        $txtmesserrors = $this->input->post("txtmesserrors");
        $txtdvturl = $this->input->post("txtdvturl");
        $txtdvtkey = $this->input->post("txtdvtkey");
        $txtdvtkeysec = $this->input->post("txtdvtkeysec");
        $txtdatere = $this->input->post("txtdatere");
        $txtsmsopen = $this->input->post("txtsmsopen");
        $txtisopen = $this->input->post("txtisopen");
        $txtbnsender = $this->input->post("txtbnsender");
        $txtbnuser = $this->input->post("txtbnuser");
        $txtbnpass = $this->input->post("txtbnpass");
        $txtbnurl = $this->input->post("txtbnurl");
        $txtbncid = $this->input->post("txtbncid");
        $txtbncuser = $this->input->post("txtbncuser");
        $txtbncpass = $this->input->post("txtbncpass");
        $txtbnurtst = $this->input->post("txtbnurtst");
        $txtisnapthe = intval($this->input->post("txtisnapthe"));
        $txtisnapvinnh = intval($this->input->post("txtisnapvinnh"));
        $txtisnapviniap = intval($this->input->post("txtisnapviniap"));
        $txtpaymentfb = intval($this->input->post("txtpaymentfb"));
        $txtiapmax = intval($this->input->post("txtiapmax"));
        $txtvinplus = intval($this->input->post("txtvinplus"));
        $txtiosnaptien = intval($this->input->post("txtiosnaptien"));
        $txtiosgiftcode = intval($this->input->post("txtiosgiftcode"));
        $txtioschuyenkhoan = intval($this->input->post("txtioschuyenkhoan"));
        $txtiosdaily = intval($this->input->post("txtiosdaily"));
        $txtiosdoithuong = intval($this->input->post("txtiosdoithuong"));
        $txtadnaptien = intval($this->input->post("txtadnaptien"));
        $txtadgiftcode = intval($this->input->post("txtadgiftcode"));
        $txtadchuyenkhoan = intval($this->input->post("txtadchuyenkhoan"));
        $txtaddaily = intval($this->input->post("txtaddaily"));
        $txtaddoithuong = intval($this->input->post("txtaddoithuong"));
        $txtwpnaptien = intval($this->input->post("txtwpnaptien"));
        $txtwpgiftcode = intval($this->input->post("txtwpgiftcode"));
        $txtwpchuyenkhoan = intval($this->input->post("txtwpchuyenkhoan"));
        $txtwpdaily = intval($this->input->post("txtwpdaily"));
        $txtwpdoithuong = intval($this->input->post("txtwpdoithuong"));

        $txtisnapxu = intval($this->input->post("txtisnapxu"));
        $txtischvin = intval($this->input->post("txtischvin"));
        $txtismt = intval($this->input->post("txtismt"));
        $txtisnapdt = intval($this->input->post("txtisnapdt"));
        $txtisntnh = intval($this->input->post("txtisntnh"));
        $txtratioxu = floatval($this->input->post("txtratioxu"));
        $txtrationapthe = floatval($this->input->post("txtrationapthe"));
        $txtrationvnh = floatval($this->input->post("txtrationvnh"));
        $txtratiomt = floatval($this->input->post("txtratiomt"));
        $txtrationdt = floatval($this->input->post("txtrationdt"));
        $txtratioch = floatval($this->input->post("txtratioch"));
        $txtrationtnh = floatval($this->input->post("txtrationtnh"));
        $txtnt = array_map('intval', explode(',', $this->input->post("txtnt")));
        $txtnvnh = array_map('intval', explode(',', $this->input->post("txtnvnh")));
        $txtmtdt = array_map('intval', explode(',', $this->input->post("txtmtdt")));
        $txtmtg = array_map('intval', explode(',', $this->input->post("txtmtg")));
        $txtntdt = array_map('intval', explode(',', $this->input->post("txtntdt")));
        $txtntnh = array_map('intval', explode(',', $this->input->post("txtntnh")));
        $txtvt = array_map('intval', explode(',', $this->input->post("txtvt")));
        $txtvina = array_map('intval', explode(',', $this->input->post("txtvina")));
        $txtmobi = array_map('intval', explode(',', $this->input->post("txtmobi")));
        $txtvnm = array_map('intval', explode(',', $this->input->post("txtvnm")));
        $txtbee = array_map('intval', explode(',', $this->input->post("txtbee")));
        $txtgate = array_map('intval', explode(',', $this->input->post("txtgate")));
        $txtzing = array_map('intval', explode(',', $this->input->post("txtzing")));
        $txtvcoin = array_map('intval', explode(',', $this->input->post("txtvcoin")));
        $txtcvm = intval($this->input->post("txtcvm"));
        $txtclu = intval($this->input->post("txtclu"));
        $txtcls = intval($this->input->post("txtcls"));
        $txtnrf = intval($this->input->post("txtnrf"));
        $txtndt = intval($this->input->post("txtndt"));
        $txtcashtb = intval($this->input->post("txtcashtb"));
        $txtsuadmin = $this->input->post("txtsuadmin");
        $txtsuagent = $this->input->post("txtsuagent");
        $txtcashbm = intval($this->input->post("txtcashbm"));
        $txtratiore1 = floatval($this->input->post("txtratiore1"));
        $txtratiore2 = floatval($this->input->post("txtratiore2"));
        $txtratiotdl = floatval($this->input->post("txtratiotdl"));
        $txtratio01 = floatval($this->input->post("txtratio01"));
        $txtratio02 = floatval($this->input->post("txtratio02"));
        $txtratio20 = floatval($this->input->post("txtratio20"));
        $txtratio21 = floatval($this->input->post("txtratio21"));
        $txtratio22 = floatval($this->input->post("txtratio22"));
        $txtratio11 = floatval($this->input->post("txtratio11"));
        $txtratio12 = floatval($this->input->post("txtratio12"));
        $txti2billing = array_map('intval', explode(',', $this->input->post("txti2billing")));
        $txtdl1smin = intval($this->input->post("txtdl1smin"));
        $txtdl1smax = intval($this->input->post("txtdl1smax"));
        $txtdl1sodumin = intval($this->input->post("txtdl1sodumin"));
        $txturlae = $this->input->post("txturlae");
        $txtsign = $this->input->post("txtsign");
        $txtlistgb = $this->input->post("txtlistgb");
        $txtphonecb = $this->input->post("txtphonecb");
        $txthugbmax = intval($this->input->post("txthugbmax"));
        $txtsmsfee = intval($this->input->post("txtsmsfee"));
        $configpf = $this->input->post("configpf");
        $txtnamebc = $this->input->post("txtnamebc");
        $txtdaybc = array_map('intval', explode(',', $this->input->post("txtdaybc")));
        $txtbdbch = intval($this->input->post("txtbdbch"));
        $txtbdbcm = intval($this->input->post("txtbdbcm"));
        $txtktbch = intval($this->input->post("txtktbch"));
        $txtktbcm = intval($this->input->post("txtktbcm"));
        $txtinibc = intval($this->input->post("txtinibc"));
        $txtaddbc = intval($this->input->post("txtaddbc"));
        $txt100bc = intval($this->input->post("txt100bc"));
        $txt200bc = intval($this->input->post("txt200bc"));
        $txt500bc = intval($this->input->post("txt500bc"));
        $txt1nbc = intval($this->input->post("txt1nbc"));
        $txt2nbc = intval($this->input->post("txt2nbc"));
        $txt5nbc = intval($this->input->post("txt5nbc"));
        $txt10nbc = intval($this->input->post("txt10nbc"));
        $txt20nbc = intval($this->input->post("txt20nbc"));
        $txt50nbc = intval($this->input->post("txt50nbc"));
        $txt100nbc = intval($this->input->post("txt100nbc"));
        $txt200nbc = intval($this->input->post("txt200nbc"));
        $txtnametlmn = $this->input->post("txtnametlmn");
        $txtdaytlmn = array_map('intval', explode(',', $this->input->post("txtdaytlmn")));
        $txtbdtlmnh = intval($this->input->post("txtbdtlmnh"));
        $txtbdtlmnm = intval($this->input->post("txtbdtlmnm"));
        $txtkttlmnh = intval($this->input->post("txtkttlmnh"));
        $txtkttlmnm = intval($this->input->post("txtkttlmnm"));
        $txtinitlmn = intval($this->input->post("txtinitlmn"));
        $txtaddtlmn = intval($this->input->post("txtaddtlmn"));
        $txt100tlmn = intval($this->input->post("txt100tlmn"));
        $txt200tlmn = intval($this->input->post("txt200tlmn"));
        $txt500tlmn = intval($this->input->post("txt500tlmn"));
        $txt1ntlmn = intval($this->input->post("txt1ntlmn"));
        $txt2ntlmn = intval($this->input->post("txt2ntlmn"));
        $txt5ntlmn = intval($this->input->post("txt5ntlmn"));
        $txt10ntlmn = intval($this->input->post("txt10ntlmn"));
        $txt20ntlmn = intval($this->input->post("txt20ntlmn"));
        $txt50ntlmn = intval($this->input->post("txt50ntlmn"));
        $txt100ntlmn = intval($this->input->post("txt100ntlmn"));
        $txt200ntlmn = intval($this->input->post("txt200ntlmn"));
        $txtnamesam = $this->input->post("txtnamesam");
        $txtdaysam = array_map('intval', explode(',', $this->input->post("txtdaysam")));
        $txtbdsamh = intval($this->input->post("txtbdsamh"));
        $txtbdsamm = intval($this->input->post("txtbdsamm"));
        $txtktsamh = intval($this->input->post("txtktsamh"));
        $txtktsamm = intval($this->input->post("txtktsamm"));
        $txtinisam = intval($this->input->post("txtinisam"));
        $txtaddsam = intval($this->input->post("txtaddsam"));
        $txt100sam = intval($this->input->post("txt100sam"));
        $txt200sam = intval($this->input->post("txt200sam"));
        $txt500sam = intval($this->input->post("txt500sam"));
        $txt1nsam = intval($this->input->post("txt1nsam"));
        $txt2nsam = intval($this->input->post("txt2nsam"));
        $txt5nsam = intval($this->input->post("txt5nsam"));
        $txt10nsam = intval($this->input->post("txt10nsam"));
        $txt20nsam = intval($this->input->post("txt20nsam"));
        $txt50nsam = intval($this->input->post("txt50nsam"));
        $txt100nsam = intval($this->input->post("txt100nsam"));
        $txt200nsam = intval($this->input->post("txt200nsam"));
        $txtnamebinh = $this->input->post("txtnamebinh");
        $txtdaybinh = array_map('intval', explode(',', $this->input->post("txtdaybinh")));
        $txtbdbinhh = intval($this->input->post("txtbdbinhh"));
        $txtbdbinhm = intval($this->input->post("txtbdbinhm"));
        $txtktbinhh = intval($this->input->post("txtktbinhh"));
        $txtktbinhm = intval($this->input->post("txtktbinhm"));
        $txtinibinh = intval($this->input->post("txtinibinh"));
        $txtaddbinh = intval($this->input->post("txtaddbinh"));
        $txt100binh = intval($this->input->post("txt100binh"));
        $txt200binh = intval($this->input->post("txt200binh"));
        $txt500binh = intval($this->input->post("txt500binh"));
        $txt1nbinh = intval($this->input->post("txt1nbinh"));
        $txt2nbinh = intval($this->input->post("txt2nbinh"));
        $txt5nbinh = intval($this->input->post("txt5nbinh"));
        $txt10nbinh = intval($this->input->post("txt10nbinh"));
        $txt20nbinh = intval($this->input->post("txt20nbinh"));
        $txt50nbinh = intval($this->input->post("txt50nbinh"));
        $txt100nbinh = intval($this->input->post("txt100nbinh"));
        $txt200nbinh = intval($this->input->post("txt200nbinh"));
        $txtnamecao = $this->input->post("txtnamecao");
        $txtdaycao = array_map('intval', explode(',', $this->input->post("txtdaycao")));
        $txtbdcaoh = intval($this->input->post("txtbdcaoh"));
        $txtbdcaom = intval($this->input->post("txtbdcaom"));
        $txtktcaoh = intval($this->input->post("txtktcaoh"));
        $txtktcaom = intval($this->input->post("txtktcaom"));
        $txtinicao = intval($this->input->post("txtinicao"));
        $txtaddcao = intval($this->input->post("txtaddcao"));
        $txt100cao = intval($this->input->post("txt100cao"));
        $txt200cao = intval($this->input->post("txt200cao"));
        $txt500cao = intval($this->input->post("txt500cao"));
        $txt1ncao = intval($this->input->post("txt1ncao"));
        $txt2ncao = intval($this->input->post("txt2ncao"));
        $txt5ncao = intval($this->input->post("txt5ncao"));
        $txt10ncao = intval($this->input->post("txt10ncao"));
        $txt20ncao = intval($this->input->post("txt20ncao"));
        $txt50ncao = intval($this->input->post("txt50ncao"));
        $txt100ncao = intval($this->input->post("txt100ncao"));
        $txt200ncao = intval($this->input->post("txt200ncao"));
        $txtversioni2b = $this->input->post("txtversioni2b");
        $txtnapas = $this->input->post("txtnapas");
        $txtmerchant = $this->input->post("txtmerchant");
        $txtaccess = $this->input->post("txtaccess");
        $txtsecret = $this->input->post("txtsecret");
        $txtuseri2b = $this->input->post("txtuseri2b");
        $txtpwi2b = $this->input->post("txtpwi2b");
        $txturlresult = $this->input->post("txturlresult");
        $txturlcan = $this->input->post("txturlcan");
        $txtamount = intval($this->input->post("txtamount"));
        $txtisopennl = intval($this->input->post("txtisopennl"));
        $txtmeridnl = $this->input->post("txtmeridnl");
        $txtmerpwnl = $this->input->post("txtmerpwnl");
        $txtversionnl = $this->input->post("txtversionnl");
        $txtreemailnl = $this->input->post("txtreemailnl");
        $txtreurlnl = $this->input->post("txtreurlnl");
        $txtcanurlnl = $this->input->post("txtcanurlnl");
        $txttimenl = intval($this->input->post("txttimenl"));
        $txtnlurl = $this->input->post("txtnlurl");
        $txtpaymentnl = $this->input->post("txtpaymentnl");
        $txtnumberdl2 = intval($this->input->post("txtnumberdl2"));
        $txtgiftcodevin = array_map('intval', explode(',', $this->input->post("txtgiftcodevin")));
        $txtgiftcodexu = array_map('intval', explode(',', $this->input->post("txtgiftcodexu")));
        $txtgiftcodedot = array_map('intval', explode(',', $this->input->post("txtgiftcodedot")));
        $txtnumberquay = array_map('intval', explode(',', $this->input->post("txtnumberquay")));
        $txtstartve = $this->input->post("txtstartve");
            $txtendve = $this->input->post("txtendve");
            $txtunluckyve = intval($this->input->post("txtunluckyve"));
            $txtluckyve = intval($this->input->post("txtluckyve"));
            $txtluckystart = $this->input->post("txtluckystart");
            $txtluckyend = $this->input->post("txtluckyend");
            $txtunluckystart = $this->input->post("txtunluckystart");
            $txtunluckyend = $this->input->post("txtunluckyend");
            $txtplaces =  array_map('intval', explode(',', $this->input->post("txtplaces")));
            $txturlhelpve = $this->input->post("txturlhelpve");
            $txtsubvp = floatval($this->input->post("txtsubvp"));
            $txtaddvp300 = intval($this->input->post("txtaddvp300"));
            $txtaddvp210 = intval($this->input->post("txtaddvp210"));
            $txtaddvp100 = intval($this->input->post("txtaddvp100"));
            $txtaddvp60 = intval($this->input->post("txtaddvp60"));
            $txtaddvp30 = intval($this->input->post("txtaddvp30"));
            $txtaddvin2500 = intval($this->input->post("txtaddvin2500"));
            $txtaddvin1500 = intval($this->input->post("txtaddvin1500"));
            $txtaddvin750 = intval($this->input->post("txtaddvin750"));
            $txtaddvin540 = intval($this->input->post("txtaddvin540"));
            $txtaddvin300 = intval($this->input->post("txtaddvin300"));
            $txtaddvin60 = intval($this->input->post("txtaddvin60"));
            $txtaddvin30 = intval($this->input->post("txtaddvin30"));
            $txtratesub = intval($this->input->post("txtratesub"));
            $txtrateadd = intval($this->input->post("txtrateadd"));
        $txtratesubbot = intval($this->input->post("txtratesubbot"));
        $txtrateaddbot = intval($this->input->post("txtrateaddbot"));
        $txtcommonpw = $this->input->post("txtcommonpw");
            $txtcommoniapkey = $this->input->post("txtcommoniapkey");
        $txtgoldout100k = intval($this->input->post("txtgoldout100k"));
            $txtgoldout200k = intval($this->input->post("txtgoldout200k"));
            $txtgoldout500k = intval($this->input->post("txtgoldout500k"));
            $txtgoldout1m = intval($this->input->post("txtgoldout1m"));
            $txtgoldout5m  = intval($this->input->post("txtgoldout5m"));
            $txtgoldout10m  = intval($this->input->post("txtgoldout10m"));
            $txtgoldout20m = intval($this->input->post("txtgoldout20m"));
            $txtgoldout50m = intval($this->input->post("txtgoldout50m"));
            $txtgoldinx2 = intval($this->input->post("txtgoldinx2"));
            $txtgoldinx3 = intval($this->input->post("txtgoldinx3"));
            $txtgoldinx4  = intval($this->input->post("txtgoldinx4"));
            $txtgoldinx5 = intval($this->input->post("txtgoldinx5"));
            $txtgoldnum = intval($this->input->post("txtgoldnum"));
            $txtplout100k = intval($this->input->post("txtplout100k"));
            $txtplout200k = intval($this->input->post("txtplout200k"));
            $txtplout500k = intval($this->input->post("txtplout500k"));
            $txtplout1m = intval($this->input->post("txtplout1m"));
            $txtplout5m = intval($this->input->post("txtplout5m"));
            $txtplout10m = intval($this->input->post("txtplout10m"));
            $txtplout20m = intval($this->input->post("txtplout20m"));
            $txtplout50m = intval($this->input->post("txtplout50m"));
            $txtplinx2 = intval($this->input->post("txtplinx2"));
            $txtplinx3 = intval($this->input->post("txtplinx3"));
            $txtplinx4 = intval($this->input->post("txtplinx4"));
            $txtplinx5 = intval($this->input->post("txtplinx5"));
            $txtplnum = intval($this->input->post("txtplnum"));
            $txtdmout100k = intval($this->input->post("txtdmout100k"));
            $txtdmout200k = intval($this->input->post("txtdmout200k"));
            $txtdmout500k = intval($this->input->post("txtdmout500k"));
            $txtdmout1m = intval($this->input->post("txtdmout1m"));
            $txtdmout5m = intval($this->input->post("txtdmout5m"));
            $txtdmout10m = intval($this->input->post("txtdmout10m"));
            $txtdmout20m = intval($this->input->post("txtdmout20m"));
            $txtdmout50m = intval($this->input->post("txtdmout50m"));
            $txtdminx2 = intval($this->input->post("txtdminx2"));
            $txtdminx3 = intval($this->input->post("txtdminx3"));
            $txtdminx4 = intval($this->input->post("txtdminx4"));
            $txtdminx5 = intval($this->input->post("txtdminx5"));
            $txtdmnum = intval($this->input->post("txtdmnum"));
            $txtdsmin = intval($this->input->post("txtdsmin"));
            $txtbonusfix = array_map('intval', explode(',', $this->input->post("txtbonusfix")));
            $txtbonus500k = intval($this->input->post("txtbonus500k"));
            $txtbonus1m = intval($this->input->post("txtbonus1m"));
            $txtcommonbotvin = $this->input->post("txtcommonbotvin");
            $txtcommonbotxu = $this->input->post("txtcommonbotxu");
            $txtcommonuservin = $this->input->post("txtcommonuservin");
            $txtcommonuserxu = $this->input->post("txtcommonuserxu");
            $txtagentisbonus = intval($this->input->post("txtagentisbonus"));
        if ($configpf == "wp" || $configpf == "ios" || $configpf == "web" || $configpf == "ad") {
            $list = array(
                "version" => $txtversion,
                "update" => $txtupdate,
                "urlUpdate" => $txturlupdate,
                "messageUpdate" => $txtmesupdate,
                "isTcp" => $txtistcp,
                "status_game" => $txtstatusgame,
                "call_common" => $txtcallcm,
                "recharge" => $txtrecharge,
                "cashout" => $txtcashout,
                "minigame" => array(
                    "status" => $txtstatusmini,
                    "ip" => $txtipmini,
                    "port" => $txtportmini
                ),
                "sam" => array(
                    "status" => $txtstatussam,
                    "ip" => $txtipsam,
                    "port" => $txtportsam
                ),
                "bacay" => array(
                    "status" => $txtstatusbacay,
                    "ip" => $txtipbacay,
                    "port" => $txtportbacay
                ),
                "binh" => array(
                    "status" => $txtstatusbinh,
                    "ip" => $txtipbinh,
                    "port" => $txtportbinh
                ),
                "tlmn" => array(
                    "status" => $txtstatustlmn,
                    "ip" => $txtiptlmn,
                    "port" => $txtporttlmn
                ),
                "tala" => array(
                    "status" => $txtstatustala,
                    "ip" => $txtiptala,
                    "port" => $txtporttala
                ),
                "lieng" => array(
                    "status" => $txtstatuslieng,
                    "ip" => $txtiplieng,
                    "port" => $txtportlieng
                ),
                "xito" => array(
                    "status" => $txtstatusxito,
                    "ip" => $txtipxito,
                    "port" => $txtportxito
                ),
                "baicao" => array(
                    "status" => $txtstatusbc,
                    "ip" => $txtipbc,
                    "port" => $txtportbc
                ),
                "xocxoc" => array(
                    "status" => $txtstatusxoc,
                    "ip" => $txtipxoc,
                    "port" => $txtportxoc
                ),
                "poker" => array(
                    "status" => $txtstatuspoker,
                    "ip" => $txtippoker,
                    "port" => $txtportpoker
                ),
                "khobau" => array(
                    "status" => $txtstatuskb,
                    "ip" => $txtipkb,
                    "port" => $txtportkb
                ),
                "avengers" => array(
                    "status" => $txtstatusave,
                    "ip" => $txtipave,
                    "port" => $txtportave
                ),
                "mynhanngu" => array(
                    "status" => $txtstatusmnn,
                    "ip" => $txtipmnn,
                    "port" => $txtportmnn
                ),
                "nudiepvien" => array(
                    "status" => $txtstatusndv,
                    "ip" => $txtipndv,
                    "port" => $txtportndv
                ),
            );
        } elseif ($configpf == "common") {
            $list = array(
                "web" => $txtweb,
                "hotline" => $txthotline,
                "sms_otp" => $txtsmsotp,
                "email" => $txtemail,
                "facebook" => $txtfacebook,
                "urlHelp" => $txturlhelp,
                "banner" => $txtbanner,
                "password_default" => $txtcommonpw,
                "iap_key" => $txtcommoniapkey,
                "bot_vin" => $txtcommonbotvin,
                "bot_xu" => $txtcommonbotxu,
                "user_vin" => $txtcommonuservin,
                "user_xu" => $txtcommonuserxu
            );
        } elseif ($configpf == "otp") {
            $list = array(
                "otp_default" => $txtotpdf,
                "otp_url_send_mt" => $txtotpurlsmt,
                "otp_ip_filter" => $txtotpip,
                "otp_url_receive_mo" => $txtotpurlrmo,
                "otp_delay_send_mt" => $txtotpdelay,
                "message_otp_success" => $txtmessotp,
                "message_odp_success" => $txtmessodp,
                "message_app_success" => $txtmessapp,
                "message_error_mobile" => $txtmesserrorm,
                "message_error_syntax" => $txtmesserrors
            );
        } elseif ($configpf == "dvt") {
            $list = array(
                "dvt_url" => $txtdvturl,
                "dvt_private_key" => $txtdvtkey,
                "dvt_secret_key" => $txtdvtkeysec,
                "dvt_date_re_check" => $txtdatere,
                "sms_open" => $txtsmsopen
            );
        } elseif ($configpf == "brandname") {
            $list = array(
                "is_open" => $txtisopen,
                "brandname_sender" => $txtbnsender,
                "brandname_user" => $txtbnuser,
                "brandname_pass" => $txtbnpass,
                "brandname_url" => $txtbnurl,
                "brandname_client_id" => $txtbncid,
                "brandname_client_user" => $txtbncuser,
                "brandname_client_pass" => $txtbncpass,
                "brandname_url_report_from_st" => $txtbnurtst
            );

        } elseif ($configpf == "billing") {
            $list = array(
                "payment_fb" => $txtpaymentfb,
                "is_nap_the" => $txtisnapthe,
                "is_nap_vin_nh" => $txtisnapvinnh,
                "iap_max" => $txtiapmax,
                "is_nap_vin_iap" => $txtisnapviniap,
                "is_nap_xu" => $txtisnapxu,
                "is_chuyen_vin" => $txtischvin,
                "is_mua_the" => $txtismt,
                "is_nap_dt" => $txtisnapdt,
                "is_nap_tien_nh" => $txtisntnh,
                "is_vin_plus" => $txtvinplus,
                "ratio_xu" => $txtratioxu,
                "ratio_nap_the" => $txtrationapthe,
                "ratio_nap_vin_nh" => $txtrationvnh,
                "ratio_mua_the" => $txtratiomt,
                "ratio_nap_dt" => $txtrationdt,
                "ratio_chuyen" => $txtratioch,
                "ratio_nap_tien_nh" => $txtrationtnh,
                "nap_the" => $txtnt,
                "nap_vin_nh" => $txtnvnh,
                "mua_the_dt" => $txtmtdt,
                "mua_the_game" => $txtmtg,
                "nap_tien_dt" => $txtntdt,
                "nap_tien_nh" => $txtntnh,
                "Viettel" => $txtvt,
                "Vina" => $txtvina,
                "Mobi" => $txtmobi,
                "VNM" => $txtvnm,
                "Beeline" => $txtbee,
                "Gate" => $txtgate,
                "Zing" => $txtzing,
                "Vcoin" => $txtvcoin,
                "chuyen_vin_min" => $txtcvm,
                "cashout_limit_user" => $txtclu,
                "cashout_limit_system" => $txtcls,
                "num_recharge_fail" => $txtnrf,
                "num_doi_the" => $txtndt,
                "cashout_time_block" => $txtcashtb,
                "super_admin" => $txtsuadmin,
                "super_agent" => $txtsuagent,
                "cashout_bank_max" => $txtcashbm,
                "ratio_refund_fee_1" => $txtratiore1,
                "ratio_refund_fee_2" => $txtratiore2,
                "ratio_transfer_dl_1" => $txtratiotdl,
                "i2b" => $txti2billing,
                "dl1_to_super_min" => $txtdl1smin,
                "dl1_to_super_max" => $txtdl1smax,
                "dl1_to_super_min_x" => $txtdl1sodumin,
                "r_tf_01" => $txtratio01,
                "r_tf_02" => $txtratio02,
                "r_tf_20" => $txtratio20,
                "r_tf_21" => $txtratio21,
                "r_tf_22" => $txtratio22,
                "r_tf_11" => $txtratio11,
                "r_tf_12" => $txtratio12
            );
        } else if ($configpf == "other") {
            $list = array(
                "url_active_email" => $txturlae,
                "sign" => $txtsign,
                "list_game_bai" => $txtlistgb,
                "list_phone_alert" => $txtphonecb,
                "hu_game_bai_max" => $txthugbmax,
                "sms_fee" => $txtsmsfee
            );

        } else if ($configpf == "game_bai") {
            $list = array(
                "huvang" => array(
                    array("gameName" => $txtnamebc,
                        "dayInWeek" => $txtdaybc,
                        "startTime" => array("h" => $txtbdbch, "m" => $txtbdbcm),
                        "endTime" => array("h" => $txtktbch, "m" => $txtktbcm),
                        "initial" => $txtinibc, "add" => $txtaddbc,
                        "rate" => array("100" => $txt100bc, "200" => $txt200bc, "500" => $txt500bc, "1000" => $txt1nbc, "2000" => $txt2nbc, "5000" => $txt5nbc, "10000" => $txt10nbc, "20000" => $txt20nbc, "50000" => $txt50nbc, "100000" => $txt100nbc, "200000" => $txt200nbc)
                    ),
                    array("gameName" => $txtnametlmn,
                        "dayInWeek" => $txtdaytlmn,
                        "startTime" => array("h" => $txtbdtlmnh, "m" => $txtbdtlmnm),
                        "endTime" => array("h" => $txtkttlmnh, "m" => $txtkttlmnm),
                        "initial" => $txtinitlmn, "add" => $txtaddtlmn,
                        "rate" => array("100" => $txt100tlmn, "200" => $txt200tlmn, "500" => $txt500tlmn, "1000" => $txt1ntlmn, "2000" => $txt2ntlmn, "5000" => $txt5ntlmn, "10000" => $txt10ntlmn, "20000" => $txt20ntlmn, "50000" => $txt50ntlmn, "100000" => $txt100ntlmn, "200000" => $txt200ntlmn)
                    ),
                    array("gameName" => $txtnamesam,
                        "dayInWeek" => $txtdaysam,
                        "startTime" => array("h" => $txtbdsamh, "m" => $txtbdsamm),
                        "endTime" => array("h" => $txtktsamh, "m" => $txtktsamm),
                        "initial" => $txtinisam, "add" => $txtaddsam,
                        "rate" => array("100" => $txt100sam, "200" => $txt200sam, "500" => $txt500sam, "1000" => $txt1nsam, "2000" => $txt2nsam, "5000" => $txt5nsam, "10000" => $txt10nsam, "20000" => $txt20nsam, "50000" => $txt50nsam, "100000" => $txt100nsam, "200000" => $txt200nsam)
                    ),
                    array("gameName" => $txtnamebinh,
                        "dayInWeek" => $txtdaybinh,
                        "startTime" => array("h" => $txtbdbinhh, "m" => $txtbdbinhm),
                        "endTime" => array("h" => $txtktbinhh, "m" => $txtktbinhm),
                        "initial" => $txtinibinh, "add" => $txtaddbinh,
                        "rate" => array("100" => $txt100binh, "200" => $txt200binh, "500" => $txt500binh, "1000" => $txt1nbinh, "2000" => $txt2nbinh, "5000" => $txt5nbinh, "10000" => $txt10nbinh, "20000" => $txt20nbinh, "50000" => $txt50nbinh, "100000" => $txt100nbinh, "200000" => $txt200nbinh)
                    ),
                    array("gameName" => $txtnamecao,
                        "dayInWeek" => $txtdaycao,
                        "startTime" => array("h" => $txtbdcaoh, "m" => $txtbdcaom),
                        "endTime" => array("h" => $txtktcaoh, "m" => $txtktcaom),
                        "initial" => $txtinicao, "add" => $txtaddcao,
                        "rate" => array("100" => $txt100cao, "200" => $txt200cao, "500" => $txt500cao, "1000" => $txt1ncao, "2000" => $txt2ncao, "5000" => $txt5ncao, "10000" => $txt10ncao, "20000" => $txt20ncao, "50000" => $txt50ncao, "100000" => $txt100ncao, "200000" => $txt200ncao)
                    )
                )
            );
        } else if ($configpf == "i2b") {
            $list = array(
                "version" => $txtversioni2b,
                "napas_url" => $txtnapas,
                "merchant_id" => $txtmerchant,
                "access_code" => $txtaccess,
                "secret_key" => $txtsecret,
                "user" => $txtuseri2b,
                "password" => $txtpwi2b,
                "url_result" => $txturlresult,
                "url_cancel" => $txturlcan,
                "amount_min" => $txtamount
            );

        } else if ($configpf == "nganluong") {
            $list = array(
                "is_open" => $txtisopennl,
                "merchant_id" => $txtmeridnl,
                "merchant_password" => $txtmerpwnl,
                "version" => $txtversionnl,
                "receiver_email" => $txtreemailnl,
                "return_url" => $txtreurlnl,
                "cancel_url" => $txtcanurlnl,
                "time_limit" => $txttimenl,
                "nl_url" => $txtnlurl,
                "payment_method" => $txtpaymentnl
            );
        } else if ($configpf == "admin") {
            $list = array(
                "number_dl2" => $txtnumberdl2,
                "giftcode_vin" => $txtgiftcodevin,
                "giftcode_xu" => $txtgiftcodexu,
                "giftcode_version" => $txtgiftcodedot,
                "number_quay" => $txtnumberquay
            );
        } else if ($configpf == "vin_plus") {
            $list = array("ios" => array("nap_tien" => $txtiosnaptien, "gift_code" => $txtiosgiftcode, "chuyen_khoan" => $txtioschuyenkhoan, "dai_ly" => $txtiosdaily, "doi_thuong" => $txtiosdoithuong),
                "ad" => array("nap_tien" => $txtadnaptien, "gift_code" => $txtadgiftcode, "chuyen_khoan" => $txtadchuyenkhoan, "dai_ly" => $txtaddaily, "doi_thuong" => $txtaddoithuong),
                "wp" => array("nap_tien" => $txtwpnaptien, "gift_code" => $txtwpgiftcode, "chuyen_khoan" => $txtwpchuyenkhoan, "dai_ly" => $txtwpdaily, "doi_thuong" => $txtwpdoithuong)
            );
        }else if ($configpf == "vippoint_event") {
            $list = array(
                "start" => $txtstartve,
                "end" => $txtendve,
                "lucky_time" => array("start"=>$txtluckystart,"end" => $txtluckyend),
                "unlucky_time" => array("start"=>$txtunluckystart,"end" => $txtunluckyend),
                "unlucky_in_day" => $txtunluckyve,
                "lucky_in_day" => $txtluckyve,
                "places" =>$txtplaces,
                "url_help" => $txturlhelpve,
                "sub_vp" => $txtsubvp,
                "add_vp" => array(array("300"=>$txtaddvp300),array("210"=>$txtaddvp210),array("100"=>$txtaddvp100),array("60"=>$txtaddvp60),array("30"=>$txtaddvp30)),
                "add_vin" => array(array("2500"=>$txtaddvin2500),array("1500"=>$txtaddvin1500),array("750"=>$txtaddvin750),array("540"=>$txtaddvin540),array("300"=>$txtaddvin300),array("60"=>$txtaddvin60),array("30"=>$txtaddvin30)),
                "rate_sub" => $txtratesub,
                "rate_add" => $txtrateadd,
                "rate_sub_bot" => $txtratesubbot,
                "rate_add_bot" => $txtrateaddbot
            );
        }
        else if ($configpf == "lucky_vip") {
            $list = array(
                "gold" => array("out"=>array("_100K"=>$txtgoldout100k,"_200K"=>$txtgoldout200k,"_500K"=>$txtgoldout500k,"_1M"=>$txtgoldout1m,"_5M"=>$txtgoldout5m,"_10M"=>$txtgoldout10m,"_20M"=>$txtgoldout20m,"_50M"=>$txtgoldout50m),"in"=>array("X2"=>$txtgoldinx2,"X3"=>$txtgoldinx3,"X4"=>$txtgoldinx4,"X5"=>$txtgoldinx5),"num"=>$txtgoldnum),
                "platinum" => array("out"=>array("_100K"=>$txtplout100k,"_200K"=>$txtplout200k,"_500K"=>$txtplout500k,"_1M"=>$txtplout1m,"_5M"=>$txtplout5m,"_10M"=>$txtplout10m,"_20M"=>$txtplout20m,"_50M"=>$txtplout50m),"in"=>array("X2"=>$txtplinx2,"X3"=>$txtplinx3,"X4"=>$txtplinx4,"X5"=>$txtplinx5),"num"=>$txtplnum),
                "diamond" => array("out"=>array("_100K"=>$txtdmout100k,"_200K"=>$txtdmout200k,"_500K"=>$txtdmout500k,"_1M"=>$txtdmout1m,"_5M"=>$txtdmout5m,"_10M"=>$txtdmout10m,"_20M"=>$txtdmout20m,"_50M"=>$txtdmout50m),"in"=>array("X2"=>$txtdminx2,"X3"=>$txtdminx3,"X4"=>$txtdminx4,"X5"=>$txtdminx5),"num"=>$txtdmnum)
            );
        }
        else if ($configpf == "agent") {
            $list = array(
                "is_bonus" => $txtagentisbonus,
                "ds_min" => $txtdsmin,
                "bonus_fix" => $txtbonusfix,
                "bonus_more" => array(array("500000"=>$txtbonus500k),array("1000000"=>$txtbonus1m))
            );
        }
        $listjson = json_encode($list);
        echo $listjson;
    }

    function listconfig()
    {
        $list = $this->gameconfig_model->get_list_game_config();
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/config/listconfig';
        $this->load->view('admin/main', $this->data);
    }

    function listconfigajax()
    {
        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=601&pf=' . "" . '&nm=' . "");
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function editajax()
    {
        $configpf = $this->input->post('configpf');
        $nmconfig = $this->input->post('nmconfig');

        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=601&pf=' . $configpf . '&nm=' . $nmconfig);
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function successeditajax()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $idconfig = $this->input->post('idconfig');
        $valueconfig = urlencode($this->input->post('valueconfig'));
        $versionconfig = $this->input->post('versionconfig');
        $configpf = $this->input->post('configpf');

        $datainfo = file_get_contents($this->config->item('api_backend') . '?c=603&gid=' . $idconfig . '&gv=' . $valueconfig . '&v=' . $versionconfig . '&pf=' . $configpf);
        if (isset($datainfo)) {
            $data = array(
                'account_name' => $configpf,
                'username' => $admin_info->UserName,
                'action' => "Sửa config",
            );
            $this->logadmin_model->create($data);
            echo $datainfo;

        } else {
            echo "Bạn không được hack";
        }
    }

    function configajax()
    {
        $datainfo = file_get_contents($this->config->item('api_url') . '?c=7');
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
}
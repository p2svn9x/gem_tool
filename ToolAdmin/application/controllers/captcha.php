<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class captcha extends CI_Controller {

// Load Helper in and Start session.
    function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
        session_start();
    }
// This function show values in view page and check captcha value.
    public function form() {
        if(empty($_POST)){
            $this->captcha_setting();
        }
        else{
// Case comparing values.
            if (strcasecmp($_SESSION['captchaWord'], $_POST['captcha']) == 0) {
                echo "<script type='text/javascript'> alert('Your form successfully submitted'); </script>";
                $this->captcha_setting();
            } else {
                echo "<script type='text/javascript'> alert('Try Again'); </script>";
                $this->captcha_setting();
            }
        }
    }
// This function generates CAPTCHA image and store in "image folder".
    public function captcha_setting(){
        $values = array(
            'word' => '',
            'word_length' => 8,
            'img_path' => './images/',
            'img_url' => base_url() .'images/',
            'font_path' => base_url() . 'system/fonts/texb.ttf',
            'img_width' => '150',
            'img_height' => 50,
            'expiration' => 3600
        );
        $data = create_captcha($values);
        $_SESSION['captchaWord'] = $data['word'];

// image will store in "$data['image']" index and its send on view page
        $this->load->view('captcha_view', $data);
    }
// For new image on click refresh button.
    public function captcha_refresh(){
        $values = array(
            'word' => '',
            'word_length' => 8,
            'img_path' => './images/',
            'img_url' => base_url() .'images/',
            'font_path' => base_url() . 'system/fonts/texb.ttf',
            'img_width' => '150',
            'img_height' => 50,
            'expiration' => 3600
        );
        $data = create_captcha($values);
        $_SESSION['captchaWord'] = $data['word'];
        echo $data['image'];

    }
}
?>
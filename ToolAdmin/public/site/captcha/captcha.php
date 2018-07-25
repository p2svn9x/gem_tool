<?php
error_reporting(E_ALL);
header("Content-type: image/png");
captcha();
function ran_string($length=10){
    $string="";
    $pattern = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    for($i=0; $i<$length; $i++){
        $string .= $pattern[rand(0,61)];
    }

    return $string;
}
function captcha()
{
    $string=ran_string();
    $_SESSION['captcha'] = $string;
    $im = imagecreate(100, 50);
    $background_color = imagecolorallocatealpha($im , 255, 255, 255, 127);
    $text_color =array( imagecolorallocate($im, 231, 11, 24),imagecolorallocate($im, 37, 233, 24),imagecolorallocate($im, 255, 175, 0),imagecolorallocate($im, 220, 0, 217),imagecolorallocate($im, 255, 255, 255));
    for($i=0;$i<count($string);$i++)
    {
        $x=($i+1)*10;
        imagestring ($im, 10, 10, 10,  $string[0], $text_color[rand(0,0)]);
        imagestring ($im, 10, 25, 10,  $string[1], $text_color[rand(1,1)]);
        imagestring($im, 10, 40, 10,  $string[2], $text_color[rand(2,2)]);
        imagestring($im,10, 55, 10,  $string[3], $text_color[rand(3,3)]);
        imagestring($im,10, 70, 10,  $string[3], $text_color[rand(4,4)]);
    }

    imagepng($im);
    imagedestroy($im);
}
?>
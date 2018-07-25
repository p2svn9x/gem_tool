<?php session_start();
if (!empty($_POST['captch'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_POST['captch'])) != $_SESSION['captcha'] || empty($_POST['captch'])) {

        echo '0';
        
    } else {
        echo '1';
       // unset($_SESSION['captcha']);
    }   
}
?>

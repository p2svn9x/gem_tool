<!DOCTYPE html>
<!-- saved from url=(0133)https://id.rikvip.com//login.aspx?sid=350001&ur=http%3a%2f%2frikclub.com%2f&m=1&continue=http://rikclub.com/handler/LoginHandler.ashx -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>

    <link rel="stylesheet" href="<?php echo public_url() ?>/news/login/css/style.css" type="text/css">

    <script async="" src="<?php echo public_url() ?>/news/login/js/analytics.js"></script>

    <script type="text/javascript" src="<?php echo public_url() ?>/news/login/js/jquery-1.9.1.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/news/login/css/animate.min.css">
    <title>
       LoginVinclub
    </title>

    <script>
            var userData = {
                storeUserDataInSession: function (userData) {
                    var userObjectString = JSON.stringify(userData);
                    window.sessionStorage.setItem('userObject', userObjectString)
                },
                getUserDataFromSession: function () {
                    var userData = window.sessionStorage.getItem('userObject')
                    return JSON.parse(userData);
                }
            }
            var userDataObject = userData.getUserDataFromSession();
            if (userDataObject != null) {
                window.location.href = "<?php echo news_url(); ?>" ;

            }
            var sessionStorage_transfer = function(event) {
                if(!event) { event = window.event; } // ie suq
                if(!event.newValue) return;          // do nothing if no value to work with
                if (event.key == 'getSessionStorage') {

                    // another tab asked for the sessionStorage -> send it
                    localStorage.setItem('userObject', JSON.stringify(sessionStorage));
                    // the other tab should now have it, so we're done with it.
                    localStorage.removeItem('userObject'); // <- could do short timeout as well.
                } else if (event.key == 'userObject' && !sessionStorage.length) {
                    // another tab sent data <- get it

                    var data = JSON.parse(event.newValue);
                    if (data != null) {
                        window.location.href = "<?php echo news_url(); ?>" ;
                    }
                }
            };
            // listen for changes to localStorage
            if(window.addEventListener) {
                window.addEventListener("storage", sessionStorage_transfer, false);
            } else {
                window.attachEvent("onstorage", sessionStorage_transfer);
            };
            // Ask other tabs for session storage (this is ONLY to trigger event)
            if (!sessionStorage.length) {
                localStorage.setItem('getSessionStorage', 'foobar');
                localStorage.removeItem('getSessionStorage', 'foobar');
            };

    </script>
</head>
<body>
<form method="post" action="" id="form1">
    <div class="bg">
        <div class="page">
            <div class="quangcao">
                <a href="#">
                    <img src="<?php echo public_url() ?>/news/login/images/a1.jpg" width="550" height="350"></a>
            </div>
            <div class="acc">
                <ul class="tabs">
                    <li>
                        <input type="radio" checked="" name="tabs" id="tab1">
                        <label for="tab1">ĐĂNG NHẬP</label>
                        <div id="tab-content1" class="tab-content">
                            <div class="animated  bounceInDown">
                                <div class="from">

                                    <input name="txtUserName" type="text" maxlength="18" id="txtUserName"   placeholder="Tài khoản"  style="width: 400px;">
                                    <div class="clear"></div>
                                </div>
                                <div class="from">

                                    <input name="txtPassword" type="password" id="txtPassword" placeholder="Mật khẩu"  style="width: 400px;">
                                    <div class="clear"></div>
                                </div>

                                <div id="regError" style=" color: Red; display: block;" align="center"></div>
                                <div class="from1">

                                    <input type="button" name="btnLogin" value="Đăng nhập" id="btnLogin" tabindex="4" class="nut">

                                    <div class="clear"></div>
                                </div>
                                <div class="scial">
                                    <p>HOẶC ĐĂNG NHẬP BẰNG</p>
                                    <a id="loginface" class="face" href="javascript:__doPostBack(&#39;loginface&#39;,&#39;&#39;)"></a>
                                    <a class="goo" href="javascript:__doPostBack(&#39;ctl06&#39;,&#39;&#39;)"></a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>

            </div>
            <div class="clear"></div>
        </div>
        <!-- page -->
    </div>
    <!-- bg -->

</form>

<script src="<?php echo public_url() ?>/news/login/js/register.js"></script>
<script src="<?php echo public_url() ?>/news/js/validate.js"></script>


<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-62055879-8', 'auto');
    ga('send', 'pageview');

</script>


</body></html>
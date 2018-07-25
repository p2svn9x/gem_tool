

<meta charset="UTF-8">
<title>Game bài Vinplay | Chơi bài ảo - Kiếm tiền thật -</title>

<link rel="icon" href="" type="image/x-icon">

<meta name="description" content="IXeng cổng game đổi thưởng tiền thật, Tích Xèng đổi VNĐ. Cổng game bài, chắn, phỏm, tài xỉu, tiến lên miền nam. Cổng game uy tín vĩnh viễn.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, minimum-scale=0.3, user-scalable=no">
<link rel="shortcut icon" href="favicon.ico"/>

<link rel="stylesheet" href="<?php echo public_url() ?>/news/css/style.css" type="text/css">

<style type="text/css">
    body {background-color:#EBEBEB;}
    .nav-previous a:hover,.nav-next a:hover,#commentform input#submit,#searchform input[type="submit"],.home_menu_item,.secondary-navigation a:hover, .post-date-ribbon,.currenttext, .pagination a:hover,.readMore a,.mts-subscribe input[type="submit"] {background-color:#3563bd; }
    #tabber .inside li .meta b,footer .widget li a:hover,.fn a,.reply a,#tabber .inside li div.info .entry-title a:hover, #navigation ul ul a:hover,.single_post a, a:hover, .textwidget a, #commentform a, #tabber .inside li a, .copyrights a:hover, a, .sidebar.c-4-12 a:hover, .top a:hover {color:#3563bd; }
    .corner {border-color: transparent transparent #3563bd transparent;}
    .secondary-navigation, footer, .sidebar #searchform input[type="submit"]:hover, .readMore a:hover, #commentform input#submit:hover { background-color: #3563bd; }
</style>
<script type="text/javascript" src="<?php echo public_url() ?>/news/js/jquery-1.9.1.js"></script>
<script>
        $( document ).ready(function() {
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
                document.querySelector(".loginbox").style.display = "none";
                var obj = jQuery.parseJSON( userDataObject );
                console.log(obj);
               // var monney = formatNumber(obj.vin);
                    $("#nicknamevip").html(obj.nickname);
                    $("#vin-balance").html(obj.vinTotal);
                    $(".vp-text").html(obj.vippoint);
            }else{
                document.querySelector(".loginbox1").style.display = "none";
                document.querySelector(".userbox").style.display = "none";
                document.querySelector(".loginbox").style.display = "block";

            }
            $('.logout').on("click",function(){
                sessionStorage.removeItem('userObject');
                document.querySelector(".loginbox1").style.display = "none";
                document.querySelector(".userbox").style.display = "none";
                document.querySelector(".loginbox").style.display = "block";
            })

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
                    document.querySelector(".loginbox").style.display = "none";
                        document.querySelector(".loginbox1").style.display = "block";
                        document.querySelector(".userbox").style.display = "block";
                        for (var key in data) {
                            sessionStorage.setItem(key, data[key]);
                            var data1 = jQuery.parseJSON(data[key]);
                            var obj = jQuery.parseJSON(data1)
                          //  var monney = formatNumber(obj.vin);

                            $("#nicknamevip").html(obj.nickname);
                            $("#vin-balance").html(obj.vinTotal);
                            $(".vp-text").html(obj.vippoint);

                        }
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
           function formatNumber (num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
            }
        });

    </script>

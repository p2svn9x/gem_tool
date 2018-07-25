<div class="page_content bglogin">
    <div id="container">
        <div class="header">
            <div class="logo_content " style="zoom: 1;">
                <div class="logo_images"><img src="<?php /*echo public_url("site/images/logo.png") */?>"></div>
                <div class="login_scocial" style="zoom: 1;">
                    <ul>
                        <li><span>Đăng nhập với</span></li>
                        <li><a class="icon-face" href="#"></a></li>
                        <li><a class="icon-google" href="#"></a></li>
                    </ul>
                </div>
                <div class="login_quick">
                    <input type="text" class="login_input" value="" onblur="if(this.value=='') this.value=''"
                           onfocus="if(this.value=='') this.value=''" id="txtusername" placeholder="Tên đăng nhập">
                    <input type="password" class="login_input" value="" onblur="if(this.value=='') this.value=''"
                           onfocus="if(this.value=='') this.value=''" id="txtpassword" placeholder="Mật khẩu">
                    <a class="btn_login">Đăng nhập</a>
                    <a class="btn_reg">Đăng kí</a>
                    <a class="btn_fogot">Quên mật khẩu</a>
                </div>
            </div>
            <!--<div class="logo_content " style="zoom: 1;">
                <div class="logo_avarta ">
                    <div class="avatar_right">
                        <div class="avarta"></div>
                        <div class="avarta_name"></div>
                        <div class="level"></div>
                    </div>
                </div>
                <div class="balance_money">
                    <div class="w-vin">
                        <input type="text" class="input_money" id="inputmoney_vin" value="" readonly>

                        <div class="vin"></div>
                        <div class="addcoin"></div>
                    </div>
                    <div class="w-vin">
                        <input type="text" class="input_money" id="inputmoney_xu" value="" readonly>

                        <div class="xu"></div>
                        <div class="addcoin"></div>
                    </div>
                </div>
                <div class="info">
                    <ul>
                        <li><a class="sercuriy" href="#"></a></li>
                        <li><a class="mail" href="#"></a></li>
                        <li><a class="shop" href="#"></a></li>
                        <li><a class="menu" href="#"></a></li>
                    </ul>
                </div>
            </div>-->
            <div class="header_top">
                <ul>
                    <li>
                        <span class="game">(Tài xỉu)</span>
                        <span class="user_info">Cuongdola</span>
                        <span class="win">Thắng</span>
                        <span class="money">1.000.000</span>
                        <span class="icon-vim"></span>
                    </li>
                    <li>
                        <span class="game">(Tài xỉu)</span>
                        <span class="user_info">Cuongdola</span>
                        <span class="win">Thắng</span>
                        <span class="money">1.000.000</span>
                        <span class="icon-vim"></span>
                    </li>
                    <li>
                        <span class="game">(Tài xỉu)</span>
                        <span class="user_info">Cuongdola</span>
                        <span class="win">Thắng</span>
                        <span class="money">1.000.000</span>
                        <span class="icon-vim"></span>
                    </li>
                    <li>
                        <span class="game">(Tài xỉu)</span>
                        <span class="user_info">Cuongdola</span>
                        <span class="win">Thắng</span>
                        <span class="money">1.000.000</span>
                        <span class="icon-vim"></span>
                    </li>
                    <li>
                        <span class="game">(Tài xỉu)</span>
                        <span class="user_info">Cuongdola</span>
                        <span class="win">Thắng</span>
                        <span class="money">1.000.000</span>
                        <span class="icon-vim"></span>
                    </li>
                </ul>
            </div>
            <div class="content_login">
                <div class="reg_login">
                    <div class="login_content">
                        <div class="title_login">Đăng kí</div>
                        <div class="text_hoac" id="regError"></div>
                        <div class="login_item">
                            <input type="text" class="input_login" value="" onblur="if(this.value=='') this.value=''"
                                   onfocus="if(this.value=='') this.value=''" id="username_reg"
                                   placeholder="Tên đăng nhập">
                        </div>
                        <div class="login_item">
                            <input type="password" class="input_login" value="" onblur="if(this.value=='') this.value=''"
                                   onfocus="if(this.value=='') this.value=''" id="password_reg"
                                   placeholder="Mật khẩu">
                        </div>
                        <div class="login_item">
                            <input type="password" class="input_login" value="" onblur="if(this.value=='') this.value=''"
                                   onfocus="if(this.value=='') this.value=''" id="password2_reg"
                                   placeholder="Xác nhận mật khẩu">
                        </div>
                        <div class="login_item">
                            <input type="text" class="input_captcha" value="" onblur="if(this.value=='') this.value=''"
                                   onfocus="if(this.value=='') this.value=''" id="txtusername"
                                   placeholder="Mã xác nhận">
                            <img src="<?php echo public_url('site/captcha/captcha.php')?>" style="float: left" >
                            <a href="#" class="reload"></a>
                        </div>
                        <div class="login_item">
                            <div class="checkboxFive">
                                <input type="checkbox" value="" id="checkboxFiveInput" name=""/>
                                <label for="checkboxFiveInput"></label>
                                <span class="text_agree">Đồng ý với <span class="text_polici">điều khoản sử dụng</span></span>
                            </div>
                        </div>
                        <div class="login_item">
                            <a class="btn_register" id="btn-signup">Đăng kí</a>
                        </div>
                        <div class="login_item">
                            <div class="title_login_for">Hoặc đăng nhập bằng</div>
                        </div>
                        <div class="login_item">
                            <div class="login_scocial_reg" >
                                <ul>
                                    <li><a class="icon-face" href="#"></a></li>
                                    <li><a class="icon-google" href="#"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="login_item">
                            <div class="text_login">
                            <span class="text_agree">Bạn đã có tài khoản ?</span><span class="text_polici"><a href="#">Đăng nhập ngay !</a></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="download_login">
                <ul>
                    <li>
                        <a class="ios" href="#"></a>
                    </li>
                    <li>
                        <a class="android" href="#"></a>
                    </li>
                    <li>
                        <a class="windowsphone" href="#"></a>
                    </li>
                    <li>
                        <a class="face" href="#"></a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>
<script src="<?php echo public_url() ?>/site/js/register.js"></script>
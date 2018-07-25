<?php $this->load->view('admin/config/head', $this->data) ?>
<div class="line"></div>

<div class="wrapper">
<p id="message" style="color: #0000FF"></p>
<input type="hidden" id="configpf" value="<?php echo $plat ?>">
<input type="hidden" id="nmconfig" value="<?php echo $namecf ?>">
<input type="hidden" id="idconfig" value="<?php echo $id ?>">

<div class="widget">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php if ($admin_info->Status == "A"): ?>
    <div class="title">
        <h4>Sửa config <span style="color: #0000FF"><?php echo $plat ?></span></h4>
    </div>

    <?php if ($plat == "ios" || $plat == "ad" || $plat == "web" || $plat == "wp"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                    </select>

                </div>
                <div class="col-sm-1">
                    <label>Is tcp:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtistcp">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Call common:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtcallcm">
                        <option value="0">Không</option>
                        <option value="1">Có</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Status server:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusgame">
                        <option value="0">Running</option>
                        <option value="1">Sandbox</option>
                        <option value="2">Maintain</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Recharge:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtrecharge">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Cashout:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtcashout">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Version:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversion">
                </div>
                <div class="col-sm-1">
                    <label>Update:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtupdate">
                        <option value="0">Not Update</option>
                        <option value="1">Recommend Update</option>
                        <option value="2">Force Update</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Url update:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txturlupdate">
                </div>
                <div class="col-sm-1">
                    <label>Message update:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtmesupdate">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status minigame:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusmini">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip minigame:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipmini">
                </div>
                <div class="col-sm-1">
                    <label>Port minigame:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportmini">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status sâm:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatussam">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip sâm:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipsam">
                </div>
                <div class="col-sm-1">
                    <label>Port sâm:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportsam">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status ba cây:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusbacay">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip ba cây:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipbacay">
                </div>
                <div class="col-sm-1">
                    <label>Port ba cây:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportbacay">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status binh:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusbinh">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip binh:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipbinh">
                </div>
                <div class="col-sm-1">
                    <label>Port binh:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportbinh">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status tlmn:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatustlmn">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip tlmn:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtiptlmn">
                </div>
                <div class="col-sm-1">
                    <label>Port tlmn:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtporttlmn">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status bài cào:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusbc">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip bài cào:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipbc">
                </div>
                <div class="col-sm-1">
                    <label>Port bài cào:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportbc">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status liêng:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatuslieng">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip liêng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtiplieng">
                </div>
                <div class="col-sm-1">
                    <label>Port liêng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportlieng">
                </div>
            </div>
        </div>

        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status poker:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatuspoker">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip poker:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtippoker">
                </div>
                <div class="col-sm-1">
                    <label>Port poker:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportpoker">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status kho báu:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatuskb">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip kho báu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipkb">
                </div>
                <div class="col-sm-1">
                    <label>Port kho báu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportkb">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status mỹ nhân ngư:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusmnn">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip mỹ nhân ngư:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipmnn">
                </div>
                <div class="col-sm-1">
                    <label>Port mỹ nhân ngư:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportmnn">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status avengers:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusave">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip avengers:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipave">
                </div>
                <div class="col-sm-1">
                    <label>Port avengers:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportave">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status nữ điệp viên:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusndv">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip nữ điệp viên:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipndv">
                </div>
                <div class="col-sm-1">
                    <label>Port nữ điệp viên:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportndv">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status tá lả:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatustala">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip tá lả:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtiptala">
                </div>
                <div class="col-sm-1">
                    <label>Port tá lả:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtporttala">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status xì tố:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusxito">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip xì tố:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipxito">
                </div>
                <div class="col-sm-1">
                    <label>Port xì tố:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportxito">
                </div>
            </div>
        </div>

        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Status xóc xóc:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtstatusxoc">
                        <option value="0">Running</option>
                        <option value="1">Maintain</option>
                        <option value="2">Disable</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Ip xóc xóc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtipxoc">
                </div>
                <div class="col-sm-1">
                    <label>Port xóc xóc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtportxoc">
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
    <?php elseif ($plat == "common"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Web:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtweb">
                </div>
                <div class="col-sm-1">
                    <label>Hotline:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txthotline">
                </div>
                <div class="col-sm-1">
                    <label>Sms otp:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtsmsotp">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Email:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtemail">
                </div>
                <div class="col-sm-1">
                    <label>Facebook:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtfacebook">
                </div>
                <div class="col-sm-1">
                    <label>Url help:</label>
                </div>
                <div class="col-sm-5">
                    <textarea class="form-control" rows="4" id="txturlhelp"></textarea>
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Banner:</label>
                </div>
                <div class="col-sm-5">
                    <textarea class="form-control" rows="4" id="txtbanner"></textarea>
                </div>
                <div class="col-sm-1">
                    <label>Password default:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtcommonpw">
                </div>

            </div>
        </div>

        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Iap key:</label>
                </div>
                <div class="col-sm-5">
                    <textarea class="form-control" rows="4" id="txtcommoniapkey"></textarea>
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
<div class="formRow">
<div class="row">
    <div class="col-sm-1">
        <label>Bot vin:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="txtcommonbotvin">
    </div>
    <div class="col-sm-1">
        <label>Bot xu:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="txtcommonbotxu">
    </div>
    <div class="col-sm-1">
        <label>User vin:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="txtcommonuservin">
    </div>
    <div class="col-sm-1">
        <label>User xu:</label>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="txtcommonuserxu">
    </div>
</div>
</div>
    <?php
    elseif ($plat == "otp"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Otp default:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtotpdf">
                </div>
                <div class="col-sm-1">
                    <label>Otp url send mt:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtotpurlsmt">
                </div>
                <div class="col-sm-1">
                    <label>Otp ip filter:</label>
                </div>
                <div class="col-sm-2">
                    <textarea class="form-control" rows="3" id="txtotpip"></textarea>
                </div>
                <div class="col-sm-1">
                    <label>Otp url receive mo:</label>
                </div>
                <div class="col-sm-2">
                    <textarea class="form-control" rows="3" id="txtotpurlrmo"></textarea>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Otp delay send:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtotpdelay">
                </div>
                <div class="col-sm-1">
                    <label>Message otp success:</label>
                </div>
                <div class="col-sm-2">
                    <textarea class="form-control" rows="4" id="txtmessotp"></textarea>
                </div>
                <div class="col-sm-1">
                    <label>Message odp success:</label>
                </div>
                <div class="col-sm-2">
                    <textarea class="form-control" rows="4" id="txtmessodp"></textarea>
                </div>
                <div class="col-sm-1">
                    <label>Message app success:</label>
                </div>
                <div class="col-sm-2">
                    <textarea class="form-control" rows="4" id="txtmessapp"></textarea>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Message error mobile:</label>
                </div>
                <div class="col-sm-2">
                    <textarea class="form-control" rows="4" id="txtmesserrorm"></textarea>
                </div>
                <div class="col-sm-1">
                    <label>Message error syntax:</label>
                </div>
                <div class="col-sm-2">
                    <textarea class="form-control" rows="4" id="txtmesserrors"></textarea>
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
    <?php
    elseif ($plat == "dvt"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Dvt url:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdvturl">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Dvt private key:</label>
                </div>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="4" id="txtdvtkey"></textarea>
                </div>
                <div class="col-sm-1">
                    <label>Dvt secret key:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdvtkeysec">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Dvt date re check:</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-control" rows="4" id="txtdatere">
                </div>
                <div class="col-sm-1">
                    <label>Sms open:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtsmsopen">
                        <option value="0">Đóng</option>
                        <option value="1">Mở</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
    <?php
    elseif ($plat == "brandname"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Is open:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtisopen">
                        <option value="0">Đóng</option>
                        <option value="1">Mở</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Brandname:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbnsender">
                </div>
                <div class="col-sm-1">
                    <label>User:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbnuser">
                </div>
                <div class="col-sm-1">
                    <label>Pass:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbnpass">
                </div>
                <div class="col-sm-1">
                    <label>URL:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbnurl">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Client ID:</label>
                </div>
                <div class="col-sm-2">
                    <input class="form-control" rows="4" id="txtbncid">
                </div>
                <div class="col-sm-1">
                    <label>User VinPlay:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbncuser">
                </div>
                <div class="col-sm-1">
                    <label>Password VinPlay:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbncpass">
                </div>
                <div class="col-sm-1">
                    <label>URL receive status:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbnurtst">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
    <?php
    elseif ($plat == "billing"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Vin plus:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtvinplus">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Nạp thẻ điện thoại:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtisnapthe">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Internet Banking:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtisnapvinnh">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Nạp xu:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtisnapxu">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Chuyển khoản:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtischvin">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>In App Purchase:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtisnapviniap">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Mua thẻ điện thoại:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtismt">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Nạp tiền điện thoại:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtisnapdt">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Chuyển khoản ngân hàng:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtisntnh">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Payment facebook:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtpaymentfb">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ nạp xu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratioxu" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ nạp thẻ điện thoại:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtrationapthe" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ internet banking:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtrationvnh" class="form-control">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỷ lệ mua thẻ điện thoại:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratiomt" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ nạp tiền điện thoại:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtrationdt" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản ngân hàng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtrationtnh" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Thẻ nạp vào:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtnt" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thẻ điện thoại đổi ra:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtmtdt" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thẻ game đổi ra:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtmtg" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Nhà mạng topup:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtntdt" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Ngân hàng i2b:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtnvnh" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Ngân hàng chuyển khoản:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtntnh" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Thẻ Viettel:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtvt" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thẻ Vinafone:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtvina" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thẻ Mobifone:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtmobi" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thẻ Gate:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtgate" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Thẻ VietNamMobile:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtvnm" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thẻ Beeline:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtbee" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thẻ Zing:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtzing" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thẻ Vcoin:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtvcoin" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Chuyển khoản tối thiểu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtcvm" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>User đổi thưởng tối đa / ngày:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtclu" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Hệ thống đổi thưởng tối đa / ngày:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtcls" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thẻ mua tối đa / lần:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtndt" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Số lần nạp thẻ sai:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtnrf" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Thời gian bảo mật có hiệu lực (giờ):</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtcashtb" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Chuyển khoản ngân hàng tối đa:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtcashbm" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Admin tổng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtsuadmin" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Đại lý tổng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtsuagent" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ hoàn phí đại lý cấp 1:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratiore1" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ hoàn phí đại lý cấp 2:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratiore2" class="form-control">
                </div>


            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>I2b:</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="txti2billing" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>IAP Max:</label>
                </div>
                <div class="col-sm-3">
                    <input type="text" id="txtiapmax" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Đại lý tổng nua vin nhỏ nhất:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtdl1smin" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Đại lý tổng mua vin lớn nhất:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtdl1smax" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Số dư nhỏ nhất đại lý cấp 1 chuyển đại lý tổng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtdl1sodumin" class="form-control">
                </div>


            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản thường - thường:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratioch" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản thường - dl1:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratio01" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản thường - dl2:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratio02" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản dl1 - dl1:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratio11" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản dl1 - dl2:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratio12" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản dl1 - thường:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratiotdl" class="form-control">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản dl2 - thường:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratio20" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản dl2 - dl2:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratio22" class="form-control">
                </div>
                <div class="col-sm-1">
                    <label>Tỷ lệ chuyển khoản dl2 - dl1:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="txtratio21" class="form-control">
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
    <?php
    elseif ($plat == "game_bai"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                        <option value="game_bai">Game bài</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Ten game:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnamebc">
                </div>
                <div class="col-sm-1">
                    <label>Ngày trong tuần:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdaybc">
                </div>
                <div class="col-sm-1">
                    <label>Giờ bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdbch">
                </div>
                <div class="col-sm-1">
                    <label>Phút bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdbcm">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Giờ kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtktbch">
                </div>
                <div class="col-sm-1">
                    <label>Phút kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtktbcm">
                </div>
                <div class="col-sm-1">
                    <label>Hũ khởi tao:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtinibc">
                </div>
                <div class="col-sm-1">
                    <label>Tiền cộng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddbc">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 100:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100bc">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200bc">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 500:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt500bc">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 1000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt1nbc">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 2000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt2nbc">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 5000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt5nbc">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 10000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt10nbc">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 20000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt20nbc">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 50000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt50nbc">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 100000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100nbc">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200nbc">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên game:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnametlmn">
                </div>
                <div class="col-sm-1">
                    <label>Ngày trong tuần:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdaytlmn">
                </div>
                <div class="col-sm-1">
                    <label>Giờ bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdtlmnh">
                </div>
                <div class="col-sm-1">
                    <label>Phút bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdtlmnm">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Giờ kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtkttlmnh">
                </div>
                <div class="col-sm-1">
                    <label>Phút kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtkttlmnm">
                </div>
                <div class="col-sm-1">
                    <label>Hũ khởi tao:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtinitlmn">
                </div>
                <div class="col-sm-1">
                    <label>Tiền cộng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddtlmn">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 100:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100tlmn">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200tlmn">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 500:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt500tlmn">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 1000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt1ntlmn">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 2000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt2ntlmn">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 5000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt5ntlmn">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 10000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt10ntlmn">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 20000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt20ntlmn">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 50000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt50ntlmn">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 100000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100ntlmn">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200ntlmn">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên game:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnamesam">
                </div>
                <div class="col-sm-1">
                    <label>Ngày trong tuần:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdaysam">
                </div>
                <div class="col-sm-1">
                    <label>Giờ bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdsamh">
                </div>
                <div class="col-sm-1">
                    <label>Phút bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdsamm">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Giờ kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtktsamh">
                </div>
                <div class="col-sm-1">
                    <label>Phút kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtktsamm">
                </div>
                <div class="col-sm-1">
                    <label>Hũ khởi tao:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtinisam">
                </div>
                <div class="col-sm-1">
                    <label>Tiền cộng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddsam">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 100:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100sam">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200sam">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 500:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt500sam">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 1000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt1nsam">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 2000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt2nsam">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 5000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt5nsam">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 10000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt10nsam">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 20000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt20nsam">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 50000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt50nsam">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 100000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100nsam">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200nsam">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên game:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnamebinh">
                </div>
                <div class="col-sm-1">
                    <label>Ngày trong tuần:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdaybinh">
                </div>
                <div class="col-sm-1">
                    <label>Giờ bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdbinhh">
                </div>
                <div class="col-sm-1">
                    <label>Phút bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdbinhm">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Giờ kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtktbinhh">
                </div>
                <div class="col-sm-1">
                    <label>Phút kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtktbinhm">
                </div>
                <div class="col-sm-1">
                    <label>Hũ khởi tao:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtinibinh">
                </div>
                <div class="col-sm-1">
                    <label>Tiền cộng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddbinh">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 100:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100binh">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200binh">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 500:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt500binh">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 1000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt1nbinh">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 2000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt2nbinh">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 5000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt5nbinh">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 10000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt10nbinh">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 20000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt20nbinh">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 50000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt50nbinh">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 100000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100nbinh">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200nbinh">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên game:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnamecao">
                </div>
                <div class="col-sm-1">
                    <label>Ngày trong tuần:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdaycao">
                </div>
                <div class="col-sm-1">
                    <label>Giờ bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdcaoh">
                </div>
                <div class="col-sm-1">
                    <label>Phút bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbdcaom">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Giờ kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtktcaoh">
                </div>
                <div class="col-sm-1">
                    <label>Phút kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtktcaom">
                </div>
                <div class="col-sm-1">
                    <label>Hũ khởi tao:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtinicao">
                </div>
                <div class="col-sm-1">
                    <label>Tiền cộng:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddcao">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 100:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100cao">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200cao">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 500:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt500cao">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 1000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt1ncao">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 2000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt2ncao">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 5000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt5ncao">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 10000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt10ncao">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 20000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt20ncao">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tỉ lệ 50000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt50ncao">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 100000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt100ncao">
                </div>
                <div class="col-sm-1">
                    <label>Tỉ lệ 200000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txt200ncao">
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
    <?php
    elseif ($plat == "i2b"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                        <option value="i2b">I2b</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Version :</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversioni2b">
                </div>
                <div class="col-sm-1">
                    <label>Napas url:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnapas">
                </div>
                <div class="col-sm-1">
                    <label>Merchant id:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtmerchant">
                </div>
                <div class="col-sm-1">
                    <label>Access code:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaccess">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Secret key :</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtsecret">
                </div>
                <div class="col-sm-1">
                    <label>User:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtuseri2b">
                </div>
                <div class="col-sm-1">
                    <label>Password:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtpwi2b">
                </div>
                <div class="col-sm-1">
                    <label>Url result:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txturlresult">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Url cancel:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txturlcan">
                </div>
                <div class="col-sm-1">
                    <label>Amount min:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtamount">
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
    <?php
    elseif ($plat == "nganluong"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                        <option value="i2b">I2b</option>
                        <option value="nganluong">Ngân lượng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Is open:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtisopennl">
                        <option value="0">Đóng</option>
                        <option value="1">Mở</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Merchant id:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtmeridnl">
                </div>
                <div class="col-sm-1">
                    <label>Merchant password:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtmerpwnl">
                </div>
                <div class="col-sm-1">
                    <label>Version:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionnl">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Receiver email:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtreemailnl">
                </div>
                <div class="col-sm-1">
                    <label>Return url:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtreurlnl">
                </div>
                <div class="col-sm-1">
                    <label>Cancel url:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtcanurlnl">
                </div>
                <div class="col-sm-1">
                    <label>Time limit:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txttimenl">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Ngân lượng url:</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtnlurl">
                </div>
                <div class="col-sm-1">
                    <label>Payment method:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtpaymentnl">
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>

    <?php
    elseif ($plat == "admin"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                        <option value="i2b">I2b</option>
                        <option value="nganluong">Ngân lượng</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Số lượng đại lý cấp 2:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnumberdl2">
                </div>
                <div class="col-sm-1">
                    <label>Mệnh giá giftcode vin:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgiftcodevin">
                </div>
                <div class="col-sm-1">
                    <label>Mệnh giá giftcode xu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgiftcodexu">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Đợt phát hành giftcode:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgiftcodedot">
                </div>

                <div class="col-sm-1">
                    <label>Số lượt quay giftcode minigame:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnumberquay">
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>


    <?php
    elseif ($plat == "vippoint_event"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="vippoint_event">Vippoint event</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Thời gian bắt đầu:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtstartve">
                </div>
                <div class="col-sm-1">
                    <label>Thời gian kết thúc:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtendve">
                </div>
                <div class="col-sm-1">
                    <label>Unlucky in day:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtunluckyve">
                </div>
                <div class="col-sm-1">
                    <label>Lucky in day:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtluckyve">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Lucky time start:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtluckystart">
                </div>
                <div class="col-sm-1">
                    <label>Lucky time end</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtluckyend">
                </div>
                <div class="col-sm-1">
                    <label>Unlucky time start:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtunluckystart">
                </div>
                <div class="col-sm-1">
                    <label>Unlucky time end:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtunluckyend">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Places:</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtplaces">
                </div>
                <div class="col-sm-1">
                    <label>Url help:</label>
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="txturlhelpve">
                </div>
                <div class="col-sm-1">
                    <label>Sub vippoint:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtsubvp">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Add vippoint 300:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvp300">
                </div>
                <div class="col-sm-1">
                    <label>Add vippoint 210:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvp210">
                </div>
                <div class="col-sm-1">
                    <label>Add vippoint 100:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvp100">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Add vippoint 60:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvp60">
                </div>
                <div class="col-sm-1">
                    <label>Add vippoint 30:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvp30">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Add vin 2500:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvin2500">
                </div>
                <div class="col-sm-1">
                    <label>Add vin 1500:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvin1500">
                </div>
                <div class="col-sm-1">
                    <label>Add vin 750:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvin750">
                </div>
                <div class="col-sm-1">
                    <label>Add vin 540:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvin540">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Add vin 300:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvin300">
                </div>
                <div class="col-sm-1">
                    <label>Add vin 60:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvin60">
                </div>
                <div class="col-sm-1">
                    <label>Add vin 30:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtaddvin30">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Rate sub:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtratesub">
                </div>
                <div class="col-sm-1">
                    <label>Rate add:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtrateadd">
                </div>
                <div class="col-sm-1">
                    <label>Rate sub bot:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtratesubbot">
                </div>
                <div class="col-sm-1">
                    <label>Rate add bot:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtrateaddbot">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB">
                </div>
            </div>
        </div>
    <?php
    elseif ($plat == "vin_plus"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                        <option value="vin_plus">Vin plus</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <h3 style="color: #0000ff;margin-left: 20px">IOS</h3>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Nạp tiền:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtiosnaptien">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Giftcode:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtiosgiftcode">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Chuyển khoản:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtioschuyenkhoan">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Đại lý:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtiosdaily">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Đổi thưởng:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtiosdoithuong">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <h3 style="color: #0000ff;margin-left: 20px">Android</h3>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Nạp tiền:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtadnaptien">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Giftcode:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtadgiftcode">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Chuyển khoản:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtadchuyenkhoan">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Đại lý:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtaddaily">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Đổi thưởng:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtaddoithuong">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <h3 style="color: #0000ff;margin-left: 20px">Window phone</h3>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Nạp tiền:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtwpnaptien">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Giftcode:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtwpgiftcode">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Chuyển khoản:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtwpchuyenkhoan">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Đại lý:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtwpdaily">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>Đổi thưởng:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtwpdoithuong">
                        <option value="0">Mở</option>
                        <option value="1">Đóng</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB">
                </div>
            </div>
        </div>
        <?php elseif ($plat == "lucky_vip"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="lucky_vip">Lucky vip</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <h3 style="color: #0000ff;margin-left: 20px">Gold</h3>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Out 100K:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldout100k">
                </div>

                <div class="col-sm-1">
                    <label>Out 200K:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldout200k">
                </div>
                <div class="col-sm-1">
                    <label>Out 500K:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldout500k">
                </div>
                <div class="col-sm-1">
                    <label>Out 1M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldout1m">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Out 5M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldout5m">
                </div>

                <div class="col-sm-1">
                    <label>Out 10M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldout10m">
                </div>
                <div class="col-sm-1">
                    <label>Out 20M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldout20m">
                </div>
                <div class="col-sm-1">
                    <label>Out 50M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldout50m">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>In X2:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldinx2">
                </div>

                <div class="col-sm-1">
                    <label>In X3:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldinx3">
                </div>
                <div class="col-sm-1">
                    <label>In X4:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldinx4">
                </div>
                <div class="col-sm-1">
                    <label>In X5:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldinx5">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Num:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtgoldnum">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <h3 style="color: #0000ff;margin-left: 20px">Platinum</h3>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Out 100K:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplout100k">
                </div>

                <div class="col-sm-1">
                    <label>Out 200K:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplout200k">
                </div>
                <div class="col-sm-1">
                    <label>Out 500K:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplout500k">
                </div>
                <div class="col-sm-1">
                    <label>Out 1M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplout1m">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Out 5M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplout5m">
                </div>

                <div class="col-sm-1">
                    <label>Out 10M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplout10m">
                </div>
                <div class="col-sm-1">
                    <label>Out 20M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplout20m">
                </div>
                <div class="col-sm-1">
                    <label>Out 50M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplout50m">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>In X2:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplinx2">
                </div>

                <div class="col-sm-1">
                    <label>In X3:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplinx3">
                </div>
                <div class="col-sm-1">
                    <label>In X4:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplinx4">
                </div>
                <div class="col-sm-1">
                    <label>In X5:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplinx5">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Num:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtplnum">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <h3 style="color: #0000ff;margin-left: 20px">Diamond</h3>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Out 100K:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdmout100k">
                </div>

                <div class="col-sm-1">
                    <label>Out 200K:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdmout200k">
                </div>
                <div class="col-sm-1">
                    <label>Out 500K:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdmout500k">
                </div>
                <div class="col-sm-1">
                    <label>Out 1M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdmout1m">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Out 5M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdmout5m">
                </div>

                <div class="col-sm-1">
                    <label>Out 10M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdmout10m">
                </div>
                <div class="col-sm-1">
                    <label>Out 20M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdmout20m">
                </div>
                <div class="col-sm-1">
                    <label>Out 50M:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdmout50m">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>In X2:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdminx2">
                </div>

                <div class="col-sm-1">
                    <label>In X3:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdminx3">
                </div>
                <div class="col-sm-1">
                    <label>In X4:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdminx4">
                </div>
                <div class="col-sm-1">
                    <label>In X5:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdminx5">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Num:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdmnum">
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>


        <?php elseif ($plat == "agent"): ?>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="agent">Agent</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Is bonus:</label>
                </div>
                <div class="col-sm-2">
                    <select  id="txtagentisbonus">
                        <option value="1">Đóng</option>
                        <option value="0">Mở</option>
                        </select>
                </div>
                <div class="col-sm-1">
                    <label>Ds min:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtdsmin">
                </div>
                <div class="col-sm-1">
                    <label>Bonus fix:</label>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtbonusfix">
                </div>
            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Bonus more 500,000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbonus500k">
                </div>
                <div class="col-sm-1">
                    <label>Bonus more 1,000,000:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtbonus1m">
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
    <?php
    else : ?>

        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Tên config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtnameconfig">
                </div>
                <div class="col-sm-1">
                    <label>Version config:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtversionconfig">
                </div>
                <div class="col-sm-1">
                    <label>Platform config:</label>
                </div>
                <div class="col-sm-2">
                    <select id="txtplatform" disabled="true">
                        <option value="ios">Ios</option>
                        <option value="ad">Android</option>
                        <option value="web">Web</option>
                        <option value="wp">WP</option>
                        <option value="common">Common</option>
                        <option value="otp">Otp</option>
                        <option value="dvt">Dvt</option>
                        <option value="brandname">Brandname</option>
                        <option value="billing">Billing</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <label>URL kích hoạt email:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txturlae">
                </div>
            </div>
        </div>

        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Chữ ký:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtsign">
                </div>
                <div class="col-sm-1">
                    <label>Game bài đang chạy:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtlistgb">
                </div>
                <div class="col-sm-1">
                    <label>Số điện thoại cảnh báo:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtphonecb">
                </div>

                <div class="col-sm-1">
                    <label>Hũ game bài max:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txthugbmax">
                </div>

            </div>
        </div>
        <div class="formRow">
            <div class="row">
                <div class="col-sm-1">
                    <label>Sms fee:</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="txtsmsfee">
                </div>
                <div class="col-sm-1">
                    <input type="button" id="search_tran" value="Sửa config" class="button blueB"
                           style="margin-left: 123px">
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php else: ?>
    <div class="title">
        <h4>Bạn không được phân quyền</h4>
    </div>
<?php endif; ?>
</div>
</div>
<style>.spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        overflow: auto;
        width: 100px; /* width of the spinner gif */
        height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */
    }</style>
<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
</div>

<script>

$("#search_tran").click(function () {
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url(); ?>" + "/config/getdata",
        dataType: 'text',
        data: {
            txtnameconfig: $("#txtnameconfig").val(),
            txtversionconfig: $("#txtversionconfig").val(),
            txtplatform: $("#txtplatform").val(),
            txtversion: $("#txtversion").val(),
            txtupdate: $("#txtupdate").val(),
            txturlupdate: $("#txturlupdate").val(),
            txtmesupdate: $("#txtmesupdate").val(),
            txtistcp: $("#txtistcp").val(),
            txtstatusgame: $("#txtstatusgame").val(),
            txtcallcm: $("#txtcallcm").val(),
            txtrecharge: $("#txtrecharge").val(),
            txtcashout: $("#txtcashout").val(),
            txtstatusmini: $("#txtstatusmini").val(),
            txtipmini: $("#txtipmini").val(),
            txtportmini: $("#txtportmini").val(),
            txtstatussam: $("#txtstatussam").val(),
            txtipsam: $("#txtipsam").val(),
            txtportsam: $("#txtportsam").val(),
            txtstatusbacay: $("#txtstatusbacay").val(),
            txtipbacay: $("#txtipbacay").val(),
            txtportbacay: $("#txtportbacay").val(),
            txtstatusbinh: $("#txtstatusbinh").val(),
            txtipbinh: $("#txtipbinh").val(),
            txtportbinh: $("#txtportbinh").val(),
            txtstatustlmn: $("#txtstatustlmn").val(),
            txtiptlmn: $("#txtiptlmn").val(),
            txtporttlmn: $("#txtporttlmn").val(),
            txtstatusbc: $("#txtstatusbc").val(),
            txtipbc: $("#txtipbc").val(),
            txtportbc: $("#txtportbc").val(),
            txtstatuslieng: $("#txtstatuslieng").val(),
            txtiplieng: $("#txtiplieng").val(),
            txtportlieng: $("#txtportlieng").val(),
            txtstatuspoker: $("#txtstatuspoker").val(),
            txtippoker: $("#txtippoker").val(),
            txtportpoker: $("#txtportpoker").val(),
            txtstatustala: $("#txtstatustala").val(),
            txtiptala: $("#txtiptala").val(),
            txtporttala: $("#txtporttala").val(),
            txtstatusxito: $("#txtstatusxito").val(),
            txtipxito: $("#txtipxito").val(),
            txtportxito: $("#txtportxito").val(),
            txtstatusxoc: $("#txtstatusxoc").val(),
            txtipxoc: $("#txtipxoc").val(),
            txtportxoc: $("#txtportxoc").val(),
            txtstatuskb: $("#txtstatuskb").val(),
            txtipkb: $("#txtipkb").val(),
            txtportkb: $("#txtportkb").val(),
            txtstatusmnn: $("#txtstatusmnn").val(),
            txtipmnn: $("#txtipmnn").val(),
            txtportmnn: $("#txtportmnn").val(),
            txtstatusave: $("#txtstatusave").val(),
            txtipave: $("#txtipave").val(),
            txtportave: $("#txtportave").val(),
            txtstatusndv: $("#txtstatusndv").val(),
            txtipndv: $("#txtipndv").val(),
            txtportndv: $("#txtportndv").val(),
            txtweb: $("#txtweb").val(),
            txthotline: $("#txthotline").val(),
            txtsmsotp: $("#txtsmsotp").val(),
            txtemail: $("#txtemail").val(),
            txtfacebook: $("#txtfacebook").val(),
            txturlhelp: $("#txturlhelp").val(),
            txtbanner: $("#txtbanner").val(),
            txtotpdf: $("#txtotpdf").val(),
            txtotpurlsmt: $("#txtotpurlsmt").val(),
            txtotpip: $("#txtotpip").val(),
            txtotpurlrmo: $("#txtotpurlrmo").val(),
            txtotpdelay: $("#txtotpdelay").val(),
            txtmessotp: $("#txtmessotp").val(),
            txtmessodp: $("#txtmessodp").val(),
            txtmessapp: $("#txtmessapp").val(),
            txtmesserrorm: $("#txtmesserrorm").val(),
            txtmesserrors: $("#txtmesserrors").val(),
            txtdvturl: $("#txtdvturl").val(),
            txtdvtkey: $("#txtdvtkey").val(),
            txtdvtkeysec: $("#txtdvtkeysec").val(),
            txtdatere: $("#txtdatere").val(),
            txtsmsopen: $("#txtsmsopen").val(),
            txtisopen: $("#txtisopen").val(),
            txtbnsender: $("#txtbnsender").val(),
            txtbnuser: $("#txtbnuser").val(),
            txtbnpass: $("#txtbnpass").val(),
            txtbnurl: $("#txtbnurl").val(),
            txtbncid: $("#txtbncid").val(),
            txtbncuser: $("#txtbncuser").val(),
            txtbncpass: $("#txtbncpass").val(),
            txtbnurtst: $("#txtbnurtst").val(),
            txtisnapthe: $("#txtisnapthe").val(),
            txtisnapvinnh: $("#txtisnapvinnh").val(),
            txtisnapviniap: $("#txtisnapviniap").val(),
            txtpaymentfb : $("#txtpaymentfb").val(),
            txtisnapxu: $("#txtisnapxu").val(),
            txtischvin: $("#txtischvin").val(),
            txtismt: $("#txtismt").val(),
            txtisnapdt: $("#txtisnapdt").val(),
            txtisntnh: $("#txtisntnh").val(),
            txtratioxu: $("#txtratioxu").val(),
            txtrationapthe: $("#txtrationapthe").val(),
            txtrationvnh: $("#txtrationvnh").val(),
            txtratiomt: $("#txtratiomt").val(),
            txtrationdt: $("#txtrationdt").val(),
            txtratioch: $("#txtratioch").val(),
            txtrationtnh: $("#txtrationtnh").val(),
            txtnt: $("#txtnt").val(),
            txtnvnh: $("#txtnvnh").val(),
            txtmtdt: $("#txtmtdt").val(),
            txtmtg: $("#txtmtg").val(),
            txtntdt: $("#txtntdt").val(),
            txtntnh: $("#txtntnh").val(),
            txtvt: $("#txtvt").val(),
            txtvina: $("#txtvina").val(),
            txtmobi: $("#txtmobi").val(),
            txtvnm: $("#txtvnm").val(),
            txtbee: $("#txtbee").val(),
            txtgate: $("#txtgate").val(),
            txtzing: $("#txtzing").val(),
            txtvcoin: $("#txtvcoin").val(),
            txtcvm: $("#txtcvm").val(),
            txtclu: $("#txtclu").val(),
            txtcls: $("#txtcls").val(),
            txtnrf: $("#txtnrf").val(),
            txtndt: $("#txtndt").val(),
            txtcashtb: $("#txtcashtb").val(),
            txtcashbm: $("#txtcashbm").val(),
            txtsuadmin: $("#txtsuadmin").val(),
            txtsuagent: $("#txtsuagent").val(),
            txtratiore1: $("#txtratiore1").val(),
            txtratiore2: $("#txtratiore2").val(),
            txtratiotdl: $("#txtratiotdl").val(),
            txti2billing: $("#txti2billing").val(),
            txtdl1smin: $("#txtdl1smin").val(),
            txtdl1smax: $("#txtdl1smax").val(),
            txturlae: $("#txturlae").val(),
            txtsign: $("#txtsign").val(),
            txtlistgb: $("#txtlistgb").val(),
            txtphonecb: $("#txtphonecb").val(),
            txthugbmax: $("#txthugbmax").val(),
            txtsmsfee: $("#txtsmsfee").val(),
            configpf: $("#configpf").val(),
            txtnamebc: $("#txtnamebc").val(),
            txtdaybc: $("#txtdaybc").val(),
            txtbdbch: $("#txtbdbch").val(),
            txtbdbcm: $("#txtbdbcm").val(),
            txtktbch: $("#txtktbch").val(),
            txtktbcm: $("#txtktbcm").val(),
            txtinibc: $("#txtinibc").val(),
            txtaddbc: $("#txtaddbc").val(),
            txt100bc: $("#txt100bc").val(),
            txt200bc: $("#txt200bc").val(),
            txt500bc: $("#txt500bc").val(),
            txt1nbc: $("#txt1nbc").val(),
            txt2nbc: $("#txt2nbc").val(),
            txt5nbc: $("#txt5nbc").val(),
            txt10nbc: $("#txt10nbc").val(),
            txt20nbc: $("#txt20nbc").val(),
            txt50nbc: $("#txt50nbc").val(),
            txt100nbc: $("#txt100nbc").val(),
            txt200nbc: $("#txt200nbc").val(),
            txtnametlmn: $("#txtnametlmn").val(),
            txtdaytlmn: $("#txtdaytlmn").val(),
            txtbdtlmnh: $("#txtbdtlmnh").val(),
            txtbdtlmnm: $("#txtbdtlmnm").val(),
            txtkttlmnh: $("#txtkttlmnh").val(),
            txtkttlmnm: $("#txtkttlmnm").val(),
            txtinitlmn: $("#txtinitlmn").val(),
            txtaddtlmn: $("#txtaddtlmn").val(),
            txt100tlmn: $("#txt100tlmn").val(),
            txt200tlmn: $("#txt200tlmn").val(),
            txt500tlmn: $("#txt500tlmn").val(),
            txt1ntlmn: $("#txt1ntlmn").val(),
            txt2ntlmn: $("#txt2ntlmn").val(),
            txt5ntlmn: $("#txt5ntlmn").val(),
            txt10ntlmn: $("#txt10ntlmn").val(),
            txt20ntlmn: $("#txt20ntlmn").val(),
            txt50ntlmn: $("#txt50ntlmn").val(),
            txt100ntlmn: $("#txt100ntlmn").val(),
            txt200ntlmn: $("#txt200ntlmn").val(),
            txtnamesam: $("#txtnamesam").val(),
            txtdaysam: $("#txtdaysam").val(),
            txtbdsamh: $("#txtbdsamh").val(),
            txtbdsamm: $("#txtbdsamm").val(),
            txtktsamh: $("#txtktsamh").val(),
            txtktsamm: $("#txtktsamm").val(),
            txtinisam: $("#txtinisam").val(),
            txtaddsam: $("#txtaddsam").val(),
            txt100sam: $("#txt100sam").val(),
            txt200sam: $("#txt200sam").val(),
            txt500sam: $("#txt500sam").val(),
            txt1nsam: $("#txt1nsam").val(),
            txt2nsam: $("#txt2nsam").val(),
            txt5nsam: $("#txt5nsam").val(),
            txt10nsam: $("#txt10nsam").val(),
            txt20nsam: $("#txt20nsam").val(),
            txt50nsam: $("#txt50nsam").val(),
            txt100nsam: $("#txt100nsam").val(),
            txt200nsam: $("#txt200nsam").val(),
            txtnamebinh: $("#txtnamebinh").val(),
            txtdaybinh: $("#txtdaybinh").val(),
            txtbdbinhh: $("#txtbdbinhh").val(),
            txtbdbinhm: $("#txtbdbinhm").val(),
            txtktbinhh: $("#txtktbinhh").val(),
            txtktbinhm: $("#txtktbinhm").val(),
            txtinibinh: $("#txtinibinh").val(),
            txtaddbinh: $("#txtaddbinh").val(),
            txt100binh: $("#txt100binh").val(),
            txt200binh: $("#txt200binh").val(),
            txt500binh: $("#txt500binh").val(),
            txt1nbinh: $("#txt1nbinh").val(),
            txt2nbinh: $("#txt2nbinh").val(),
            txt5nbinh: $("#txt5nbinh").val(),
            txt10nbinh: $("#txt10nbinh").val(),
            txt20nbinh: $("#txt20nbinh").val(),
            txt50nbinh: $("#txt50nbinh").val(),
            txt100nbinh: $("#txt100nbinh").val(),
            txt200nbinh: $("#txt200nbinh").val(),
            txtnamecao: $("#txtnamecao").val(),
            txtdaycao: $("#txtdaycao").val(),
            txtbdcaoh: $("#txtbdcaoh").val(),
            txtbdcaom: $("#txtbdcaom").val(),
            txtktcaoh: $("#txtktcaoh").val(),
            txtktcaom: $("#txtktcaom").val(),
            txtinicao: $("#txtinicao").val(),
            txtaddcao: $("#txtaddcao").val(),
            txt100cao: $("#txt100cao").val(),
            txt200cao: $("#txt200cao").val(),
            txt500cao: $("#txt500cao").val(),
            txt1ncao: $("#txt1ncao").val(),
            txt2ncao: $("#txt2ncao").val(),
            txt5ncao: $("#txt5ncao").val(),
            txt10ncao: $("#txt10ncao").val(),
            txt20ncao: $("#txt20ncao").val(),
            txt50ncao: $("#txt50ncao").val(),
            txt100ncao: $("#txt100ncao").val(),
            txt200ncao: $("#txt200ncao").val(),
            txtversioni2b: $("#txtversioni2b").val(),
            txtnapas: $("#txtnapas").val(),
            txtmerchant: $("#txtmerchant").val(),
            txtaccess: $("#txtaccess").val(),
            txtsecret: $("#txtsecret").val(),
            txtuseri2b: $("#txtuseri2b").val(),
            txtpwi2b: $("#txtpwi2b").val(),
            txturlresult: $("#txturlresult").val(),
            txturlcan: $("#txturlcan").val(),
            txtamount: $("#txtamount").val(),
            txtisopennl: $("#txtisopennl").val(),
            txtmeridnl: $("#txtmeridnl").val(),
            txtmerpwnl: $("#txtmerpwnl").val(),
            txtversionnl: $("#txtversionnl").val(),
            txtreemailnl: $("#txtreemailnl").val(),
            txtreurlnl: $("#txtreurlnl").val(),
            txtcanurlnl: $("#txtcanurlnl").val(),
            txttimenl: $("#txttimenl").val(),
            txtnlurl: $("#txtnlurl").val(),
            txtdl1sodumin: $("#txtdl1sodumin").val(),
            txtpaymentnl: $("#txtpaymentnl").val(),
            txtnumberdl2: $("#txtnumberdl2").val(),
            txtgiftcodevin: $("#txtgiftcodevin").val(),
            txtgiftcodexu: $("#txtgiftcodexu").val(),
            txtgiftcodedot: $("#txtgiftcodedot").val(),
            txtnumberquay: $("#txtnumberquay").val(),
            txtiapmax: $("#txtiapmax").val(),
            txtvinplus: $("#txtvinplus").val(),
            txtiosnaptien: $("#txtiosnaptien").val(),
            txtiosgiftcode: $("#txtiosgiftcode").val(),
            txtioschuyenkhoan: $("#txtioschuyenkhoan").val(),
            txtiosdaily: $("#txtiosdaily").val(),
            txtiosdoithuong: $("#txtiosdoithuong").val(),
            txtadnaptien: $("#txtadnaptien").val(),
            txtadgiftcode: $("#txtadgiftcode").val(),
            txtadchuyenkhoan: $("#txtadchuyenkhoan").val(),
            txtaddaily: $("#txtaddaily").val(),
            txtaddoithuong: $("#txtaddoithuong").val(),
            txtwpnaptien: $("#txtwpnaptien").val(),
            txtwpgiftcode: $("#txtwpgiftcode").val(),
            txtwpchuyenkhoan: $("#txtwpchuyenkhoan").val(),
            txtwpdaily: $("#txtwpdaily").val(),
            txtwpdoithuong: $("#txtwpdoithuong").val(),
            txtratio01: $("#txtratio01").val(),
            txtratio02: $("#txtratio02").val(),
            txtratio11: $("#txtratio11").val(),
            txtratio12: $("#txtratio12").val(),
            txtratio20: $("#txtratio20").val(),
            txtratio22: $("#txtratio22").val(),
            txtratio21: $("#txtratio21").val(),
            txtstartve: $("#txtstartve").val(),
            txtendve: $("#txtendve").val(),
            txtunluckyve: $("#txtunluckyve").val(),
            txtluckyve: $("#txtluckyve").val(),
            txtluckystart: $("#txtluckystart").val(),
            txtluckyend: $("#txtluckyend").val(),
            txtunluckystart: $("#txtunluckystart").val(),
            txtunluckyend: $("#txtunluckyend").val(),
            txtplaces: $("#txtplaces").val(),
            txturlhelpve: $("#txturlhelpve").val(),
            txtsubvp: $("#txtsubvp").val(),
            txtaddvp300: $("#txtaddvp300").val(),
            txtaddvp210: $("#txtaddvp210").val(),
            txtaddvp100: $("#txtaddvp100").val(),
            txtaddvp60: $("#txtaddvp60").val(),
            txtaddvp30: $("#txtaddvp30").val(),
            txtaddvin2500: $("#txtaddvin2500").val(),
            txtaddvin1500: $("#txtaddvin1500").val(),
            txtaddvin750: $("#txtaddvin750").val(),
            txtaddvin540: $("#txtaddvin540").val(),
            txtaddvin300: $("#txtaddvin300").val(),
            txtaddvin60: $("#txtaddvin60").val(),
            txtaddvin30: $("#txtaddvin30").val(),
            txtratesub: $("#txtratesub").val(),
            txtrateadd: $("#txtrateadd").val(),
            txtratesubbot: $("#txtratesubbot").val(),
            txtrateaddbot: $("#txtrateaddbot").val(),
            txtcommonpw : $("#txtcommonpw").val(),
            txtcommoniapkey: $("#txtcommoniapkey").val(),
            txtgoldout100k: $("#txtgoldout100k").val(),
            txtgoldout200k: $("#txtgoldout200k").val(),
            txtgoldout500k: $("#txtgoldout500k").val(),
            txtgoldout1m: $("#txtgoldout1m").val(),
            txtgoldout5m : $("#txtgoldout5m").val(),
            txtgoldout10m :$("#txtgoldout10m").val(),
            txtgoldout20m: $("#txtgoldout20m").val(),
            txtgoldout50m: $("#txtgoldout50m").val(),
            txtgoldinx2: $("#txtgoldinx2").val(),
            txtgoldinx3: $("#txtgoldinx3").val(),
            txtgoldinx4 : $("#txtgoldinx4").val(),
            txtgoldinx5: $("#txtgoldinx5").val(),
            txtgoldnum : $("#txtgoldnum").val(),
            txtplout100k: $("#txtplout100k").val(),
            txtplout200k: $("#txtplout200k").val(),
            txtplout500k: $("#txtplout500k").val(),
            txtplout1m: $("#txtplout1m").val(),
            txtplout5m: $("#txtplout5m").val(),
            txtplout10m: $("#txtplout10m").val(),
            txtplout20m: $("#txtplout20m").val(),
            txtplout50m: $("#txtplout50m").val(),
            txtplinx2: $("#txtplinx2").val(),
            txtplinx3: $("#txtplinx3").val(),
            txtplinx4: $("#txtplinx4").val(),
            txtplinx5: $("#txtplinx5").val(),
            txtplnum: $("#txtplnum").val(),
            txtdmout100k: $("#txtdmout100k").val(),
            txtdmout200k: $("#txtdmout200k").val(),
            txtdmout500k: $("#txtdmout500k").val(),
            txtdmout1m: $("#txtdmout1m").val(),
            txtdmout5m: $("#txtdmout5m").val(),
            txtdmout10m: $("#txtdmout10m").val(),
            txtdmout20m: $("#txtdmout20m").val(),
            txtdmout50m: $("#txtdmout50m").val(),
            txtdminx2: $("#txtdminx2").val(),
            txtdminx3: $("#txtdminx3").val(),
            txtdminx4: $("#txtdminx4").val(),
            txtdminx5: $("#txtdminx5").val(),
            txtdmnum: $("#txtdmnum").val(),
            txtdsmin : $("#txtdsmin").val(),
            txtbonusfix : $("#txtbonusfix").val(),
            txtbonus500k : $("#txtbonus500k").val(),
            txtbonus1m : $("#txtbonus1m").val(),
            txtcommonbotvin: $("#txtcommonbotvin").val(),
            txtcommonbotxu: $("#txtcommonbotxu").val(),
            txtcommonuservin: $("#txtcommonuservin").val(),
            txtcommonuserxu: $("#txtcommonuserxu").val(),
            txtagentisbonus: $("#txtagentisbonus").val()

        },
        success: function (res) {
            $("#spinner").hide();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('config/successeditajax')?>",
                data: {
                    idconfig: $("#idconfig").val(),
                    valueconfig: res,
                    versionconfig: $("#txtversionconfig").val(),
                    configpf: $("#configpf").val()
                }, dataType: 'json',
                success: function (result) {
                    if (result.errorCode == 0) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo admin_url('config/configajax')?>",
                            data: {}, dataType: 'json'
                        });
                        $("#message").html("Bạn cập nhật dữ liệu thành công !!")
                    } else {
                        $("#message").html("Bạn cập nhật dữ liệu không thành công !!")
                    }

                }

            });
        }
    });
});

$(document).ready(function () {

    if ($("#configpf").val() == "game_bai") {

        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('config/editajax')?>",
            data: {
                configpf: $("#configpf").val(),
                nmconfig: $("#nmconfig").val()
            },
            dataType: 'json',
            success: function (result) {
                //  console.log(result.gameconfig[0]);
                obj = JSON.parse(result.gameconfig[0].value);
                $("#txtnameconfig").val(result.gameconfig[0].name);
                $("#txtversionconfig").val(result.gameconfig[0].version);
                $("#txtplatform").val(result.gameconfig[0].platform);
                $("#txtnamebc").val(obj.huvang[0].gameName);
                $("#txtdaybc").val(obj.huvang[0].dayInWeek);
                $("#txtbdbch").val(obj.huvang[0].startTime.h);
                $("#txtbdbcm").val(obj.huvang[0].startTime.m);
                $("#txtktbch").val(obj.huvang[0].endTime.h);
                $("#txtktbcm").val(obj.huvang[0].endTime.m);
                $("#txtinibc").val(obj.huvang[0].initial);
                $("#txtaddbc").val(obj.huvang[0].add);
                $("#txt100bc").val(obj.huvang[0].rate[100]);
                $("#txt200bc").val(obj.huvang[0].rate[200]);
                $("#txt500bc").val(obj.huvang[0].rate[500]);
                $("#txt1nbc").val(obj.huvang[0].rate[1000]);
                $("#txt2nbc").val(obj.huvang[0].rate[2000]);
                $("#txt5nbc").val(obj.huvang[0].rate[5000]);
                $("#txt10nbc").val(obj.huvang[0].rate[10000]);
                $("#txt20nbc").val(obj.huvang[0].rate[20000]);
                $("#txt50nbc").val(obj.huvang[0].rate[50000]);
                $("#txt100nbc").val(obj.huvang[0].rate[100000]);
                $("#txt200nbc").val(obj.huvang[0].rate[200000]);
                $("#txtnametlmn").val(obj.huvang[1].gameName);
                $("#txtdaytlmn").val(obj.huvang[1].dayInWeek);
                $("#txtbdtlmnh").val(obj.huvang[1].startTime.h);
                $("#txtbdtlmnm").val(obj.huvang[1].startTime.m);
                $("#txtkttlmnh").val(obj.huvang[1].endTime.h);
                $("#txtkttlmnm").val(obj.huvang[1].endTime.m);
                $("#txtinitlmn").val(obj.huvang[1].initial);
                $("#txtaddtlmn").val(obj.huvang[1].add);
                $("#txt100tlmn").val(obj.huvang[1].rate[100]);
                $("#txt200tlmn").val(obj.huvang[1].rate[200]);
                $("#txt500tlmn").val(obj.huvang[1].rate[500]);
                $("#txt1ntlmn").val(obj.huvang[1].rate[1000]);
                $("#txt2ntlmn").val(obj.huvang[1].rate[2000]);
                $("#txt5ntlmn").val(obj.huvang[1].rate[5000]);
                $("#txt10ntlmn").val(obj.huvang[1].rate[10000]);
                $("#txt20ntlmn").val(obj.huvang[1].rate[20000]);
                $("#txt50ntlmn").val(obj.huvang[1].rate[50000]);
                $("#txt100ntlmn").val(obj.huvang[1].rate[100000]);
                $("#txt200ntlmn").val(obj.huvang[1].rate[200000]);
                $("#txtnamesam").val(obj.huvang[2].gameName);
                $("#txtdaysam").val(obj.huvang[2].dayInWeek);
                $("#txtbdsamh").val(obj.huvang[2].startTime.h);
                $("#txtbdsamm").val(obj.huvang[2].startTime.m);
                $("#txtktsamh").val(obj.huvang[2].endTime.h);
                $("#txtktsamm").val(obj.huvang[2].endTime.m);
                $("#txtinisam").val(obj.huvang[2].initial);
                $("#txtaddsam").val(obj.huvang[2].add);
                $("#txt100sam").val(obj.huvang[2].rate[100]);
                $("#txt200sam").val(obj.huvang[2].rate[200]);
                $("#txt500sam").val(obj.huvang[2].rate[500]);
                $("#txt1nsam").val(obj.huvang[2].rate[1000]);
                $("#txt2nsam").val(obj.huvang[2].rate[2000]);
                $("#txt5nsam").val(obj.huvang[2].rate[5000]);
                $("#txt10nsam").val(obj.huvang[2].rate[10000]);
                $("#txt20nsam").val(obj.huvang[2].rate[20000]);
                $("#txt50nsam").val(obj.huvang[2].rate[50000]);
                $("#txt100nsam").val(obj.huvang[2].rate[100000]);
                $("#txt200nsam").val(obj.huvang[2].rate[200000]);
                $("#txtnamebinh").val(obj.huvang[3].gameName);
                $("#txtdaybinh").val(obj.huvang[3].dayInWeek);
                $("#txtbdbinhh").val(obj.huvang[3].startTime.h);
                $("#txtbdbinhm").val(obj.huvang[3].startTime.m);
                $("#txtktbinhh").val(obj.huvang[3].endTime.h);
                $("#txtktbinhm").val(obj.huvang[3].endTime.m);
                $("#txtinibinh").val(obj.huvang[3].initial);
                $("#txtaddbinh").val(obj.huvang[3].add);
                $("#txt100binh").val(obj.huvang[3].rate[100]);
                $("#txt200binh").val(obj.huvang[3].rate[200]);
                $("#txt500binh").val(obj.huvang[3].rate[500]);
                $("#txt1nbinh").val(obj.huvang[3].rate[1000]);
                $("#txt2nbinh").val(obj.huvang[3].rate[2000]);
                $("#txt5nbinh").val(obj.huvang[3].rate[5000]);
                $("#txt10nbinh").val(obj.huvang[3].rate[10000]);
                $("#txt20nbinh").val(obj.huvang[3].rate[20000]);
                $("#txt50nbinh").val(obj.huvang[3].rate[50000]);
                $("#txt100nbinh").val(obj.huvang[3].rate[100000]);
                $("#txt200nbinh").val(obj.huvang[3].rate[200000]);
                $("#txtnamecao").val(obj.huvang[4].gameName);
                $("#txtdaycao").val(obj.huvang[4].dayInWeek);
                $("#txtbdcaoh").val(obj.huvang[4].startTime.h);
                $("#txtbdcaom").val(obj.huvang[4].startTime.m);
                $("#txtktcaoh").val(obj.huvang[4].endTime.h);
                $("#txtktcaom").val(obj.huvang[4].endTime.m);
                $("#txtinicao").val(obj.huvang[4].initial);
                $("#txtaddcao").val(obj.huvang[4].add);
                $("#txt100cao").val(obj.huvang[4].rate[100]);
                $("#txt200cao").val(obj.huvang[4].rate[200]);
                $("#txt500cao").val(obj.huvang[4].rate[500]);
                $("#txt1ncao").val(obj.huvang[4].rate[1000]);
                $("#txt2ncao").val(obj.huvang[4].rate[2000]);
                $("#txt5ncao").val(obj.huvang[4].rate[5000]);
                $("#txt10ncao").val(obj.huvang[4].rate[10000]);
                $("#txt20ncao").val(obj.huvang[4].rate[20000]);
                $("#txt50ncao").val(obj.huvang[4].rate[50000]);
                $("#txt100ncao").val(obj.huvang[4].rate[100000]);
                $("#txt200ncao").val(obj.huvang[4].rate[200000]);
            }
        })


    } else {
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('config/editajax')?>",
            data: {
                configpf: $("#configpf").val(),
                nmconfig: $("#nmconfig").val()
            },
            dataType: 'json',
            success: function (result) {
                //  console.log(result.gameconfig[0]);
                obj = JSON.parse(result.gameconfig[0].value);

                $("#txtnameconfig").val(result.gameconfig[0].name);
                $("#txtversionconfig").val(result.gameconfig[0].version);
                $("#txtplatform").val(result.gameconfig[0].platform);
                if ($("#configpf").val() == "ios" || $("#configpf").val() == "ad" || $("#configpf").val() == "web" || $("#configpf").val() == "wp") {
                    $("#txtversion").val(obj.version);
                    $("#txtupdate").val(obj.update);
                    $("#txturlupdate").val(obj.urlUpdate);
                    $("#txtmesupdate").val(obj.messageUpdate);
                    $("#txtistcp").val(obj.isTcp);
                    $("#txtcallcm").val(obj.call_common);
                    $("#txtstatusgame").val(obj.status_game);
                    $("#txtrecharge").val(obj.recharge);
                    $("#txtcashout").val(obj.cashout);
                    $("#txtstatusmini").val(obj.minigame.status);
                    $("#txtipmini").val(obj.minigame.ip);
                    $("#txtportmini").val(obj.minigame.port);
                    $("#txtstatussam").val(obj.sam.status);
                    $("#txtipsam").val(obj.sam.ip);
                    $("#txtportsam").val(obj.sam.port);
                    $("#txtstatusbacay").val(obj.bacay.status);
                    $("#txtipbacay").val(obj.bacay.ip);
                    $("#txtportbacay").val(obj.bacay.port);
                    $("#txtstatusbinh").val(obj.binh.status);
                    $("#txtipbinh").val(obj.binh.ip);
                    $("#txtportbinh").val(obj.binh.port);
                    $("#txtstatustlmn").val(obj.tlmn.status);
                    $("#txtiptlmn").val(obj.tlmn.ip);
                    $("#txtporttlmn").val(obj.tlmn.port);
                    $("#txtstatusbc").val(obj.baicao.status);
                    $("#txtipbc").val(obj.baicao.ip);
                    $("#txtportbc").val(obj.baicao.port);
                    $("#txtstatuslieng").val(obj.lieng.status);
                    $("#txtiplieng").val(obj.lieng.ip);
                    $("#txtportlieng").val(obj.lieng.port);
                    $("#txtstatuspoker").val(obj.poker.status);
                    $("#txtippoker").val(obj.poker.ip);
                    $("#txtportpoker").val(obj.poker.port);
                    $("#txtstatustala").val(obj.tala.status);
                    $("#txtiptala").val(obj.tala.ip);
                    $("#txtporttala").val(obj.tala.port);
                    $("#txtstatusxito").val(obj.xito.status);
                    $("#txtipxito").val(obj.xito.ip);
                    $("#txtportxito").val(obj.xito.port);
                    $("#txtstatusxoc").val(obj.xocxoc.status);
                    $("#txtipxoc").val(obj.xocxoc.ip);
                    $("#txtportxoc").val(obj.xocxoc.port);
                    $("#txtstatuskb").val(obj.khobau.status);
                    $("#txtipkb").val(obj.khobau.ip);
                    $("#txtportkb").val(obj.khobau.port);
                    $("#txtstatusmnn").val(obj.mynhanngu.status);
                    $("#txtipmnn").val(obj.mynhanngu.ip);
                    $("#txtportmnn").val(obj.mynhanngu.port);
                    $("#txtstatusave").val(obj.avengers.status);
                    $("#txtipave").val(obj.avengers.ip);
                    $("#txtportave").val(obj.avengers.port);
                    $("#txtstatusndv").val(obj.nudiepvien.status);
                    $("#txtipndv").val(obj.nudiepvien.ip);
                    $("#txtportndv").val(obj.nudiepvien.port);
                } else if ($("#configpf").val() == "common") {
                    $("#txtweb").val(obj.web);
                    $("#txthotline").val(obj.hotline);
                    $("#txtsmsotp").val(obj.sms_otp);
                    $("#txtemail").val(obj.email);
                    $("#txtfacebook").val(obj.facebook);
                    $("#txturlhelp").val(obj.urlHelp);
                    $("#txtbanner").val(obj.banner);
                    $("#txtcommonpw").val(obj.password_default);
                    $("#txtcommoniapkey").val(obj.iap_key);
                    $("#txtcommonbotvin").val(obj.bot_vin);
                    $("#txtcommonbotxu").val(obj.bot_xu);
                    $("#txtcommonuservin").val(obj.user_vin);
                    $("#txtcommonuserxu").val(obj.user_xu);
                } else if ($("#configpf").val() == "otp") {
                    $("#txtotpdf").val(obj.otp_default);
                    $("#txtotpurlsmt").val(obj.otp_url_send_mt);
                    $("#txtotpip").val(obj.otp_ip_filter);
                    $("#txtotpurlrmo").val(obj.otp_url_receive_mo);
                    $("#txtotpdelay").val(obj.otp_delay_send_mt);
                    $("#txtmessotp").val(obj.message_otp_success);
                    $("#txtmessodp").val(obj.message_odp_success);
                    $("#txtmessapp").val(obj.message_app_success);
                    $("#txtmesserrorm").val(obj.message_error_mobile);
                    $("#txtmesserrors").val(obj.message_error_syntax);
                } else if ($("#configpf").val() == "dvt") {
                    $("#txtdvturl").val(obj.dvt_url);
                    $("#txtdvtkey").val(obj.dvt_private_key);
                    $("#txtdvtkeysec").val(obj.dvt_secret_key);
                    $("#txtdatere").val(obj.dvt_date_re_check);
                    $("#txtsmsopen").val(obj.sms_open);
                } else if ($("#configpf").val() == "brandname") {
                    $("#txtisopen").val(obj.is_open);
                    $("#txtbnsender").val(obj.brandname_sender);
                    $("#txtbnuser").val(obj.brandname_user);
                    $("#txtbnpass").val(obj.brandname_pass);
                    $("#txtbnurl").val(obj.brandname_url);
                    $("#txtbncid").val(obj.brandname_client_id);
                    $("#txtbncuser").val(obj.brandname_client_user);
                    $("#txtbncpass").val(obj.brandname_client_pass);
                    $("#txtbnurtst").val(obj.brandname_url_report_from_st);
                }
                else if ($("#configpf").val() == "billing") {
                    $("#txtisnapthe").val(obj.is_nap_the);
                    $("#txtisnapvinnh").val(obj.is_nap_vin_nh);
                    $("#txtisnapviniap").val(obj.is_nap_vin_iap);
                    $("#txtisnapxu").val(obj.is_nap_xu);
                    $("#txtischvin").val(obj.is_chuyen_vin);
                    $("#txtismt").val(obj.is_mua_the);
                    $("#txtisnapdt").val(obj.is_nap_dt);
                    $("#txtisntnh").val(obj.is_nap_tien_nh);
                    $("#txtratioxu").val(obj.ratio_xu);
                    $("#txtrationapthe").val(obj.ratio_nap_the);
                    $("#txtrationvnh").val(obj.ratio_nap_vin_nh);
                    $("#txtratiomt").val(obj.ratio_mua_the);
                    $("#txtrationdt").val(obj.ratio_nap_dt);
                    $("#txtratioch").val(obj.ratio_chuyen);
                    $("#txtrationtnh").val(obj.ratio_nap_tien_nh);
                    $("#txtpaymentfb").val(obj.payment_fb);
                    $("#txtnt").val(obj.nap_the);
                    $("#txtnvnh").val(obj.nap_vin_nh);
                    $("#txtmtdt").val(obj.mua_the_dt);
                    $("#txtmtg").val(obj.mua_the_game);
                    $("#txtntdt").val(obj.nap_tien_dt);
                    $("#txtntnh").val(obj.nap_tien_nh);
                    $("#txtvt").val(obj.Viettel);
                    $("#txtvina").val(obj.Vina);
                    $("#txtmobi").val(obj.Mobi);
                    $("#txtvnm").val(obj.VNM);
                    $("#txtbee").val(obj.Beeline);
                    $("#txtgate").val(obj.Gate);
                    $("#txtzing").val(obj.Zing);
                    $("#txtvcoin").val(obj.Vcoin);
                    $("#txtcvm").val(obj.chuyen_vin_min);
                    $("#txtclu").val(obj.cashout_limit_user);
                    $("#txtcls").val(obj.cashout_limit_system);
                    $("#txtnrf").val(obj.num_recharge_fail);
                    $("#txtndt").val(obj.num_doi_the);
                    $("#txtcashtb").val(obj.cashout_time_block);
                    $("#txtcashbm").val(obj.cashout_bank_max);
                    $("#txtsuadmin").val(obj.super_admin);
                    $("#txtsuagent").val(obj.super_agent);
                    $("#txtratiore1").val(obj.ratio_refund_fee_1);
                    $("#txtratiore2").val(obj.ratio_refund_fee_2);
                    $("#txtratiotdl").val(obj.ratio_transfer_dl_1);
                    $("#txti2billing").val(obj.i2b);
                    $("#txtdl1smin").val(obj.dl1_to_super_min);
                    $("#txtdl1smax").val(obj.dl1_to_super_max);
                    $("#txtdl1sodumin").val(obj.dl1_to_super_min_x);
                    $("#txtiapmax").val(obj.iap_max);
                    $("#txtvinplus").val(obj.is_vin_plus);
                    $("#txtratio01").val(obj.r_tf_01);
                    $("#txtratio02").val(obj.r_tf_02);
                    $("#txtratio20").val(obj.r_tf_20);
                    $("#txtratio21").val(obj.r_tf_21);
                    $("#txtratio22").val(obj.r_tf_22);
                    $("#txtratio11").val(obj.r_tf_11);
                    $("#txtratio12").val(obj.r_tf_11);
                }
                else if ($("#configpf").val() == "other") {
                    $("#txturlae").val(obj.url_active_email);
                    $("#txtsign").val(obj.sign);
                    $("#txtlistgb").val(obj.list_game_bai);
                    $("#txtphonecb").val(obj.list_phone_alert);
                    $("#txthugbmax").val(obj.hu_game_bai_max);
                    $("#txtsmsfee").val(obj.sms_fee);
                }
                else if ($("#configpf").val() == "i2b") {
                    $("#txtversioni2b").val(obj.version);
                    $("#txtnapas").val(obj.napas_url);
                    $("#txtmerchant").val(obj.merchant_id);
                    $("#txtaccess").val(obj.access_code);
                    $("#txtsecret").val(obj.secret_key);
                    $("#txtuseri2b").val(obj.user);
                    $("#txtpwi2b").val(obj.password);
                    $("#txturlresult").val(obj.url_result);
                    $("#txturlcan").val(obj.url_cancel);
                    $("#txtamount").val(obj.amount_min);
                }
                else if ($("#configpf").val() == "nganluong") {
                    $("#txtisopennl").val(obj.is_open);
                    $("#txtmeridnl").val(obj.merchant_id);
                    $("#txtmerpwnl").val(obj.merchant_password);
                    $("#txtversionnl").val(obj.version);
                    $("#txtreemailnl").val(obj.receiver_email);
                    $("#txtreurlnl").val(obj.return_url);
                    $("#txtcanurlnl").val(obj.cancel_url);
                    $("#txttimenl").val(obj.time_limit);
                    $("#txtnlurl").val(obj.nl_url);
                    $("#txtpaymentnl").val(obj.payment_method);
                }
                else if ($("#configpf").val() == "admin") {
                    $("#txtnumberdl2").val(obj.number_dl2);
                    $("#txtgiftcodevin").val(obj.giftcode_vin);
                    $("#txtgiftcodexu").val(obj.giftcode_xu);
                    $("#txtgiftcodedot").val(obj.giftcode_version);
                    $("#txtnumberquay").val(obj.number_quay)
                } else if ($("#configpf").val() == "vin_plus") {
                    $("#txtiosnaptien").val(obj.ios.nap_tien);
                    $("#txtiosgiftcode").val(obj.ios.gift_code);
                    $("#txtioschuyenkhoan").val(obj.ios.chuyen_khoan);
                    $("#txtiosdaily").val(obj.ios.dai_ly);
                    $("#txtiosdoithuong").val(obj.ios.doi_thuong);
                    $("#txtadnaptien").val(obj.ad.nap_tien);
                    $("#txtadgiftcode").val(obj.ad.gift_code);
                    $("#txtadchuyenkhoan").val(obj.ad.chuyen_khoan);
                    $("#txtaddaily").val(obj.ad.dai_ly);
                    $("#txtaddoithuong").val(obj.ad.doi_thuong);
                    $("#txtwpnaptien").val(obj.wp.nap_tien);
                    $("#txtwpgiftcode").val(obj.wp.gift_code);
                    $("#txtwpchuyenkhoan").val(obj.wp.chuyen_khoan);
                    $("#txtwpdaily").val(obj.wp.dai_ly);
                    $("#txtwpdoithuong").val(obj.wp.doi_thuong);
                }
                else if ($("#configpf").val() == "vippoint_event") {
                    $("#txtstartve").val(obj.start);
                    $("#txtendve").val(obj.end);
                    $("#txtunluckyve").val(obj.unlucky_in_day);
                    $("#txtluckyve").val(obj.lucky_in_day);
                    $("#txtluckystart").val(obj.lucky_time.start);
                    $("#txtluckyend").val(obj.lucky_time.end);
                    $("#txtunluckystart").val(obj.unlucky_time.start);
                    $("#txtunluckyend").val(obj.unlucky_time.end);
                    $("#txtplaces").val(obj.places);
                    $("#txturlhelpve").val(obj.url_help);
                    $("#txtsubvp").val(obj.sub_vp);
                    $("#txtaddvp300").val(obj.add_vp[0][300]);
                    $("#txtaddvp210").val(obj.add_vp[1][210]);
                    $("#txtaddvp100").val(obj.add_vp[2][100]);
                    $("#txtaddvp60").val(obj.add_vp[3][60]);
                    $("#txtaddvp30").val(obj.add_vp[4][30]);
                    $("#txtaddvin2500").val(obj.add_vin[0][2500]);
                    $("#txtaddvin1500").val(obj.add_vin[1][1500]);
                    $("#txtaddvin750").val(obj.add_vin[2][750]);
                    $("#txtaddvin540").val(obj.add_vin[3][540]);
                    $("#txtaddvin300").val(obj.add_vin[4][300]);
                    $("#txtaddvin60").val(obj.add_vin[5][60]);
                    $("#txtaddvin30").val(obj.add_vin[6][30]);
                    $("#txtratesub").val(obj.rate_sub);
                    $("#txtrateadd").val(obj.rate_add);
                    $("#txtratesubbot").val(obj.rate_sub_bot);
                    $("#txtrateaddbot").val(obj.rate_add_bot);
                }
                else if ($("#configpf").val() == "lucky_vip") {
                    $("#txtgoldout100k").val(obj.gold.out._100K);
                    $("#txtgoldout200k").val(obj.gold.out._200K);
                    $("#txtgoldout500k").val(obj.gold.out._500K);
                    $("#txtgoldout1m").val(obj.gold.out._1M);
                    $("#txtgoldout5m").val(obj.gold.out._5M);
                    $("#txtgoldout10m").val(obj.gold.out._10M);
                    $("#txtgoldout20m").val(obj.gold.out._20M);
                    $("#txtgoldout50m").val(obj.gold.out._50M);
                    $("#txtgoldinx2").val(obj.gold.in.X2);
                    $("#txtgoldinx3").val(obj.gold.in.X3);
                    $("#txtgoldinx4").val(obj.gold.in.X4);
                    $("#txtgoldinx5").val(obj.gold.in.X5);
                    $("#txtgoldnum").val(obj.gold.num);
                    $("#txtplout100k").val(obj.platinum.out._100K);
                    $("#txtplout200k").val(obj.platinum.out._200K);
                    $("#txtplout500k").val(obj.platinum.out._500K);
                    $("#txtplout1m").val(obj.platinum.out._1M);
                    $("#txtplout5m").val(obj.platinum.out._5M);
                    $("#txtplout10m").val(obj.platinum.out._10M);
                    $("#txtplout20m").val(obj.platinum.out._20M);
                    $("#txtplout50m").val(obj.platinum.out._50M);
                    $("#txtplinx2").val(obj.platinum.in.X2);
                    $("#txtplinx3").val(obj.platinum.in.X3);
                    $("#txtplinx4").val(obj.platinum.in.X4);
                    $("#txtplinx5").val(obj.platinum.in.X5);
                    $("#txtplnum").val(obj.platinum.num);
                    $("#txtdmout100k").val(obj.diamond.out._100K);
                    $("#txtdmout200k").val(obj.diamond.out._200K);
                    $("#txtdmout500k").val(obj.diamond.out._500K);
                    $("#txtdmout1m").val(obj.diamond.out._1M);
                    $("#txtdmout5m").val(obj.diamond.out._5M);
                    $("#txtdmout10m").val(obj.diamond.out._10M);
                    $("#txtdmout20m").val(obj.diamond.out._20M);
                    $("#txtdmout50m").val(obj.diamond.out._50M);
                    $("#txtdminx2").val(obj.diamond.in.X2);
                    $("#txtdminx3").val(obj.diamond.in.X3);
                    $("#txtdminx4").val(obj.diamond.in.X4);
                    $("#txtdminx5").val(obj.diamond.in.X5);
                    $("#txtdmnum").val(obj.diamond.num);
                }

                else if ($("#configpf").val() == "agent") {
                    $("#txtagentisbonus").val(obj.is_bonus);
                    $("#txtdsmin").val(obj.ds_min);
                    $("#txtbonusfix").val(obj.bonus_fix);
                    $("#txtbonus500k").val(obj.bonus_more[0][500000]);
                    $("#txtbonus1m").val(obj.bonus_more[1][1000000]);
                }
            }
        })
    }
});
</script>
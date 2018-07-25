<?php $this->load->view('admin/usergame/head', $this->data) ?>
<div class="line"></div>
<?php if($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
     <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>

    <div class="widget">
        <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
        <div class="title">
            <h6>Danh sách tài khoản đăng ký</h6>
            <h6 style="float: right">Tổng số tài khoản:<span style="color:#0000ff" id="numuser"></span></h6>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('usergame') ?>" method="post">
            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 70px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name="toDate" value="<?php echo $this->input->post('toDate') ?>"> <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                            </div>


                        </td>

                        <td>
                            <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                   class="formLeft"> Đến ngày: </label>
                        </td>
                        <td class="item">

                            <div class="input-group date" id="datetimepicker2">
                                <input type="text" id="fromDate" name="fromDate" value="<?php echo $this->input->post('fromDate') ?>"> <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="formRow">

                <table>
                    <tr>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Tên đăng nhập:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="username" value="<?php echo $this->input->post('username') ?>" name="username">
                        </td>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Nickname:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="nickname" value="<?php echo $this->input->post('nickname') ?>" name="nickname">
                        </td>


                    </tr>
                </table>
            </div>

            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" style="width: 120px;margin-bottom:-3px;margin-left: 23px;"
                                   class="formLeft"> Sắp xếp theo: </label>
                        </td>
                        <td class="item"><select id="fieldname" name="fieldname"
                                                 style="margin-left: 27px;margin-bottom:-2px;width: 142px">
												   <?php if($admin_info->Status == "M" || $admin_info->Status == "LM"): ?>
                                    <option value="">Chọn</option>
                                <?php else: ?>
                                <option value="">Chọn</option>
                                <option value="1" <?php if($this->input->post('fieldname') == 1 ){echo "selected";} ?>>Vin</option>
                                <option value="2" <?php if($this->input->post('fieldname') == 2 ){echo "selected";} ?>>Xu</option>
                                <option value="3" <?php if($this->input->post('fieldname') == 3 ){echo "selected";} ?>>Safe</option>
                                <option value="4" <?php if($this->input->post('fieldname') == 4 ){echo "selected";} ?>>Vippoint</option>
                                <option value="5" <?php if($this->input->post('fieldname') == 5 ){echo "selected";} ?>>Vippoint tích lũy</option>
                                <option value="6" <?php if($this->input->post('fieldname') == 6 ){echo "selected";} ?>>Nạp tiền</option>
								  <?php endif; ?>
                            </select>
                        </td>
                        <td>
                            <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                                   class="formLeft"> Điều kiện: </label>
                        </td>
                        <td class="item"><select id="timkiemtheo" name="timkiemtheo"
                                                 style="margin-left: 5px;margin-bottom:-2px;width: 150px">
												   <?php if($admin_info->Status == "M" || $admin_info->Status == "LM"): ?>
                                    <option value="">Chọn</option>
                                <?php else: ?>
                                <option value="">Chọn</option>
                                <option value="1" <?php if($this->input->post('timkiemtheo') == 1 ){echo "selected";} ?>>Tăng dần</option>
                                <option value="2" <?php if($this->input->post('timkiemtheo') == 2 ){echo "selected";} ?> >Giảm dần</option>
								  <?php endif; ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="formRow">
                <table>
                    <tr>

                        <td>
                            <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                                   class="formLeft"> Loại tài khoản: </label>
                        </td>
                        <?php if($admin_info->Status == "M"  || $admin_info->Status == "L" || $admin_info->Status == "LM"): ?>
                            <td class="item"><select id="typetaikhoan" name="timkiemtheo"
                                                     style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                                    <option value="0">Chọn</option>
                                </select>
                            </td>
                        <?php else:?>
                            <td class="item"><select id="typetaikhoan" name="typetaikhoan"
                                                     style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                                    <option value=""<?php if($this->input->post('typetaikhoan') == "" ){echo "selected";} ?>>Chọn</option>
                                    <option value="0" <?php if($this->input->post('typetaikhoan') == "0" ){echo "selected";} ?>>Tài khoản thường</option>
                                    <option value="1" <?php if($this->input->post('typetaikhoan') == "1" ){echo "selected";} ?> >Đại lý cấp 1</option>
                                    <option value="2" <?php if($this->input->post('typetaikhoan') == "2" ){echo "selected";} ?>>Đại lý cấp 2</option>
                                    <option value="100" <?php if($this->input->post('typetaikhoan') == "100" ){echo "selected";} ?>>Admin</option>
                                </select>
                            </td>
                        <?php endif ;?>
                        <?php if($admin_info->Status == "A"  || $admin_info->Status == "W"): ?>
                        <td>
                            <label for="param_name" style="width: 115px;margin-bottom:-3px;margin-left: 47px;"
                                   class="formLeft"> Hiển thị: </label>
                        </td>
                        <td class="item">
                            <select id="record" name="record"
                                                 style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                                <option value="50" <?php if($this->input->post('record') == 50 ){echo "selected";} ?> >50</option>
                                <option value="100" <?php if($this->input->post('record') == 100 ){echo "selected";} ?>>100</option>
                                <option value="200" <?php if($this->input->post('record') == 200 ){echo "selected";} ?>>200</option>
                                <option value="500" <?php if($this->input->post('record') == 500 ){echo "selected";} ?>>500</option>
                                <option value="1000" <?php if($this->input->post('record') == 1000 ){echo "selected";} ?>>1000</option>
                                <option value="2000" <?php if($this->input->post('record') == 2000 ){echo "selected";} ?>>2000</option>
                                <option value="5000" <?php if($this->input->post('record') == 5000 ){echo "selected";} ?>>5000</option>
                            </select>
                        </td>
                        <?php else: ?>
                            <input type="hidden" id="record" value="50">
                        <?php endif; ?>

                    </tr>
                    </table>
                </div>

            <div class="formRow">
                <table>
                    <tr>
                        <td><label style="margin-left: 47px;margin-bottom:-2px;width: 100px">Điện thoại:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="phone" value="<?php echo $this->input->post('phone') ?>" name="phone"></td>
                        <td><label style="margin-left: 47px;margin-bottom:-2px;width: 100px">Tài khoản:</label></td>
                        <td><select id="taikhoanbot" name="taikhoanbot"
                                     style="margin-left: 47px;margin-bottom:-2px;width: 150px">
                               <!-- <option value=""<?php if($this->input->post('taikhoanbot') == "" ){echo "selected";} ?>>Chọn</option> -->
							      <?php if($admin_info->Status == "M" || $admin_info->Status == "L" || $admin_info->Status == "LM"): ?>
                                <option value="0" <?php if($this->input->post('taikhoanbot') == "0" ){echo "selected";} ?>>Tài khoản thường</option>
                                <?php else: ?>
                                <option value="0" <?php if($this->input->post('taikhoanbot') == "0" ){echo "selected";} ?>>Tài khoản thường</option>
                                <option value="1" <?php if($this->input->post('taikhoanbot') == "1" ){echo "selected";} ?>>Tài khoản bot</option>
								<?php endif; ?>
                            </select></td>
                       
                    </tr>
                    </table>
                </div>
				<div class="formRow">
        <table>
            <tr>
                <td><label style="margin-left: 47px;margin-bottom:-2px;width: 100px">Email:</label></td>
                <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                           id="txtemail" value="<?php echo $this->input->post('txtemail') ?>" name="txtemail"></td>
                <td><label style="margin-left: 47px;margin-bottom:-2px;width: 100px">Loại tìm kiếm:</label></td>
                <td><select id="typetimkiem" name="typetimkiem"
                            style="margin-left: 30px;margin-bottom:-2px;width: 150px">
                        <?php if ($admin_info->Status == "M" || $admin_info->Status == "L" || $admin_info->Status == "LM"): ?>
                            <option value="0" <?php if ($this->input->post('typetimkiem') == "0") {
                                echo "selected";
                            } ?>>Tìm chính xác
                            </option>
                        <?php else: ?>
                            <option value="0" <?php if ($this->input->post('typetimkiem') == "0") {
                                echo "selected";
                            } ?>>Tìm chính xác
                            </option>
                            <option value="1" <?php if ($this->input->post('typetimkiem') == "1") {
                                echo "selected";
                            } ?>>Tìm gần đúng
                            </option>
                        <?php endif; ?>
                    </select></td>
                <td style="">
                    <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                           style="margin-left: 70px">
                </td>
                <td>
                    <input type="reset"
                           onclick="window.location.href = '<?php echo admin_url('usergame') ?>'; "
                           value="Reset" class="basic" style="margin-left: 20px">
                </td>
            </tr>
        </table>
    </div>

        </form>
        <input type="hidden" value="<?php echo $admin_info->Status ?>" id="status">
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                           <?php if ($admin_info->Status == "L") : ?>
                            <td>STT</td>
                            <td>Tên đăng nhập</td>
                            <td>Nickname</td>
                            <td>Số dư vin</td>
                            <td>Số dư xu</td>
                            <td>Vin két sắt</td>
                            <td>Vippoint</td>
                            <td>Bảo mật ĐT</td>
                            <td>Bảo mật Email</td>
                            <td>Bảo mật ĐN</td>
                            <td>TG bảo mật</td>
                            <td>Ngày tạo</td>
                        <?php elseif ($admin_info->Status == "M") : ?>
                                <td>STT</td>
                                <td>Tên đăng nhập</td>
                                <td>Nickname</td>
                             
                                <td>Bảo mật ĐT</td>
                                <td>Bảo mật Email</td>
                                <td>Bảo mật ĐN</td>
                                <td>TG bảo mật</td>
                                <td>Ngày tạo</td>
								<?php elseif ($admin_info->Status == "LM") : ?>
                            <td>STT</td>
                            <td>Tên đăng nhập</td>
                            <td>Nickname</td>
                            <td>Số dư vin</td>
                            <td>Số dư xu</td>
                            <td>Vin két sắt</td>
                            <td>Bảo mật ĐT</td>
                            <td>Bảo mật Email</td>
                            <td>Bảo mật ĐN</td>
                            <td>TG bảo mật</td>
                            <td>Ngày tạo</td>
                            <?php elseif( $admin_info->Status == "S" || $admin_info->Status == "D" ): ?>
                                <td>STT</td>
                                <td>Tên đăng nhập</td>
                                <td>Nickname</td>
								  <td>Số điện thoại</td>
                                <td>Số dư vin</td>
                                <td>Số dư xu</td>
                                <td>Vin két sắt</td>
                                <td>Vippoint</td>
								 <td>Bảo mật ĐT</td>
                                <td>Bảo mật Email</td>
                                <td>Bảo mật ĐN</td>
                                <td>TG bảo mật</td>
                                <td>Ngày tạo</td>
                            <?php else:?>
                            <td>STT</td>
                            <td>Username</td>
                            <td>Nickname</td>
                            <td>Số dư vin</td>
                            <td>Số dư xu</td>
                            <td>Số vin KS</td>
                            <td>Vippoint</td>
                            <td>Bảo mật ĐT</td>
                            <td>Bảo mật Email</td>
                            <td>Email</td>
                            <td>CMND</td>
                            <td>Điện thoại</td>
                            <td>Tài khoản</td>
                            <td>Bảo mật ĐN</td>
                            <td>TG bảo mật</td>
                            <td>Ngày tạo</td>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody id="logaction">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<style>
    td{
        word-break: break-all;
    }
    thead{
        font-size: 12px;
    }
    .spinner {
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
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-lg"></ul>
    </div>
</div>
<script>
$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD 00:00:00'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD 23:59:59'
    });

});
    $("#search_tran").click(function () {
        var fromDatetime = $("#toDate").val();
        var toDatetime = $("#fromDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });
    function resultSearchTransction(stt, username, nickname, vin, xu, safe, vippoint, phone, date, status, serphone, sermail, email, cmnd, taikhoan, iotp, time,googleid,facebookid) {

        var rs = "";
       if ($("#status").val() == "L") {
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        if (username == null) {
            if (googleid != null) {
                rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + "GG_" + googleid + "</a></td>";
            } else if (facebookid != null) {
                rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + "FB_" + facebookid + "</a></td>";
            }
        } else {
            rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + username + "</a></td>";
        }
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(vin) + "</td>";
        rs += "<td>" + commaSeparateNumber(xu) + "</td>";
        rs += "<td>" + commaSeparateNumber(safe) + "</td>";
        rs += "<td>" + vippoint + "</td>";

        if (serphone == 1) {

            rs += "<td>" + "Có" + "</td>";
        }
        else {
            rs += "<td>" + "Không" + "</td>";
        }
        if (sermail == 1) {
            rs += "<td>" + "Có" + "</td>";
        }
        else {
            rs += "<td>" + "Không" + "</td>";
        }
        if (iotp < 0) {
            rs += "<td>" + "Không" + "</td>";
        } else if (iotp >= 0) {
            rs += "<td>" + "Có" + "</td>";
        }
        if (time == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + time + "</td>";
        }
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
    }
    else if ($("#status").val() == "M") {
            rs += "<tr>";
            rs += "<td>" + stt + "</td>";
            if(username == null){
                if(googleid != null){
                    rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>"+"GG_"+ googleid + "</a></td>";
                }else if(facebookid != null){
                    rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" +"FB_"+ facebookid + "</a></td>";
                }
            }else{
                rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + username + "</a></td>";
            }
            rs += "<td>" + nickname + "</td>";

       
            if (serphone == 1) {

                rs += "<td>" + "Có" + "</td>";}
            else{
                rs += "<td>" + "Không" + "</td>";
            }
            if (sermail == 1) {
                rs += "<td>" + "Có" + "</td>";}
            else{
                rs += "<td>" + "Không" + "</td>";
            }
            if (iotp < 0) {
                rs += "<td>" + "Không" + "</td>";
            } else if (iotp >= 0) {
                rs += "<td>" + "Có" + "</td>";
            }
            if (time == null) {
                rs += "<td>" + "" + "</td>";
            } else {
                rs += "<td>" + time + "</td>";
            }
            rs += "<td>" + date + "</td>";
            rs += "</tr>";
        }
		
		else if ($("#status").val() == "LM") {
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        if (username == null) {
            if (googleid != null) {
                rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + "GG_" + googleid + "</a></td>";
            } else if (facebookid != null) {
                rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + "FB_" + facebookid + "</a></td>";
            }
        } else {
            rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + username + "</a></td>";
        }
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(vin) + "</td>";
        rs += "<td>" + commaSeparateNumber(xu) + "</td>";
        rs += "<td>" + commaSeparateNumber(safe) + "</td>";
        if (serphone == 1) {

            rs += "<td>" + "Có" + "</td>";
        }
        else {
            rs += "<td>" + "Không" + "</td>";
        }
        if (sermail == 1) {
            rs += "<td>" + "Có" + "</td>";
        }
        else {
            rs += "<td>" + "Không" + "</td>";
        }
        if (iotp < 0) {
            rs += "<td>" + "Không" + "</td>";
        } else if (iotp >= 0) {
            rs += "<td>" + "Có" + "</td>";
        }
        if (time == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + time + "</td>";
        }
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
    }
        else if(  $("#status").val() == "S" || $("#status").val() == "D" ){

            rs += "<tr>";
            rs += "<td>" + stt + "</td>";
            if(username == null){
                if(googleid != null){
                    rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>"+"GG_"+ googleid + "</a></td>";
                }else if(facebookid != null){
                    rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" +"FB_"+ facebookid + "</a></td>";
                }
            }else{
                rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + username + "</a></td>";
            }
            rs += "<td>" + nickname + "</td>";
			 if (phone == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + phone + "</td>";
        }
            rs += "<td>" + commaSeparateNumber(vin) + "</td>";
            rs += "<td>" + commaSeparateNumber(xu) + "</td>";
            rs += "<td>" + commaSeparateNumber(safe) + "</td>";
            rs += "<td>" + vippoint + "</td>";
			if (serphone == 1) {

                rs += "<td>" + "Có" + "</td>";}
            else{
                rs += "<td>" + "Không" + "</td>";
            }
            if (sermail == 1) {
                rs += "<td>" + "Có" + "</td>";}
            else{
                rs += "<td>" + "Không" + "</td>";
            }
            if (iotp < 0) {
                rs += "<td>" + "Không" + "</td>";
            } else if (iotp >= 0) {
                rs += "<td>" + "Có" + "</td>";
            }
            if (time == null) {
                rs += "<td>" + "" + "</td>";
            } else {
                rs += "<td>" + time + "</td>";
            }
            rs += "<td>" + date + "</td>";
            rs += "</tr>";
        }else{

        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        if(username == null){
            if(googleid != null){
                rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>"+"GG_"+ googleid + "</a></td>";
            }else if(facebookid != null){
                rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" +"FB_"+ facebookid + "</a></td>";
            }
        }else{
            rs += "<td><a title='Sửa cầu'  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + username + "</a></td>";
        }
        rs += "<td><a title='Sửa cầu' style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + nickname + "/" + status + "'>" + nickname + "</a></td>";
        rs += "<td>" + commaSeparateNumber(vin) + "</td>";
        rs += "<td>" + commaSeparateNumber(xu) + "</td>";
        rs += "<td>" + commaSeparateNumber(safe) + "</td>";
        rs += "<td>" + vippoint + "</td>";
        if (serphone == 1) {

        rs += "<td>" + "Có" + "</td>";}
        else{
            rs += "<td>" + "Không" + "</td>";
        }
        if (sermail == 1) {
            rs += "<td>" + "Có" + "</td>";}
        else{
            rs += "<td>" + "Không" + "</td>";
        }
        if (email == null) {
        rs += "<td>" + "" + "</td>";}
        else{
            rs += "<td>" + email + "</td>";
        }
        if (cmnd == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + cmnd + "</td>";
        }
        if (phone == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + phone + "</td>";
        }
        if (taikhoan == 0) {
            rs += "<td>" + "Thường" + "</td>";
        } else if (taikhoan == 1) {
            rs += "<td>" + "Bot" + "</td>";
        }
        if (iotp < 0) {
            rs += "<td>" + "Không" + "</td>";
        } else if (iotp >= 0) {
            rs += "<td>" + "Có" + "</td>";
        }
        if (time == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + time + "</td>";
        }
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        }
        return rs;
    }
    $(document).ready(function () {
		 $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
    $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/indexajax')?>",
          
            data: {
                username: $("#username").val(),
                nickname: $("#nickname").val(),
                phone: $("#phone").val(),
                fieldname: $("#fieldname").val(),
                timkiemtheo: $("#timkiemtheo").val(),
                toDate : $("#toDate").val(),
                fromDate : $("#fromDate").val(),
                typetaikhoan : $("#typetaikhoan").val(),
                pages: 1,
                record: $("#record").val(),
                taikhoanbot : $("#taikhoanbot").val(),
				 typetk : $("#typetimkiem").val(),
            email : $("#txtemail").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					 $('#logaction').html("");
                }else {
						 $("#resultsearch").html("");
                    $("#numuser").html(result.totalRecord);
                    var totalPage = result.total;
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.username, value.nickname, value.vinTotal, value.xuTotal, value.safe, value.vippoint, value.mobile, value.createTime, value.status, value.hasMobileSecurity, value.hasEmailSecurity, value.email, value.identification, value.bot, value.loginOtp, value.securityTime, value.google_id, value.facebook_id);
                        stt++
                    });
                    $('#logaction').html(result);
                    <?php if($admin_info->Status == "A"  || $admin_info->Status == "W"): ?>

                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('usergame/indexajax')?>",
                                 
                                    data: {
                                        username: $("#username").val(),
                                        nickname: $("#nickname").val(),
                                        phone: $("#phone").val(),
                                        fieldname: $("#fieldname").val(),
                                        timkiemtheo: $("#timkiemtheo").val(),
                                        toDate : $("#toDate").val(),
                                        fromDate : $("#fromDate").val(),
                                        typetaikhoan : $("#typetaikhoan").val(),
                                        pages: page,
                                        record: $("#record").val(),
                                        taikhoanbot : $("#taikhoanbot").val(),
										 typetk : $("#typetimkiem").val(),
										email : $("#txtemail").val()

                                    },
                                    dataType: 'json',
                                    success: function (result) {
										 $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.username, value.nickname, value.vinTotal, value.xuTotal, value.safe, value.vippoint, value.mobile, value.createTime, value.status, value.hasMobileSecurity, value.hasEmailSecurity, value.email, value.identification, value.bot, value.loginOtp, value.securityTime, value.google_id, value.facebook_id);
                                            stt++
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
            $("#spinner").hide();
            $('#logaction').html("");
            $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
        }, timeout: 40000
                                });
                            }
                            oldPage = page;
                        }
                    });
                    <?php endif; ?>

                }
            }, error: function () {
            $("#spinner").hide();
            $('#logaction').html("");
            $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
        }, timeout: 40000
        })

    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>
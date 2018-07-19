
<section class="content-header">
        <h1>
            Thống kê giftcode
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <h4 id="resultsearch" style="color: red"></h4>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">

                                </div>
                                <label class="col-sm-1 control-label" for="exampleInputEmail1">Tiền</label>

                                <div class="col-sm-2">
                                    <select class="form-control" id="money" name="money">
                                        <option value="1">Vin</option>
                                        <option value="0">Xu</option>
                                    </select>
                                </div>
                                <label id="labelvin" class="col-sm-1 control-label">Mệnh giá</label>

                                <div class="col-sm-2" id="menhgiavin">
                                    <select name="menhgiavin" class="form-control" id="roomvin">
                                        <option value="">Chọn</option>
                                        <?php foreach($listvin as $key => $row): ?>
                                            <option value="<?php echo $row ?>"><?php echo $row."K Vin" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-2" id="menhgiaxu" style="display: none">
                                    <select name="menhgiaxu" class="form-control" id="roomxu">
                                        <option value="">Chọn</option>
                                        <?php foreach($listxu as $key => $row): ?>
                                            <option value="<?php echo $row ?>"><?php echo $row."M Xu" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label id="labelvin" class="col-sm-1 control-label">Tìm theo</label>

                                <div class="col-sm-2">
                                    <select name="timeType" class="form-control" id="timeType">
                                        <option value="1" <?php if ($this->input->post("timeType") == "1") {
                                            echo "selected";
                                        } ?>>Ngày tạo
                                        </option>
                                        <option value="2" <?php if ($this->input->post("timeType") == "2") {
                                            echo "selected";
                                        } ?>>Ngày  sử dụng
                                        </option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">

                                </div>
                                <label class="col-sm-1 control-label">Từ ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type="text" class="form-control" id="fromDate"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>
                                <label class="col-sm-1 control-label">Đến ngày:</label>

                                <div class="col-sm-2">
                                    <div class="input-group date" id="datetimepicker2">
                                        <input type="text" class="form-control" id="toDate"> <span
                                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                    </div>
                                </div>

                                <div class="col-sm-1"><input type="button" value="Tìm kiếm" name="submit"
                                                             class="btn btn-primary pull-right" id="search_tran"></div>
                                <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                                             class="btn btn-primary pull-left" id="reset"
                                                             onclick="window.location.href = '<?php echo base_url('agency/giftcodeuse') ?>'; ">
                                </div>
                            </div>
                        </div>
						<div style="width: 100%;float: left;color: #ff0000;" id="error"></div>
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mệnh giá</th>
                                    <th>Số lượng</th>
                                    <th>Giftcode đã dùng</th>
                                    <th>Giftcode còn lại</th>
                                </tr>
                                </thead>
                                <tbody id="logaction">

                                </tbody>
                            </table>

                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
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
    }

</style>



<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });
    $("#search_tran").click(function () {
        var fromDatetime = $("#fromDate").val();
        var toDatetime = $("#toDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
        if($("#money").val()==1){
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("TranferAjax/loadGiftCodeUse") ?>",
                data: {
                    roomvin: $("#roomvin").val(),
                    fromDate: $("#fromDate").val(),
                    toDate: $("#toDate").val(),
                    money: $("#money").val(),
                    timeType: $("#timeType").val(),
					 block: 0
                },
                dataType: 'json',
                success: function (result) {
                    $("#spinner").hide();
					$("#error").html("");
                    if (result == "") {
                        $("#resultsearch").html("Không tìm thấy kết quả");
                    } else {
                        $("#resultsearch").html("");
                        stt =1;
						
                        $.each(result.trans, function (index, value) {
							console.log(result.trans);
                            result += resultgiftcodevin(stt,value.faceValue,value.quantity,value.used,value.lock);
                            stt ++;
                        });
                        $('#logaction').html(result);
                    }


                }
				,error: function(){
                     $("#spinner").hide();
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:30000
            })
        }else if($("#money").val()==0){
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("TranferAjax/loadGiftCodeUse") ?>",
                data: {
                    roomxu: $("#roomxu").val(),
                    fromDate: $("#fromDate").val(),
                    toDate: $("#toDate").val(),
                    money: $("#money").val(),
                    timeType: $("#timeType").val(),
					 block: 0
                },
                dataType: 'json',
                success: function (result) {
                    $("#spinner").hide();
					$("#error").html("");
                    if (result == "") {
                        $("#resultsearch").html("Không tìm thấy kết quả");
                    } else {
                        $("#resultsearch").html("");
                        stt = 1;
						
                        $.each(result.trans, function (index, value) {
							console.log(value);
                            result += resultgiftcodevin(stt,value.faceValue,value.quantity,value.used,value.remain);
                            stt ++;
                        });
                        $('#logaction').html(result);
                    }
                }
				,error: function(){
                     $("#spinner").hide();
                     $("#error").html("Kết nối không ổn định.Vui lòng thử lại sau");          
                    },
                    timeout:30000
            })
        }

    });
    function resultgiftcodevin(stt,price,quantity,giftcodeuse,remain) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        if($("#money").val()== 1){
            rs += "<td>" + price +"K"+ "</td>";
        }else if($("#money").val()== 0){
            rs += "<td>" + price +"M"+ "</td>";
        }
        rs += "<td>" + quantity + "</td>";
        rs += "<td>" + giftcodeuse + "</td>";
        rs += "<td>" + remain + "</td>";
        rs += "</tr>";
        return rs;
    }
   

    $('#money').change(function () {
        var val = $("#money option:selected").val();
        if (val == 1) {
            $("#labelvin").css("display", "block");
            $("#menhgiavin").css("display", "block");
            $("#menhgiaxu").css("display", "none");
        } else if (val == 0) {
            $("#menhgiaxu").css("display", "block");
            $("#labelvin").css("display", "block");
            $("#menhgiavin").css("display", "none");
        }
    });

</script>
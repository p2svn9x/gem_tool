<?php if($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
<section class="content-header">
    <h1>
        Thống kê giftcode đã dùng theo nguồn đại lý
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
                            <label class="col-sm-1 control-label" for="exampleInputEmail1">Tiền</label>
                            <div class="col-sm-2">
                                <select class="form-control" id="money" name="money">
                                    <option value="1">Vin</option>
                                    <option value="0">Xu</option>
                                </select>
                            </div>
                            <label class="col-sm-1 control-label">Nguồn xuất:</label>

                            <div class="col-sm-2">
                                <select id="nguonxuat" class="form-control">
                                    <option value="">Chọn</option>
                                    <?php foreach ($list as $row): ?>
                                        <option value="<?php echo $row->key ?>"><?php echo $row->nickname ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <label id="labelvin" class="col-sm-1 control-label">Tìm theo</label>

                            <div class="col-sm-2">
                                <select name="filterdate" class="form-control" id="filterdate">
                                    <option value="1" <?php if ($this->input->post("filterdate") == "1") {echo "selected";} ?>>Ngày tạo</option>
                                    <option value="2" <?php if ($this->input->post("filterdate") == "2") {echo "selected";} ?>>Ngày sử dụng</option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
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
                                                         class="btn btn-primary pull-left" id="reset"  onclick="window.location.href = '<?php echo base_url('giftcode/nicknameusegiftcode') ?>'; "></div>
                            </div>
                        </div>
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Nick name</th>
                                <th>Giftcode</th>
                                <th>Doanh thu</th>
                                <th>Phế</th>
                            </tr>
                            </thead>
                            <tbody id="logaction">

                            </tbody>
                        </table>

                        <div id="spinner" class="spinner" style="display:none;">
                            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
                        </div>
                         <div class="text-center pull-right">
                            <ul id="pagination-demo" class="pagination-sm"></ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
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
        if($("#nguonxuat").val() == ""){
            alert('Bạn chưa chọn nguồn xuất');
            return false;
        }
        var fromDatetime = $("#fromDate").val();
        var toDatetime = $("#toDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
         var result = "";
        var oldpage = 0;
        $("#spinner").show();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url("giftcode/nicknameusegiftcodeajax") ?>",
            data: {
                nguonxuat : $("#nguonxuat").val(),
                fromDate: $("#fromDate").val(),
                toDate: $("#toDate").val(),
                money: $("#money").val(),
                pages : 1,
				  filterdate : $("#filterdate").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $.each(result.transactions, function (index, value) {
                    if(value.giftCodeUse == ""){
                        $("#resultsearch").html("Không tìm thấy kết quả");
                        $('#logaction').html("");
                    }else{
                        $("#resultsearch").html("");
                        var nickname = value.nickName.split(",");
                        var giftcode = value.giftCodeUse.split(",");
                        var totalmoney = value.totalMoney.split(",");
                        var fee       = value.fee.split(",");
                        stt = 1;
                        for(i=0; i < nickname.length-1 ;i++){
                            result += resultgiftcodevin(stt,nickname[i],giftcode[i],totalmoney[i],fee[i])
                            stt ++;
                        }
                        $('#logaction').html(result);
                        $('#pagination-demo').twbsPagination({
                            totalPages: 1000,
                            visiblePages: 5,
                            onPageClick: function (event, page) {
                                if (oldpage > 0) {
                                    $("#spinner").show();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url("giftcode/nicknameusegiftcodeajax") ?>",
                                        data: {
                                            nguonxuat : $("#nguonxuat").val(),
                                            fromDate: $("#fromDate").val(),
                                            toDate: $("#toDate").val(),
                                            money: $("#money").val(),
                                            pages : page,
											  filterdate : $("#filterdate").val()
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            $("#spinner").hide();
                                            $.each(result.transactions, function (index, value) {
                                                var nickname = value.nickName.split(",");
                                                var giftcode = value.giftCodeUse.split(",");
                                                var totalmoney = value.totalMoney.split(",");
                                                var fee       = value.fee.split(",");
                                                stt = 1;
                                                for(i=0; i < nickname.length-1 ;i++){
                                                    result += resultgiftcodevin(stt,nickname[i],giftcode[i],totalmoney[i],fee[i])
                                                    stt ++;
                                                }
                                                $('#logaction').html(result);
                                            });
                                        }

                                    });
                                }
                                oldpage = page;
                            }
                        });
                    }
                });
            }
        });
    });
    function resultgiftcodevin(stt,nickname,giftcode,totalMoney,fee) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + giftcode + "</td>";
        rs += "<td>" + commaSeparateNumber(totalMoney) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "</tr>";
        return rs;
    }
	
	 function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>

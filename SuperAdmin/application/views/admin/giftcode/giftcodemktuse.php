<?php if ($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn chưa được phân quyền
        </h1>
    </section>
<?php else: ?>
    <section class="content-header">
        <h1>
            Danh sách giftcode đã xuất cho marketing
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box">
    <div class="box-body">
    <h4 id="resultsearch" style="color: red"></h4>

    <form action="<?php echo base_url('giftcode/giftcodemktuse') ?>" method="post">
        <div class="form-group">
            <div class="row">
                <label class="col-sm-1 control-label" for="exampleInputEmail1">Tiền</label>

                <div class="col-sm-2">
                    <select class="form-control" id="money" name="money">
                        <option value="1" <?php if ($this->input->post("money") == "1") {
                            echo "selected";
                        } ?>>Vin
                        </option>
                        <option value="0" <?php if ($this->input->post("money") == "0") {
                            echo "selected";
                        } ?>>Xu
                        </option>
                    </select>
                </div>
                <label id="labelvin" class="col-sm-1 control-label">Mệnh giá vin</label>

                <div class="col-sm-2" id="menhgiavin">
                    <select name="menhgiavin" class="form-control" id="roomvin">
                        <option value="" <?php if ($this->input->post("menhgiavin") == "") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <?php foreach ($listvin as $key => $row): ?>
                            <option
                                value="<?php echo $row ?>" <?php if ($this->input->post("menhgiavin") == $row) {
                                echo "selected";
                            } ?>><?php echo $row . "K Vin" ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label id="labelvin" class="col-sm-1 control-label">Mệnh giá xu</label>

                <div class="col-sm-2" id="menhgiaxu">
                    <select name="menhgiaxu" class="form-control" id="roomxu">
                        <option value="" <?php if ($this->input->post("menhgiaxu") == "") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <?php foreach ($listxu as $key => $row): ?>
                            <option
                                value="<?php echo $row ?>" <?php if ($this->input->post("menhgiaxu") == $row) {
                                echo "selected";
                            } ?>><?php echo $row . "M Xu" ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label class="col-sm-1 control-label" for="exampleInputEmail1">Khóa giftcode</label>
                <div class="col-sm-2">
                    <select name="blockgc" class="form-control" id="blockgc">
                        <option value="0" <?php if ($this->input->post("blockgc") == "0") {echo "selected";} ?>>Chưa khóa</option>
                        <option value="1" <?php if ($this->input->post("blockgc") == "1") {echo "selected";} ?>>Đang khóa</option>
                    </select>
                </div>

            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <label id="labelvin" class="col-sm-1 control-label">Hiển thị</label>

                <div class="col-sm-2">
                    <select class="form-control" id="record" name="record">

                        <option value="50" <?php if ($this->input->post("record") == "50") {
                            echo "selected";
                        } ?>>50
                        </option>
                        <option value="100" <?php if ($this->input->post("record") == "100") {
                            echo "selected";
                        } ?>>100
                        </option>
                        <option value="200" <?php if ($this->input->post("record") == "200") {
                            echo "selected";
                        } ?>>200
                        </option>
                        <option value="500" <?php if ($this->input->post("record") == "500") {
                            echo "selected";
                        } ?>>500
                        </option>
                        <option value="1000" <?php if ($this->input->post("record") == "1000") {
                            echo "selected";
                        } ?>>1000
                        </option>
                        <option value="2000" <?php if ($this->input->post("record") == "2000") {
                            echo "selected";
                        } ?>>2000
                        </option>
                        <option value="5000" <?php if ($this->input->post("record") == "5000") {
                            echo "selected";
                        } ?>>5000
                        </option>
						  <option value="10000" <?php if ($this->input->post("record") == "10000") {
                            echo "selected";
                        } ?>>10000
                        </option>
						  <option value="20000" <?php if ($this->input->post("record") == "20000") {
                            echo "selected";
                        } ?>>20000
                        </option>
						  <option value="50000" <?php if ($this->input->post("record") == "50000") {
                            echo "selected";
                        } ?>>50000
                        </option>
                    </select>
                </div>
                <label class="col-sm-1 control-label">Từ ngày:</label>

                <div class="col-sm-2">
                    <div class="input-group date" id="datetimepicker1">
                        <input type="text" class="form-control" id="fromDate" name="fromDate"
                               value="<?php echo $this->input->post("fromDate") ?>"> <span
                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                    </div>
                </div>
                <label class="col-sm-1 control-label">Đến ngày:</label>

                <div class="col-sm-2">
                    <div class="input-group date" id="datetimepicker2">
                        <input type="text" class="form-control" id="toDate" name="toDate"
                               value="<?php echo $this->input->post("toDate") ?>"> <span
                            class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label id="labelvin" class="col-sm-1 control-label">Nickname</label>

                <div class="col-sm-2">
                    <input class="form-control" id="nickname" name="nickname"
                           value="<?php echo $this->input->post("nickname") ?>">
                </div>
                <label id="labelvin" class="col-sm-1 control-label">Giftcode</label>

                <div class="col-sm-2">
                    <input class="form-control" id="giftcode" name="giftcode"
                           value="<?php echo $this->input->post("giftcode") ?>">
                </div>
                <label id="labelvin" class="col-sm-1 control-label">Trạng thái</label>

                <div class="col-sm-2">
                    <select name="gcuse" class="form-control" id="gcuse">

                        <option value="" <?php if ($this->input->post("gcuse") == "") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="1" <?php if ($this->input->post("gcuse") == "1") {
                            echo "selected";
                        } ?>>Đã sử dụng
                        </option>
                        <option value="0" <?php if ($this->input->post("gcuse") == "0") {
                            echo "selected";
                        } ?>>Chưa sử dụng
                        </option>

                    </select>
                </div>

            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-1 control-label">Nguồn xuất:</label>

                <div class="col-sm-2">
                    <select id="nguonxuat" class="form-control" name="nguonxuat">
                        <option value="" <?php if ($this->input->post("nguonxuat") == "") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <?php foreach ($source as $row): ?>
                            <option
                                value="<?php echo $row->key ?>" <?php if ($this->input->post("nguonxuat") == $row->key) {
                                echo "selected";
                            } ?>><?php echo $row->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <label id="labelvin" class="col-sm-1 control-label">Đợt</label>

                <div class="col-sm-2">
                    <select name="release" class="form-control" id="release">

                        <option value="" <?php if ($this->input->post("release") == "") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <?php foreach ($listversion as $key => $row): ?>
                            <option
                                value="<?php echo $row ?>" <?php if ($this->input->post("release") == $row) {
                                echo "selected";
                            } ?>><?php echo "Đợt " . $row ?></option>
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
                <div class="col-sm-1"><input type="submit" value="Tìm kiếm" name="submit"
                                             class="btn btn-primary pull-right" id="search_tran">
                </div>
                <div class="col-sm-1"><input type="reset" value="Reset" name="submit"
                                             class="btn btn-primary pull-left" id="reset"
                                             onclick="window.location.href = '<?php echo base_url('giftcode/giftcodemktuse') ?>'; ">
                </div>
                <div class="col-sm-1"><input type="button" value="Xuất Exel" name="submit"
                                             class="btn btn-primary pull-left" id="exportexel">
                </div>
            </div>
        </div>
    </form>
    <div class="col-sm-12">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Mệnh giá</th>
                <th>Giftcode</th>
                <th>Nickname</th>
                <th>Số lượng</th>
                <th>Ngày tạo</th>
                <th>Ngày sử dụng</th>
                <th>Trạng thái</th>
                <th>Khóa giftcode</th>
            </tr>
            </thead>
            <tbody id="logaction">

            </tbody>
        </table>

        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                 alt="Loading"/>
        </div>
        <div class="text-center pull-right">
            <ul id="pagination-demo" class="pagination-lg"></ul>

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
$("#exportexel").click(function () {
    $("#example2").table2excel({
        exclude: ".noExl",
        name: "Excel Document Name",
        filename: "listgiftcode",
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
    });
});
$("#search_tran").click(function () {
    var fromDatetime = $("#fromDate").val();
    var toDatetime = $("#toDate").val();
    if (fromDatetime > toDatetime) {
        alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
        return false;
    }
});
function resultgiftcodevin(stt, price, giftcode, nickname, quantity, createtime, usetime, status,block) {
    var rs = "";
    rs += "<tr>";
    rs += "<td>" + stt + "</td>";
    if ($("#money").val() == 1) {
        rs += "<td>" + price + "K" + "</td>";
    } else if ($("#money").val() == 0) {
        rs += "<td>" + price + "M" + "</td>";
    }
    rs += "<td>" + giftcode + "</td>";
    rs += "<td>" + nickname + "</td>";
    rs += "<td>" + quantity + "</td>";
    rs += "<td>" + createtime + "</td>";
    rs += "<td>" + usetime + "</td>";
    if (status == 1) {
        rs += "<td>" + "Đã sử dụng" + "</td>";
    } else {
        rs += "<td>" + "Chưa sử dụng" + "</td>";
    }
    if (block == 1) {
        rs += "<td>" + "Đã khóa" + "</td>";
    } else {
        rs += "<td>" + "Chưa khóa" + "</td>";
    }
    rs += "</tr>";
    return rs;
}
$(document).ready(function () {
    var result = "";
    var oldpage = 0;
    $('#pagination-demo').css("display", "block");
    $("#spinner").show();
    if ($("#money").val() == 1) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('giftcode/giftcodemktuseajax') ?>",
            data: {
                nickname: $("#nickname").val(),
                giftcode: $("#giftcode").val(),
                roomvin: $("#roomvin").val(),
                nguonxuat: $("#nguonxuat").val(),
                fromDate: $("#fromDate").val(),
                toDate: $("#toDate").val(),
                money: $("#money").val(),
                pages: 1,
                gcuse: $("#gcuse").val(),
                record: $("#record").val(),
                release: $("#release").val(),
                filterdate : $("#filterdate").val(),
                block : $("#blockgc").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $("#resultsearch").html("Không tìm thấy kết quả")
                } else {
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultgiftcodevin(stt, value.price, value.giftCode, value.nickName, value.quantity, value.createTime, value.updateTime, value.useGiftCode,value.block);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('giftcode/giftcodemktuseajax') ?>",
                                    data: {
                                        nickname: $("#nickname").val(),
                                        giftcode: $("#giftcode").val(),
                                        roomvin: $("#roomvin").val(),
                                        nguonxuat: $("#nguonxuat").val(),
                                        fromDate: $("#fromDate").val(),
                                        toDate: $("#toDate").val(),
                                        money: $("#money").val(),
                                        pages: page,
                                        gcuse: $("#gcuse").val(),
                                        record: $("#record").val(),
                                        release: $("#release").val(),
                                        filterdate : $("#filterdate").val(),
                                        block : $("#blockgc").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultgiftcodevin(stt, value.price, value.giftCode, value.nickName, value.quantity, value.createTime, value.updateTime, value.useGiftCode,value.block);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                    $("#spinner").hide();
                    $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
                    $('#logaction').html("");
                }, timeout: 40000
                                });
                            }
                            oldpage = page;
                        }
                    });
                }
            }, error: function () {
                    $("#spinner").hide();
                    $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
                    $('#logaction').html("");
                }, timeout: 40000
        });
    } else {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('giftcode/giftcodemktuseajax') ?>",
            data: {
                nickname: $("#nickname").val(),
                giftcode: $("#giftcode").val(),
                roomxu: $("#roomxu").val(),
                nguonxuat: $("#nguonxuat").val(),
                fromDate: $("#fromDate").val(),
                toDate: $("#toDate").val(),
                money: $("#money").val(),
                pages: 1,
                gcuse: $("#gcuse").val(),
                record: $("#record").val(),
                release: $("#release").val(),
                filterdate : $("#filterdate").val(),
                block : $("#blockgc").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $("#resultsearch").html("Không tìm thấy kết quả")
                } else {
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultgiftcodevin(stt, value.price, value.giftCode, value.nickName, value.quantity, value.createTime, value.updateTime, value.useGiftCode,value.block);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('giftcode/giftcodemktuseajax') ?>",
                                    data: {
                                        nickname: $("#nickname").val(),
                                        giftcode: $("#giftcode").val(),
                                        roomxu: $("#roomxu").val(),
                                        nguonxuat: $("#nguonxuat").val(),
                                        fromDate: $("#fromDate").val(),
                                        toDate: $("#toDate").val(),
                                        money: $("#money").val(),
                                        pages: page,
                                        gcuse: $("#gcuse").val(),
                                        record: $("#record").val(),
                                        release: $("#release").val(),
                                        filterdate : $("#filterdate").val(),
                                        block : $("#blockgc").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultgiftcodevin(stt, value.price, value.giftCode, value.nickName, value.quantity, value.createTime, value.updateTime, value.useGiftCode,value.block);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                    $("#spinner").hide();
                    $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
                    $('#logaction').html("");
                }, timeout: 40000
                                });
                            }
                            oldpage = page;
                        }
                    });
                }
            }, error: function () {
                    $("#spinner").hide();
                    $("#resultsearch").html("Hệ thống quá tải.Vui lòng thử lại");
                    $('#logaction').html("");
                }, timeout: 40000
        })

    }
});
</script>
`
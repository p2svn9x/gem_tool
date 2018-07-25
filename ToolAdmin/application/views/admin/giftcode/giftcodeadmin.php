<?php $this->load->view('admin/giftcode/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Danh sách giftcode admin</h6>
            <div class="num f12">Tổng số giftcode: <b id="num"></b></div>
        </div>
        <div class="formRow">
            <form class="list_filter form" action="<?php echo admin_url('giftcode/giftcodeadmin') ?>" method="get">
                <table>
                    <tr>
                        <td><label  id = "labelvin" style="margin-left: 30px;margin-bottom:-2px;width: 70px;">Mệnh giá</label></td>
                        <td><select id="menhgiavin" name="menhgiavin"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px;">
                                <option value="">Chọn</option>
                                <option value="10">10K Vin</option>
                                <option value="20">20K Vin</option>
                                <option value="50">50K Vin</option>
                                <option value="100">100K Vin</option>
                            </select></td>
                        <td><label  id = "labelxu" style="margin-left: 30px;margin-bottom:-2px;width: 70px;display: none">Mệnh giá</label></td>
                        <td><select id="menhgiaxu" name="menhgiaxu"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px;display: none">
                                <option value="">Chọn</option>
                                <option value="3">3M Xu</option>
                                <option value="5">5M Xu</option>
                                <option value="9">9M Xu</option>
                                <option value="10">10M Xu</option>
                            </select></td>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tiền:</label></td>
                        <td class="">
                            <select id="money" name="money"
                                    style="margin-left: 20px;margin-bottom:-2px;width: 100px">
                                <option value="1">Vin</option>
                                <option value="0">Xu</option>
                            </select>
                        </td>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item"><input name="created"
                                                value="<?php echo $this->input->get('created') ?>"
                                                id="toDate" type="text" class="datepicker"/></td>
                        <td>
                            <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                   class="formLeft"> Đến ngày: </label>
                        </td>
                        <td class="item"><input name="created_to"
                                                value="<?php echo $this->input->get('created_to') ?>"
                                                id="fromDate" type="text" class="datepicker-input"/></td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 20px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('giftcode/giftcodeadmin') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>Mệnh giá</td>
                <td>GiftCode</td>
                <td>Số lương</td>
                <td>Ngày tạo</td>
            </tr>
            </thead>
            <tbody id="logaction">
            </tbody>
        </table>
    </div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
<div class="container" style="margin-top:150px;">
<div class="text-center">
    <ul id="pagination-demo" class="pagination-lg"></ul>
    <ul id="pagination-demoxu" class="pagination-lg"></ul>
    <ul id="pagination-demovin" class="pagination-lg"></ul>
</div>
    <h1 id="resultsearch" style="position: absolute;top: 50%;left: 50%"></h1>
</div>
<script>
    $("#toDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#fromDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#search_tran").click(function () {
        var from = $("#fromDate").datepicker('getDate');
        var to = $("#toDate").datepicker('getDate');
        if (to > from) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });

    $("#search_tran").click(function () {
        if($("#money").val()==1){
            $('#pagination-demo').css("display","none");
            $('#pagination-demoxu').css("display","none");
            $('#pagination-demovin').css("display","block");
            $.ajax({
                type: "POST",
                url: "<?php echo $linkapi?>",
                data: {
                    c: 307,
                    gp: $("#menhgiavin").val(),
                    ts: $("#toDate").val(),
                    te: $("#fromDate").val(),
                    mt: $("#money").val(),
                    p:1
                },
                dataType: 'json',
                success: function (result) {
                    var countrow  = result.totalRecord;
                    $("#num").html(countrow) ;
                    var totalPage = result.total;
                    if (result.transactions == "") {
                        $('#pagination-demo').css("display","none");
                        $('#pagination-demoxu').css("display","none");
                        $('#pagination-demovin').css("display","none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
                    } else if(result.transactions != "") {
                        $("#resultsearch").html("");
                        $('#pagination-demovin').twbsPagination({
                            totalPages: totalPage,
                            visiblePages: 5,
                            onPageClick: function (event, page) {
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $linkapi?>",
                                    data: {
                                        c: 307,
                                        gp: $("#menhgiavin").val(),
                                        ts: $("#toDate").val(),
                                        te: $("#fromDate").val(),
                                        mt: $("#money").val(),
                                        p:  page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $.each(result.transactions, function (index, value) {
                                            result += resultgiftcodevin(value.Price,value.GiftCode,value.Quantity,value.CreateTime)
                                        });
                                        $('#logaction').html(result);
                                    }
                                });
                            }
                        });
                    }

                    $.each(result.transactions, function (index, value) {
                        result += resultgiftcodevin(value.Price,value.GiftCode,value.Quantity,value.CreateTime)
                    });
                    $('#logaction').html(result);
                }
            })
        }else if($("#money").val()==0){
            $('#pagination-demo').css("display","none");
            $('#pagination-demovin').css("display","none");
            $('#pagination-demoxu').css("display","block");
            $.ajax({
                type: "POST",
                url: "<?php echo $linkapi?>",
                data: {
                    c: 307,
                    gp: $("#menhgiaxu").val(),
                    ts: $("#toDate").val(),
                    te: $("#fromDate").val(),
                    mt: $("#money").val(),
                    p:1
                },
                dataType: 'json',
                success: function (result) {
                    var totalPage1 = result.total;
                    var countrow  = result.totalRecord;
                    $("#num").html(countrow) ;
                    if (result.transactions == "") {
                        $('#pagination-demo').css("display","none");
                        $('#pagination-demovin').css("display","none");
                        $('#pagination-demoxu').css("display","none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
                    } else {
                        $("#resultsearch").html("");
                        $('#pagination-demoxu').twbsPagination({
                            totalPages: totalPage1,
                            visiblePages: 5,
                            onPageClick: function (event, page) {
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo $linkapi?>",
                                    data: {
                                        c: 307,
                                        gp: $("#menhgiaxu").val(),
                                        ts: $("#toDate").val(),
                                        te: $("#fromDate").val(),
                                        mt: $("#money").val(),
                                        p:  page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $.each(result.transactions, function (index, value) {
                                            result += resultgiftcodevin(value.Price,value.GiftCode,value.Quantity,value.CreateTime)
                                        });
                                        $('#logaction').html(result);
                                    }
                                });
                            }
                        });
                    }
                    $.each(result.transactions, function (index, value) {
                        result += resultgiftcodevin(value.Price,value.GiftCode,value.Quantity,value.CreateTime)
                    });
                    $('#logaction').html(result);
                }
            })
        }
    });
    function resultgiftcodevin(price,giftcode,quantity,createtime) {
        var rs = "";
        rs += "<tr>";
        if($("#money").val()== 1){
            rs += "<td>" + price +"K"+ "</td>";
        }else if($("#money").val()== 0){
            rs += "<td>" + price +"M"+ "</td>";
        }
        rs += "<td>" + giftcode + "</td>";
        rs += "<td>" + quantity + "</td>";
        rs += "<td>" + createtime + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {

        var result = "";
        $('#pagination-demoxu').css("display","none");
        $('#pagination-demovin').css("display","none");
        $('#pagination-demo').css("display","block");
        $.ajax({
            type: "POST",
            url: "<?php echo $linkapi?>",
            data: {
                c: 307,
                gp: $("#menhgiavin").val(),
                ts: $("#toDate").val(),
                te: $("#fromDate").val(),
                mt: $("#money").val(),
                p:  1
            },
            dataType: 'json',
            success: function (result) {
                var totalPage = result.total;
                var countrow  = result.totalRecord;
                $("#num").html(countrow) ;
                $('#pagination-demo').twbsPagination({
                    totalPages: totalPage,
                    visiblePages: 5,
                    onPageClick: function (event, page) {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo $linkapi?>",
                            data: {
                                c: 307,
                                gp: $("#menhgiavin").val(),
                                ts: $("#toDate").val(),
                                te: $("#fromDate").val(),
                                mt: $("#money").val(),
                                p:  page

                            },
                            dataType: 'json',
                            success: function (result) {
                                $.each(result.transactions, function (index, value) {
                                    result += resultgiftcodevin(value.Price,value.GiftCode,value.Quantity,value.CreateTime)
                                });
                                $('#logaction').html(result);
                            }
                        });
                    }
                });
                }
            });

        $('#money').change(function() {
            var val = $("#money option:selected").val();

            if(val == 1){

                $("#labelvin").css("display","block");
                $("#menhgiavin").css("display","block");
                $("#labelxu").css("display","none");
                $("#menhgiaxu").css("display","none");
            }else if(val == 0){

                $("#labelxu").css("display","block");
                $("#menhgiaxu").css("display","block");
                $("#labelvin").css("display","none");
                $("#menhgiavin").css("display","none");
            }
        });
    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    function Pagging() {

    }
</script>
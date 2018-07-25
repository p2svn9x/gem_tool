
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Log game bài</h5>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
<link rel="stylesheet"
      href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
<script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
<script
    src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
<?php if($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
<?php $this->load->view('admin/error')?>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
        <div class="title">
            <h6>Lịch sử game bài</h6>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('loggamebai') ?>" method="post">
        <div class="formRow">

                <table>
                    <tr>

                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
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
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 80px">Nick name:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name"></td>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tên game:</label></td>
                        <td><select id="namegame" name="namegame" style="margin-left: 27px;margin-bottom:-2px;width: 142px">
                                <option value="" <?php if($this->input->post('namegame') == ""){echo "selected";} ?>>Chọn</option>
                                <option value="Sam" <?php if($this->input->post('namegame') == "Sam"){echo "selected";} ?>>Sâm</option>
                                <option value="BaCay" <?php if($this->input->post('namegame') == "BaCay"){echo "selected";} ?>>Ba cây</option>
                                <option value="Binh" <?php if($this->input->post('namegame') == "Binh"){echo "selected";} ?>>Binh</option>
                                <option value="Tlmn" <?php if($this->input->post('namegame') == "Tlmn"){echo "selected";} ?>>TLML</option>
                                <option value="Tala" <?php if($this->input->post('namegame') == "Tala"){echo "selected";} ?>>Tá Lả</option>
                                <option value="Lieng" <?php if($this->input->post('namegame') == "Lieng"){echo "selected";} ?>>Liêng</option>
                                <option value="XiTo" <?php if($this->input->post('namegame') == "XiTo"){echo "selected";} ?>>Xì Tố</option>
                                <option value="BaiCao" <?php if($this->input->post('namegame') == "BaiCao"){echo "selected";} ?>>Bài Cào</option>
                                <option value="XocDia" <?php if($this->input->post('namegame') == "XocDia"){echo "selected";} ?>>Xóc Đĩa</option>
                                <option value="Poker" <?php if($this->input->post('namegame') == "Poker"){echo "selected";} ?>>Poker</option>
								<option value="PokerTour" <?php if($this->input->post('namegame') == "PokerTour"){echo "selected";} ?>>PokerTour</option> 
                                <option value="XiDzach" <?php if($this->input->post('namegame') == "XiDzach"){echo "selected";} ?>>XiDzach</option>

                                <option value="Caro" <?php if($this->input->post('namegame') == "Caro"){echo "selected";} ?>>Caro</option>
                                <option value="Cotuong" <?php if($this->input->post('namegame') == "CoTuong"){echo "selected";} ?>>Cờ tướng</option>
								  <option value="CoUp" <?php if($this->input->post('namegame') == "CoUp"){echo "selected";} ?>>Cờ úp</option>
                            </select></td>
                    </tr>
                    </table>
                </div>
            <div class="formRow">

                <table>
                    <tr>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 80px">Phiên:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="session_name" value="<?php echo $this->input->post('session_name') ?>" name="session_name"></td>
                        <td><label style="margin-left: 70px;margin-bottom:-2px;width: 80px">Loại tiền:</label></td>
                        <td><select id="moneytype" name="moneytype" style="margin-left: 27px;margin-bottom:-2px;width: 142px">
                                <option value="" <?php if($this->input->post('moneytype') == ""){echo "selected";} ?>>Chọn</option>
                                <option value="1" <?php if($this->input->post('moneytype') == "1"){echo "selected";} ?>>Vin</option>
                                <option value="0" <?php if($this->input->post('moneytype') == "0"){echo "selected";} ?>>Xu</option>
                            </select></td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 70px">
                        </td>

                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('loggamebai') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                    </table>
                </div>
        </form>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>STT</td>
                <td>Session id</td>
                <td>Nick name</td>
                <td>Tên game</td>
                <td>Tiền</td>
                <td>Ngày tạo</td>
            </tr>
            </thead>
            <tbody id="logaction">
            </tbody>
        </table>
    </div>
</div>
<?php endif;?>
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-lg"></ul>
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment.min.js"></script>
<script>
    $("#search_tran").click(function () {


        var fromDatetime = $("#toDate").val();
        var toDatetime = $("#fromDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }

    });

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });

    $(document).ready(function () {
		
		   $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
    $("#search_tran").click(function () {

        var fromdate;
        var todate;
        var oldpage = 0;
        if($("#toDate").val()!=""){
            var match = $("#toDate").val().match(/^(\d+)-(\d+)-(\d+) (\d+)\:(\d+)\:(\d+)$/)
            var date = new Date(match[1], match[2] - 1, match[3], match[4], match[5], match[6])
            fromdate = date.getTime() / 1000;
        }
        else{
            fromdate =  "";
        }
        if($("#fromDate").val()!=""){
            var match = $("#fromDate").val().match(/^(\d+)-(\d+)-(\d+) (\d+)\:(\d+)\:(\d+)$/)
            var date = new Date(match[1], match[2] - 1, match[3], match[4], match[5], match[6])
            todate = date.getTime() / 1000;
        }
        else{
            todate =  "";
        }
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('loggamebai/indexajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                namegame: $("#namegame").val(),
                toDate : fromdate,
                fromDate : todate,
                pages : 1,
                sid : $("#session_name").val(),
                money : $("#moneytype").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                var totalPage = result.total;
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt,value.sessionId, value.nickName, value.gameName,value.moneyType,value.timeLog);
                        stt ++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if(oldpage>0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('loggamebai/indexajax')?>",
                                    // url: "http://192.168.0.251:8082/api_backend",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        namegame: $("#namegame").val(),
                                        toDate : fromdate,
                                        fromDate : todate,
                                        pages : page,
                                        sid : $("#session_name").val(),
                                        money : $("#moneytype").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.sessionId, value.nickName, value.gameName,value.moneyType, value.timeLog);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $('#logaction').html("");
                                        $("#spinner").hide();
                                        $("#error-popup").modal("show");
                                    }, timeout: 40000
                                });
                            }
                            oldpage = page;
                        }
                    });
                }




            }, error: function () {
                                        $('#logaction').html("");
                                        $("#spinner").hide();
                                        $("#error-popup").modal("show");
                                    }, timeout: 40000
        })

    })
    function resultSearchTransction(stt,sid,nickname,gamename,moneytype,time) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td width='50' >" + sid + "</td>";
        rs += "<td><a style='color: #0000FF' href='loggamebai/detail/"+sid+"/"+gamename+"/"+time+"'>"+nickname+"</a>"+ "</td>";
        rs += "<td>" + gamename + "</td>";

        if(moneytype ==1){
            rs += "<td>" + "Vin" + "</td>";
        }else if(moneytype == 0){
            rs += "<td>" + "Xu" + "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
        rs += "<td>" + moment.unix(time/1000).format("DD MMM YYYY hh:mm a"), + "</td>";
        rs += "</tr>";
        return rs;
    }


</script>
<?php $this->load->view('admin/usergame/head', $this->data) ?>
<div class="line"></div>
<?php if ($role == false): ?>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
    <div class="widget">
    <div class="title">
        <h6>Thêm bot cao thấp</h6>
    </div>
    <form class="list_filter form" action="" method="">
    <div class="formRow">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-4"><label id="errorname" style="color: red;"></label></div>
        </div>
    </div>
    <div class="formRow">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-1"><label>Nickname</label></div>
            <div class="col-sm-2"><input class="form-control" id="filter_iname" placeholder="Nhập nick name" onblur="myFunction()"
                                         type="text">
                <label id="lblnickname" style="color: blueviolet;margin-top: 10px"></label>
            </div>

            <div class="col-sm-1"><label>Phòng</label></div>
            <div class="col-sm-2">
                <select id="roomvin">
                    <option value="1000">1,000</option>
                    <option value="10000">10,000</option>
                </select>
            </div>
            <div class="col-sm-1"><label>Số vin thắng</label></div>
            <div class="col-sm-2"><input class="form-control" id="txtprize" type="text" placeholder="Nhập số vin"></div>
            <label id="numchuyen" style="color: blueviolet"></label>
        </div>

    </div>
    <div class="formRow">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-1"><label>Lá bài 1</label></div>
            <div class="col-sm-2">
                <select id="labai1" style="width: 100px">
                    <option value="51">A♥ - Cơ</option>
                    <option value="50">A♦ - Rô</option>
                    <option value="49">A♣ - Tép</option>
                    <option value="48">A♠ - Bích</option>
                    <option value="47">K♥ - Cơ</option>
                    <option value="46">K♦ - Rô</option>
                    <option value="45">K♣ - Tép</option>
                    <option value="44">K♠ - Bích</option>
                    <option value="43">Q♥ - Cơ</option>
                    <option value="42">Q♦ - Rô</option>
                    <option value="41">Q♣ - Tép</option>
                    <option value="40">Q♠ - Bích</option>
                    <option value="39">J♥ - Cơ</option>
                    <option value="38">J♦ - Rô</option>
                    <option value="37">J♣ - Tép</option>
                    <option value="36">J♠ - Bích</option>
                    <option value="35">10♥ - Cơ</option>
                    <option value="34">10♦ - Rô</option>
                    <option value="33">10♣ - Tép</option>
                    <option value="32">10♠ - Bích</option>
                    <option value="31">9♥ - Cơ</option>
                    <option value="30">9♦ - Rô</option>
                    <option value="29">9♣ - Tép</option>
                    <option value="28">9♠ - Bích</option>
                    <option value="27">8♥ - Cơ</option>
                    <option value="26">8♦ - Rô</option>
                    <option value="25">8♣ - Tép</option>
                    <option value="24">8♠ - Bích</option>
                    <option value="23">7♥ - Cơ</option>
                    <option value="22">7♦ - Rô</option>
                    <option value="21">7♣ - Tép</option>
                    <option value="20">7♠ - Bích</option>
                    <option value="19">6♥ - Cơ</option>
                    <option value="18">6♦ - Rô</option>
                    <option value="17">6♣ - Tép</option>
                    <option value="16">6♠ - Bích</option>
                    <option value="15">5♥ - Cơ</option>
                    <option value="14">5♦ - Rô</option>
                    <option value="13">5♣ - Tép</option>
                    <option value="12">5♠ - Bích</option>
                    <option value="11">4♥ - Cơ</option>
                    <option value="10">4♦ - Rô</option>
                    <option value="9">4♣ - Tép</option>
                    <option value="8">4♠ - Bích</option>
                    <option value="5">3♣ - Tép</option>
                    <option value="7">3♥ - Cơ</option>
                    <option value="6">3♦ - Rô</option>
                    <option value="4">3♠ - Bích</option>
                    <option value="3">2♥ - Cơ</option>
                    <option value="2">2♦ - Rô</option>
                    <option value="1">2♣ - Tép</option>
                    <option value="0">2♠ - Bích</option>
                </select>
            </div>
            <div class="col-sm-1"><label>Lá bài 2</label></div>
            <div class="col-sm-2">
                <select id="labai2" style="width: 100px">
                    <option value="51">A♥ - Cơ</option>
                    <option value="50">A♦ - Rô</option>
                    <option value="49">A♣ - Tép</option>
                    <option value="48">A♠ - Bích</option>
                    <option value="47">K♥ - Cơ</option>
                    <option value="46">K♦ - Rô</option>
                    <option value="45">K♣ - Tép</option>
                    <option value="44">K♠ - Bích</option>
                    <option value="43">Q♥ - Cơ</option>
                    <option value="42">Q♦ - Rô</option>
                    <option value="41">Q♣ - Tép</option>
                    <option value="40">Q♠ - Bích</option>
                    <option value="39">J♥ - Cơ</option>
                    <option value="38">J♦ - Rô</option>
                    <option value="37">J♣ - Tép</option>
                    <option value="36">J♠ - Bích</option>
                    <option value="35">10♥ - Cơ</option>
                    <option value="34">10♦ - Rô</option>
                    <option value="33">10♣ - Tép</option>
                    <option value="32">10♠ - Bích</option>
                    <option value="31">9♥ - Cơ</option>
                    <option value="30">9♦ - Rô</option>
                    <option value="29">9♣ - Tép</option>
                    <option value="28">9♠ - Bích</option>
                    <option value="27">8♥ - Cơ</option>
                    <option value="26">8♦ - Rô</option>
                    <option value="25">8♣ - Tép</option>
                    <option value="24">8♠ - Bích</option>
                    <option value="23">7♥ - Cơ</option>
                    <option value="22">7♦ - Rô</option>
                    <option value="21">7♣ - Tép</option>
                    <option value="20">7♠ - Bích</option>
                    <option value="19">6♥ - Cơ</option>
                    <option value="18">6♦ - Rô</option>
                    <option value="17">6♣ - Tép</option>
                    <option value="16">6♠ - Bích</option>
                    <option value="15">5♥ - Cơ</option>
                    <option value="14">5♦ - Rô</option>
                    <option value="13">5♣ - Tép</option>
                    <option value="12">5♠ - Bích</option>
                    <option value="11">4♥ - Cơ</option>
                    <option value="10">4♦ - Rô</option>
                    <option value="9">4♣ - Tép</option>
                    <option value="8">4♠ - Bích</option>
                    <option value="5">3♣ - Tép</option>
                    <option value="7">3♥ - Cơ</option>
                    <option value="6">3♦ - Rô</option>
                    <option value="4">3♠ - Bích</option>
                    <option value="3">2♥ - Cơ</option>
                    <option value="2">2♦ - Rô</option>
                    <option value="1">2♣ - Tép</option>
                    <option value="0">2♠ - Bích</option>
                </select>
            </div>
            <div class="col-sm-1"><label>Lá bài 3</label></div>
            <div class="col-sm-2">
                <select id="labai3" style="width: 100px">
                    <option value="51">A♥ - Cơ</option>
                    <option value="50">A♦ - Rô</option>
                    <option value="49">A♣ - Tép</option>
                    <option value="48">A♠ - Bích</option>
                    <option value="47">K♥ - Cơ</option>
                    <option value="46">K♦ - Rô</option>
                    <option value="45">K♣ - Tép</option>
                    <option value="44">K♠ - Bích</option>
                    <option value="43">Q♥ - Cơ</option>
                    <option value="42">Q♦ - Rô</option>
                    <option value="41">Q♣ - Tép</option>
                    <option value="40">Q♠ - Bích</option>
                    <option value="39">J♥ - Cơ</option>
                    <option value="38">J♦ - Rô</option>
                    <option value="37">J♣ - Tép</option>
                    <option value="36">J♠ - Bích</option>
                    <option value="35">10♥ - Cơ</option>
                    <option value="34">10♦ - Rô</option>
                    <option value="33">10♣ - Tép</option>
                    <option value="32">10♠ - Bích</option>
                    <option value="31">9♥ - Cơ</option>
                    <option value="30">9♦ - Rô</option>
                    <option value="29">9♣ - Tép</option>
                    <option value="28">9♠ - Bích</option>
                    <option value="27">8♥ - Cơ</option>
                    <option value="26">8♦ - Rô</option>
                    <option value="25">8♣ - Tép</option>
                    <option value="24">8♠ - Bích</option>
                    <option value="23">7♥ - Cơ</option>
                    <option value="22">7♦ - Rô</option>
                    <option value="21">7♣ - Tép</option>
                    <option value="20">7♠ - Bích</option>
                    <option value="19">6♥ - Cơ</option>
                    <option value="18">6♦ - Rô</option>
                    <option value="17">6♣ - Tép</option>
                    <option value="16">6♠ - Bích</option>
                    <option value="15">5♥ - Cơ</option>
                    <option value="14">5♦ - Rô</option>
                    <option value="13">5♣ - Tép</option>
                    <option value="12">5♠ - Bích</option>
                    <option value="11">4♥ - Cơ</option>
                    <option value="10">4♦ - Rô</option>
                    <option value="9">4♣ - Tép</option>
                    <option value="8">4♠ - Bích</option>
                    <option value="5">3♣ - Tép</option>
                    <option value="7">3♥ - Cơ</option>
                    <option value="6">3♦ - Rô</option>
                    <option value="4">3♠ - Bích</option>
                    <option value="3">2♥ - Cơ</option>
                    <option value="2">2♦ - Rô</option>
                    <option value="1">2♣ - Tép</option>
                    <option value="0">2♠ - Bích</option>

                </select>
            </div>
        </div>

    </div>
    <div class="formRow">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-1"><label>Lá bài 4</label></div>
            <div class="col-sm-2">
                <select id="labai4" style="width: 100px">
                    <option value="51">A♥ - Cơ</option>
                    <option value="50">A♦ - Rô</option>
                    <option value="49">A♣ - Tép</option>
                    <option value="48">A♠ - Bích</option>
                    <option value="47">K♥ - Cơ</option>
                    <option value="46">K♦ - Rô</option>
                    <option value="45">K♣ - Tép</option>
                    <option value="44">K♠ - Bích</option>
                    <option value="43">Q♥ - Cơ</option>
                    <option value="42">Q♦ - Rô</option>
                    <option value="41">Q♣ - Tép</option>
                    <option value="40">Q♠ - Bích</option>
                    <option value="39">J♥ - Cơ</option>
                    <option value="38">J♦ - Rô</option>
                    <option value="37">J♣ - Tép</option>
                    <option value="36">J♠ - Bích</option>
                    <option value="35">10♥ - Cơ</option>
                    <option value="34">10♦ - Rô</option>
                    <option value="33">10♣ - Tép</option>
                    <option value="32">10♠ - Bích</option>
                    <option value="31">9♥ - Cơ</option>
                    <option value="30">9♦ - Rô</option>
                    <option value="29">9♣ - Tép</option>
                    <option value="28">9♠ - Bích</option>
                    <option value="27">8♥ - Cơ</option>
                    <option value="26">8♦ - Rô</option>
                    <option value="25">8♣ - Tép</option>
                    <option value="24">8♠ - Bích</option>
                    <option value="23">7♥ - Cơ</option>
                    <option value="22">7♦ - Rô</option>
                    <option value="21">7♣ - Tép</option>
                    <option value="20">7♠ - Bích</option>
                    <option value="19">6♥ - Cơ</option>
                    <option value="18">6♦ - Rô</option>
                    <option value="17">6♣ - Tép</option>
                    <option value="16">6♠ - Bích</option>
                    <option value="15">5♥ - Cơ</option>
                    <option value="14">5♦ - Rô</option>
                    <option value="13">5♣ - Tép</option>
                    <option value="12">5♠ - Bích</option>
                    <option value="11">4♥ - Cơ</option>
                    <option value="10">4♦ - Rô</option>
                    <option value="9">4♣ - Tép</option>
                    <option value="8">4♠ - Bích</option>
                    <option value="5">3♣ - Tép</option>
                    <option value="7">3♥ - Cơ</option>
                    <option value="6">3♦ - Rô</option>
                    <option value="4">3♠ - Bích</option>
                    <option value="3">2♥ - Cơ</option>
                    <option value="2">2♦ - Rô</option>
                    <option value="1">2♣ - Tép</option>
                    <option value="0">2♠ - Bích</option>

                </select>
            </div>
            <div class="col-sm-1"><label>Lá bài 5</label></div>
            <div class="col-sm-2">
                <select id="labai5" style="width: 100px">
                    <option value="51">A♥ - Cơ</option>
                    <option value="50">A♦ - Rô</option>
                    <option value="49">A♣ - Tép</option>
                    <option value="48">A♠ - Bích</option>
                    <option value="47">K♥ - Cơ</option>
                    <option value="46">K♦ - Rô</option>
                    <option value="45">K♣ - Tép</option>
                    <option value="44">K♠ - Bích</option>
                    <option value="43">Q♥ - Cơ</option>
                    <option value="42">Q♦ - Rô</option>
                    <option value="41">Q♣ - Tép</option>
                    <option value="40">Q♠ - Bích</option>
                    <option value="39">J♥ - Cơ</option>
                    <option value="38">J♦ - Rô</option>
                    <option value="37">J♣ - Tép</option>
                    <option value="36">J♠ - Bích</option>
                    <option value="35">10♥ - Cơ</option>
                    <option value="34">10♦ - Rô</option>
                    <option value="33">10♣ - Tép</option>
                    <option value="32">10♠ - Bích</option>
                    <option value="31">9♥ - Cơ</option>
                    <option value="30">9♦ - Rô</option>
                    <option value="29">9♣ - Tép</option>
                    <option value="28">9♠ - Bích</option>
                    <option value="27">8♥ - Cơ</option>
                    <option value="26">8♦ - Rô</option>
                    <option value="25">8♣ - Tép</option>
                    <option value="24">8♠ - Bích</option>
                    <option value="23">7♥ - Cơ</option>
                    <option value="22">7♦ - Rô</option>
                    <option value="21">7♣ - Tép</option>
                    <option value="20">7♠ - Bích</option>
                    <option value="19">6♥ - Cơ</option>
                    <option value="18">6♦ - Rô</option>
                    <option value="17">6♣ - Tép</option>
                    <option value="16">6♠ - Bích</option>
                    <option value="15">5♥ - Cơ</option>
                    <option value="14">5♦ - Rô</option>
                    <option value="13">5♣ - Tép</option>
                    <option value="12">5♠ - Bích</option>
                    <option value="11">4♥ - Cơ</option>
                    <option value="10">4♦ - Rô</option>
                    <option value="9">4♣ - Tép</option>
                    <option value="8">4♠ - Bích</option>
                    <option value="5">3♣ - Tép</option>
                    <option value="7">3♥ - Cơ</option>
                    <option value="6">3♦ - Rô</option>
                    <option value="4">3♠ - Bích</option>
                    <option value="3">2♥ - Cơ</option>
                    <option value="2">2♦ - Rô</option>
                    <option value="1">2♣ - Tép</option>
                    <option value="0">2♠ - Bích</option>

                </select>
            </div>
            <div class="col-sm-1">
                <input type="button" id="search_tran" value="Thêm bot cao thấp" class="button blueB">
            </div>
        </div>

    </div>
    <div class="formRow">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-4"><h3 style="color: #0000ff">* Chú ý : Các là bài không được trùng nhau</h3> </div>
        </div>
    </div>
    <input type="hidden" id="txtlabai">
    <input type="hidden" id="checknickname">
    </form>
    <div class="formRow"></div>
    <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p style="color: #0000ff">Bạn thêm bot cao thấp thành công</p>
                </div>
                <div class="modal-footer">
                    <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                           aria-hidden="true">
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php endif; ?>
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
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
</div>
<script>
    $("#search_tran").click(function () {
        if ($("#filter_iname").val() == "") {
            $("#errorname").html("Bạn chưa nhập nick name");
            return false;
        }

        else if ($("#txtprize").val() == "") {
            $("#errorname").html("Bạn chưa nhập số vin thắng");
            return false;
        }
        else if($("#labai1").val() == $("#labai2").val() || $("#labai1").val() == $("#labai3").val() || $("#labai1").val() == $("#labai4").val() || $("#labai1").val() == $("#labai5").val() || $("#labai2").val() == $("#labai3").val() || $("#labai2").val() == $("#labai4").val() || $("#labai2").val() == $("#labai5").val() || $("#labai3").val() == $("#labai4").val() || $("#labai3").val() == $("#labai5").val() || $("#labai4").val() == $("#labai5").val()){
            $("#errorname").html("Có lá bài trùng nhau . Vui lòng chọn lại");
            return false;
        }
        else if($("#checknickname").val() == -1) {
            $("#errorname").html("Nickname không tồn tại");
            return false;
        }
        else if($("#checknickname").val() == -2) {
            $("#errorname").html("Hệ thống gián đoạn");
            return false;
        }
        $("#txtlabai").val($("#labai1").val() + ',' + $("#labai2").val() + ',' + $("#labai3").val()+','+ $("#labai4").val() + ',' + $("#labai5").val()+',');
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('event/addbotcaothapajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                room: $("#roomvin").val(),
                prize: $("#txtprize").val(),
                labai: $("#txtlabai").val()
            },

            dataType: 'text',
            success: function (res) {
                    $("#spinner").hide();
                    $("#errorname").html("");
                    $("#filter_iname").val("");
                    $("#txtprize").val("");
                    $("#lblnickname").text("");
                    $("#numchuyen").text("");
                    $("#bsModal3").modal("show");
            },error: function (xhr) {
                $("#errorname").html("Hệ thống gián đoạn");
                window.location='<?php echo admin_url('login') ?>';
            }
        });
    });
    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });
    $(document).ready(function () {
        $("#txtprize").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    });

    var format = function(num){
        var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
        if(str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
        }
        str = str.split("").reverse();
        for(var j = 0, len = str.length; j < len; j++) {
            if(str[j] != ",") {
                output.push(str[j]);
                if(i%3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
            }
        }
        formatted = output.reverse().join("");
        return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };
    $("#txtprize").keyup(function (e) {
        $(this).val(($(this).val()));
        $("#numchuyen").text(format($(this).val()));

    });
    function myFunction() {
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url("event/getnicknameajax") ?>",
            data: {
                nickname: $("#filter_iname").val()
            },
            dataType: 'json',
            success: function (res) {
                $("#checknickname").val(res);
                if (res == -2) {
                    $("#lblnickname").text("Hệ thống gián đoạn");
                    $("#errorname").html("");
                }
                else if (res == -1) {
                    $("#lblnickname").text("Nickname không tồn tại");
                    $("#errorname").html("");
                }
                else if (res == 0) {
                    $("#lblnickname").text("Tài khoản thường");
                    $("#errorname").html("");
                }
                else if (res == 1) {
                    $("#lblnickname").text("Tài khoản đại lý cấp 1");
                    $("#errorname").html("");
                }
                else if (res == 2) {
                    $("#lblnickname").text("Tài khoản đại lý cấp 2");
                    $("#errorname").html("");
                }
                else if (res == 100) {
                    $("#lblnickname").text("Tài khoản admin");
                    $("#errorname").html("");
                }
            }
        })
    }
</script>

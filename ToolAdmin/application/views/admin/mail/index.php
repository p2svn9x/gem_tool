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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <div class="widget">
        <h4 id="resultsearch" style="color: red"></h4>
        <div class="title">
            <h6>Danh sách mail gửi</h6>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('usergame') ?>" method="get">
            <div class="formRow">

                <table>
                    <tr>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Nickname:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="nickname" value="<?php echo $this->input->get('username') ?>" name="username">
                        </td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 123px">
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
        <div class="formRow">
            <div class="row">
                <div class="col-xs-12">
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>STT</td>
                            <td>Tiêu đề</td>
                            <td>Người gửi</td>
                            <td>Content</td>
                            <td>Ngày tạo</td>
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
        <ul id="pagination-demosearch" class="pagination-sm"></ul>
    </div>

</div>
<script>
$("#search_tran").click(function () {
    if($("#nickname").val() == ""){
        alert('Bạn phải nhập nickname');
        return false;
    }
    $('#pagination-demosearch').css("display", "block");
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('mail/indexajax')?>",
        // url: "http://192.168.0.251:8082/api_backend",
        data: {
            nickname : $("#nickname").val(),
            pages : 1
        },
        dataType: 'json',
        success: function (result) {
            $("#spinner").hide();
            var totalPage = result.totalPages;
            console.log(totalPage);
            if (result.transactions == "") {
                $('#pagination-demosearch').css("display", "none");
                $("#resultsearch").html("Không tìm thấy kết quả");
            } else {
                $("#resultsearch").html("");
                $('#pagination-demosearch').twbsPagination({
                    totalPages: totalPage,
                    visiblePages: 5,
                    onPageClick: function (event, page) {
                        $("#spinner").show();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo admin_url('mail/indexajax')?>",
                            // url: "http://192.168.0.251:8082/api_backend",
                            data: {
                                nickname : $("#nickname").val(),
                                pages : page
                            },
                            dataType: 'json',
                            success: function (result) {
                                $("#spinner").hide();
                                stt = 1;
                                $.each(result.transactions, function (index, value) {
                                    result += resultSearchTransction(stt,value.title, value.author, value.content, value.createTime);
                                    stt++
                                });
                                $('#logaction').html(result);
                            }
                        });
                    }
                });
            }
            stt = 1;
            $.each(result.transactions, function (index, value) {
                result += resultSearchTransction(stt,value.title, value.author, value.content, value.createTime);
                stt++
            });
            $('#logaction').html(result);
        }
    })
});
function resultSearchTransction(stt,title,user,content,date) {
    var rs = "";
    rs += "<tr>";
    rs += "<td>" + stt + "</td>";
    rs += "<td>" + title + "</td>";
    rs += "<td>" + user + "</td>";
    rs += "<td>" + content + "</td>";
    rs += "<td>" + date + "</td>";
    rs += "</tr>";
    return rs;
}

</script>
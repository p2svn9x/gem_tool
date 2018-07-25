<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
        </div>
        <div class="clear"></div>
    </div>
</div>
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
  <?php $this->load->view('admin/error')?>
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
            <h5 id="resultsearch" style="color: red;margin-left: 20px"></h5>

            <div class="title">
                <h6>Kiểm tra giao dich Ngân Lượng</h6>
            </div>
            <form class="list_filter form">
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4"><label style="color: red" id="errorcode"></label></div>
                    </div>
                </div>
                <div class="formRow">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-1"><label>Nhâp token</label></div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="txttoken">
                        </div>
                        <div class="col-sm-1"><input type="button" id="search_tran" value="Cập nhật"
                                                     class="button blueB"></div>
                    </div>
                </div>

        </form>
        <div class="formRow"></div>
        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
        </div>

    </div>
    <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <p style="color: #0000ff">Bạn đã cập nhật giao dich thành công </p>
                </div>
                <div class="modal-footer">
                    <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                           aria-hidden="true">
                </div>
            </div>
        </div>
    </div>

    </div>
<?php endif; ?>
<style>
    td {
        word-break: break-all;
    }

    thead {
        font-size: 12px;
    }

    .spinner {
        position: fixed;
        top: 80%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        overflow: auto;
        width: 100px; /* width of the spinner gif */
        height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */
    }</style>

<script>


    $("#search_tran").click(function () {
        if ($("#txttoken").val() == "") {
            $("#errorcode").html("Bạn chưa nhập token");
            return false;
        }
		   $('#search_tran').prop('disabled', true);
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/refundi2bajax')?>",
            data: {
                token: $("#txttoken").val()
            },

            dataType: 'text',
            success: function (result) {
                $("#spinner").hide();
                $("#bsModal3").modal("show");

            } ,error: function () {
                $("#spinner").hide();
				  $("#error-popup").modal("show");

            },timeout : timeOutApi
        });

    });
    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });

</script>


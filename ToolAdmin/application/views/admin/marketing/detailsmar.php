<?php $this->load->view('admin/marketing/head', $this->data) ?>
<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/admin/css/simplePagination.css" media="screen"/>
<div class="line"></div>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <div class="widget">
        <div class="title">
            <h6>Chi tiết</h6>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>Ngày</td>
                <td>Campaign</td>
                <td>Medium</td>
                <td>Source</td>
                <td>NRU</td>
                <td>PU</td>
                <td>Doanh thu</td>
            </tr>
            </thead>
            <tbody id="logaction">
            </tbody>
        </table>
    </div>
</div>
<div class="pagination">
    <div id="pagination"></div>
</div>

<script>
</script>

<script type="text/javascript" src="<?php echo public_url() ?>/js/canvasjs.min.js"></script>
<div id="chartContainercol" style="height: 400px; width: 100%;"></div>
<div id="chartContainer2" style="height: 400px; width: 100%;"></div>

<script>

    function addDays(myDate, days) {
        return new Date(myDate.getTime() + days * 24 * 60 * 60 * 1000).toISOString();
    }
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url("marketing/addDate") ?>",
            data: {startdate: "<?php echo $_GET['timestart'] ?>", enddate: "<?php echo $_GET['timeend']?>"},
            dataType: 'json',
            success: function (data) {
                var rshtml="";
                for (i = 0; i <= data; i++) {
                    var startdate = new Date("<?php echo $_GET['timestart'] ?>");
                    var date = new Date(addDays(startdate, i));
                    var enddate = date.getFullYear() + '-' + (date.getMonth() + 1 ) + '-' + date.getDate();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $linkapi?>",
                        data: {
                            c: 6,
                            utm_campaign: "<?php echo $_GET['campaign'] ?>",
                            utm_medium:"<?php echo $_GET['medium'] ?>",
                            utm_source: "<?php echo $_GET['source'] ?>",
                            ts: "<?php echo $_GET['timestart'] ?>",
                            te: enddate
                        },
                        dataType: 'json',
                        success: function (result) {
                            $.each(result, function (index, value) {
                                rshtml += resultSearchTransction(value.endDay, value.Campaign, value.Medium, value.Source, value.NRU, value.PU, value.Doanhthu)
                            });
                            $("#logaction").html(rshtml);
                        }
                        });
                };
            }
        });
    });

    function resultSearchTransction(date,campaign, medium, source, nru, pu, doanhthu) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>"+ date + "</td>";
        rs += "<td>"+ campaign + "</td>";
        rs += "<td>" + medium + "</td>";
        rs += "<td>" + source + "</td>";
        rs += "<td>" + nru + "</td>";
        rs += "<td>" + pu + "</td>";
        rs += "<td>" + doanhthu + "</td>";

        rs += "</tr>";
        return rs;
    }
</script>
<script>
    function Pagging() {
        var items = $("#checkAll tbody tr");
        var numItems = items.length;
        var perPage = 50;
        // only show the first 2 (or "first per_page") items initially
        items.slice(perPage).hide();

        // now setup pagination
        $("#pagination").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            onPageClick: function (pageNumber) { // this is where the magic happens
                // someone changed page, lets hide/show trs appropriately
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                items.hide() // first hide everything, then show for the new page
                    .slice(showFrom, showTo).show();
            }
        });
    }
</script>

<?php
//Obtain User language
if(isset($_SESSION['language'])){
    $idiom = $_SESSION['language'];
}else {
    $idiom = $this->config->item('language');
}
//Load of language file
$this->lang->load('statistics_lang', $idiom);
?>

<script type="text/javascript">
    $(function() {

        var data = [{
            label: "Series 0",
            data: 1
        }, {
            label: "Series 1",
            data: 3
        }, {
            label: "Series 2",
            data: 9
        }, {
            label: "Series 3",
            data: 20
        }];

        var plotObj = $.plot($("#flot-pie-chart"), data, {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                shifts: {
                    x: 20,
                    y: 0
                },
                defaultTheme: false
            }
        });

    });
</script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $this->lang->line('stat_Title'); ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Gráfico Exemplo
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-pie-chart"></div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
<!-- /.row -->
<?php
//Obtain User language
if(isset($_SESSION['language'])){
    $idiom = $_SESSION['language'];
}else {
    $idiom = $this->config->item('language');
}
//Load of language file
$this->lang->load('events_lang', $idiom);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('events_containerTitle'); ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!--<div class="dataTable_wrapper">-->
                    <!-- Filtros -->
                    <form role="form" method="post" action="<?php echo base_url()."events" ;?>">
                        <div class="form-group">
                            <label><?php echo $this->lang->line('events_beginDate'); ?></label>
                            <div id="datepicker">
                                <input class="form-control" type="text" id="begin_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label><?php echo $this->lang->line('events_endDate'); ?></label>
                            <div id="datepicker">
                                <input class="form-control" type="text" id="end_date">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default"><?php echo $this->lang->line('events_submitBtn'); ?></button>
                    </form>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-event">
                        <thead>
                        <tr>
                            <th><?php echo $this->lang->line('events_columnAddress'); ?></th>
                            <th><?php echo $this->lang->line('events_columnCategory'); ?></th>
                            <th><?php echo $this->lang->line('events_columnOccurrence'); ?></th>
                            <th hidden><?php echo $this->lang->line('events_columnLocal'); ?></th>
                            <th hidden>obs</th>
                            <th><?php echo $this->lang->line('events_columnDateTime'); ?></th>
                            <th><?php echo $this->lang->line('events_columnOptions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        {events}
                        <tr>
                            <td>{address}</td>
                            <td class="center">{category}</td>
                            <td class="center">{occurrence}</td>
                            <td class="center" hidden>{local_type_id}</td>
                            <td class="center" hidden>{obs}</td>
                            <td class="center">{created_at}</td>
                            <td class="center">
                                <a href="<?php echo base_url(); ?>events/details/{id}"><?php echo $this->lang->line('events_optionWatch'); ?></a>
                            </td>
                        </tr>
                       {/events}
                        </tbody>
                    </table>
                <!--</div>-->
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
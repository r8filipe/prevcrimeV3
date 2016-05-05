<?php
//Obtain User language
$idiom = 'portuguese';
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
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-event">
                        <thead>
                        <tr>
                            <th><?php echo $this->lang->line('events_columnId'); ?></th>
                            <th><?php echo $this->lang->line('events_columnAddress'); ?></th>
                            <th><?php echo $this->lang->line('events_columnCategory'); ?></th>
                            <th><?php echo $this->lang->line('events_columnOccurrence'); ?></th>
                            <th><?php echo $this->lang->line('events_columnLocal'); ?></th>
                            <th><?php echo $this->lang->line('events_columnDateTime'); ?></th>
                            <th><?php echo $this->lang->line('events_columnOptions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        {events}
                        <tr class="gradeU">
                            <td>{id}</td>
                            <td>{address}</td>
                            <td class="center">{category}</td>
                            <td class="center">{occurrence}</td>
                            <td class="center">{local_type_id}</td>
                            <td class="center">{created_at}</td>
                            <td class="center"> <a href="<?php echo base_url(); ?>events/details/{id}">Ver</a></td>
                        </tr>
                       {/events}
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
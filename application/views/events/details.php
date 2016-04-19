<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 18/04/2016
 * Time: 01:46
 */
//Obtain User language
$idiom = 'portuguese';
//Load of language file
$this->lang->load('details_lang', $idiom);
?>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('details_containerTitle'); ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        {event}
                        <label><?php echo $this->lang->line('details_address'); ?></label>
                        <p>{address}</p>
                        <label><?php echo $this->lang->line('details_coordinates'); ?></label>
                        <p>{lat}, {long}</p>
                        <label><?php echo $this->lang->line('details_category'); ?></label>
                        <p>{category}</p>
                        <label><?php echo $this->lang->line('details_subCategory'); ?></label>
                        <p>{occurrence}</p>
                        <label><?php echo $this->lang->line('details_registerBy'); ?></label>
                        <p>user do evento</p>
                        <label><?php echo $this->lang->line('details_createdAt'); ?></label>
                        <p>{created_at}</p>
                        {/event}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('details_map'); ?>
            </div>
            <div class="panel-body">

            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('details_graphicOfStatistic'); ?>
            </div>
            <div class="panel-body">

            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->

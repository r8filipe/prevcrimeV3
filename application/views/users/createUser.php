<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 20/04/2016
 * Time: 01:12
 */

//Obtain User language
if (isset($_SESSION['language'])) {
    $idiom = $_SESSION['language'];
} else {
    $idiom = $this->config->item('language');
}
//Load of language file
$this->lang->load('createUser_lang', $idiom);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $this->lang->line('createUser_title'); ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form role="form">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $this->lang->line('createUser_containerTitle'); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('createUser_username'); ?></label>
                                    <input class="form-control" type="text" id="username">
                                </div>
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('createUser_email'); ?></label>
                                    <input class="form-control" type="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('createUser_authLevel'); ?></label>
                                    <select class="form-control" id="authLevel">
                                        <option><?php echo $this->lang->line('createUser_admin'); ?></option>
                                        <option><?php echo $this->lang->line('createUser_manager'); ?></option>
                                        <option><?php echo $this->lang->line('createUser_staff'); ?></option>
                                        <option><?php echo $this->lang->line('createUser_scavenger'); ?></option>
                                    </select>
                                </div>
                                <!--                    <div class="form-group">-->
                                <!--                        <label>-->
                                <?php //echo $this->lang->line('createUser_banned'); ?><!--</label>-->
                                <!--                        <label class="checkbox-inline">-->
                                <!--                            <input type="checkbox" id="banned">-->
                                <!--                        </label>-->
                                <!--                    </div>-->
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('createUser_password'); ?></label>
                                    <input class="form-control" type="password" id="password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <?php foreach ($acl_categories as $key => $value) { ?>
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <?php echo $value['category_desc']; ?>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <?php

                                                            foreach ($acl as $acls => $aclValue) {
                                                                if ($aclValue['category_id'] == $value['category_id']) {
                                                                    echo '<div class="form-group">
                                                                <label class="wy-checkbox checkbox-inline">
                                                                  <input name="acl[]" type="checkbox" value="' . $aclValue['action_id'] . '">' . $aclValue['action_desc'] . '
                                                                </label>
                                                            </div>';
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                        </div>
                                    <?php } ?>
                                    <!--FIM LISTA ACL-->
                                </div>
                            </div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <button type="submit"
                            class="btn btn-default"><?php echo $this->lang->line('createUser_submitBtn'); ?></button>
                    <button type="reset"
                            class="btn btn-default"><?php echo $this->lang->line('createUser_resetBtn'); ?></button>

                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
</form>

<!-- /.row -->
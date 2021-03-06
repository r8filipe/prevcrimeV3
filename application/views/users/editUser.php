<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 20/04/2016
 * Time: 01:13
 */
//Obtain User language
if (isset($_SESSION['language'])) {
    $idiom = $_SESSION['language'];
} else {
    $idiom = $this->config->item('language');
}
//Load of language file
$this->lang->load('userEdit_lang', $idiom);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $this->lang->line('editUser_containerTitle'); ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('editUser_containerTitle'); ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- form here -->
                <form role="form" method="post" action="<?php echo base_url() . "Users/editUser" ?>">
                    {user}
                    <input type="hidden" name="user_id" value="{user_id}">
                    <div class="form-group">
                        <label><?php echo $this->lang->line('editUser_username'); ?></label>
                        <input class="form-control" type="text" id="username" name="username" value="{username}">
                    </div>
                    <div class="form-group">
                        <label><?php echo $this->lang->line('editUser_password'); ?></label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                    {/user}
                    <?php
                    if ($this->auth_user_id == $user[0]["user_id"] || in_array('users.edit_user', $this->acl)) {
                        ?>
                        <button type="submit"
                                class="btn btn-default"><?php echo $this->lang->line('editUser_submitBtn'); ?></button>
                    <?php } ?>
                    <button type="reset"
                            class="btn btn-default"><?php echo $this->lang->line('editUser_resetBtn'); ?></button>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 20/04/2016
 * Time: 01:13
 */
//Obtain User language
if(isset($_SESSION['language'])){
    $idiom = $_SESSION['language'];
}else {
    $idiom = $this->config->item('language');
}
//Load of language file
$this->lang->load('userDetails_lang', $idiom);
?>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('userDetails_containerTitle'); ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        {user}
                        <label><?php echo $this->lang->line('userDetails_username'); ?></label>
                        <p>{username}</p>
                        <label><?php echo $this->lang->line('userDetails_email'); ?></label>
                        <p>{email}</p>
                        <label><?php echo $this->lang->line('userDetails_authLevel'); ?></label>
                        <p>{auth_level}</p>
                        <label><?php echo $this->lang->line('userDetails_banned'); ?></label>
                        <p>{banned}</p>
                        <label><?php echo $this->lang->line('userDetails_lastLogin'); ?></label>
                        <p>{last_login}</p>
                        <label><?php echo $this->lang->line('userDetails_createdAt'); ?></label>
                        <p>{created_at}</p>
                        {/user}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
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
$this->lang->load('userDetails_lang', $idiom);
$this->lang->load('users_lang', $idiom);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $this->lang->line('userDetails_containerTitle'); ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
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
                        <?php
                        if ($this->auth_user_id == $user[0]["user_id"]) {
                            echo '<form action="' . base_url() . 'users/info/' . $this->auth_user_id . '">
                                      <button type="submit" class="btn btn-default">Editar
                                      </form>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel -->
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('users_ACL'); ?>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Lista de ACL-->
                        <?php foreach ($acl as $key => $values) { ?>
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php echo $key; ?>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php foreach ($acl[$key] as $value) { ?>
                                                    <?php echo $value['action_desc'] . '<br/>';
                                                    ?>
                                                <?php } ?>
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
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
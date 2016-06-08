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
    <div class="col-md-6">
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
                        if ($this->auth_user_id == $user[0]["user_id"] || in_array('users.edit_user', $this->acl)) {
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
    <?php if (in_array('users.edit_user', $this->acl)) { ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $this->lang->line('users_ACL'); ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="post"
                                  action="<?php echo base_url() . "users/access/" ?>">
                                <!-- Lista de ACL-->

                                <input type="hidden" name="user_id" value='<?php echo $user[0]["user_id"]; ?>'>
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
                                                            $checked = '';

                                                            if ($aclValue['ai'] != '') {
                                                                $checked = 'checked';
                                                            }
                                                            if ($aclValue['category_id'] == $value['category_id']) {
                                                                echo '<div class="form-group">
                                                                <label class="wy-checkbox checkbox-inline">
                                                                  <input name="acl[]" type="checkbox" value="' . $aclValue['action_id'] . '" ' . $checked . '>' . $aclValue['action_desc'] . '
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
                                <button type="submit" class="btn btn-default">Gravar
                            </form>
                            <!--FIM LISTA ACL-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel -->
        </div>
    <?php } ?>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
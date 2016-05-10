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
$this->lang->load('users_lang', $idiom);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $this->lang->line('users_title'); ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->lang->line('users_containerTitle'); ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th><?php echo $this->lang->line('users_columnId'); ?></th>
                            <th><?php echo $this->lang->line('users_columnUsername'); ?></th>
                            <th><?php echo $this->lang->line('users_columnEmail'); ?></th>
                            <th><?php echo $this->lang->line('users_columnAuthLevel'); ?></th>
                            <th><?php echo $this->lang->line('users_columnBanned'); ?></th>
                            <th><?php echo $this->lang->line('users_columnLastLogin'); ?></th>
                            <th><?php echo $this->lang->line('users_columnOptions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        {users}
                        <tr class="gradeU">
                            <td>{user_id}</td>
                            <td>{username}</td>
                            <td>{email}</td>
                            <td>{auth_level}</td>
                            <td>{banned}</td>
                            <td>{last_login}</td>
                            <td> <a href="<?php echo base_url(); ?>users/details/{user_id}"><?php echo $this->lang->line('users_optionWatch'); ?></a></td>
                        </tr>
                        {/users}
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
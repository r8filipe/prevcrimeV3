<?php
//Obtain User language
$idiom = 'portuguese';
//Load of language file
$this->lang->load('master_lang', $idiom);
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $this->lang->line('master_title'); ?></title>
    <!-- OpenLayers 3 CSS -->
    <link href="<?php echo base_url(); ?>dist/ol/ol.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>dist/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- OpenLayers 3 layout CSS -->
    <link href="<?php echo base_url(); ?>dist/layout.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>dist/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url(); ?>dist/datatables/media/css/dataTables.fixedHeader.css"
          rel="stylesheet">

    <link href="<?php echo base_url(); ?>dist/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"
          rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>dist/custom/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>dist/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>dist/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- OpenLayers 3 JavaScript -->
    <script src="<?php echo base_url(); ?>dist/ol/ol.js"></script>


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"
               href="<?php echo base_url(); ?>"><?php echo $this->lang->line('master_appName'); ?></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><?php
                        $link_protocol = USE_SSL ? 'https' : NULL;

                        if (isset($auth_user_id)) {
                            echo anchor(site_url('auth/logout', $link_protocol), 'Logout');
                        } else {
                            echo anchor(site_url(LOGIN_PAGE . '?redirect=/', $link_protocol), 'Login', 'id="login-link"');
                        }
                        ?>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control"
                                   placeholder="<?php echo $this->lang->line('master_search'); ?>">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>events"><i
                                class="fa fa-bug"></i><?php echo $this->lang->line('master_menuOccurrences'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>events/map"><i
                                class="fa fa-globe"></i><?php echo $this->lang->line('master_menuMap'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>statistics"><i
                                class="fa fa-globe"></i><?php echo $this->lang->line('master_menuStatistics'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>users"><i
                                class="fa fa-globe"></i><?php echo $this->lang->line('master_menuUsers'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>users/createUser"><i
                                class="fa fa-globe"></i><?php echo $this->lang->line('master_menuCreateUser'); ?></a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{title}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
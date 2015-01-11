<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css')?>"> 
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/css/chosen.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>"/>   
    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>">    
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/AdminLTE.css')?>"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.10.2.min.js')?>"></script>
          <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script> 
          <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.min.js')?>" ></script>
      </head>
      <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url('dashboard')?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                CiSanti Admin
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <?php
                        if ($this->session->userdata('level') == 'owner' || $this->session->userdata('level') == 'owner' ) {
                        ?>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-danger" id="notification"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have Notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="<?php echo base_url('barang')?>">
                                                <i class="fa fa-cubes danger"></i> <span id="barang_notification"></span> Barang
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('orderan')?>">
                                                <i class="fa fa-shopping-cart danger"></i> <span id="order_notification"></span> Orderan
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata('nama')?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url('assets/images/avatar.png')?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $this->session->userdata('nama')?> - <?php echo $this->session->userdata('level')?>
                                        <small>Last Login at <?php echo $this->session->userdata('last_login')?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('user/profile')?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('login/out')?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url('assets/images/avatar.png')?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $this->session->userdata('nama')?></p>

                            <a href="#">Login as <?php echo $this->session->userdata('level')?> </a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php 
                        if ($this->session->userdata('level') == 'owner' || $this->session->userdata('level') == 'admin') {
                            ?> 
                            <li class="active">
                                <a href="<?php echo base_url('dashboard')?>">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('barang')?>">
                                    <i class="fa fa-cubes"></i> <span>Barang</span> <span id="barang_notification"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('sales')?>">
                                    <i class="fa fa-users"></i> <span>Sales</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Transaksi</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url('orderan')?>"><i class="fa fa-angle-double-right"></i> <span>Orderan</span> <span id="order_notification"></span></a></li>
                                    <li><a href="<?php echo base_url('penjualan')?>"><i class="fa fa-angle-double-right"></i> Penjualan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url('user')?>">
                                    <i class="fa fa-user"></i> <span>Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/mailbox.html">
                                    <i class="fa fa-file-text"></i> <span>Laporan</span>
                                </a>
                            </li>
                            <?php
                        }else if ($this->session->userdata('level') == 'sales') {
                            ?>
                            <li>
                                <a href="<?php echo base_url('barang')?>">
                                    <i class="fa fa-cubes"></i> <span>Barang</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('orderan')?>">
                                    <i class="fa fa-shopping-cart"></i> <span> Orderan</span>
                                </a>
                            </li>
                            <?php
                        }elseif ($this->session->userdata('level') == 'gudang') {
                            ?>
                            <li>
                                <a href="<?php echo base_url('barang')?>">
                                    <i class="fa fa-cubes"></i> <span>Barang</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
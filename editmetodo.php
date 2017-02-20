<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Portal Realbase | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>RB</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Portal</b>Realbase</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="users/<?php echo $_SESSION['fotouser']; ?>" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li><!-- end message -->
                  </ul><!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li><!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li><!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="users/<?php echo $_SESSION['fotouser']; ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo utf8_decode($_SESSION['fullname']); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="users/<?php echo $_SESSION['fotouser']; ?>" class="img-circle" alt="User Image">
                  <p>
                    <?php echo utf8_decode($_SESSION['fullname']) ?> - Web Developer
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="users/<?php echo $_SESSION['fotouser']; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo utf8_decode($_SESSION['fullname']); ?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>
        <!-- /.search form -->

        <?php
        include("menu.php")
        ?>
        <!-- BEGIN LUIS ALMEIDA -->
        <!-- Sidebar Menu -->
      <!--   <ul class="sidebar-menu">
      <li class="header">Menu</li> -->
      <!-- Optionally, you can add icons to the links -->
        <!--   <li class="active"><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

          <li><a href="#"><i class="fa fa-shopping-cart"></i> <span>Compras</span></a></li>

          <li><a href="#"><i class="fa fa-balance-scale"></i> <span>Comercial & Vendas</span></a></li>

          <li><a href="#"><i class="fa fa-cogs"></i> <span>Produção</span></a></li>

          <li><a href="#"><i class="fa fa-bank"></i> <span>Gestão</span></a></li>

          <li><a href="#"><i class="fa fa-legal"></i> <span>Auditorias</span></a></li>

          <li><a href="#"><i class="fa fa-file-o"></i> <span>Ocorrências</span></a></li>
        -->

          <!-- <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Comercia</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="#">Link in level 2</a></li>
              <li><a href="#">Link in level 2</a></li>
            </ul>
          </li> -->
<!--         </ul>
-->

<!-- END LUIS ALMEIDA -->
<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bem vindo ao Portal Realbase <br>
      <small>Recreating DNA</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<!--       <li class="active">Here</li>
-->    </ol>
</section>

<!-- Main content -->
<section class="content">


  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <i class="fa fa-warning"></i>
        <h3 class="box-title">Edição de registo do doc. Metodo do procedimento Gestão</h3>
        <p>Qualquer alteração efectuada e enviada terá de ser validada pelo(a) responsável competente.</p>
      </div><!-- /.box-header -->
      <div class="box-body">


        <?php

        if (isset($_GET['id_act']) || isset($_GET['id_sub']))  {
                    # code...
          $id_actividade = $_GET['id_act'];
          $id_subprocesso = $_GET['id_sub'];

                    //echo "id da actividade : ".$id_actividade . "e o id do sub processo e: ".$id_subprocesso.".";
        }
        else{
          echo "passou os valores mas nao os mostrou.";
        }


        $queryEditSubProcesso = "SELECT * FROM tbl_sub_processos WHERE id_sub_processo = '$id_subprocesso'";
        $resultEditSubProcesso = mysqli_query($link,$queryEditSubProcesso);

        while ($rowEditSubProcesso = mysqli_fetch_object($resultEditSubProcesso)) {
                    # code...
          $nomeSubProcesso = $rowEditSubProcesso->nome_sub_processo;

        }

        $queryEditActividade = "SELECT * FROM tbl_actividades WHERE id_actividade = '$id_actividade'";
        $resultEditActividade = mysqli_query($link,$queryEditActividade);

        while ($rowEditActividade = mysqli_fetch_object($resultEditActividade)) {
                    # code...
                    // JUST GET THE FIELDS OF TBL_ACTIVIDADES....
                   // $nome_actividade
          $descActividade = $rowEditActividade->desc_actividade;
          $observacoesActividade = $rowEditActividade->obs_actividade;
          $instrucoesTrabalho = $rowEditActividade->instrucoes_trabalho;
          $versaoVigor2 = $rowEditActividade->versao_vigor_2;
          $dataUltimaAtualizacao2 = $rowEditActividade->data_ultima_atualizacao2;
          $modelosAssociados = $rowEditActividade->modelos_associados;
          $versaoVigor3 = $rowEditActividade->versao_vigor_3;
          $dataUltimaAtualizacao3 = $rowEditActividade->data_ultima_atualizacao3;
          $sgs9001 = $rowEditActividade->sgs9001;
          $pefc = $rowEditActividade->PEFC;
          $fsc = $rowEditActividade->FSC;
        }



        ?>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Formulário</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form">
            <div class="box-body">

            
  <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6">
             <div class="col-sm-12"><table id="example1" class="table table-bordered table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                <caption>table title and/or explanatory text</caption>
                <thead>
                  <tr>
                    <th style="width:auto;">Sub Processo</th>
                    <th style="width:auto;">Actividade</th>
                    <th style="width:auto;">Observações</th>
                    <th style="width:auto;">Intrucoes de trabalho</th>
                    <th style="width:auto;">Vigor</th>
                    <th style="width:auto;">Data Atualização</th>
                    <th style="width:auto;">Modelos Associados</th>
                    <th style="width:auto;">Vigor</th>
                    <th style="width:auto;">Data Atualização</th>
                    <th style="width:auto;">9001</th>
                    <th style="width:auto;">PEFC</th>
                    <th style="width:auto;">FSC</th>
                  </tr>
                </thead>
                <tbody>                
                  <tr>
                    <td><input type="text" value="<?php echo $nomeSubProcesso;?>"></td>
                    <td><input type="text" value="<?php echo $descActividade;?>"></td>
                    <td><input type="text" value="<?php echo $observacoesActividade;?>"></td>
                    <td><input type="text" value="<?php echo $instrucoesTrabalho;?>"></td>
                    <td><input type="text" value="<?php echo $versaoVigor2;?>"></td>
                    <td><input type="text" value="<?php echo $dataUltimaAtualizacao2;?>"></td>
                    <td><input type="text" value="<?php echo $modelosAssociados;?>"></td>
                    <td><input type="text" value="<?php echo $versaoVigor3;?>"></td>
                    <td><input type="text" value="<?php echo $dataUltimaAtualizacao3;?>"></td>
                    <td><input type="text" value="<?php echo $sgs9001;?>"></td>
                    <td><input type="text" value="<?php echo $pefc;?>"></td>
                    <td><input type="text" value="<?php echo $fsc;?>"></td>
                  </tr>
                </tbody>
              
              </table>
              </div>
              </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>

      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>

  <!-- Your Page Content Here -->
  
</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    Realbase
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2016 <a href="#">Portal Realbase</a>.</strong> Todos os direitos reservados.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane active" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript::;">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>  
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
      </ul><!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="label label-danger pull-right">70%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
      </ul><!-- /.control-sidebar-menu -->

    </div><!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>
        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>
          <p>
            Some information about this general settings option
          </p>
        </div><!-- /.form-group -->
      </form>
    </div><!-- /.tab-pane -->
  </div>
</aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
       </body>
       </html>

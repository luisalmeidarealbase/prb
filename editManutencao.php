<?php

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['fullname'])) {
    header('location: index.php');
}

$idManutencao = $_GET['id'];

$nome = $_GET['nome'];



$queryDetalheManutencao = "SELECT * FROM tbl_manutencoes WHERE id_manutencao LIKE '$idManutencao'";
$resultDetalheManutencao = mysqli_query($link,$queryDetalheManutencao);

while ($rowDetalheManutencao = mysqli_fetch_object($resultDetalheManutencao)){


   
    
    $contador = utf8_encode($rowDetalheManutencao->contador_equipamento);
    $tipoManutencao = utf8_encode($rowDetalheManutencao->tipo_manutencao);
    $intOuExt = utf8_encode($rowDetalheManutencao->interna_ou_externa);
    $prob = utf8_encode($rowDetalheManutencao->problema);
    $descInt = utf8_encode($rowDetalheManutencao->desc_intervencao);
    $dataPrevistaPreventiva = utf8_encode($rowDetalheManutencao->data_prevista_preventiva);
    $dataReal = utf8_encode($rowDetalheManutencao->data_realizacao);
    $custos = utf8_encode($rowDetalheManutencao->custos);
    $obser = utf8_encode($rowDetalheManutencao->observacoes);


}

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
    <title>PRB | Gestão</title>
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
            <span class="logo-mini"><b>RB</b>Q</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Realbase</b>Qualidade</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
             <?php
        include("navbar_right.php");
        ?>
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
                    <p><?php echo $_SESSION['fullname']; ?></p>
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

            <!-- Sidebar Menu -->
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
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edição da Manutenção <b>#<?php echo $idManutencao;?></b> do Equipamento <?php echo $nome; ?><br>
                <small>Aqui pode editar os detalhes da manutenção <b>#<?php echo $idManutencao;?></b> do equipamento: <?php echo $nome; ?>. </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="manutencoes.php"><i class="fa fa-dashboard"></i> Manutenções</a></li>
                <li class="active">Equipamento</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->

           <div class="col-md-6">

       <!-- general form elements -->
       <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edição da manutenção <b>#<?php echo $idManutencao; ?></b> de equipamento</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="updateManutencao.php?id=<?php echo $idManutencao;?>" id="formManutencoes" name="formManutencoes" >
          <div class="box-body">
            <div class="form-group">


              <label>Equipamento</label>
              <select class="form-control select2" name="equipamento" style="width: 100%;">


                <option selected="selected" value="<?php echo $nome; ?>"><?php echo $nome;?></option>
                <?php
                
                $queryEquipList = "SELECT * FROM tbl_equipamentos";

                $resultQueryEquipList = mysqli_query($link,$queryEquipList);

                while ($rowEquipList = mysqli_fetch_object($resultQueryEquipList)) {



                  ?>



                  <option  value="<?php echo utf8_encode($rowEquipList->id_equipamento); ?>"><?php echo utf8_encode($rowEquipList->nome_equip); ?></option>

                  <?php 
                }
                ?>
              </select>
            </div>

            

            <!-- textarea - contador de prints -->
            <div class="form-group">
              <label>Contador (nº prints)</label>
              <textarea class="form-control" name="contadorprints" rows="3" placeholder="Insira o nº de prints;
              Não aplicável quando não equipamento de impressão."><?php echo $contador;?></textarea>
            </div>

            

            <div class="form-group">
              <label>Tipo de Manutenção</label>
              <select class="form-control select2" name="tipoManutencao" onchange="showDataPreventiva(this)" style="width: 100%;">
                <option selected="selected" ><?php echo $tipoManutencao?></option>
                <option value="Correctiva">Correctiva</option>
                <option value="Preventiva">Preventiva</option>
              </select>
            </div>
         
            <div class="form-group">
              <label>Manutenção Interna/Externa</label>
              <select class="form-control select2" name="internaExterna" style="width: 100%;">
                <option selected="selected"><?php echo $intOuExt;?></option>
                <option value="Interna">Interna</option>
                <option value="Externa">Externa</option>
              </select>
            </div>

            <!-- textarea - contador de prints -->
            <div class="form-group">
              <label>Problema (descrição)</label>
              <textarea class="form-control" rows="3" name="descProblema" placeholder="Descreva o problema do equipamento ..." required><?php echo $prob;?></textarea>
            </div>

            <!-- textarea - descricao da intervencao -->
            <div class="form-group">
              <label>Descrição da intervenção</label>
              <textarea class="form-control" name="descIntervencao" rows="3" placeholder="Descreva o que foi feito na intervenção ..."><?php echo $descInt;?></textarea>
            </div>
            
            


            <div class="form-group" id="dataPreventivaId" style="display: none;">
              <label>Data prevista:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" name="dataprevista" placeholder="yyyy-mm-dd" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $dataPrevistaPreventiva;?>" data-mask>
              </div><!-- /.input group -->
            </div><!-- /.form group -->

            <div class="form-group">
              <label>Data Realização:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" name="datarealizacao" placeholder="yyyy-mm-dd" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $dataReal;?>" data-mask>
              </div><!-- /.input group -->
            </div><!-- /.form group -->

            <!-- <div class="form-group">
              <label>Hora Realização:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
                <input type="text" class="form-control" name="horarealizacao" placeholder="hh:mm" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
              </div><!-- /.input group -->
            <!--</div>
            <!-- /.form group -->
 


            <div class="form-group">
              <label>Custos:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-euro"></i>
                </div>
                <input type="text" class="form-control" name="custosField" placeholder="00,00" data-inputmask="'alias': 'dd/mm/yyyy'" value="<?php echo $custos;?>" data-mask>
              </div><!-- /.input group -->
            </div><!-- /.form group -->


            <!-- textarea - contador de prints -->
            <div class="form-group">
              <label>Observações</label>
              <textarea class="form-control" name="observacoesField"  rows="3" placeholder="Insira o nº de prints ..."><?php echo $obser; ?></textarea>
            </div>


          </div>
          <div class="box-footer">
          <button type="submit" class="btn btn-primary">Atualizar Manutenção</button>
        </div>
        </div><!-- /.box-body -->

        
      </form>




        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <!-- <footer class="main-footer">
    -->  <!-- To the right -->
    <!--  <div class="pull-right hidden-xs">
       Anything you want
     </div>
     Default to the left
     <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
   </footer> -->
    <?php
    include("footer.php");
    ?>

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


<!-- inicio para apagar -->


<!-- FIIIIIIM -->










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

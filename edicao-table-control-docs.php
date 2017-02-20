<?php

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['fullname'])) {
    header('location: index.php');
}

if (isset($_POST['form-edicao-control-docs'])){
    $newSynology = $_POST['synology_field'];
    $newSite = $_POST['site_field'];
    $newPortal = $_POST['portal_field'];
    $newOutroLocal = $_POST['outro_local_field'];
    $newSuporteOriginal = $_POST['suporte_original_field'];
    $newSuportePreenchimento = $_POST['suporte_preenchimento_field'];
    $newCopiaNaoControladaPosPrint = $_POST['copia_controlada_pos_print_field'];
    $newFormaRecuperacao = $_POST['forma_recuperacao_field'];
    $newPeriodoArquivoDinamico = $_POST['periodo_arquivo_dinamico_field'];
    $newPeriodoArquivoMorto = $_POST['periodo_arquivo_morto_field'];
}
else{
    $idControlDoc = $_GET['id'];
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
        <a href="starter.php" class="logo">
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
                    <p><?php echo utf8_encode($_SESSION['fullname']); ?></p>
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
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <!--       <li class="active">Here</li>
                -->    </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <br><br><br>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edição de ...</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <?php

                        $getDataControlDoc = "SELECT * FROM tbl_control_docs WHERE id_control_doc = '$idControlDoc'";


                    $resultGetDataControlDoc = mysqli_query($link,$getDataControlDoc);

                        while ($rowDataControlDoc = mysqli_fetch_object($resultGetDataControlDoc)){
                            $idControlDoc = $rowDataControlDoc->id_control_doc;
                            $tipoDocumento = $rowDataControlDoc->tipo_documento;
                            $nomeDescricaoDocumento = utf8_encode($rowDataControlDoc->nome_descricao_documento);
                            $responsavel = utf8_encode($rowDataControlDoc->responsavel);
                            $codigoControlDoc = utf8_encode($rowDataControlDoc->codigo);
                            $versaoControlDoc = utf8_encode($rowDataControlDoc->versao);
                            $dataAtualizacaoControlDoc = utf8_encode($rowDataControlDoc->data_atualizacao);
                            $suporteOriginal = utf8_encode($rowDataControlDoc->suporte_original);
                            $suportePreenchimento = utf8_encode($rowDataControlDoc->suporte_preenchimento);
                            $copiaNaoControladaPosPrint = utf8_encode($rowDataControlDoc->copia_nao_controlada_pos_print);
                            $synologyRB = utf8_encode($rowDataControlDoc->synology_rb);
                            $site = utf8_encode($rowDataControlDoc->site);
                            $portal = utf8_encode($rowDataControlDoc->portal);
                            $outro_local = utf8_encode($rowDataControlDoc->outro_local);
                            $formaRecuperacao = utf8_encode($rowDataControlDoc->forma_recuperacao);
                            $periodoArquivoDinamico = utf8_encode($rowDataControlDoc->periodo_arquivo_dinamico);
                            $periodoArquivoMorto = utf8_encode($rowDataControlDoc->periodo_arquivo_morto);
                            $controlDoc9001 = utf8_encode($rowDataControlDoc->control_doc_9001_2008);
                            $controlDoc2015 = utf8_encode($rowDataControlDoc->control_doc_9001_2015);
                            $controlDocFSC = utf8_encode($rowDataControlDoc->control_doc_fsc);
                            $controlDocPEFC = utf8_encode($rowDataControlDoc->control_doc_pefc);
                        }

                    ?>

                        <form action="edicao-table-control-docs.php" name="form-edicao-control-docs" method="post">
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd> <select name="responsavel_field" class="form-control">
                                    <option>Responsável Gestão</option>
                                    <option>Responsável Qualidade</option>
                                    <option>Responsável Recursos Humanos</option>
                                    <option>Responsável Produção</option>
                                    <option>Responsável COM IT</option>
                                    <option>Responsável Comercial e Vendas</option>
                                    <option>Responsável Compras</option>
                                </select></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #9dacb5; color: white;">Documento em vigor
                                </th>
                            </tr>
                            <tr>
                                <th>Código</th>
                                <th>Versão</th>
                                <th>Data Actualização</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $codigoControlDoc; ?></td>
                                <td><?php echo $versaoControlDoc; ?></td>
                                <td><?php echo $dataAtualizacaoControlDoc; ?></td>
                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #9dacb5; color: white;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td>
                                    <select name="synology_field" class="form-control">
                                        <option>Sim</option>
                                        <option>Não</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="site_field" class="form-control">
                                        <option>Sim</option>
                                        <option>Não</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="portal_field" class="form-control">
                                        <option>Sim</option>
                                        <option>Não</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" name="outro_local_field" type="text" placeholder="Se aplicável....">
                                </td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #9dacb5; color: white;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td>
                                    <select name="suporte_original_field" class="form-control">
                                        <option>Não aplicável</option>
                                        <option>Informático</option>
                                        <option>Papel</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="suporte_preenchimento_field" class="form-control">
                                        <option>Não aplicável</option>
                                        <option>Informático</option>
                                        <option>Papel</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="copia_controlada_pos_print_field" class="form-control">
                                        <option>Sim</option>
                                        <option>Não</option>
                                    </select>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #9dacb5; color: white;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto (anos)</th>
                            </tr>

                            <tr class="text-left">
                                <td>
                                    <select name="forma_recuperacao_field" class="form-control">
                                        <option>Não aplicável</option>
                                        <option>Nº Revisão</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="periodo_arquivo_dinamico_field" class="form-control">
                                        <option>Não aplicável</option>
                                        <option>Até nova Revisão</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="periodo_arquivo_morto_field" class="form-control">
                                        <option>Não aplicável</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>

                                    </select>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #9dacb5; color: white;">Cumprimento Normativo
                                </th>
                            </tr>
                            <tr>
                                <th>9001:2008</th>
                                <th>9001:2015</th>
                                <th>FSC 2013</th>
                                <th>PEFC 2013</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php if ($controlDoc9001 == "") {
                                        echo "--";
                                    } else {
                                        echo $controlDoc9001;
                                    } ?></td>
                                <td><?php if ($controlDoc2015 == "") {
                                        echo "--";
                                    } else {
                                        echo $controlDoc2015;
                                    } ?></td>
                                <td><?php if ($controlDocFSC == "") {
                                        echo "--";
                                    } else {
                                        echo $controlDocFSC;
                                    } ?></td>
                                <td><?php if ($controlDocPEFC == "") {
                                        echo "--";
                                    } else {
                                        echo $controlDocPEFC;
                                    } ?></td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #9dacb5; color: white;">Obsoletos
                                </th>
                            </tr>
                            <tr>
                                <th>Ficheiros</th>
                                <th>Acções</th>
                            </tr>

                            <tr class="text-left">
                                <td>Lista de ficheiros aqui</td>
                                <td>Ver</td>


                            </tr>
                            </tbody>
                        </table>

                    </div>
                </form>


                </div><!-- /.box-body -->
                <div class="box-footer clearfix" style="display: block;">
                    <!--  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                    <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
                </div><!-- /.box-footer -->
            </div>






            <!-- Your Page Content Here -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            SGQ&CoC
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

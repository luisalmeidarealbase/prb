<?php

require_once("connection/conn.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['fullname'])) {
    header('location: index.php');
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
    <link rel="stylesheet" type="text/css" href="dist/css/personalcss.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="plugins/ckeditor/ckeditor.js"></script>


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
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                      class="fa fa-search"></i></button>
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
                Controlo de Documentos <br>
                <small>Recreating DNA</small>
            </h1>

            <!--            <div class="btn-group">
                            <a href="controlodocumental.php?edit=true">
                                <button type="button" class="btn btn-info">Editar Procedimento</button>

                            </a>
                            <a href="procedimento-historico.php?id=2">
                                <button type="button" class="btn btn-info">Histórico Obsoletos</button>
                            </a>


                        </div>-->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <br>

                <br>

                <!--       <li class="active">Here</li>
                -->    </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <br>


            <!-- information goes here -->


            <!-- START HERE to producao -->

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Produção</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="display: block;">

                    <!-- Intrucoes de trabalho -->
                    <div class="box box-default table-control-docs-style collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            <?php

                            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'producao' AND  tipo_documento = 'instrucao trabalho'";
                            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                            $procedimento = "Produção";
                            $idControlDoc = $rowTableProd->id_control_doc;
                            $tipoDocumento = $rowTableProd->tipo_documento;
                            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                            $responsavel = utf8_encode($rowTableProd->responsavel);
                            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                            $versaoControlDoc = utf8_encode($rowTableProd->versao);
                            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                            $synologyRB = utf8_encode($rowTableProd->synology_rb);
                            $site = utf8_encode($rowTableProd->site);
                            $portal = utf8_encode($rowTableProd->portal);
                            $outro_local = utf8_encode($rowTableProd->outro_local);
                            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                            ?>
                            <div class="box box-default collapsed-box own-border-top">
                                <div class="box-header own-activity-style">
                                    <h3 class="box-title sub-titulo-2"
                                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i></button>
                                    </div><!-- /.box-tools -->
                                </div><!-- /.box-header -->
                                <div class="box-body" style="display: none;">
                                    <br>
                                    <div class="col-md-12"
                                    <dl>
                                        <dt>Responsável</dt>
                                        <dd><?php echo $responsavel; ?></dd>
                                    </dl>
                                    <br>
                                </div>
                                <div class="col-md-6">


                                    <table class="table table-bordered center">
                                        <tbody>
                                        <tr>
                                            <th colspan="3" class="text-center"
                                                style="background-color: #ededed;">Documento em vigor
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
                                            <th colspan="3" class="text-center"
                                                style="background-color: #ededed;">Suporte
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Suporte original</th>
                                            <th>Suporte de Preenchimento</th>
                                            <th>Cópia não controlada após impressão</th>
                                        </tr>

                                        <tr class="text-left">
                                            <td><?php echo $suporteOriginal; ?></td>
                                            <td><?php echo $suportePreenchimento; ?></td>
                                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">

                                    <table class="table table-bordered center">
                                        <tbody>
                                        <tr>
                                            <th colspan="4" class="text-center"
                                                style="background-color: #ededed;">Detentores
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Synology>RB</th>
                                            <th>Site</th>
                                            <th>Portal</th>
                                            <th>Outro local</th>
                                        </tr>

                                        <tr class="text-left">
                                            <td><?php echo $synologyRB; ?></td>
                                            <td><?php echo $site; ?></td>
                                            <td><?php echo $portal; ?></td>
                                            <td><?php echo $outro_local; ?></td>

                                        </tr>

                                        </tbody>
                                    </table>

                                    <table class="table table-bordered center">
                                        <tbody>
                                        <tr>
                                            <th colspan="3" class="text-center"
                                                style="background-color: #ededed;">Arquivo
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Forma de recuperação</th>
                                            <th>Período de Arquivo dinâmico</th>
                                            <th>Período mínimo de arquivo morto</th>
                                        </tr>

                                        <tr class="text-left">
                                            <td><?php echo $formaRecuperacao; ?></td>
                                            <td><?php echo $periodoArquivoDinamico; ?></td>
                                            <td><?php echo $periodoArquivoMorto; ?></td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-md-12">

                                    <table class="table table-bordered center">
                                        <tbody>
                                        <tr>
                                            <th colspan="4" class="text-center"
                                                style="background-color: #ededed;">Cumprimento Normativo
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


                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>


                </div>

                <!-- Modelos -->
                <div class="box box-default table-control-docs-style collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">


                        <?php

                        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'producao' AND  tipo_documento = 'Modelo'";
                        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                        $procedimento = "Produção";
                        $idControlDoc = $rowTableProd->id_control_doc;
                        $tipoDocumento = $rowTableProd->tipo_documento;
                        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                        $responsavel = utf8_encode($rowTableProd->responsavel);
                        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                        $versaoControlDoc = utf8_encode($rowTableProd->versao);
                        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                        $synologyRB = utf8_encode($rowTableProd->synology_rb);
                        $site = utf8_encode($rowTableProd->site);
                        $portal = utf8_encode($rowTableProd->portal);
                        $outro_local = utf8_encode($rowTableProd->outro_local);
                        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                        ?>
                        <div class="box box-default collapsed-box own-border-top">
                            <div class="box-header own-activity-style">
                                <h3 class="box-title sub-titulo-2"
                                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-plus"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body" style="display: none;">
                                <br>
                                <div class="col-md-12"
                                <dl>
                                    <dt>Responsável</dt>
                                    <dd><?php echo $responsavel; ?></dd>
                                </dl>
                                <br>
                            </div>
                            <div class="col-md-6">


                                <table class="table table-bordered center">
                                    <tbody>
                                    <tr>
                                        <th colspan="3" class="text-center"
                                            style="background-color: #ededed;">Documento em vigor
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
                                        <th colspan="3" class="text-center"
                                            style="background-color: #ededed;">Suporte
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Suporte original</th>
                                        <th>Suporte de Preenchimento</th>
                                        <th>Cópia não controlada após impressão</th>
                                    </tr>

                                    <tr class="text-left">
                                        <td><?php echo $suporteOriginal; ?></td>
                                        <td><?php echo $suportePreenchimento; ?></td>
                                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">

                                <table class="table table-bordered center">
                                    <tbody>
                                    <tr>
                                        <th colspan="4" class="text-center"
                                            style="background-color: #ededed;">Detentores
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Synology>RB</th>
                                        <th>Site</th>
                                        <th>Portal</th>
                                        <th>Outro local</th>
                                    </tr>

                                    <tr class="text-left">
                                        <td><?php echo $synologyRB; ?></td>
                                        <td><?php echo $site; ?></td>
                                        <td><?php echo $portal; ?></td>
                                        <td><?php echo $outro_local; ?></td>

                                    </tr>

                                    </tbody>
                                </table>

                                <table class="table table-bordered center">
                                    <tbody>
                                    <tr>
                                        <th colspan="3" class="text-center"
                                            style="background-color: #ededed;">Arquivo
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Forma de recuperação</th>
                                        <th>Período de Arquivo dinâmico</th>
                                        <th>Período mínimo de arquivo morto</th>
                                    </tr>

                                    <tr class="text-left">
                                        <td><?php echo $formaRecuperacao; ?></td>
                                        <td><?php echo $periodoArquivoDinamico; ?></td>
                                        <td><?php echo $periodoArquivoMorto; ?></td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-12">

                                <table class="table table-bordered center">
                                    <tbody>
                                    <tr>
                                        <th colspan="4" class="text-center"
                                            style="background-color: #ededed;">Cumprimento Normativo
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


                            </div>
                        </div>
                    </div>
                    <?php } ?>


                </div>

            </div>

            <!-- Procedimento -->
            <div class="box box-default table-control-docs-style collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">

                    <?php

                    $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'producao' AND  tipo_documento = 'Procedimento'";
                    $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                    while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                    $procedimento = "Produção";
                    $idControlDoc = $rowTableProd->id_control_doc;
                    $tipoDocumento = $rowTableProd->tipo_documento;
                    $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                    $responsavel = utf8_encode($rowTableProd->responsavel);
                    $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                    $versaoControlDoc = utf8_encode($rowTableProd->versao);
                    $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                    $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                    $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                    $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                    $synologyRB = utf8_encode($rowTableProd->synology_rb);
                    $site = utf8_encode($rowTableProd->site);
                    $portal = utf8_encode($rowTableProd->portal);
                    $outro_local = utf8_encode($rowTableProd->outro_local);
                    $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                    $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                    $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                    $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                    $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                    $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                    $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                    ?>
                    <div class="box box-default collapsed-box own-border-top">
                        <div class="box-header own-activity-style">
                            <h3 class="box-title sub-titulo-2"
                                data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                            <br>
                            <div class="col-md-12"
                            <dl>
                                <dt>Responsável</dt>
                                <dd><?php echo $responsavel; ?></dd>
                            </dl>
                            <br>
                        </div>
                        <div class="col-md-6">


                            <table class="table table-bordered center">
                                <tbody>
                                <tr>
                                    <th colspan="3" class="text-center"
                                        style="background-color: #ededed;">Documento em vigor
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
                                    <th colspan="3" class="text-center"
                                        style="background-color: #ededed;">Suporte
                                    </th>
                                </tr>
                                <tr>
                                    <th>Suporte original</th>
                                    <th>Suporte de Preenchimento</th>
                                    <th>Cópia não controlada após impressão</th>
                                </tr>

                                <tr class="text-left">
                                    <td><?php echo $suporteOriginal; ?></td>
                                    <td><?php echo $suportePreenchimento; ?></td>
                                    <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">

                            <table class="table table-bordered center">
                                <tbody>
                                <tr>
                                    <th colspan="4" class="text-center"
                                        style="background-color: #ededed;">Detentores
                                    </th>
                                </tr>
                                <tr>
                                    <th>Synology>RB</th>
                                    <th>Site</th>
                                    <th>Portal</th>
                                    <th>Outro local</th>
                                </tr>

                                <tr class="text-left">
                                    <td><?php echo $synologyRB; ?></td>
                                    <td><?php echo $site; ?></td>
                                    <td><?php echo $portal; ?></td>
                                    <td><?php echo $outro_local; ?></td>

                                </tr>

                                </tbody>
                            </table>

                            <table class="table table-bordered center">
                                <tbody>
                                <tr>
                                    <th colspan="3" class="text-center"
                                        style="background-color: #ededed;">Arquivo
                                    </th>
                                </tr>
                                <tr>
                                    <th>Forma de recuperação</th>
                                    <th>Período de Arquivo dinâmico</th>
                                    <th>Período mínimo de arquivo morto</th>
                                </tr>

                                <tr class="text-left">
                                    <td><?php echo $formaRecuperacao; ?></td>
                                    <td><?php echo $periodoArquivoDinamico; ?></td>
                                    <td><?php echo $periodoArquivoMorto; ?></td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-12">

                            <table class="table table-bordered center">
                                <tbody>
                                <tr>
                                    <th colspan="4" class="text-center"
                                        style="background-color: #ededed;">Cumprimento Normativo
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


                        </div>
                    </div>
                </div>
                <?php } ?>


            </div>

    </div>


    <!-- Outros -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">
            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'producao' AND  tipo_documento = 'Outros'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>


</div>

</div>

<!-- END HERE PRODUCAO -->
<!-- START HERE to gestao -->

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Gestão</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">

        <!-- Intrucoes de trabalho -->
        <div class="box box-default table-control-docs-style collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <?php

                $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'gestao' AND  tipo_documento = 'instrucao trabalho'";
                $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                $procedimento = "Produção";
                $idControlDoc = $rowTableProd->id_control_doc;
                $tipoDocumento = $rowTableProd->tipo_documento;
                $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                $responsavel = utf8_encode($rowTableProd->responsavel);
                $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                $versaoControlDoc = utf8_encode($rowTableProd->versao);
                $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                $synologyRB = utf8_encode($rowTableProd->synology_rb);
                $site = utf8_encode($rowTableProd->site);
                $portal = utf8_encode($rowTableProd->portal);
                $outro_local = utf8_encode($rowTableProd->outro_local);
                $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                ?>
                <div class="box box-default collapsed-box own-border-top">
                    <div class="box-header own-activity-style">
                        <h3 class="box-title sub-titulo-2"
                            data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <br>
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd><?php echo $responsavel; ?></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Documento em vigor
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
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $suporteOriginal; ?></td>
                                <td><?php echo $suportePreenchimento; ?></td>
                                <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $synologyRB; ?></td>
                                <td><?php echo $site; ?></td>
                                <td><?php echo $portal; ?></td>
                                <td><?php echo $outro_local; ?></td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $formaRecuperacao; ?></td>
                                <td><?php echo $periodoArquivoDinamico; ?></td>
                                <td><?php echo $periodoArquivoMorto; ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Cumprimento Normativo
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


                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <!-- Modelos -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">


            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'gestao' AND  tipo_documento = 'Modelo'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

<!-- Procedimento -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'gestao' AND  tipo_documento = 'Procedimento'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>


</div>

</div>


<!-- Outros -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'gestao' AND  tipo_documento = 'Outros'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>


</div>
</div>
<!-- END HERE GESTAO -->
<!-- START HERE to COMeVendas -->

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Comercial e Vendas</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">

        <!-- Intrucoes de trabalho -->
        <div class="box box-default table-control-docs-style collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <?php

                $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comevendas' AND  tipo_documento = 'instrucao trabalho'";
                $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                $procedimento = "Produção";
                $idControlDoc = $rowTableProd->id_control_doc;
                $tipoDocumento = $rowTableProd->tipo_documento;
                $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                $responsavel = utf8_encode($rowTableProd->responsavel);
                $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                $versaoControlDoc = utf8_encode($rowTableProd->versao);
                $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                $synologyRB = utf8_encode($rowTableProd->synology_rb);
                $site = utf8_encode($rowTableProd->site);
                $portal = utf8_encode($rowTableProd->portal);
                $outro_local = utf8_encode($rowTableProd->outro_local);
                $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                ?>
                <div class="box box-default collapsed-box own-border-top">
                    <div class="box-header own-activity-style">
                        <h3 class="box-title sub-titulo-2"
                            data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <br>
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd><?php echo $responsavel; ?></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Documento em vigor
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
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $suporteOriginal; ?></td>
                                <td><?php echo $suportePreenchimento; ?></td>
                                <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $synologyRB; ?></td>
                                <td><?php echo $site; ?></td>
                                <td><?php echo $portal; ?></td>
                                <td><?php echo $outro_local; ?></td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $formaRecuperacao; ?></td>
                                <td><?php echo $periodoArquivoDinamico; ?></td>
                                <td><?php echo $periodoArquivoMorto; ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Cumprimento Normativo
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


                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <!-- Modelos -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">


            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comevendas' AND  tipo_documento = 'Modelo'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

<!-- Procedimento -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comevendas' AND  tipo_documento = 'Procedimento'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>


</div>

</div>


<!-- Outros -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comevendas' AND  tipo_documento = 'Outros'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>


</div>

</div>
<!-- END HERE COMEVENDAS -->
<!-- START HERE to COMIT -->

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Com&IT</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">

        <!-- Intrucoes de trabalho -->
        <div class="box box-default table-control-docs-style collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <?php

                $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comit' AND  tipo_documento = 'instrucao trabalho'";
                $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                $procedimento = "Produção";
                $idControlDoc = $rowTableProd->id_control_doc;
                $tipoDocumento = $rowTableProd->tipo_documento;
                $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                $responsavel = utf8_encode($rowTableProd->responsavel);
                $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                $versaoControlDoc = utf8_encode($rowTableProd->versao);
                $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                $synologyRB = utf8_encode($rowTableProd->synology_rb);
                $site = utf8_encode($rowTableProd->site);
                $portal = utf8_encode($rowTableProd->portal);
                $outro_local = utf8_encode($rowTableProd->outro_local);
                $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                ?>
                <div class="box box-default collapsed-box own-border-top">
                    <div class="box-header own-activity-style">
                        <h3 class="box-title sub-titulo-2"
                            data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <br>
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd><?php echo $responsavel; ?></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Documento em vigor
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
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $suporteOriginal; ?></td>
                                <td><?php echo $suportePreenchimento; ?></td>
                                <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $synologyRB; ?></td>
                                <td><?php echo $site; ?></td>
                                <td><?php echo $portal; ?></td>
                                <td><?php echo $outro_local; ?></td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $formaRecuperacao; ?></td>
                                <td><?php echo $periodoArquivoDinamico; ?></td>
                                <td><?php echo $periodoArquivoMorto; ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Cumprimento Normativo
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


                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <!-- Modelos -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">


            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comit' AND  tipo_documento = 'Modelo'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

<!-- Procedimento -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comit' AND  tipo_documento = 'Procedimento'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>


</div>

</div>


<!-- Outros -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comit' AND  tipo_documento = 'Outros'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>


</div>

</div>
<!-- END HERE COMIT -->


<!-- START HERE REC HUMANOS -->

<div class="box box-info"       >
    <div class="box-header with-border">
        <h3 class="box-title">Recursos Humanos</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">

        <!-- Intrucoes de trabalho -->
        <div class="box box-default table-control-docs-style collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <?php

                $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'rechumanos' AND  tipo_documento = 'instrucao trabalho'";
                $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                $procedimento = "Produção";
                $idControlDoc = $rowTableProd->id_control_doc;
                $tipoDocumento = $rowTableProd->tipo_documento;
                $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                $responsavel = utf8_encode($rowTableProd->responsavel);
                $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                $versaoControlDoc = utf8_encode($rowTableProd->versao);
                $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                $synologyRB = utf8_encode($rowTableProd->synology_rb);
                $site = utf8_encode($rowTableProd->site);
                $portal = utf8_encode($rowTableProd->portal);
                $outro_local = utf8_encode($rowTableProd->outro_local);
                $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                ?>
                <div class="box box-default collapsed-box own-border-top">
                    <div class="box-header own-activity-style">
                        <h3 class="box-title sub-titulo-2"
                            data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <br>
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd><?php echo $responsavel; ?></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Documento em vigor
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
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $suporteOriginal; ?></td>
                                <td><?php echo $suportePreenchimento; ?></td>
                                <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $synologyRB; ?></td>
                                <td><?php echo $site; ?></td>
                                <td><?php echo $portal; ?></td>
                                <td><?php echo $outro_local; ?></td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $formaRecuperacao; ?></td>
                                <td><?php echo $periodoArquivoDinamico; ?></td>
                                <td><?php echo $periodoArquivoMorto; ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Cumprimento Normativo
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


                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <!-- Modelos -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">


            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'rechumanos' AND  tipo_documento = 'Modelo'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

<!-- Procedimento -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'rechumanos' AND  tipo_documento = 'Procedimento'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>


</div>

</div>


<!-- Outros -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'rechumanos' AND  tipo_documento = 'Outros'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>


</div>

</div>
<!-- END HERE REC HUMANOS -->


<!-- START HERE COMPRAS -->

<div class="box box-info"       >
    <div class="box-header with-border">
        <h3 class="box-title">Compras</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">

        <!-- Intrucoes de trabalho -->
        <div class="box box-default table-control-docs-style collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <?php

                $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'Compras' AND  tipo_documento = 'instrucao trabalho'";
                $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                $procedimento = "Produção";
                $idControlDoc = $rowTableProd->id_control_doc;
                $tipoDocumento = $rowTableProd->tipo_documento;
                $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                $responsavel = utf8_encode($rowTableProd->responsavel);
                $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                $versaoControlDoc = utf8_encode($rowTableProd->versao);
                $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                $synologyRB = utf8_encode($rowTableProd->synology_rb);
                $site = utf8_encode($rowTableProd->site);
                $portal = utf8_encode($rowTableProd->portal);
                $outro_local = utf8_encode($rowTableProd->outro_local);
                $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                ?>
                <div class="box box-default collapsed-box own-border-top">
                    <div class="box-header own-activity-style">
                        <h3 class="box-title sub-titulo-2"
                            data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <br>
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd><?php echo $responsavel; ?></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Documento em vigor
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
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $suporteOriginal; ?></td>
                                <td><?php echo $suportePreenchimento; ?></td>
                                <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $synologyRB; ?></td>
                                <td><?php echo $site; ?></td>
                                <td><?php echo $portal; ?></td>
                                <td><?php echo $outro_local; ?></td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $formaRecuperacao; ?></td>
                                <td><?php echo $periodoArquivoDinamico; ?></td>
                                <td><?php echo $periodoArquivoMorto; ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Cumprimento Normativo
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


                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <!-- Modelos -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">


            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'Compras' AND  tipo_documento = 'Modelo'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

<!-- Procedimento -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'Compras' AND  tipo_documento = 'Procedimento'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>


</div>

</div>


<!-- Outros -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'Compras' AND  tipo_documento = 'Outros'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>


</div>

</div>
<!-- END HERE COMPRAS -->
<!-- START HERE REC PATRIMONIAIS -->

<div class="box box-info"       >
    <div class="box-header with-border">
        <h3 class="box-title">Recursos Patrimoniais</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">

        <!-- Intrucoes de trabalho -->
        <div class="box box-default table-control-docs-style collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <?php

                $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'recpatrimoniais' AND  tipo_documento = 'instrucao trabalho'";
                $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                $procedimento = "Produção";
                $idControlDoc = $rowTableProd->id_control_doc;
                $tipoDocumento = $rowTableProd->tipo_documento;
                $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                $responsavel = utf8_encode($rowTableProd->responsavel);
                $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                $versaoControlDoc = utf8_encode($rowTableProd->versao);
                $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                $synologyRB = utf8_encode($rowTableProd->synology_rb);
                $site = utf8_encode($rowTableProd->site);
                $portal = utf8_encode($rowTableProd->portal);
                $outro_local = utf8_encode($rowTableProd->outro_local);
                $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                ?>
                <div class="box box-default collapsed-box own-border-top">
                    <div class="box-header own-activity-style">
                        <h3 class="box-title sub-titulo-2"
                            data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <br>
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd><?php echo $responsavel; ?></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Documento em vigor
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
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $suporteOriginal; ?></td>
                                <td><?php echo $suportePreenchimento; ?></td>
                                <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $synologyRB; ?></td>
                                <td><?php echo $site; ?></td>
                                <td><?php echo $portal; ?></td>
                                <td><?php echo $outro_local; ?></td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $formaRecuperacao; ?></td>
                                <td><?php echo $periodoArquivoDinamico; ?></td>
                                <td><?php echo $periodoArquivoMorto; ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Cumprimento Normativo
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


                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <!-- Modelos -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">


            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'recpatrimoniais' AND  tipo_documento = 'Modelo'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

<!-- Procedimento -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'recpatrimoniais' AND  tipo_documento = 'Procedimento'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>


</div>

</div>


<!-- Outros -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'recpatrimoniais' AND  tipo_documento = 'Outros'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>


</div>

</div>
<!-- END HERE REC PATRIMONIAIS -->

<!-- START HERE AUDITORIAS -->

<div class="box box-info"       >
    <div class="box-header with-border">
        <h3 class="box-title">Auditorias</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">

        <!-- Intrucoes de trabalho -->
        <div class="box box-default table-control-docs-style collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <?php

                $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'Auditorias' AND  tipo_documento = 'instrucao trabalho'";
                $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                $procedimento = "Produção";
                $idControlDoc = $rowTableProd->id_control_doc;
                $tipoDocumento = $rowTableProd->tipo_documento;
                $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                $responsavel = utf8_encode($rowTableProd->responsavel);
                $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                $versaoControlDoc = utf8_encode($rowTableProd->versao);
                $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                $synologyRB = utf8_encode($rowTableProd->synology_rb);
                $site = utf8_encode($rowTableProd->site);
                $portal = utf8_encode($rowTableProd->portal);
                $outro_local = utf8_encode($rowTableProd->outro_local);
                $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                ?>
                <div class="box box-default collapsed-box own-border-top">
                    <div class="box-header own-activity-style">
                        <h3 class="box-title sub-titulo-2"
                            data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <br>
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd><?php echo $responsavel; ?></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Documento em vigor
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
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $suporteOriginal; ?></td>
                                <td><?php echo $suportePreenchimento; ?></td>
                                <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $synologyRB; ?></td>
                                <td><?php echo $site; ?></td>
                                <td><?php echo $portal; ?></td>
                                <td><?php echo $outro_local; ?></td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $formaRecuperacao; ?></td>
                                <td><?php echo $periodoArquivoDinamico; ?></td>
                                <td><?php echo $periodoArquivoMorto; ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Cumprimento Normativo
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


                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <!-- Modelos -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">


            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'Auditorias' AND  tipo_documento = 'Modelo'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

<!-- Procedimento -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'Auditorias' AND  tipo_documento = 'Procedimento'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>


</div>

</div>


<!-- Outros -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'Auditorias' AND  tipo_documento = 'Outros'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>


</div>

</div>
<!-- END HERE AUDITORIAS -->

<!-- START HERE CONTROLO DOCS -->

<div class="box box-info"       >
    <div class="box-header with-border">
        <h3 class="box-title">Controlo Documental</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">

        <!-- Intrucoes de trabalho -->
        <div class="box box-default table-control-docs-style collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <?php

                $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'controldoc' AND  tipo_documento = 'instrucao trabalho'";
                $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                $procedimento = "Produção";
                $idControlDoc = $rowTableProd->id_control_doc;
                $tipoDocumento = $rowTableProd->tipo_documento;
                $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                $responsavel = utf8_encode($rowTableProd->responsavel);
                $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                $versaoControlDoc = utf8_encode($rowTableProd->versao);
                $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                $synologyRB = utf8_encode($rowTableProd->synology_rb);
                $site = utf8_encode($rowTableProd->site);
                $portal = utf8_encode($rowTableProd->portal);
                $outro_local = utf8_encode($rowTableProd->outro_local);
                $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                ?>
                <div class="box box-default collapsed-box own-border-top">
                    <div class="box-header own-activity-style">
                        <h3 class="box-title sub-titulo-2"
                            data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <br>
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd><?php echo $responsavel; ?></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Documento em vigor
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
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $suporteOriginal; ?></td>
                                <td><?php echo $suportePreenchimento; ?></td>
                                <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $synologyRB; ?></td>
                                <td><?php echo $site; ?></td>
                                <td><?php echo $portal; ?></td>
                                <td><?php echo $outro_local; ?></td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $formaRecuperacao; ?></td>
                                <td><?php echo $periodoArquivoDinamico; ?></td>
                                <td><?php echo $periodoArquivoMorto; ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Cumprimento Normativo
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


                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <!-- Modelos -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">


            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'controldoc' AND  tipo_documento = 'Modelo'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

<!-- Procedimento -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'controldoc' AND  tipo_documento = 'Procedimento'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>


</div>

</div>


<!-- Outros -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'controldoc' AND  tipo_documento = 'Outros'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>


</div>

</div>
<!-- END HERE CONTROLO DOCS -->

<!-- START HERE OCORRENCIAS E TRATAMENTOS -->

<div class="box box-info"       >
    <div class="box-header with-border">
        <h3 class="box-title">Ocorrências e tratamentos</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div><!-- /.box-header -->
    <div class="box-body" style="display: block;">

        <!-- Intrucoes de trabalho -->
        <div class="box box-default table-control-docs-style collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Instruções de trabalho</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <?php

                $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'ocorrenciastratamentos' AND  tipo_documento = 'instrucao trabalho'";
                $resultQueryTableProd = mysqli_query($link, $queryTableProd);

                while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
                $procedimento = "Produção";
                $idControlDoc = $rowTableProd->id_control_doc;
                $tipoDocumento = $rowTableProd->tipo_documento;
                $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
                $responsavel = utf8_encode($rowTableProd->responsavel);
                $codigoControlDoc = utf8_encode($rowTableProd->codigo);
                $versaoControlDoc = utf8_encode($rowTableProd->versao);
                $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
                $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
                $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
                $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
                $synologyRB = utf8_encode($rowTableProd->synology_rb);
                $site = utf8_encode($rowTableProd->site);
                $portal = utf8_encode($rowTableProd->portal);
                $outro_local = utf8_encode($rowTableProd->outro_local);
                $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
                $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
                $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
                $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
                $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
                $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
                $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


                ?>
                <div class="box box-default collapsed-box own-border-top">
                    <div class="box-header own-activity-style">
                        <h3 class="box-title sub-titulo-2"
                            data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <br>
                        <div class="col-md-12"
                        <dl>
                            <dt>Responsável</dt>
                            <dd><?php echo $responsavel; ?></dd>
                        </dl>
                        <br>
                    </div>
                    <div class="col-md-6">


                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Documento em vigor
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
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Suporte
                                </th>
                            </tr>
                            <tr>
                                <th>Suporte original</th>
                                <th>Suporte de Preenchimento</th>
                                <th>Cópia não controlada após impressão</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $suporteOriginal; ?></td>
                                <td><?php echo $suportePreenchimento; ?></td>
                                <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Detentores
                                </th>
                            </tr>
                            <tr>
                                <th>Synology>RB</th>
                                <th>Site</th>
                                <th>Portal</th>
                                <th>Outro local</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $synologyRB; ?></td>
                                <td><?php echo $site; ?></td>
                                <td><?php echo $portal; ?></td>
                                <td><?php echo $outro_local; ?></td>

                            </tr>

                            </tbody>
                        </table>

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="background-color: #ededed;">Arquivo
                                </th>
                            </tr>
                            <tr>
                                <th>Forma de recuperação</th>
                                <th>Período de Arquivo dinâmico</th>
                                <th>Período mínimo de arquivo morto</th>
                            </tr>

                            <tr class="text-left">
                                <td><?php echo $formaRecuperacao; ?></td>
                                <td><?php echo $periodoArquivoDinamico; ?></td>
                                <td><?php echo $periodoArquivoMorto; ?></td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12">

                        <table class="table table-bordered center">
                            <tbody>
                            <tr>
                                <th colspan="4" class="text-center"
                                    style="background-color: #ededed;">Cumprimento Normativo
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


                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


    </div>

    <!-- Modelos -->
    <div class="box box-default table-control-docs-style collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Modelos</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body" style="display: none;">


            <?php

            $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'ocorrenciastratamentos' AND  tipo_documento = 'Modelo'";
            $resultQueryTableProd = mysqli_query($link, $queryTableProd);

            while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
            $procedimento = "Produção";
            $idControlDoc = $rowTableProd->id_control_doc;
            $tipoDocumento = $rowTableProd->tipo_documento;
            $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
            $responsavel = utf8_encode($rowTableProd->responsavel);
            $codigoControlDoc = utf8_encode($rowTableProd->codigo);
            $versaoControlDoc = utf8_encode($rowTableProd->versao);
            $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
            $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
            $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
            $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
            $synologyRB = utf8_encode($rowTableProd->synology_rb);
            $site = utf8_encode($rowTableProd->site);
            $portal = utf8_encode($rowTableProd->portal);
            $outro_local = utf8_encode($rowTableProd->outro_local);
            $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
            $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
            $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
            $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
            $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
            $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
            $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


            ?>
            <div class="box box-default collapsed-box own-border-top">
                <div class="box-header own-activity-style">
                    <h3 class="box-title sub-titulo-2"
                        data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <br>
                    <div class="col-md-12"
                    <dl>
                        <dt>Responsável</dt>
                        <dd><?php echo $responsavel; ?></dd>
                    </dl>
                    <br>
                </div>
                <div class="col-md-6">


                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Documento em vigor
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
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Suporte
                            </th>
                        </tr>
                        <tr>
                            <th>Suporte original</th>
                            <th>Suporte de Preenchimento</th>
                            <th>Cópia não controlada após impressão</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $suporteOriginal; ?></td>
                            <td><?php echo $suportePreenchimento; ?></td>
                            <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Detentores
                            </th>
                        </tr>
                        <tr>
                            <th>Synology>RB</th>
                            <th>Site</th>
                            <th>Portal</th>
                            <th>Outro local</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $synologyRB; ?></td>
                            <td><?php echo $site; ?></td>
                            <td><?php echo $portal; ?></td>
                            <td><?php echo $outro_local; ?></td>

                        </tr>

                        </tbody>
                    </table>

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="3" class="text-center"
                                style="background-color: #ededed;">Arquivo
                            </th>
                        </tr>
                        <tr>
                            <th>Forma de recuperação</th>
                            <th>Período de Arquivo dinâmico</th>
                            <th>Período mínimo de arquivo morto</th>
                        </tr>

                        <tr class="text-left">
                            <td><?php echo $formaRecuperacao; ?></td>
                            <td><?php echo $periodoArquivoDinamico; ?></td>
                            <td><?php echo $periodoArquivoMorto; ?></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">

                    <table class="table table-bordered center">
                        <tbody>
                        <tr>
                            <th colspan="4" class="text-center"
                                style="background-color: #ededed;">Cumprimento Normativo
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


                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

<!-- Procedimento -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Procedimento</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'ocorrenciastratamentos' AND  tipo_documento = 'Procedimento'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>


</div>

</div>


<!-- Outros -->
<div class="box box-default table-control-docs-style collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title sub-titulo-1 sub-titulo-tipos" data-widget="collapse">Outros</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div><!-- /.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <?php

        $queryTableProd = "SELECT * FROM tbl_control_docs WHERE procedimento = 'ocorrenciastratamentos' AND  tipo_documento = 'Outros'";
        $resultQueryTableProd = mysqli_query($link, $queryTableProd);

        while ($rowTableProd = mysqli_fetch_object($resultQueryTableProd)) {
        $procedimento = "Produção";
        $idControlDoc = $rowTableProd->id_control_doc;
        $tipoDocumento = $rowTableProd->tipo_documento;
        $nomeDescricaoDocumento = utf8_encode($rowTableProd->nome_descricao_documento);
        $responsavel = utf8_encode($rowTableProd->responsavel);
        $codigoControlDoc = utf8_encode($rowTableProd->codigo);
        $versaoControlDoc = utf8_encode($rowTableProd->versao);
        $dataAtualizacaoControlDoc = utf8_encode($rowTableProd->data_atualizacao);
        $suporteOriginal = utf8_encode($rowTableProd->suporte_original);
        $suportePreenchimento = utf8_encode($rowTableProd->suporte_preenchimento);
        $copiaNaoControladaPosPrint = utf8_encode($rowTableProd->copia_nao_controlada_pos_print);
        $synologyRB = utf8_encode($rowTableProd->synology_rb);
        $site = utf8_encode($rowTableProd->site);
        $portal = utf8_encode($rowTableProd->portal);
        $outro_local = utf8_encode($rowTableProd->outro_local);
        $formaRecuperacao = utf8_encode($rowTableProd->forma_recuperacao);
        $periodoArquivoDinamico = utf8_encode($rowTableProd->periodo_arquivo_dinamico);
        $periodoArquivoMorto = utf8_encode($rowTableProd->periodo_arquivo_morto);
        $controlDoc9001 = utf8_encode($rowTableProd->control_doc_9001_2008);
        $controlDoc2015 = utf8_encode($rowTableProd->control_doc_9001_2015);
        $controlDocFSC = utf8_encode($rowTableProd->control_doc_fsc);
        $controlDocPEFC = utf8_encode($rowTableProd->control_doc_pefc);


        ?>
        <div class="box box-default collapsed-box own-border-top">
            <div class="box-header own-activity-style">
                <h3 class="box-title sub-titulo-2"
                    data-widget="collapse"><?php echo $nomeDescricaoDocumento; ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
                <br>
                <div class="col-md-12"
                <dl>
                    <dt>Responsável</dt>
                    <dd><?php echo $responsavel; ?></dd>
                </dl>
                <br>
            </div>
            <div class="col-md-6">


                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Documento em vigor
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
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Suporte
                        </th>
                    </tr>
                    <tr>
                        <th>Suporte original</th>
                        <th>Suporte de Preenchimento</th>
                        <th>Cópia não controlada após impressão</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $suporteOriginal; ?></td>
                        <td><?php echo $suportePreenchimento; ?></td>
                        <td><?php echo $copiaNaoControladaPosPrint; ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Detentores
                        </th>
                    </tr>
                    <tr>
                        <th>Synology>RB</th>
                        <th>Site</th>
                        <th>Portal</th>
                        <th>Outro local</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $synologyRB; ?></td>
                        <td><?php echo $site; ?></td>
                        <td><?php echo $portal; ?></td>
                        <td><?php echo $outro_local; ?></td>

                    </tr>

                    </tbody>
                </table>

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="3" class="text-center"
                            style="background-color: #ededed;">Arquivo
                        </th>
                    </tr>
                    <tr>
                        <th>Forma de recuperação</th>
                        <th>Período de Arquivo dinâmico</th>
                        <th>Período mínimo de arquivo morto</th>
                    </tr>

                    <tr class="text-left">
                        <td><?php echo $formaRecuperacao; ?></td>
                        <td><?php echo $periodoArquivoDinamico; ?></td>
                        <td><?php echo $periodoArquivoMorto; ?></td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-md-12">

                <table class="table table-bordered center">
                    <tbody>
                    <tr>
                        <th colspan="4" class="text-center"
                            style="background-color: #ededed;">Cumprimento Normativo
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


            </div>
        </div>
    </div>
    <?php } ?>
</div>

</div>


</div>

</div>
<!-- END HERE OCORRENCIAS E TRATAMENTOS -->

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
            </ul><!-- /.control-sidebar-mdgdsenu -->

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
<script>
    function tableWidth() {

        $('table:first-of-type').css('width', '100%');

    }

    tableWidth();
</script>
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

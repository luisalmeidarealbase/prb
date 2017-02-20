<?php

require_once("connection/conn.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['fullname'])) {
    header('location: index.php');
}




function checkEditMode()
{

    global $link;
    global $erroModoEdicao;
    //modo de edicao
    /* "SELECT * FROM tbl_rostos INNER JOIN tbl_versoes_rostos ON tbl_versoes_rostos.tbl_rostos_id_rosto = tbl_rostos.id_rosto
    INNER JOIN tbl_procedimentos ON tbl_procedimentos.id_procedimento = tbl_rostos.tbl_procedimentos_id_procedimento
    WHERE id_procedimento = 2 AND publicado_versao_rosto = 0 AND aprovado_versao_rosto = 0 AND historico_versao_rosto != 1 ";

    */
    $query1 = "SELECT * FROM tbl_rostos INNER JOIN tbl_versoes_rostos ON tbl_versoes_rostos.tbl_rostos_id_rosto = tbl_rostos.id_rosto
    INNER JOIN tbl_procedimentos ON tbl_procedimentos.id_procedimento = tbl_rostos.tbl_procedimentos_id_procedimento
    WHERE id_procedimento = 3 AND publicado_versao_rosto = 0 AND aprovado_versao_rosto = 0 AND historico_versao_rosto != 1";

    $resultQuery1 = mysqli_query($link, $query1);

    $firstResult = mysqli_num_rows($resultQuery1);

    $query2 = "SELECT * FROM tbl_rostos INNER JOIN tbl_versoes_rostos ON tbl_versoes_rostos.tbl_rostos_id_rosto = tbl_rostos.id_rosto
    INNER JOIN tbl_procedimentos ON tbl_procedimentos.id_procedimento = tbl_rostos.tbl_procedimentos_id_procedimento
    WHERE id_procedimento = 3 AND publicado_versao_rosto = 0 AND aprovado_versao_rosto = 1 AND validado_versao_rosto = 0 AND historico_versao_rosto != 1";

    $resultQuery2 = mysqli_query($link, $query2);

    $secondResult = mysqli_num_rows($resultQuery2);

    $query3 = "SELECT * FROM tbl_rostos INNER JOIN tbl_versoes_rostos ON tbl_versoes_rostos.tbl_rostos_id_rosto = tbl_rostos.id_rosto
    INNER JOIN tbl_procedimentos ON tbl_procedimentos.id_procedimento = tbl_rostos.tbl_procedimentos_id_procedimento
    WHERE id_procedimento = 3 AND publicado_versao_rosto = 0 AND aprovado_versao_rosto = 1 AND validado_versao_rosto = 1 AND historico_versao_rosto != 1";

    $resultQuery3 = mysqli_query($link, $query3);

    $thirdResult = mysqli_num_rows($resultQuery3);

    $countEdit = $firstResult + $secondResult + $thirdResult;

    if ($countEdit > 0) {
        $erroModoEdicao = true;
    }

    else {
        header('location: edicao-producao.php');
    }


}


if (isset($_GET["edit"]) == "true") {
    checkEditMode();
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
                Produção <br>
                <small>Recreating DNA</small>
            </h1>
            <br>
            <div class="btn-group">
                <a href="producao.php?edit=true">
                    <button type="button" class="btn btn-info">Editar Procedimento</button>

                </a>
                <a href="procedimento-historico.php?id=2">
                    <button type="button" class="btn btn-info">Histórico Obsoletos</button>
                </a>


            </div>
            <br>
            <?php

                if (isset($erroModoEdicao) == true) {

                   ?>

                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                        Já existe uma versão em revisão do procedimento Controlo de Documentos e Registos.
                    </div>


            <?php

                }

                ?>



            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <br>

                <br>

                <!--       <li class="active">Here</li>
                -->    </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <br><br><br>


            <!-- ------------------------------- BEGIN - LISTA DE ROSTO  ------------------------------- -->

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Rosto e Fluxograma</h3>
                    <div class="box-tools pull-right">
                        <!--<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <?php

                    $queryrosto = "SELECT * FROM tbl_procedimentos INNER JOIN tbl_rostos ON id_procedimento = tbl_procedimentos_id_procedimento INNER JOIN tbl_versoes_rostos ON id_rosto = tbl_rostos_id_rosto  WHERE tbl_versoes_rostos.publicado_versao_rosto = 1 AND id_procedimento = 3";

                    $resultrosto = mysqli_query($link, $queryrosto);

                    while ($rowrosto = mysqli_fetch_object($resultrosto)) {
                        //save data to variables from the previous query
                        $objectivo = $rowrosto->objectivo_procedimento;
                        $ambito = $rowrosto->ambito_procedimento;
                        $entradas = $rowrosto->entradas;
                        $saidas = $rowrosto->saidas;
                        $definicaoAbreviatura = $rowrosto->indicadores;
                        $pontosnorma = $rowrosto->norma_pontos_norma;
                        $nomeprocedimento = $rowrosto->nome_procedimento;
                        $indicadores = $rowrosto->indicadores;
                        $acompanhamento = $rowrosto->acompanhamento;
                        $avaliacao_e_medicao = $rowrosto->avaliacao_e_medicao;
                        $responsavel_procedimento = $rowrosto->responsavel_procedimento;
                        $metodo = $rowrosto->metodo;
                        $idrosto = $rowrosto->id_rosto;
                        $versao_vigor = $rowrosto->versao_vigor;


                    }
                    ?>

                    <div class="col-md-6">

                        <dl class="dl-horizontal">
                            <dt>Procedimento:</dt>
                            <dd><?php echo utf8_encode($nomeprocedimento); ?></dd>
                            <dt>Ref. Doc Versão em vigor</dt>
                            <dd><?php echo $versao_vigor; ?></dd>
                            <dt>Data de Aprovação.</dt>
                            <dd>24 de Agosto 2015</dd>
                            <dt>Responsável</dt>
                            <dd><?php echo utf8_encode($responsavel_procedimento); ?></dd>
                        </dl>
                        <br>

                        <dl class="dl-horizontal">
                            <dt>Objectivo procedimento</dt>
                            <dd>
                            <?php echo $objectivo; ?></dt><br><br>
                            <dt>Âmbito de Procedimento</dt>
                            <dd><?php echo $ambito; ?></dd>
                            <br><br>
                            <dt>Entradas</dt>
                            <dd><?php echo $entradas; ?></dd>
                            <br><br>
                            <dt>Saídas</dt>
                            <dd><?php echo $saidas; ?></dd>
                            <br><br>
                        </dl>

                        <div class="col-md-4">
                            <b>Indicadores</b> <br>
                            <br>
                            <?php echo $indicadores; ?>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <b>Acompanhamento</b> <br>
                            <br>
                            <?php echo $acompanhamento; ?>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <b>Avaliação e medição</b> <br>
                            <br>
                            <?php echo $avaliacao_e_medicao; ?>
                            <br>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <!-- code to embed a pdf file -->
                        <embed src="teste2.pdf" style="min-width: 100%;  min-height: 500px;" class="img-responsive"
                               type='application/pdf'>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix" style="display: none;">
                    <!--  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                    <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
                </div><!-- /.box-footer -->
            </div>


            <!-- ------------------------------- END - LISTA DE ROSTO ------------------------------- -->


            <!-- ------------------------------- BEGIN - LISTA DE FLUXOGRAMA PROCEDIMENTO  ------------------------------- -->

            <!--            <div class="box box-info collapsed-box">-->
            <!--                <div class="box-header with-border">-->
            <!--                    <h3 class="box-title">Fluxograma</h3>-->
            <!--                    <div class="box-tools pull-right">-->
            <!--                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
            <!--                    </div>-->
            <!--                </div><!-- /.box-header -->
            <!--                <div class="box-body" style="display: none;">-->
            <!---->
            <!--                    <!--     <img class="img-responsive" src="http://placehold.it/2560x1440" alt="fluxo-controlo-documental"> -->
            <!---->
            <!--                    <!-- code to embed a pdf file -->
            <!--                    <embed src="teste2.pdf" style="min-width: 100%;  min-height: 800px;" class="img-responsive"-->
            <!--                           type='application/pdf'>-->
            <!---->
            <!--                </div><!-- /.box-body -->
            <!--                <div class="box-footer clearfix" style="display: none;">-->
            <!--                    <!--  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
            <!--                    <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
            <!--                </div><!-- /.box-footer -->
            <!--            </div>-->


            <!-- ------------------------------- END - LISTA DE FLUXOGRAMA PROCEDIMENTO ------------------------------- -->


            <!-- ------------------------------- BEGIN - LISTA DE METODO  ------------------------------- -->

            <!--<div class="box box-info collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Método e Matriz RH</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div><!-- /.box-header -->
            <!--  <div class="box-body" style="display: none;">-->

            <?php /*echo $metodo; */ ?>

            <!--    </div><!-- /.box-body -->
            <!--<div class="box-footer clearfix" style="display: none;">
                <!--  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
            <!--  </div><!-- /.box-footer -->
            <!-- </div>-->

            <!-- ------------------------------- END - LISTA DE METODO ------------------------------- -->

            <!-- ------------------------------- BEGIN - NOVO METODO FRONT END BUILDING  ------------------------------- -->

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Método | Matriz RH</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="display: block;">


                    <!-- information goes here -->


                    <?php

                    //query to show dub processos
                    $querySubProcessos = "SELECT * FROM tbl_sub_processos WHERE tbl_rostos_id_rosto = '$idrosto'";

                    $resultSubProcessos = mysqli_query($link, $querySubProcessos);

                    while ($rowSubProcessos = mysqli_fetch_object($resultSubProcessos)) {

                        $idsubprocesso = $rowSubProcessos->id_sub_processo;
                        $nomeSubProcesso = $rowSubProcessos->nome_sub_processo;
                        ?>


                        <!-- information goes here -->

                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title sub-titulo-1"><?php echo $nomeSubProcesso; ?></h3>
                                <!--<div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button>
                                </div>--><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body" style="display: block;">

                                <?php

                                //query to show actividades
                                $queryActividade = "SELECT * FROM tbl_actividades WHERE tbl_sub_processos_id_sub_processo = '$idsubprocesso'";
                                $resultActividade = mysqli_query($link, $queryActividade);

                                while ($rowActividade = mysqli_fetch_object($resultActividade)) {

                                    $idActividade = $rowActividade->id_actividade;
                                    $nomeActividade = $rowActividade->nome_actividade;
                                    $descricaoActividade = $rowActividade->descricao_actividade;
                                    $observacaoActividade = $rowActividade->observacao_actividade;
                                    $c90012008 = $rowActividade->c9001_2008;
                                    $c90012015 = $rowActividade->c9001_2015;
                                    $fsc = $rowActividade->fsc;
                                    $pefc = $rowActividade->pefc;


                                    ?>
                                    <!-- information goes here -->


                                    <div class="box box-default collapsed-box own-border-top">
                                        <div class="box-header own-activity-style">
                                            <h3 class="box-title sub-titulo-2"
                                                data-widget="collapse"><?php echo $nomeActividade; ?></h3>
                                            <div class="box-tools pull-right">
                                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                                        class="fa fa-plus"></i></button>
                                            </div><!-- /.box-tools -->
                                        </div><!-- /.box-header -->


                                        <div class="box-body" style="display: none;">
                                            <br>
                                            <div class="col-md-6">
                                                <dl>
                                                    <dt>Descrição</dt>
                                                    <dd><?php echo $descricaoActividade; ?></dd>
                                                    <br>
                                                    <dt>Observações</dt>
                                                    <dd>
                                                        <?php
                                                        if ($observacaoActividade == "") {
                                                            echo "Não existem observações.";
                                                        } else {
                                                            echo $observacaoActividade;
                                                        }
                                                        ?>
                                                    </dd>

                                                </dl>
                                            </div>
                                            <div class="col-md-6">
                                                <br>
                                                <table class="table table-bordered center">
                                                    <tbody>
                                                    <tr>
                                                        <th colspan="4" class="text-center"
                                                            style="background-color: #ededed;">Matriz RH
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Responsável</th>
                                                        <th>Subs. Resp.</th>
                                                        <th>Executante</th>
                                                        <th>Subs. Exec.</th>
                                                    </tr>

                                                    <tr class="text-left">
                                                        <td>Designer</td>
                                                        <td>Responsável Qualidade</td>
                                                        <td>Operador Guilhotina</td>
                                                        <td>Designer</td>
                                                    </tr>

                                                    </tbody>
                                                </table>

                                            </div>

                                            <br>

                                            <table class="table table-bordered center">
                                                <br>
                                                <b>Cumprimento Normativo</b> <br><br>
                                                <tbody>

                                                <tr>
                                                    <th>Nome do documento</th>
                                                    <th>Codificação</th>
                                                    <th>9001:2008</th>
                                                    <th>9001:2015</th>
                                                    <th>FSC</th>
                                                    <th>PEFC</th>
                                                </tr>

                                                <tr>

                                                    <td>
                                                        <?php
                                                        if ($c90012008 == "") {
                                                            echo "--";
                                                        } else {
                                                            echo $c90012008;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($c90012015 == "") {
                                                            echo "--";
                                                        } else {
                                                            echo $c90012015;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($fsc == "") {
                                                            echo "--";
                                                        } else {
                                                            echo $fsc;
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($pefc == "") {
                                                            echo "--";
                                                        } else {
                                                            echo $pefc;
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>

                                        </div><!-- /.box-body -->
                                    </div>

                                    <?php

                                }

                                ?>


                            </div><!-- /.box-body -->
                        </div>

                        <?php

                    }

                    ?>


                </div><!-- /.box-body -->
            </div>

    </div><!-- /.box-body -->
    <div class="box-footer clearfix" style="display: none;">
        A good place to put some useful information. Just a simple footer code.
        <!--  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
        <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
    </div><!-- /.box-footer -->
</div>

<!-- ------------------------------- END - NOVO METODO FRONT END BUILDING ------------------------------- -->


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

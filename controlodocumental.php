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
  <title>RBQ | Controlo Docs</title>
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
        <span class="logo-mini"><b>PRB</b></span>
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
      Procedimento - Controlo Documental<br>
      <small>Bem-vindo à página do procedimento - Controlo Documental. Aqui pode consultar toda a informação do procedimento. </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li>Controlo Docs</li>
      <li class="active">Procedimento</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->

    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#tab_1-1" data-toggle="tab">Rosto</a></li>
        <li><a href="#tab_2-2" data-toggle="tab">Método</a></li>
        <li><a href="#tab_3-2" data-toggle="tab">Matriz RH</a></li>
        <!-- <li><a href="#tab_4-2" data-toggle="tab">Editar Metodo</a></li> -->

        
        <?php 
        if ($_SESSION['tipouser'] == 1 ) {


         ?>

         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Editar <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#tab_4-1" data-toggle="tab">Rosto</a></li>
            <li><a href="#tab_4-2">Método</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#tab_4-3">Matriz</a></li>
           <!--  <li role="presentation" class="divider"></li>
           <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li> -->
         </ul>


         <?php } ?>
       </li>
       <li class="pull-left header"><i class="fa fa-th"></i> Controlo Documental</li>
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="tab_1-1">

        <!-- PHP TO GET DATA FROM TBL_ROSTOS -->
        <?php


        // no futuro, a solução passa por acrescentar à query condicao do estado do proc estar aprovado para poder mostrar

        //$queryrosto = "SELECT * FROM tbl_rostos INNER JOIN tbl_procedimentos ON tbl_rostos.tbl_procedimentos_id_procedimento = tbl_procedimentos.id_procedimento INNER JOIN tbl_versoes_rostos ON tbl_rostos.id_rosto = tbl_versoes_rostos.tbl_rostos_id_rosto WHERE id_procedimento = 2 AND publicado_versao_rosto = 1 ORDER BY id_rosto DESC LIMIT 1";


        $queryrosto = "SELECT * FROM tbl_procedimentos INNER JOIN tbl_rostos ON id_procedimento = tbl_procedimentos_id_procedimento INNER JOIN tbl_versoes_rostos ON id_rosto = tbl_rostos_id_rosto WHERE tbl_versoes_rostos.publicado_versao_rosto = 1 AND id_procedimento = 2";


        /*------------ THIS IS A TEST - BEGIN ---------------*/

        $sql1 = "SELECT * FROM tbl_rostos INNER JOIN tbl_procedimentos ON tbl_procedimentos.id_procedimento = tbl_rostos.tbl_procedimentos_id_procedimento INNER JOIN tbl_versoes_rostos ON tbl_versoes_rostos.tbl_rostos_id_rosto = tbl_rostos.id_rosto WHERE tbl_versoes_rostos.publicado_versao_rosto = 1 AND tbl_procedimentos.id_procedimento = 2";

        /*------------ THIS IS A TEST - END -----------------*/


        $resultrosto = mysqli_query($link,$queryrosto);

        while ($rowrosto = mysqli_fetch_object($resultrosto)) {


          //save data to variables from the previous query
          $objectivo = utf8_encode($rowrosto->objectivo_procedimento);
          $ambito = utf8_encode($rowrosto->ambito_procedimento);
          $entradas = utf8_encode($rowrosto->entradas);
          $saidas = utf8_encode($rowrosto->saidas);
          $definicaoAbreviatura = utf8_encode($rowrosto->indicadores);
          $pontosnorma = utf8_encode($rowrosto->norma_pontos_norma);
          $nomeprocedimento = utf8_encode($rowrosto->nome_procedimento);
          $indicadores = utf8_encode($rowrosto->indicadores);
          $acompanhamento = utf8_encode($rowrosto->acompanhamento);
          $avaliacao_e_medicao = utf8_encode($rowrosto->avaliacao_e_medicao);
          $responsavel_procedimento = utf8_encode($rowrosto->responsavel_procedimento);
        }



        ?>
        <!-- informação Rosto do procedimento -->

        

<div id="rostoToExport">
        <div class="box box-solid">
          <div class="box-header with-border">
<!--             <i class="fa fa-file-o"></i>
 --><!--             <h3 class="box-title">Procedimento </h3> <br> <br>

-->

<button id="btn-export-pdf">Exportar para PDF</button>

  <br>
  <br>
  <br>
  <dl class="dl-horizontal">
    <dt>Procedimento:</dt>
    <dd><?php echo $nomeprocedimento; ?></dd>
    <dt>Ref. Doc Versão em vigor</dt>
    <dd>XXX.01-04</dd>
    <dt>Data de Aprovação.</dt>
    <dd>24 de Agosto 2015</dd>
    <dt>Responsável</dt>
    <dd><?php echo $responsavel_procedimento; ?></dd>
  </dl>
</div><!-- /.box-header -->
<div class="box-body">
  <br>

  <dl class="dl-horizontal">
    <dt>Objectivo procedimento</dt>
    <dd><?php echo $objectivo; ?></dt><br><br>
      <dt>Âmbito de Procedimento</dt>
      <dd><?php echo $ambito; ?></dd> <br><br>
      <dt>Entradas</dt>
      <dd><?php echo $entradas; ?></dd> <br><br>
      <dt>Saídas</dt>
      <dd><?php echo $saidas; ?></dd> <br><br>
     <!--  <dt>Definição e abreviatura</dt>
     <dd><?php //echo $definicaoAbreviatura; ?></dd> <br><br> -->
      <!-- <dt>Pontos por norma</dt>
      <dd><?php //echo $pontosnorma; ?></dd> <br> -->
    </dl>

    <div class="col-md-2">
      <b>Indicadores</b> <br>
      <br>
      <?php echo $indicadores; ?>
      <br>      
    </div>
    <div class="col-md-2">
      <b>Acompanhamento</b> <br>
      <br>
      <?php echo $acompanhamento; ?>
      <br>      
    </div>
    <div class="col-md-2">
      <b>Avaliação e medição</b> <br>
      <br>
      <?php echo $avaliacao_e_medicao; ?>
      <br>      
    </div>
  </div>
</div>
<br><!-- /.box-body -->
</div>
</div><!-- /.tab-pane -->



<!-- get info to METODO controlo de documentos de registo -->

<?php 


      // $queryNewMetodo = "SELECT * FROM tbl_sub_processos INNER JOIN tbl_actividades ON (id_sub_processo = tbl_sub_processos_id_sub_processo) WHERE tbl_metodos_id_metodo = 1";

      // $querymetodo = "SELECT * FROM tbl_sub_processos INNER JOIN tbl_actividades ON (id_sub_processo = tbl_sub_processos_id_sub_processo) where tbl_tipo_procedimentos_id_tipo_procedimento = 4";

$querymetodo = "SELECT * FROM tbl_sub_processos INNER JOIN tbl_actividades ON (id_sub_processo = tbl_sub_processos_id_sub_processo) WHERE tbl_metodos_id_metodo = 1";

$resultmetodo = mysqli_query($link,$querymetodo);

?>
<div class="tab-pane" id="tab_2-2">


  <div class="box-body">

    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6">
      <div class="dataTables_length" id="example1_length">
      </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">

      <thead>
        <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" >Sub processos</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >Actividades</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Observações</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Instruções de trabalho</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Versão Vigor</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Data atualização</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Modelos associados</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Versão Vigor</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Data atualização</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 374px;">9001</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >PEFC</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >FSC</th>
          <?php
          if ( $_SESSION['tipouser'] == 1){
            ?>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Accoes</th>
            <?php
          }
          ?>
        </tr>
      </thead>
      <tbody>       
        <?php 
        while ($rowmetodo = mysqli_fetch_object($resultmetodo)) {

                    //save data in sessions variables
                    //$_SESSION['firstname'] = utf8_encode($row->first_name);

          $idsub = $rowmetodo->id_sub_processo;
          $idact = $rowmetodo->id_actividade;
                    //check if the number is pair to verify which class it will be applied.
          ?>

          <tr role="row" class="odd">

            <td class="sorting_1"><?php echo utf8_encode($rowmetodo->nome_sub_processo); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->desc_actividade); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->obs_actividade); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->versao_em_vigor); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->data_ultima_atualizacao); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->instrucoes_trabalho); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->versao_vigor_2); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->data_ultima_atualizacao2); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->modelos_associados); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->sgs9001); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->PEFC); ?></td>
            <td valign="center"><?php echo utf8_encode($rowmetodo->FSC); ?></td>
            <?php
            if ( $_SESSION['tipouser'] == 1){
              echo "<td valign='center' align='center'><a href='editmetodo.php?id_sub=".$idsub."&id_act=".$idact."'><i class='fa fa-fw fa-edit'></i></a></td>";
            }
            ?>
          </tr><!-- <tr role="row" class="even"> -->


          <?php 
        }
        ?>

      </tbody>
      <tfoot>
        <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 430px;">Sub processos</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 518px;">Actividades</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 465px;">Observações</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 374px;">Procedimentos</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Versão Vigor</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Data atualização</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Instruções de trabalho</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Versão Vigor</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Data atualização</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Modelos associados</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Versão Vigor</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Data atualização</th>
        </tr>
      </tfoot>
    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite"></div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><!-- <ul class="pagination"><li class="paginate_button previous" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul> --></div></div></div></div>
  </div>


</div><!-- /.tab-pane -->
<div class="tab-pane" id="tab_3-2">
  Lorem Ipsum is simply dummy text of the printing and typesetting industry.

</div><!-- /.tab-pane -->

<!-- BEGIN OF EDIT ROSTO -->

<div class="tab-pane" id="tab_4-1">

 <?php


        // no futuro, a solução passa por acrescentar à query condicao do estado do proc estar aprovado para poder mostrar

 /*$queryrosto = "SELECT * FROM tbl_rostos INNER JOIN tbl_procedimentos ON tbl_rostos.tbl_procedimentos_id_procedimento = tbl_procedimentos.id_procedimento WHERE id_procedimento = 2  ORDER BY id_rosto DESC LIMIT 1"; */

 /* TESTE */

 $queryrosto = "SELECT * FROM tbl_procedimentos INNER JOIN tbl_rostos ON id_procedimento = tbl_procedimentos_id_procedimento INNER JOIN tbl_versoes_rostos ON id_rosto = tbl_rostos_id_rosto WHERE tbl_versoes_rostos.publicado_versao_rosto = 1 AND id_procedimento = 2";


 /* FIM TESTE*/

 // $queryrosto = "SELECT * FROM tbl_rostos INNER JOIN tbl_procedimentos ON tbl_rostos.tbl_procedimentos_id_procedimento = tbl_procedimentos.id_procedimento INNER JOIN tbl_versoes_rostos ON tbl_rostos.id_rosto = tbl_versoes_rostos.tbl_rostos_id_rosto WHERE id_procedimento = 2 AND publicado_versao_rosto = 1 ORDER BY id_rosto DESC LIMIT 1";




 $resultrosto = mysqli_query($link,$queryrosto);

 while ($rowrosto = mysqli_fetch_object($resultrosto)) {


          //save data to variables from the previous query
  $objectivo = utf8_encode($rowrosto->objectivo_procedimento);
  $ambito = utf8_encode($rowrosto->ambito_procedimento);
  $entradas = utf8_encode($rowrosto->entradas);
  $saidas = utf8_encode($rowrosto->saidas);
  $definicaoAbreviatura = utf8_encode($rowrosto->indicadores);
  $pontosnorma = utf8_encode($rowrosto->norma_pontos_norma);
  $nomeprocedimento = utf8_encode($rowrosto->nome_procedimento);
  $indicadores = utf8_encode($rowrosto->indicadores);
  $acompanhamento = utf8_encode($rowrosto->acompanhamento);
  $avaliacao_e_medicao = utf8_encode($rowrosto->avaliacao_e_medicao);
  $responsavel_procedimento = utf8_encode($rowrosto->responsavel_procedimento);
}



?>
<!-- informação Rosto do procedimento -->




<div class="box box-solid">
  <div class="box-header with-border">
<!--             <i class="fa fa-file-o"></i>
 --><!--             <h3 class="box-title">Procedimento </h3> <br> <br>

-->

<div class="alert alert-warning alert-dismissable" style="">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-warning"></i> Modo de Edição do Rosto do Procedimento <?php echo $nomeprocedimento; ?>!</h4>
  Atenção! Está no modo de edição do rosto. Qualquer alteração e efectuada e enviada, irá ser submetida a aprovação.
</div>



<br>
<dl class="dl-horizontal">
  <dt>Procedimento:</dt>
  <dd><?php echo $nomeprocedimento; ?></dd>
  <dt>Ref. Doc Versão em vigor</dt>
  <dd>XXX.01-04</dd>
  <dt>Data de Aprovação.</dt>
  <dd>24 de Agosto 2015</dd>
  <dt>Responsável</dt>
  <dd><?php echo $responsavel_procedimento; ?></dd>
</dl>
</div><!-- /.box-header -->
<div class="box-body">
  <br>
  <form action="editrostocontroldoc.php" name="formEdicaoRostoControlDoc" method="POST">
    <dl class="dl-horizontal">
      <dt>Objectivo procedimento</dt>
      <dd><input type="text" value='<?php echo utf8_decode($objectivo); ?>' name="objectivoprocedimento" style="width: 100%;"></dt><br><br>
        <dt>Âmbito de Procedimento</dt>
        <dd><input type="text" value='<?php echo utf8_decode($ambito); ?>' name="ambitoprocedimento" style="width: 100%;"></dd> <br><br>
        <dt>Entradas</dt>
        <dd><input type="text" value='<?php echo utf8_decode($entradas); ?>' name="entradas" style="width: 100%; height: auto;"></dd> <br><br>
        <dt>Saídas</dt>
        <dd><input type="text" value='<?php echo $saidas; ?>' name="saidas" style="width: 100%";></dd> <br><br>
       <!--  <dt>Definição e abreviatura</dt>
       <dd><input type="text" value='<?php // echo $definicaoAbreviatura; ?>' name="definicaoabreviatura" style="width: 100%;"></dd> <br><br> -->
      <!-- <dt>Pontos por norma</dt>
      <dd><?php //echo $pontosnorma; ?></dd> <br> -->
    </dl>

    <div class="col-md-4">
      <b>Indicadores</b> <br>
      <br>
      <input type="text" value='<?php echo utf8_decode($indicadores); ?>' name="indicadores" style="width: 100%; height: 20%;">
      <br>      
    </div>
    <div class="col-md-4">
      <b>Acompanhamento</b> <br>
      <br>
      <input type="text" value='<?php echo utf8_decode($acompanhamento); ?>' name="acompanhamento" style="width: 100%; height: 20%;">
      <br>      
    </div>
    <div class="col-md-4">
      <b>Avaliação e medição</b> <br>
      <br>
      <input type="text" value='<?php echo utf8_decode($avaliacao_e_medicao); ?>' name="avaliacaomedicao" style="width: 100%; height: 20%;">
      <br>      
    </div> 
    <br>
    <br><br><br><br>
    <div class="col-md-4">
      <button type="submit" class="btn btn-block btn-info">
        Gravar
      </button>
    </div>



  </div>

</form>
<br><!-- /.box-body -->
</div>

</div>
<!-- END OF EDIT ROSTO -->
<!--   // tab to edit method -->
<div class="tab-pane" id="tab_4-2">

 <?php 

 $querymetodo = "SELECT * FROM tbl_sub_processos INNER JOIN tbl_actividades ON (id_sub_processo = tbl_sub_processos_id_sub_processo) WHERE tbl_metodos_id_metodo = 1";

 $resultmetodo = mysqli_query($link,$querymetodo);
 ?>


 <div class="box-body">

  <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6">
    <div class="dataTables_length" id="example1_length">
    </div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">

    <thead>
      <tr role="row">
        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" >Sub processos</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >Actividades</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Observações</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Instruções de trabalho</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Versão Vigor</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Data atualização</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Modelos associados</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Versão Vigor</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Data atualização</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 374px;">9001</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >PEFC</th>
        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >FSC</th>

      </tr>
    </thead>
    <tbody>       
      <?php 
      while ($rowmetodo = mysqli_fetch_object($resultmetodo)) {

        //save data in sessions variables
        //$_SESSION['firstname'] = utf8_encode($row->first_name);

        $idsub = $rowmetodo->id_sub_processo;
        $idact = $rowmetodo->id_actividade;
                    //check if the number is pair to verify which class it will be applied.
        ?>
        <form role="form" action="updateMetodoGestao.php" id="formUpdateMetodo" name="formUpdateMetodo" method="POST">
          <tr role="row" class="odd">

            <td class="sorting_1"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'nomesubprocesso'; ?>" value="<?php echo utf8_encode($rowmetodo->nome_sub_processo); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'descactividade'; ?>" value="<?php echo utf8_encode($rowmetodo->desc_actividade); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'obsactividade'; ?>" value="<?php echo utf8_encode($rowmetodo->obs_actividade); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'versaoemvigor'; ?>" value="<?php echo utf8_encode($rowmetodo->versao_em_vigor); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'dataultimaatualizacao'; ?>" value="<?php echo utf8_encode($rowmetodo->data_ultima_atualizacao); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'instrucoestrabalho'; ?>" value="<?php echo utf8_encode($rowmetodo->instrucoes_trabalho); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'versaovigor2'; ?>" value="<?php echo utf8_encode($rowmetodo->versao_vigor_2); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'dataultimaatualizacao2'; ?>" value="<?php echo utf8_encode($rowmetodo->data_ultima_atualizacao2); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'modelosassociados'; ?>" value="<?php echo utf8_encode($rowmetodo->modelos_associados); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'sgs9001'; ?>" value="<?php echo utf8_encode($rowmetodo->sgs9001); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'pefc'; ?>" value="<?php echo utf8_encode($rowmetodo->PEFC); ?>"</td>
            <td valign="center"><input type="text" style="max-width: 100%;" name="<?php echo $rowmetodo->id_actividade.'fsc'; ?>" value="<?php echo utf8_encode($rowmetodo->FSC); ?>"</td>

          </tr><!-- <tr role="row" class="even"> -->

          <?php 
        }
        ?>

      </tbody>
      <tfoot>
        <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 430px;">Sub processos</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 518px;">Actividades</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 465px;">Observações</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 374px;">Procedimentos</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Versão Vigor</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Data atualização</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Instruções de trabalho</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Versão Vigor</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Data atualização</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Modelos associados</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Versão Vigor</th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 281px;">Data atualização</th>
        </tr>
      </tfoot>
    </table></div></div><!-- <div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 51 to 57 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div> -->
    <div class="row">
      <div class="col-sm-5 pull-right">
        <input type="submit" class="btn btn-block btn-primary" name="submit" value="Submeter para aprovação">
      </div>
    </div>

  </div>


</div><!-- /.tab-pane -->

</div><!-- /.tab-content -->
</div>
</div>


</section><!-- /.content -->
</div><<!--></!--> /.content-wrapper -->

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

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
   







    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    

     <script>
      var doc = new jsPDF();
      var specialElementHandlers = {
        '#editor': function (element, renderer) {
          return true;
        }
      };

      $('#btn-export-pdf').click(function () {
        doc.fromHTML($('#rostoToExport').html(), 15, 15, {
          'width': 170,
          'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
      });
    </script>
    
    
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
       </body>
       </html>







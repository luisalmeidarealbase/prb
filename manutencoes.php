<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['fullname'])) {
  header('location: index.php');
}


$success = false;
$error = false;

// if (isset($_POST['equipamento'])) {


//   $formEquipamento = $_POST['equipamento']; // OK



//   $formContadorPrints = $_POST['contadorprints']; // OK

//   if (isset($_POST['tipoManutencao'])) {  
//     $formTipoManutencao= $_POST['tipoManutencao']; //OK
//   }

//   $formDescProblema = $_POST['descProblema'];

//   if (isset($_POST['descIntervencao'])) {
//     $formDescIntervencao = $_POST['descIntervencao'];
//   }

//   if (isset($_POST['internaExterna'])) {  
//     $formInternaExterna = $_POST['internaExterna'];
//   }

//   $formDataPrevista = $_POST['dataprevista'];
//   $formDataRealizacao = $_POST['datarealizacao'];
//   $formHoraRealizacao = $_POST['horarealizacao'];
//   $formCustosField = $_POST['custosField'];
//   $formObservacoesField = $_POST['observacoesField'];


//   //get user if from SESSION VAR 
//   $iduserlogado = $_SESSION['iduser'];


//   //get the equipment ID to insert in tbl_manutencoes

//   $query2 = "SELECT id_equipamento FROM tbl_equipamentos WHERE nome_equip LIKE '$formEquipamento'";

//   $resultQuery2 = mysqli_query($link, $query2);

//   if (mysqli_num_rows($resultQuery2) >= 1) {

//     while ($rowQuery2 = mysqli_fetch_object($resultQuery2)) {

//       $idEquipamentoManutencao = $rowQuery2->id_equipamento;

//     }
//   }

//   $insertManutencao = "INSERT INTO tbl_manutencoes (contador_equipamento, tipo_manutencao, interna_ou_externa, problema, desc_intervencao, data_prevista_preventiva, data_realizacao, hora_realizacao, custos, observacoes, tbl_equipamentos_id_equipamento, tbl_users_id_user) VALUES ('$formContadorPrints','$formTipoManutencao','$formInternaExterna','$formDescProblema','$formDescIntervencao','$formDataPrevista','$formDataRealizacao','$formHoraRealizacao','$formCustosField','$formObservacoesField','$idEquipamentoManutencao','$iduserlogado')";

//     //inseriu na tbl_manutencoes da base de dados com successo.

//   $insertResult = mysqli_query($link,$insertManutencao);

//   $success = true;

// }
// else{
//   $error = true;
// }




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
  <title>RBQ | Recursos Patrimoniais - Manutenção</title>
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

  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
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




  <!-- MY MODALS BEGIN -->




  <div class="example-modal" >
    <div class="modal modal-success" id="modalsuccess" >
      <div class="modal-dialog" >
        <div class="modal-content" >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Registo de manutenção inserido.</h4>
          </div>
          <div class="modal-body">
            <p><?php echo $_SESSION['fullname']; ?> o seu registo de manutenção foi inserido com sucesso. Por favor atualize o separador <i>histórico</i> para poder visualizar o seu registo. </p>
          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-outline" data-dismiss="modal">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
  </div>

  <!-- MY MODALS END -->
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="starter.php" class="logo">
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
      Recursos Patrimoniais<br>
      <small>Aqui pode consultar fichas de equipamento, o seu programa de manutenção e registar as respectivas manutenções. </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Portal Realbase</a></li>
      <li class="active">Manutenção</li>
    </ol>
  </section>

  



  <!-- MAIN CONTENT -->


  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->

    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#tab_1-1" data-toggle="tab">Registar Manutenção</a></li>
        <li><a href="#tab_2-2" data-toggle="tab">Histórico</a></li>
        <li><a href="#tab_2-3" data-toggle="tab">Equipamentos</a></li>
        <li class="pull-left header"><i class="fa fa-wrench"></i> Manutenção</li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1-1">





          <div class="box box-solid">
            <div class="box-header with-border">
<!--             <i class="fa fa-file-o"></i>
 --><!--             <h3 class="box-title">Procedimento </h3> <br> <br>

-->
<br>
<!-- INSERIR AQUI FORMULÁRIO DE REGISTO DE MANUTENÇÃO
-->
<br>
<!-- CAMPOS A PREENCHER 

        EQUIPAMENTO
        CONTADOR NºPRINTS
        TIPO DE MANUTENÇÃO - CORRECTIVA/PREVENTIVA
        INTERNA OU Externa
        PROBLEMA (DESCRIÇÃO)
        DESCRIÇÃO DA INTERVENÇÃO
        DATA PREVISTA (QUANDO PREVENTIVA)
        DATA DE REALIZAÇÃO
        HORA DE REALIZAÇÃO
        Custos
        OBSERVAÇÕES
      -->



      <!-- query to get data from equipments -->



      <div class="col-md-6">

       <!-- general form elements -->
       <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Registar nova manutenção de equipamento</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="manutencoes.php" id="formManutencoes" name="formManutencoes" method="POST">
          <div class="box-body">
            <div class="form-group">


              <label>Equipamento</label>
              <select class="form-control select2" name="equipamento" style="width: 100%;">


                <option selected="selected" disabled="">Escolher Equipamento da lista...</option>
                <?php
                
                $queryEquipList = "SELECT * FROM tbl_equipamentos";

                $resultQueryEquipList = mysqli_query($link,$queryEquipList);

                while ($rowEquipList = mysqli_fetch_object($resultQueryEquipList)) {



                  ?>



                  <option value="<?php echo utf8_encode($rowEquipList->id_equipamento); ?>"><?php echo utf8_encode($rowEquipList->nome_equip); ?></option>

                  <?php 
                }
                ?>
              </select>
            </div>

            

            <!-- textarea - contador de prints -->
            <div class="form-group">
              <label>Contador (nº prints)</label>
              <textarea style="resize:none;" class="form-control" name="contadorprints" rows="3" placeholder="Insira o nº de prints;
              Não aplicável quando não equipamento de impressão."></textarea>
            </div>

            

            <div class="form-group">
              <label>Tipo de Manutenção</label>
              <select class="form-control select2" name="tipoManutencao" onchange="showDataPreventiva(this)" style="width: 100%;">
                <option selected="selected" disabled>...</option>
                <option value="Correctiva">Correctiva</option>
                <option value="Preventiva">Preventiva</option>
              </select>
            </div>

            <div class="form-group">
              <label>Manutenção Interna/Externa</label>
              <select class="form-control select2" name="internaExterna" style="width: 100%;">
                <option selected="selected" disabled>...</option>
                <option>Interna</option>
                <option>Externa</option>
              </select>
            </div>

            <!-- textarea - contador de prints -->
            <div class="form-group">
              <label>Problema (descrição)</label>
              <textarea style="resize: none;" class="form-control" rows="3" name="descProblema" placeholder="Descreva o problema do equipamento ..." required></textarea>
            </div>

            <!-- textarea - descricao da intervencao -->
            <div class="form-group">
              <label>Descrição da intervenção</label>
              <textarea style="resize: none;" class="form-control" name="descIntervencao" rows="3" placeholder="Descreva o que foi feito na intervenção ..."></textarea>
            </div>
            
            


            <div class="form-group" id="dataPreventivaId" style="display: none;">
              <label>Data prevista:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" name="dataprevista" placeholder="yyyy-mm-dd" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
              </div><!-- /.input group -->
            </div><!-- /.form group -->

            <div class="form-group">
              <label>Data Realização:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" name="datarealizacao" placeholder="yyyy-mm-dd" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
              </div><!-- /.input group -->
            </div><!-- /.form group -->

            <div class="form-group">
              <label>Hora Realização:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
                <input type="text" class="form-control" name="horarealizacao" placeholder="hh:mm" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
              </div><!-- /.input group -->
            </div><!-- /.form group -->



            <div class="form-group">
              <label>Custos:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-euro"></i>
                </div>
                <input type="text" class="form-control" name="custosField" placeholder="00,00" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
              </div><!-- /.input group -->
            </div><!-- /.form group -->


            <!-- textarea - contador de prints -->
            <div class="form-group">
              <label>Observações</label>
              <textarea class="form-control" name="observacoesField"  rows="3" placeholder="Insira o nº de prints ..."></textarea>
            </div>


          </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
          <button type="submitManutencao" class="btn btn-primary">Registar Manutenção</button>
        </div>
      </form>







    </div><!-- /.box-header -->

  </div><!-- /.tab-pane -->
</div>

</div>


<div class="tab-pane" id="tab_2-2">

 <div class="box">
  <div class="box-header">
    <h3 class="box-title">Histórico de Manutenções</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
  <table id="example1" class="table table-bordered table-hover table-striped">
      <thead>
        <tr>
          <th><i class="fa fa-fw fa-sort"></i>Nome Equipamento</th>
          <th><i class="fa fa-fw fa-sort"></i>Contador (nº prints)</th>
          <th><i class="fa fa-fw fa-sort"></i>Tipo de Manutenção</th>
          <th><i class="fa fa-fw fa-sort"></i>Interna ou Externa</th>
          <th><i class="fa fa-fw fa-sort"></i>Problema (descrição)</th>
          <th><i class="fa fa-fw fa-sort"></i>Descrição da intervenção</th>
          <th><i class="fa fa-fw fa-sort"></i>Data Prevista</th>
          <th><i class="fa fa-fw fa-sort"></i>Data de realização</th>
          <!-- <th>Hora de realização</th> -->
          <th><i class="fa fa-fw fa-sort"></i>Custos</th>
          <th><i class="fa fa-fw fa-sort"></i>Observações</th>
          <th><i class="fa fa-fw fa-sort"></i>Opções</th>
        </tr>
      </thead>

      <tbody>       




        <?php 

        // QUERY DE MANUTENCOES

        $querymanutencoes = "SELECT * FROM tbl_manutencoes ORDER BY data_realizacao DESC";

        $resultmanutencoes = mysqli_query($link,$querymanutencoes);





        while ($rowmanutencoes = mysqli_fetch_object($resultmanutencoes)) {

          $idEquipamento = $rowmanutencoes->tbl_equipamentos_id_equipamento;
          $idManutencao = $rowmanutencoes->id_manutencao;

                      // QUERY PARA SABER CAMPO - NOME DO EQUIPAMENTO

          $querynomeequipamento = "SELECT nome_equip FROM tbl_equipamentos WHERE id_equipamento =".$idEquipamento;

                      // echo $querynomeequipamento;

          $resultnomeequipamento = mysqli_query($link,$querynomeequipamento);

          while ($rownomeequipamento = mysqli_fetch_object($resultnomeequipamento)) {

            $nomeEquipamento= $rownomeequipamento->nome_equip;




            ?>

            
            <tr>
              <td><?php echo "<a href='equipdetalhe.php?id=".$idEquipamento."'>".utf8_encode($nomeEquipamento)."</a>"; ?></td>
              <td><?php echo utf8_encode($rowmanutencoes->contador_equipamento); ?></td>
              <td><?php echo utf8_encode($rowmanutencoes->tipo_manutencao); ?></td>
              <td><?php echo utf8_encode($rowmanutencoes->interna_ou_externa); ?></td>
              <td><?php echo utf8_encode($rowmanutencoes->problema); ?></td>
              <td><?php echo utf8_encode($rowmanutencoes->desc_intervencao); ?></td>
              <td><?php echo utf8_encode($rowmanutencoes->data_prevista_preventiva); ?></td>
              <td><?php echo utf8_encode($rowmanutencoes->data_realizacao); ?></td>
 <!--              <td><?php //echo utf8_encode($rowmanutencoes->hora_realizacao); ?></td> -->
              <td><?php echo utf8_encode($rowmanutencoes->custos); ?></td>
              <td><?php echo utf8_encode($rowmanutencoes->observacoes); ?></td>
              <td>Editar<a href="editmanutencao.php?id=<?php echo $rowmanutencoes->id_manutencao; ?>&nome=<?php echo utf8_encode($nomeEquipamento); ?>"> <i class="fa fa-fw fa-edit"></i></a></td>
            </tr><!-- <tr role="row" class="even"> -->



            <?php

          }
        }


        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>Nome Equipamento</th>
          <th>Contador (nº prints)</th>
          <th>Tipo de Manutenção</th>
          <th>Interna ou Externa</th>
          <th>Problema (descrição)</th>
          <th>Descrição da intervenção</th>
          <th>Data Prevista</th>
          <th>Data de realização</th>
          <!-- <th>Hora de realização</th> -->
          <th>Custos</th>
          <th>Observações</th>
        </tr>
      </tfoot>
    </table></div></div>


  </div><!-- /.tab-pane -->


  <!-- /.tab-content -->


  <!-- begiiiin -->





  <div class="tab-pane" id="tab_2-3">

   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Ficha de equipamentoe programa de manutenção</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th>Nome Equipamento</th>
            <th>Descrição Equipamento</th>
            <th>Modelo</th>
            <th>Ano Aquisição</th>
            <th>Marca</th>
            <th>Nº Série</th>
            <th>Periodicidade</th>
            <th>Interna ou Externa</th>
            <th>Descrição manutenção</th>
            <th>Contacto p/ serv.externo</th>
            <th>Pessoa de contacto</th>
            <th>Telf pessoa contacto</th>
          </tr>
        </thead>

        <tbody>       




          <?php 

        // QUERY DE EQUIPAMENTOS

          $queryequipamentos = "SELECT * FROM tbl_equipamentos";

          $resultequipamentos = mysqli_query($link,$queryequipamentos);





          while ($rowequipamentos = mysqli_fetch_object($resultequipamentos)) {

            ?>

            
            <tr>
              <td><?php echo "<a href='equipdetalhe.php?id=".$rowequipamentos->id_equipamento."'>".utf8_encode($rowequipamentos->nome_equip)."</a>"; ?></td>
              <td><?php echo utf8_encode($rowequipamentos->desc_equip); ?></td>
              <td><?php echo utf8_encode($rowequipamentos->modelo_equip); ?></td>
              <td><?php echo utf8_encode($rowequipamentos->ano_aquisicao); ?></td>
              <td><?php echo utf8_encode($rowequipamentos->marca); ?></td>
              <td><?php echo utf8_encode($rowequipamentos->num_serie); ?></td>
              <td><?php echo utf8_encode($rowequipamentos->periodicidade); ?></td>
              <td><?php echo utf8_encode($rowequipamentos->interna_ou_externa); ?></td>
              <td><?php echo utf8_encode($rowequipamentos->descricao_manutencao); ?></td>
              <td><?php echo "<a href='mailto:$rowequipamentos->contacto_serv_externo'>".utf8_encode($rowequipamentos->contacto_serv_externo); ?></td>
              <td><?php echo utf8_encode($rowequipamentos->pessoa_contacto_externo); ?></td>
              <td><?php echo utf8_encode($rowequipamentos->telefone_pessoa_contacto); ?></td>
            </tr><!-- <tr role="row" class="even"> -->



            <?php

          }



          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Nome Equipamento</th>
            <th>Descrição Equipamento</th>
            <th>Modelo</th>
            <th>Ano Aquisição</th>
            <th>Marca</th>
            <th>Nº Série</th>
            <th>Periodicidade</th>
            <th>Interna ou Externa</th>
            <th>Descrição manutenção</th>
            <th>Contacto p/ serv.externo</th>
            <th>Pessoa de contacto</th>
            <th>Telf pessoa contacto</th>
          </tr>
        </tfoot>
      </table></div></div>
    </div>


  </div><!-- /.tab-pane -->




  <!-- endddddd -->
  <div class="pull-right hidden-xs">
    Mod.RP.XX-YY
  </div>
</section><!-- /.content -->


</div><!-- /.content-wrapper -->



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
          $(function () {
            $("#example1").DataTable({
              "order": [[ 7, "desc" ]]
            });
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false
            });
          });



        </script>

        <script>
          function showDataPreventiva(option) {
            if (option.value == "Preventiva") {
              //alert("campo adicionado");
              document.getElementById("dataPreventivaId").style.display = "block";

            } else {
              document.getElementById("dataPreventivaId").style.display = "none";
            }
          }
        </script>
        
        <script>
          $(function () {

            $('#formManutencoes').on('submit', function (e) {

              e.preventDefault();
                // $('#myModal').modal('show'); 

                console.log($('#formManutencoes').serialize());

                $.ajax({
                  type: 'post',
                  url: 'registarmanutencao.php',
                  data: $('#formManutencoes').serialize(),
                  success: function (result) {
                    // alert('Registo de manutenção inserido com sucesso.');
                    console.log("supostamente agora apareceria a modal")

                    $('#modalsuccess').modal('show'); 

                    // $.('#modalsuccess').modal.show();

                    //console.log(result);


                    // $('#example1 tbody').append(result);
                    // $('#example1').html()
                    // document.getElementById("example1").innerHTML += result;
                  }
                });

              });

          });
        </script>
       



      </body>
      </html>

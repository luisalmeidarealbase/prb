<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


if (isset($_GET['id'])){
	$idIT = $_GET['id'];
}
$queryToShowIt = "SELECT * FROM tbl_its WHERE id_it = $idIT";
$resultShowIt = mysqli_query($link, $queryToShowIt);

while ($row = mysqli_fetch_object($resultShowIt)) {

	$procedimento = $row->tbl_procedimentos_id_procedimento;
	$objectivo = $row->objectivo_it;
	$subprocesso = $row->subprocesso_it;
	$body = $row->corpo_it;
	$autor = $row->autor_it;
	$estado = $row->tbl_estados_revisao_id_estado_revisao;

	$queryToKnowProcedimentoIt = "SELECT * FROM tbl_procedimentos WHERE id_procedimento = $procedimento";
	$resultToKnowProcedimentoIt = mysqli_query($link, $queryToKnowProcedimentoIt);

	while ($rowProcedimento = mysqli_fetch_object($resultToKnowProcedimentoIt)) {
                        # code...
		$tituloProcedimento = $rowProcedimento->nome_procedimento;
	}




}

if (isset($_GET['status'])){
	$estado = $_GET['status'];
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

	<!-- CKEditor -->
	<script src="plugins/ckeditor/ckeditor.js"></script>

	<!-- CKFinder -->
	<script src="plugins/ckfinder/ckfinder.js"></script>

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
						<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
	<--></-->

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
	<!-- Your Page Content Here -->
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Edição de Instrução de Trabalho - <b style="text-transform: uppercase;"><?php echo utf8_encode($tituloProcedimento); ?></b></h3>
				<!-- tools box -->
				<div class="pull-right box-tools">
					<button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					
				</div><!-- /. tools -->
			</div><!-- /.box-header -->

			<div class="box-body">
				<div class="form-group">
					

					<form action="process-update-it.php?id=<?php echo $idIT;?>" name="form-new-version-it" method="post">
					<label>Escolha da lista o procedimento em que se insere a instrução de trabalho:</label>

					<select class="form-control" id="listaprocedimento" name="listaprocedimento">
						
						<option value="cit">CIT</option>
						<option value="compras">Compras</option>
						<option value="comevendas">Comercial & Vendas</option>
						<option value="1">Gestão</option>
						<?php if ($procedimento = 3) {
							# code...
							echo "<option value='3' selected='selected'>Produção</option>";
						}
						?>
						
						<option value="recursoshumanos">Recursos Humanos</option>
						<option value="recursospatrimoniais">Recursos Patrimoniais</option>
						<option value="ocorrencias">Ocorrências</option>
						<option value="2">Controlo de Documentos e Registos</option>
						<option value="auditorias">Auditorias</option>

					</select>

				</div>

				<div class="form-group">
					
					<label>Escolha da lista o sub processo em que se insere a instrução de trabalho:</label>
					<small>Atenção: rever sempre o subprocesso em que se insere a IT.</small>

					<select class="form-control" id="listasubprocesso" name="listasubprocesso">
						<?php if ($procedimento = 3){

						 ?>

						<option value="naoaplicavel">Não aplicável</option>
						<option value="Pré Impressão">Pré impressão</option>
						<option value="Impressão">Impressão</option>
						<option value="Acabamentos">Acabamentos</option>
						<option value="Controlo de qualidade">Controlo de qualidade</option>
						<option value="Expedição">Expedição</option>
						<option value="Gestão de Armazém">Gestão de Armazém</option>

						<?php } ?>

					</select>

				</div>

				<div class="form-group">
					<label>Objectivo</label>
					<input type="text" class="form-control" name="objectivoit" value="<?php echo $objectivo; ?>" >
				</div>


				<label>Corpo da Instrução de Trabalho</label>
				<textarea  id="editor1" name="editor1" rows="10" cols="80" value="fsdfd" placeholder="Escrever o conteúdo da IT aqui..."> 
				<?php echo $body; ?></textarea>


				<script>



					var editor = CKEDITOR.replace( 'editor1' );
					CKFinder.setupCKEditor( editor );


        //CKEDITOR.replace( 'editor1' );
        
    </script>


    <br><br>
    <div class="col-md-6">
    	<button class="btn btn-block btn-primary">GRAVAR</button>


    </div>
</form>
</div>  </div>

</div>
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
  <!-- Personal javascript -->
  <script src="dist/js/personalJS.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
     </body>
     </html>

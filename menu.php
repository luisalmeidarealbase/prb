<?php 
?>
<ul class="sidebar-menu">


  <?php

  if ( $_SESSION['tipouser'] == 1) {



    ?>
    <li class="header">Menu</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="starter.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li class="active"><a href="profile.php?id=<?php echo $_SESSION['iduser']?>"><i class="fa fa-user"></i> <span><?php echo utf8_encode($_SESSION['fullname']); ?></span></a></li>


    <li class="treeview">

      <a href="#"><i class="fa fa-shopping-cart"></i> <span>Compras</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="compras.php"><i class="fa fa-file-o"></i>Procedimento</a></li>
        <li><a href="list-its.php?id=7"><i class="fa fa-file-o"></i>Instruções de Trabalho</a></li>
      </ul>

    </li>

    <li class="treeview">
    
      <a href="#"><i class="fa fa-euro"></i> <span>Comercial & Vendas</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="comercialvendas.php"><i class="fa fa-file-o"></i>Procedimento</a></li>
        <li><a href="list-its.php?id=5"><i class="fa fa-file-o"></i>Instruções de Trabalho</a></li>
      </ul>

    </li>

    <li class="treeview">
      <a href="#"><i class="fa fa-cogs"></i> <span>Produção</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="producao.php"><i class="fa fa-file-o"></i>Procedimento</a></li>
        <li><a href="list-its.php?id=3"><i class="fa fa-file-o"></i>Instruções de Trabalho</a></li>
      </ul>
    </li> 


    <li class="treeview">
    
      <a href="#"><i class="fa fa-bank"></i> <span>Gestão</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="gestao.php"><i class="fa fa-file-o"></i>Procedimento</a></li>
        <li><a href="list-its.php?id=1"><i class="fa fa-file-o"></i>Instruções de Trabalho</a></li>
      </ul>

    </li>
    
    <li class="treeview">

      <a href="#"><i class="fa fa-users"></i> <span>Recursos Humanos</span> <i class="fa fa-angle-left pull-right"></i></a>
       <ul class="treeview-menu">
        <li><a href="rh.php"><i class="fa fa-file-o"></i>Procedimento</a></li>
        <li><a href="list-its.php?id=10"><i class="fa fa-file-o"></i>Instruções de Trabalho</a></li>
      </ul>

    </li>

    <li class="treeview">

      <a href="#"><i class="fa fa-legal"></i> <span>Auditorias</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="auditorias.php"><i class="fa fa-file-o"></i>Procedimento</a></li>
        <li><a href="list-its.php?id=9"><i class="fa fa-file-o"></i>Instruções de Trabalho</a></li>
      </ul>

    </li>

    <li>

      <a href="#"><i class="fa fa-file-o"></i> <span>Ocorrências</span> <i class="fa fa-angle-left pull-right"></i></a>
       <ul class="treeview-menu">
        <li><a href="ocorrencias.php"><i class="fa fa-file-o"></i>Procedimento</a></li>
        <li><a href="list-its.php?id=8"><i class="fa fa-file-o"></i>Instruções de Trabalho</a></li>
      </ul>
    </li>


    <li class="treeview">
      <a href="#"><i class="fa fa-files-o"></i> <span>Recursos Patrimoniais</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="manutencoes.php"><i class="fa fa-file-o"></i>Manutenção</a></li>
      </ul>
    </li> 



    <li><a href="controlodocumental.php"><i class="fa fa-file-o"></i> <span>Controlo Documental</span></a></li>


    <li class="treeview active">
      <a href="#"><i class="fa fa-files-o"></i> <span>Ferramentas</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="nova-it.php"><i class="fa fa-file-o"></i>Inserir IT</a></li>
      </ul>

      <ul class="treeview-menu">
        <li><a href="revisao.php"><i class="fa fa-eye"></i><span>Revisão de Procedimentos</span></a></li>
      </ul>
      <ul class="treeview-menu">
        <?php

        $itsEdicao = "SELECT * FROM tbl_its WHERE tbl_estados_revisao_id_estado_revisao = 1";
        $resultItsEdicao = mysqli_query($link, $itsEdicao);
        $nItsEdicao=mysqli_num_rows($resultItsEdicao);

        $itsAprovacao = "SELECT * FROM tbl_its WHERE tbl_estados_revisao_id_estado_revisao = 2";
        $resultItsAprovacao = mysqli_query($link, $itsAprovacao);
        $nItsAprovacao=mysqli_num_rows($resultItsAprovacao);

        $itsValidacao = "SELECT * FROM tbl_its WHERE tbl_estados_revisao_id_estado_revisao = 3";
        $resultItsValidacao = mysqli_query($link, $itsValidacao);
        $nItsValidacao=mysqli_num_rows($resultItsValidacao);


        ?>
        <li>
          <a href="revisao-geral.php"><i class="fa fa-eye"></i>
            <span>Revisão de Its</span>
            <span class="pull-right">
              <small class="label bg-green"><?php echo $nItsEdicao; ?></small>
              <small class="label bg-yellow"><?php echo $nItsAprovacao; ?></small>
              <small class="label bg-red"><?php echo $nItsValidacao; ?></small></span> </a> 

            </li>
            <li><a href="table-control-docs.php"><i class="fa fa-table"></i> <span>Tabela Control Doc</span></a></li>

          </ul>
        </li> 


      </ul><!-- /.sidebar-menu -->




      <?php }


      if ( $_SESSION['tipouser'] == 3 ){
        ?>



        <ul class="sidebar-menu">
          <li class="header">Menu</li>
          <li class="treeview">
            <a href="#"><i class="fa fa-files-o"></i> <span>Recursos Patrimoniais</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="manutencoes.php"><i class="fa fa-file-o"></i>Manutenção</a></li>
            </ul>
          </li> 

        </li> 
      </ul><!-- /.sidebar-menu -->
      <?php
    }
    ?>


    <?php
    ?>


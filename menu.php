<?php 
?>
<ul class="sidebar-menu">
          

          <?php

            if ( $_SESSION['tipouser'] == 1) {
            
            

          ?>
          <li class="header">Menu</li>
          <!-- Optionally, you can add icons to the links -->
          <li class="active"><a href="starter.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

          <li><a href="compras.php"><i class="fa fa-shopping-cart"></i> <span>Compras</span></a></li>

          <li><a href="comercialvendas.php"><i class="fa fa-euro"></i> <span>Comercial & Vendas</span></a></li>

          <li><a href="producao.php"><i class="fa fa-cogs"></i> <span>Produção</span></a></li>

          <li><a href="gestao.php"><i class="fa fa-bank"></i> <span>Gestão</span></a></li>

          <li><a href="auditorias.php"><i class="fa fa-legal"></i> <span>Auditorias</span></a></li>

          <li><a href="ocorrencias.php"><i class="fa fa-file-o"></i> <span>Ocorrências</span></a></li>

          <li class="treeview">
            <a href="#"><i class="fa fa-files-o"></i> <span>Recursos Patrimoniais</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="manutencoes.php"><i class="fa fa-file-o"></i>Manutenção</a></li>
            </ul>
          </li> 
         <!--  <li><a href="controlodocumental.php"><i class="fa fa-file-o"></i> <span>Controlo Documental</span></a></li>

          <li><a href="recursospatrimoniais.php"><i class="fa fa-file-o"></i> <span>Recursos Patrimoniais</span></a></li>

          <li><a href="projecto.php"><i class="fa fa-file-o"></i> <span>Projecto</span></a></li>

          <li><a href="recursoshumanos.php"><i class="fa fa-file-o"></i> <span>Recursos Humanos</span></a></li> -->

			

		<!-- code to create sub menu levels -->
           <li class="treeview">
            <a href="#"><i class="fa fa-files-o"></i> <span>Controlo Docs</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="controlodocumental.php"><i class="fa fa-file-o"></i>Controlo Documental</a></li>
              <li><a href="#"><i class="fa fa-balance-scale"></i>Legislação Aplicada</a></li>
               <li><a href="obscontroldocs.php"><i class="fa fa-balance-scale"></i>Obsoletos</a></li>
            </ul>
          </li> 
<!--           <li><a href="aprovacoesgeral.php"><i class="fa fa-file-o"></i> <span>Aprovações</span></a></li>
 -->

          <!-- code to menu revisao -->

           <li class="treeview">

            <a href="#"><i class="fa fa-eye"></i> <span>Revisão de Sistema</span> <i class="fa fa-angle-left pull-right"></i></a>
           
            <ul class="treeview-menu">
              
              <li><a href="revisaoedicoes.php"><i class="fa fa-file-o"></i>Edição</a></li>
              <li><a href="revisaoaprovacoes.php"><i class="fa fa-files-o"></i>Aprovação</a></li>
              <li><a href="revisaovalidacoes.php"><i class="fa fa-files-o"></i>Validação</a></li>

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


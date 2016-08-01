<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


// code to update method of Managment Procedure.

if (isset($_POST['submit'])) {
  # code...
  //echo "the form was clicked";

  // get the version pusblished


  $queryVersionPublished = "SELECT * FROM tbl_versoes_metodos WHERE publicado = 1";
  $resultVersionPublished = mysqli_query($link,$queryVersionPublished);

  $versionId = mysqli_fetch_assoc($resultVersionPublished);

  //echo implode(" ",$versionId)."<br>";

  //echo "e o id da versao publicada é o seguinte: ".$versionId[1];
  
  //get the first element of the array, which correponds to the version published id.

  $idPublished = reset($versionId);

  $queryActividadesPublicadas = "SELECT tbl_actividades_id_actividade FROM tbl_actividades_has_tbl_versoes WHERE tbl_versoes_id_versao = '$idPublished'";
  $resultQueryActividadesPublicadas = mysqli_query($link,$queryActividadesPublicadas);

  while ($rowActividadesPublicadas = mysqli_fetch_object($resultQueryActividadesPublicadas)){

    $idActividadePublicada = $rowActividadesPublicadas->tbl_actividades_id_actividade;

    $querySelectActividadesParaComparar = "SELECT * FROM tbl_actividades WHERE id_actividade = '$idActividadePublicada' ";

    $resultSelectActividadesParaComparar = mysqli_query($link,$querySelectActividadesParaComparar);

    while ($rowSelectActividadesParaComparar = mysqli_fetch_object($resultSelectActividadesParaComparar)){

      $changes = false;

      $idActividadeParaComparar = $rowSelectActividadesParaComparar->id_actividade;
      

      //save the data inserted on textfiedls

      $descActividade = $_POST[$idActividadeParaComparar.'descactividade'];
      $obsActividade = $_POST[$idActividadeParaComparar.'obsactividade'];
      $versaoEmVigor = $_POST[$idActividadeParaComparar.'versaoemvigor'];
      $dataUltimaAtualizacao = $_POST[$idActividadeParaComparar.'dataultimaatualizacao'];
      $instrucoesTrabalho = $_POST[$idActividadeParaComparar.'instrucoestrabalho'];
      $versaoVigor2 = $_POST[$idActividadeParaComparar.'versaovigor2'];
      $dataUltimaAtualizacao2 = $_POST[$idActividadeParaComparar.'dataultimaatualizacao2'];
      $modelosAssociados = $_POST[$idActividadeParaComparar.'modelosassociados'];
      $sgs9001 = $_POST[$idActividadeParaComparar.'sgs9001'];
      $pefc = $_POST[$idActividadeParaComparar.'pefc'];
      $fsc = $_POST[$idActividadeParaComparar.'fsc'];
        
      // echo "actividade passada por post:" .$descActividade."<br>";
      // echo "actividade da BD para comparar: ".$rowSelectActividadesParaComparar->desc_actividade."<br>"; 
      //echo utf8_encode($rowSelectActividadesParaComparar->obs_actividade)."<br>";
      //comparar a coluna observaçoes da Actividade - campo da BD é desc_actividade.

      
     /* if ($descActividade != utf8_encode($rowSelectActividadesParaComparar->desc_actividade)){
        echo "a descriçao da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($obsActividade != utf8_encode($rowSelectActividadesParaComparar->obs_actividade)){
        echo "a observacao da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($versaoEmVigor != utf8_encode($rowSelectActividadesParaComparar->versao_em_vigor)){
        echo "a versao em vigor da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($dataUltimaAtualizacao != utf8_encode($rowSelectActividadesParaComparar->data_ultima_atualizacao)){
        echo "a data da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($instrucoesTrabalho != utf8_encode($rowSelectActividadesParaComparar->instrucoes_trabalho)){
        echo "a instrucoes de trabalho da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($versaoVigor2 != utf8_encode($rowSelectActividadesParaComparar->versao_vigor_2)){
        echo "a versao em vigor 2 da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($dataUltimaAtualizacao2 != utf8_encode($rowSelectActividadesParaComparar->data_ultima_atualizacao2)){
        echo "a data 2 da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($modelosAssociados != utf8_encode($rowSelectActividadesParaComparar->modelos_associados)){
        echo "modelos associados da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($sgs9001 != utf8_encode($rowSelectActividadesParaComparar->sgs9001)){
        echo "a sgs9001 da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($pefc != utf8_encode($rowSelectActividadesParaComparar->PEFC)){
        echo "a pefc da actividade foi modificada.<br>";
        $changes = true;
      }
      if ($fsc != utf8_encode($rowSelectActividadesParaComparar->FSC)){
        echo "a fsc da actividade foi modificada.<br>";
        $changes = true;
      }
 */




      if ($changes) {
        # code...
        //codigo para inserir todos os campos da actividade como uma nova activididade.
        //get all data from POST with the activity ID.
        print_r("aqui sera executado o codigo de inserçao de novas actividades juntamnete com a nova versao.")
      }
    }


  }

  
}


?>







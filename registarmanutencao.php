<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();



if (isset($_POST['equipamento'])) {


  $formEquipamento = $_POST['equipamento']; // OK



  $formContadorPrints = $_POST['contadorprints']; // OK
  
  if (isset($_POST['tipoManutencao'])) {  
    $formTipoManutencao= $_POST['tipoManutencao']; //OK
  }

  $formDescProblema = utf8_decode($_POST['descProblema']);//OK
  
  if (isset($_POST['descIntervencao'])) {
    $formDescIntervencao = utf8_decode($_POST['descIntervencao']);//OK
  }

  if (isset($_POST['internaExterna'])) {  
    $formInternaExterna = $_POST['internaExterna'];//OK
  }

  $formDataPrevista = $_POST['dataprevista'];//OK
  $formDataRealizacao = $_POST['datarealizacao'];//OK
  $formHoraRealizacao = $_POST['horarealizacao'];//OK
  $formCustosField = $_POST['custosField'];//OK
  $formObservacoesField = utf8_decode($_POST['observacoesField']);//OK


  //get user if from SESSION VAR 
  $iduserlogado = $_SESSION['iduser'];


  //get the equipment ID to insert in tbl_manutencoes

  $query2 = "SELECT id_equipamento FROM tbl_equipamentos WHERE id_equipamento LIKE '$formEquipamento'";
  
  $resultQuery2 = mysqli_query($link, $query2);

  if (mysqli_num_rows($resultQuery2) >= 1) {

    while ($rowQuery2 = mysqli_fetch_object($resultQuery2)) {

      $idEquipamentoManutencao = $rowQuery2->id_equipamento;

    }
  }

  $insertManutencao = "INSERT INTO tbl_manutencoes (contador_equipamento, tipo_manutencao, interna_ou_externa, problema, desc_intervencao, data_prevista_preventiva, data_realizacao, hora_realizacao, custos, observacoes, tbl_equipamentos_id_equipamento, tbl_users_id_user) VALUES ('$formContadorPrints','$formTipoManutencao','$formInternaExterna','$formDescProblema','$formDescIntervencao','$formDataPrevista','$formDataRealizacao','$formHoraRealizacao','$formCustosField','$formObservacoesField','$idEquipamentoManutencao','$iduserlogado')";

    //inseriu na tbl_manutencoes da base de dados com successo.
  
  $insertResult = mysqli_query($link,$insertManutencao);

  $success = true;



  //get the last ID inserted on the DB




  //varialvel result
  $result = " <tr>
              <td><a href='#'>".utf8_encode($formEquipamento)."</a></td>
               <td>".utf8_encode($formContadorPrints)."</td>
              <td>".utf8_encode($formTipoManutencao)."</td>
               <td>".utf8_encode($formInternaExterna)."</td>
              <td>".utf8_encode($formDescIntervencao)."</td>
            <td>".utf8_encode($formDataPrevista)."</td>
               <td>".utf8_encode($formDataRealizacao)."</td>
               <td>".utf8_encode($formHoraRealizacao)."</td>
              <td>".utf8_encode($formCustosField)."</td>
               <td>".utf8_encode($formObservacoesField)."</td>
              <td>".utf8_encode($idEquipamentoManutencao)."</td>
            </tr>";

            echo $result;
           

}
else{
  $error = true;
}


?>







<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$idMan = $_GET['id'];


//post method is working 

// echo $_POST['equipamento']; 

// $equipamentoRecebido = $_POST['equipamento'];

// echo "<br>o equipamento recebido foi: ".$equipamentoRecebido;

if (isset($_POST['equipamento'])) {


  $formEquipamento = $_POST['equipamento']; // OK


  $formContadorPrints = utf8_decode(($_POST['contadorprints'])); // OK
  
  if (isset($_POST['tipoManutencao'])) {  
    $formTipoManutencao= $_POST['tipoManutencao']; //OK
  }

  $formDescProblema = utf8_decode($_POST['descProblema']);//OK
  
  if (isset($_POST['descIntervencao'])) {
    $formDescIntervencao = utf8_decode($_POST['descIntervencao']);//OK
  }
  
  $formInternaExterna = $_POST['internaExterna'];//OK

  $formDataPrevista = $_POST['dataprevista'];//OK
  $formDataRealizacao = $_POST['datarealizacao'];//OK
  // $formHoraRealizacao = $_POST['horarealizacao'];//OK
  $formCustosField = $_POST['custosField'];//OK
  $formObservacoesField = utf8_decode(($_POST['observacoesField']));//OK


  //get user if from SESSION VAR 
  $iduserlogado = $_SESSION['iduser'];

  //query to update the data of the #number manuntencao
  $updateManutencao = "UPDATE tbl_manutencoes SET contador_equipamento = '$formContadorPrints', tipo_manutencao = '$formTipoManutencao', interna_ou_externa = '$formInternaExterna', problema = '$formDescProblema', desc_intervencao = '$formDescIntervencao', data_prevista_preventiva = '$formDataPrevista', data_realizacao = '$formDataRealizacao', custos = '$formCustosField', observacoes = '$formObservacoesField' WHERE id_manutencao = '$idMan'";
  
  //code to execute the update query $updateManutencao
   $updateResult = mysqli_query($link,$updateManutencao);


  header('location: manutencoes.php');
// echo "correu bem...";




  //varialvel result
  /*$result = " <tr>
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

            echo $result;*/
           

}
else{
  echo "existiu um erro. manutencao nao atualizda devido.";
  $error = true;
}


?>







<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$idrostoedicao = $_GET['id'];
$values = array_values($_POST);

$objectivoprocedimento = $_POST['objectivoprocedimento'];
$ambitoprocedimento = $_POST['ambitoprocedimento'];
$entradas = $_POST['entradas'];
$saidas = $_POST['saidas'];
$indicadores = $_POST['indicadores'];
$acompanhamento = $_POST['acompanhamento'];
$avaliacaomedicao = $_POST['avaliacaomedicao'];

// new code using ckeditor
//$metodo = $_POST['control-doc-metodo-matriz'];

$getIdProcedimento = "SELECT * FROM tbl_rostos WHERE id_rosto = '$idrostoedicao'";

	$resultGetIdProcedimento = mysqli_query($link, $getIdProcedimento);

	while ($rowIdProcedimento = mysqli_fetch_object($resultGetIdProcedimento)){

		$idprocedimento = $rowIdProcedimento->tbl_procedimentos_id_procedimento;

	}

if ($_POST['action'] == "toAprove"){
	

	// begin - code to submit to aprove

	$estadoAprovado = 1;

	$updateEstadoAprovacao = "UPDATE tbl_versoes_rostos SET aprovado_versao_rosto = '$estadoAprovado' WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

	$resultUpdateEstadoAprovacao = mysqli_query($link, $updateEstadoAprovacao);

	// end - code to submit to aprove

	//add here the correct URL.
		$url = "revisao.php";

		header('location: '.$url);

}
if ($_POST['action'] == "toClose"){

	header('location: revisao.php');

}


else{

	// begin - code to update/save rosto 

	$saveedicaorosto = "UPDATE tbl_rostos SET objectivo_procedimento = '$objectivoprocedimento', ambito_procedimento = '$ambitoprocedimento', entradas = '$entradas', saidas = '$saidas', indicadores = '$indicadores', acompanhamento = '$acompanhamento', avaliacao_e_medicao = '$avaliacaomedicao' WHERE id_rosto = '$idrostoedicao'";

	$resultsaveedicaorosto = mysqli_query($link,$saveedicaorosto);

	// begin - code to update all method fields on db

	/* -------------------------- ETAPA 3 - BEGIN ------------------------------ >*/
    $contArray = 0;
    $actividadeArray = array();

        echo "<table style='border:1px solid;'>";
        foreach ($_POST as $key => $value) {

			$keys = array_keys($_POST);
			//var_dump($keys);

			if ( $contArray > 6) {

				$subProcessoStringCheck = "subprocesso";

				if (strpos($key, $subProcessoStringCheck) !== false) {

					//echo "o sub processo encontrado foi o seguinte: ".$key;

                    // extract the numbers where is the sub process id - using preg_replace
                    $idSubProcesso = preg_replace("/[^0-9]/","",$key);
					//echo "<b>o meu sub processo tem o seguinte id:</b>". $idSubProcesso;
					$nomeSubProcesso = $_POST[$key];

					echo "o novo nome do subprocesso é: " . $nomeSubProcesso . " ------------------------------------------------------------------------- <br>";

					// preciso do id do sub processo que esta a ser atualizado
					//$lastIdRostoInserted = 0;
					// 3.1 query aqui para atualizar sub processo - atenção à chave estrangeira do rosto
					$updateSubProcesso = "UPDATE tbl_sub_processos SET nome_sub_processo = '$nomeSubProcesso' WHERE id_sub_processo = '$idSubProcesso'";
					//$queryInsertSubProcesso = "INSERT INTO tbl_sub_processos (nome_sub_processo, tbl_rostos_id_rosto) VALUES ('$nomeSubProcesso','$lastIdRostoInserted')";
					$ResultUpdateSubProcesso = mysqli_query($link,$updateSubProcesso);

					// 3.2 check last if of sub processo inserted
					$lastIdSubProcesso = mysqli_insert_id($link);
				}
				// 3.3

				//recepcao dos dados para inserir a actividade
				$nomeActividadeStringCheck = "nomeactividade";
				if (strpos($key, $nomeActividadeStringCheck) !== false) {

                    $idActividade = preg_replace("/[^0-9]/","",$key);
					$newNomeActividade = $value;
					//echo "<b>O novo nome da actividade é:</b> ".$newNomeActividade."<br>";
					$actividadeArray[0] = $newNomeActividade;
//                        array_push($actividadeArray, $newNomeActividade);
					//echo "o meu array : ". print_r($actividadeArray);
				}


				$descricaoActividadeStringCheck = "descricaoactividade";
				if (strpos($key, $descricaoActividadeStringCheck) !== false) {
					$newDescricaoActividade = $value;
					//echo "<b>A nova descrição da actividade é: </b>".$newDescricaoActividade . "<br>";
					$actividadeArray[1] = $newDescricaoActividade;
					//array_push($actividadeArray, $newDescricaoActividade);
				}

				$observacaoActividadeStringCheck = "observacaoactividade";
				if (strpos($key, $observacaoActividadeStringCheck) !== false) {
					$newObservacaoActividade = $_POST[$key];
					//echo "<b>A nova observacao é: </b> ".$newObservacaoActividade . "<br>";
					$actividadeArray[2] = $newObservacaoActividade;
					array_push($actividadeArray, $newObservacaoActividade);
				}

				$c90012008IdActActividadeStringCheck = "c90012008IdAct";
				if (strpos($key, $c90012008IdActActividadeStringCheck) !== false) {
					$newc90012008IdActActividade = $_POST[$key];
					//echo "<b>valor da 9001:2008 é: </b>".$newc90012008IdActActividade . "<br>";
					$actividadeArray[3] = $newc90012008IdActActividade;
					//array_push($actividadeArray, $newc90012008IdActActividade);
				}

				$c90012015IdActActividadeStringCheck = "c90012015IdAct";
				if (strpos($key, $c90012015IdActActividadeStringCheck) !== false) {
					$newc90012015IdActActividade = $_POST[$key];
					//echo "<b>O vlaor da 9001:2015 é: </b>".$newc90012015IdActActividade . "<br>";
					$actividadeArray[4] = $newc90012015IdActActividade;
					//array_push($actividadeArray, $newc90012015IdActActividade);
				}


				$fscIdActActividadeStringCheck = "fscIdAct";
				if (strpos($key, $fscIdActActividadeStringCheck) !== false) {
					$newfscIdActActividade = $_POST[$key];
					//echo "<b>O valor da fsc é: </b>".$newfscIdActActividade . "<br>";
					$actividadeArray[5] = $newfscIdActActividade;
					//array_push($actividadeArray, $newfscIdActActividade);
				}

				$pefcIdActActividadeStringCheck = "pefcIdAct";
				if (strpos($key, $pefcIdActActividadeStringCheck) !== false) {
					$newpefcIdActActividade = $_POST[$key];
					//echo "<b>O valor da pefc é: </b>".$newpefcIdActActividade . "<br>";
					$actividadeArray[6] = $newpefcIdActActividade;
					// array_push($actividadeArray, $newpefcIdActActividade);
				}


				$numElementosArray = count($actividadeArray);

				if ($numElementosArray == 7) {

					//echo "<br>" . $numElementosArray . "<br>";
					echo "<br><br>";
					echo "o ultimo sub processo inserido foi o: ".$lastIdSubProcesso."<br>";
					echo "posicao 0 do actividadearray: ".$actividadeArray[0]."<br>";
					echo "posicao 1 do actividadearray: ".$actividadeArray[1]."<br>";
					echo "posicao 2 do actividadearray: ".$actividadeArray[2]."<br>";
					echo "posicao 3 do actividadearray: ".$actividadeArray[3]."<br>";
					echo "posicao 4 do actividadearray: ".$actividadeArray[4]."<br>";
					echo "posicao 5 do actividadearray: ".$actividadeArray[5]."<br>";
					echo "posicao 6 do actividadearray: ".$actividadeArray[6]."<br>";



//                    $updateSubProcesso = "UPDATE tbl_sub_processos SET nome_sub_processo = '$nomeSubProcesso' WHERE id_sub_processo = '$idSubProcesso'";

                    // query to update the activity
                    $queryUpdateActividade = "UPDATE tbl_actividades SET nome_actividade = '$actividadeArray[0]', descricao_actividade = '$actividadeArray[1]', observacao_actividade = '$actividadeArray[2]', c9001_2008 = '$actividadeArray[3]', c9001_2015 = '$actividadeArray[4]',
                                                fsc = '$actividadeArray[5]', pefc = '$actividadeArray[6]', tbl_sub_processos_id_sub_processo = '$idSubProcesso' WHERE id_actividade = '$idActividade'";

                    $resultUpdateActividade = mysqli_query($link,$queryUpdateActividade);
					// query para inserir nova actividade com os dados recolhidos
					//$queryInsertActividade = "INSERT INTO tbl_actividades (nome_actividade, descricao_actividade, observacao_actividade, c9001_2008, c9001_2015, fsc, pefc, tbl_sub_processos_id_sub_processo)
                      //            VALUES ('$actividadeArray[0]', '$actividadeArray[1]', '$actividadeArray[2]', '$actividadeArray[3]', '$actividadeArray[4]', '$actividadeArray[5]','$actividadeArray[6]', '$lastIdSubProcesso')";

					//echo $queryInsertActividade;
					//$resultInsertActividade = mysqli_query($link,$queryInsertActividade);

					$actividadeArray=[];


				}


				//$actividadeArray =[];

				/*
                                    echo "<tr style='border:1px solid;'>";
                                    echo "<td style='border:1px solid;'>";
                                    echo "<b>key: " . $key;
                                    echo "</td>";
                                    echo "<td style='border:1px solid;'>";
                                    echo $value;
                                    echo "</td>";
                                    echo "</tr>";*/
			}

			$contArray++;
		}

    echo "</table>";

    /* -------------------------- ETAPA 3 - END ------------------------------ >*/

	
	// end - code to update all method fields on db




	

	//add here the correct URL.
	$url = "viewedicaorosto.php?idrosto=".$idrostoedicao."&idprocedimento=".$idprocedimento;

	header('location: '.$url);

	// end - code to update/save rosto
}



?>






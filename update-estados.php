<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$idrostoedicao = $_GET['id'];
$values = array_values($_POST);
/*
$objectivoprocedimento = $_POST['objectivoprocedimento'];
$ambitoprocedimento = $_POST['ambitoprocedimento'];
$entradas = $_POST['entradas'];
$saidas = $_POST['saidas'];
$indicadores = $_POST['indicadores'];
$acompanhamento = $_POST['acompanhamento'];
$avaliacaomedicao = $_POST['avaliacaomedicao'];

// new code using ckeditor
$metodo = $_POST['control-doc-metodo-matriz'];
*/
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


if ($_POST['action'] == "toAprove"){
	

			// begin - code to submit to aprove

			$estadoAprovado = 1;

			$updateEstadoAprovacao = "UPDATE tbl_versoes_rostos SET validado_versao_rosto = '$estadoAprovado' WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

			$resultUpdateEstadoAprovacao = mysqli_query($link, $updateEstadoAprovacao);

			// end - code to submit to aprove

			//add here the correct URL.
				$url = "revisao.php";

				header('location: revisao.php');

}


if ($_POST['action'] == "toEdit") {

			// send to edit

			$toEdit = "UPDATE tbl_versoes_rostos SET aprovado_versao_rosto = 0, publicado_versao_rosto = 0 WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

			$resultToEdit = mysqli_query($link,$toEdit);	

			//$url = "viewedicaorosto.php?idrosto=".$idrostoedicao."&idprocedimento=".$idprocedimento;

			header('location: revisao.php');


}


if ($_POST['action'] == "toValidate"){

	$toValidate = "UPDATE tbl_versoes_rostos SET aprovado_versao_rosto = 1, publicado_versao_rosto = 0, validado_versao_rosto = 0 WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

	$resultToEdit = mysqli_query($link,$toValidate);

	//$url = "viewedicaorosto.php?idrosto=".$idrostoedicao."&idprocedimento=".$idprocedimento;

	header('location:revisao.php');

}


if ($_POST['action'] == "toPublish"){

	$getIdPublished = "SELECT * FROM tbl_rostos INNER JOIN tbl_versoes_rostos ON tbl_versoes_rostos.tbl_rostos_id_rosto = tbl_rostos.id_rosto WHERE publicado_versao_rosto = 1 AND tbl_procedimentos_id_procedimento = '$idprocedimento'";

$resultGetIdPublished = mysqli_query($link,$getIdPublished);

while ($rowGetIdPublished = mysqli_fetch_object($resultGetIdPublished)) {

	$idToChange = $rowGetIdPublished->id_versao_rosto;

}

// remove published status of old rosto

	$notPublish = 0;
	$historyStatus = 1;

	$changeOldPublished = "UPDATE tbl_versoes_rostos SET publicado_versao_rosto = '$notPublish', historico_versao_rosto = '$historyStatus' WHERE id_versao_rosto = '$idToChange'";

	$resultChangeOldPublished = mysqli_query($link,$changeOldPublished);




// publish new rosto

	$publishNewRosto = "UPDATE tbl_versoes_rostos SET publicado_versao_rosto = 1 WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

	$resultPublishNewRosto = mysqli_query($link,$publishNewRosto);


	header('location: controlodocumental.php');

}

?>
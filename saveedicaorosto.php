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
	$url = "revisaoaprovacoes.php";

	header('location: '.$url);

}



else{

	// begin - code to update/save rosto 

	$saveedicaorosto = "UPDATE tbl_rostos SET objectivo_procedimento = '$objectivoprocedimento', ambito_procedimento = '$ambitoprocedimento', entradas = '$entradas', saidas = '$saidas', indicadores = '$indicadores', acompanhamento = '$acompanhamento', avaliacao_e_medicao = '$avaliacaomedicao' WHERE id_rosto = '$idrostoedicao'";

	$resultsaveedicaorosto = mysqli_query($link,$saveedicaorosto);


	

	//add here the correct URL.
	$url = "viewedicaorosto.php?idrosto=".$idrostoedicao."&idprocedimento=".$idprocedimento;

	header('location: '.$url);

	// end - code to update/save rosto
}



?>






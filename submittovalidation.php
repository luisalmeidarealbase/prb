<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$idrostoedicao = $_GET['id'];
$values = array_values($_POST);


$getIdProcedimento = "SELECT * FROM tbl_rostos WHERE id_rosto = '$idrostoedicao'";

$resultGetIdProcedimento = mysqli_query($link, $getIdProcedimento);

while ($rowIdProcedimento = mysqli_fetch_object($resultGetIdProcedimento)){

	$idprocedimento = $rowIdProcedimento->tbl_procedimentos_id_procedimento;

}


if ($_POST['action'] == "toAprove"){

	$validadoTrue = 1;

	$submitToValidation = "UPDATE tbl_versoes_rostos SET validado_versao_rosto = '$validadoTrue' WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

	$resultSubmitToValidation = mysqli_query($link,$submitToValidation);

//add here the correct URL.
	$url = "viewedicaorosto.php?idrosto=".$idrostoedicao."&idprocedimento=".$idprocedimento;

	header('location:revisao.php');

}

if ($_POST['action'] == "toEdit") {

	// send to edit

	$toEdit = "UPDATE tbl_versoes_rostos SET aprovado_versao_rosto = 0, publicado_versao_rosto = 0 WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

	$resultToEdit = mysqli_query($link,$toEdit);

	//$url = "viewedicaorosto.php?idrosto=".$idrostoedicao."&idprocedimento=".$idprocedimento;

	header('location:revisao.php');


}

?>

<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$idrostoedicao = $_GET['id'];
$idprocedimento = $_GET['idprocedimento'];

// new comment

//chupamos

// get the old published 

$getIdPublished = "SELECT * FROM tbl_rostos INNER JOIN tbl_versoes_rostos ON tbl_versoes_rostos.tbl_rostos_id_rosto = tbl_rostos.id_rosto WHERE publicado_versao_rosto = 1 AND tbl_procedimentos_id_procedimento = '$idprocedimento'";

$resultGetIdPublished = mysqli_query($link,$getIdPublished);

while ($rowGetIdPublished = mysqli_fetch_object($resultGetIdPublished)) {

	$idToChange = $rowGetIdPublished->id_versao_rosto;

}



if ($_POST['action'] == "toAprove"){

// remove published status of old rosto

	$notPublish = 0;

	$changeOldPublished = "UPDATE tbl_versoes_rostos SET publicado_versao_rosto = '$notPublish' WHERE id_versao_rosto = '$idToChange'";

	$resultChangeOldPublished = mysqli_query($link,$changeOldPublished);




// publish new rosto

	$publishNewRosto = "UPDATE tbl_versoes_rostos SET publicado_versao_rosto = 1 WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

	$resultPublishNewRosto = mysqli_query($link,$publishNewRosto);


	$getCodeProc = "Select codigo FROM tbl_control_docs WHERE tipo_documento = 'Procedimento' AND procedimento = 'controlodoc'";

	$resultCodeProc = myqli_query($link, $getCodeProc);

	while ($rowNewCode = mysqli_fecth_object($resultCodeProc)) {
		$codigo = $rowNewCode->codigo;
	}

	$versao = substr($codigo,-2);

	$novaVersao = (int)$versao + 1;

	$novaVersao = "0".$novaVersao;


	$novoCodigo = str_replace($versao, $novaVersao, $codigo);

	$updateProcTableControlDoc = "UPDATE tbl_control_docs SET codigo = '$novoCodigo' WHERE procedimento = 'controlodoc' AND tipo_documento = 'Procedimento'";

	$resultUpdateProcTableControlDoc = myqli_query($link,$updateProcTableControlDoc);

	$updateTableProc = "UPDATE tbl_procedimentos SET versao_vigor = '$novoCodigo' WHERE id_procedimento = 2";

	$resultUpdateTableProc = mysqli_query($link,$updateTableProc);


	header('location: controlodocumental.php');

}

if ($_POST['action'] == "toValidate"){

	$toValidate = "UPDATE tbl_versoes_rostos SET aprovado_versao_rosto = 1, publicado_versao_rosto = 0, validado_versao_rosto = 0 WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

	$resultToEdit = mysqli_query($link,$toValidate);

	//$url = "viewedicaorosto.php?idrosto=".$idrostoedicao."&idprocedimento=".$idprocedimento;

	header('location:revisao.php');

}
?>

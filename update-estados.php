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

	if ($idprocedimento == 2) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'controlodoc' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'controlodoc' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 2";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}

	if ($idprocedimento == 3) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'producao' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'producao' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 3";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}

	if ($idprocedimento == 10) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'rechumanos' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'rechumanos' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 10";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}

	if ($idprocedimento == 1) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'gestao' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'gestao' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 1";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}

	if ($idprocedimento == 9) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'auditorias' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'auditorias' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 9";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}

	if ($idprocedimento == 7) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'compras' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'compras' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 7";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}

	if ($idprocedimento == 5) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comevendas' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'comevendas' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 5";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}

	if ($idprocedimento == 4) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'comit' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'comit' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 4";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}

	if ($idprocedimento == 8) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'ocorrenciastratamentos' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'ocorrenciastratamentos' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 8";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}

	if ($idprocedimento == 6) {
			
			# code to update versions ...
			$getVersionToChange = "SELECT * FROM tbl_control_docs WHERE procedimento = 'recpatrimoniais' AND tipo_documento = 'Procedimento'";
			$resultGetVersionToChange = mysqli_query($link,$getVersionToChange);

			while ($rowGetVersionToChange = mysqli_fetch_object($resultGetVersionToChange)){
				$oldCodigo = $rowGetVersionToChange->codigo;
				$oldVersion = $rowGetVersionToChange->versao;
			} 

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);

			$updateProcTableControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE procedimento = 'recpatrimoniais' AND tipo_documento = 'Procedimento'";
			$resultUpdateProcTableControlDoc = mysqli_query($link,$updateProcTableControlDoc);

			$concatenacao = $oldCodigo . "-" . $newVersion;

			$updateTableProcedimentos = "UPDATE tbl_procedimentos SET versao_vigor = '$concatenacao' WHERE id_procedimento = 6";
			$resultUpdateTableProcedimentos = mysqli_query($link,$updateTableProcedimentos);

	}



	// remove published status of old rosto

	$notPublish = 0;
	$historyStatus = 1;

	$changeOldPublished = "UPDATE tbl_versoes_rostos SET publicado_versao_rosto = '$notPublish', historico_versao_rosto = '$historyStatus' WHERE id_versao_rosto = '$idToChange'";

	$resultChangeOldPublished = mysqli_query($link,$changeOldPublished);


	// publish new rosto

	$publishNewRosto = "UPDATE tbl_versoes_rostos SET publicado_versao_rosto = 1 WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

	$resultPublishNewRosto = mysqli_query($link,$publishNewRosto);

	if ($idprocedimento == 2) {
		# code...
		header('location: controlodocumental.php');
	}

	if ($idprocedimento == 3) {
		# code...
		header('location: producao.php');
	}

	if ($idprocedimento == 10) {
		# code...
		header('location: rh.php');
	}
	if ($idprocedimento == 1) {
		# code...
		header('location: gestao.php');
	}
	if ($idprocedimento == 9) {
		# code...
		header('location: auditorias.php');
	}
	if ($idprocedimento == 7) {
		# code...
		header('location: compras.php');
	}
	if ($idprocedimento == 5) {
		# code...
		header('location: comevendas.php');
	}
	if ($idprocedimento == 4) {
		# code...
		header('location: comit.php');
	}
	if ($idprocedimento == 8) {
		# code...
		header('location: ocorrencias.php');
	}
	if ($idprocedimento == 6) {
		# code...
		header('location: recursospatrimoniais.php');
	}
	
}

?>
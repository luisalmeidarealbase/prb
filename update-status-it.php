<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['fullname'])) {
	header('location: index.php');
}

if (isset($_GET['id'])) {
	# code...

	$idIT = $_GET['id'];
	$statusReceived = $_GET['status'];
	$answer = $_GET['a'];
}

if ($answer == "yes") {

	$newStatus = $statusReceived + 1;

	if ($newStatus == 4) {
		# code...
		
		//get the control doc reference
		$getReference = "SELECT tbl_control_docs_id_control_doc FROM tbl_its WHERE id_it = '$idIT'";
		$resultGetReference = mysqli_query($link,$getReference);

		while ($rowGetReference = mysqli_fetch_object($resultGetReference)) {
			
			$controlDocReference = $rowGetReference->tbl_control_docs_id_control_doc;

		}

		//get the previous data
		$getPreviousValue = "SELECT versao FROM tbl_control_docs WHERE id_control_doc = '$controlDocReference'";
		$resultGetPreviousValue = mysqli_query($link,$getPreviousValue);

		while ($rowGetPreviousValue = mysqli_fetch_object($resultGetPreviousValue)) {
			# code...
			$oldVersion = $rowGetPreviousValue->versao;		}

			

			$int = (int)$oldVersion;
			$int++;

			$newVersion = sprintf("%'.02d\n", $int);
			

		//update the control doc table here
			$queryUpdateControlDoc = "UPDATE tbl_control_docs SET versao = '$newVersion' WHERE id_control_doc = '$controlDocReference'";
			$resultUpdateControlDoc = mysqli_query($link,$queryUpdateControlDoc);

		}

	}

	if ($answer == "no") {

		$newStatus = $statusReceived - 1;

	}


	$updateStatus = "UPDATE tbl_its SET tbl_estados_revisao_id_estado_revisao = '$newStatus' WHERE id_it = '$idIT'";
	$resultUpdateStatus = mysqli_query($link, $updateStatus);

	header('location: revisao-geral.php');

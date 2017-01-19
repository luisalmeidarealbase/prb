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

}

if ($answer == "no") {

	$newStatus = $statusReceived - 1;

}


$updateStatus = "UPDATE tbl_its SET tbl_estados_revisao_id_estado_revisao = '$newStatus' WHERE id_it = '$idIT'";
$resultUpdateStatus = mysqli_query($link, $updateStatus);

header('location: revisao-geral.php');

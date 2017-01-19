<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['fullname'])) {
	header('location: index.php');
}

if ($_GET['id']){
	$idIT = $_GET['id'];
}

if (isset($_POST['listaprocedimento'])) {
	
	$procedimentoit = $_POST['listaprocedimento'];
	$listasubprocessoit = $_POST['listasubprocesso'];
	$objectivoit = $_POST['objectivoit'];
	$corpoit = $_POST['editor1'];
	$autor = 0;


	$updateIt = "UPDATE tbl_its SET subprocesso_it = '$listasubprocessoit', objectivo_it = '$objectivoit', corpo_it = '$corpoit', tbl_procedimentos_id_procedimento = '$procedimentoit' WHERE id_it = '$idIT'";

	

	
	$resultUpdateIt = mysqli_query($link, $updateIt);

	header('location: revisao-geral.php');
}
else{
	header('location: revisao-geral.php');
}

?>
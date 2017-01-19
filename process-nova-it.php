<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['fullname'])) {
	header('location: index.php');
}

if (isset($_POST['listaprocedimento'])) {
	
	$procedimentoit = $_POST['listaprocedimento'];
	$listasubprocessoit = $_POST['listasubprocesso'];
	$objectivoit = $_POST['objectivoit'];
	$corpoit = $_POST['editor1'];

	$inserirNovaIt = "INSERT INTO tbl_its(subprocesso_it, objectivo_it, corpo_it, autor_it, tbl_estados_revisao_id_estado_revisao, tbl_procedimentos_id_procedimento) VALUES ('$listasubprocessoit', '$objectivoit', '$corpoit', '0', '1', '$procedimentoit')";

	$resultInserirNovaIt = mysqli_query($link, $inserirNovaIt);

	header('location: nova-it.php');

}
else{
			header('location: nova-it.php');
}

//receive data from the form


?>
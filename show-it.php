<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$queryToShowIt = "SELECT * FROM tbl_its";
$resultShowIt = mysqli_query($link, $queryToShowIt);

while ($row = mysqli_fetch_object($resultShowIt)) {

	$procedimento = $row->tbl_procedimentos_id_procedimento;
	$objectivo = $row->objectivo_it;
	$subprocesso = $row->subprocesso_it;
	$body = $row->corpo_it;
	$autor = $row->autor_it;
	$estado = $row->tbl_estados_revisao_id_estado_revisao;


	echo $procedimento ."<br>";
	echo $objectivo ."<br>";
	echo $subprocesso ."<br>";
	echo $body ."<br>";
	echo $autor ."<br>";
	echo $estado ."<br>";
	echo "<br><br>";

}

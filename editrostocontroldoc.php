<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


$values = array_values($_POST);

$objectivoprocedimento = $_POST['objectivoprocedimento'];
$ambitoprocedimento = $_POST['ambitoprocedimento'];
$entradas = $_POST['entradas'];
$saidas = $_POST['saidas'];
$indicadores = $_POST['indicadores'];
$acompanhamento = $_POST['acompanhamento'];
$avaliacaomedicao = $_POST['avaliacaomedicao'];


// new code using ckeditor
$metodo = $_POST['control-doc-metodo-matriz'];

$insertNewRosto = "INSERT INTO tbl_rostos (objectivo_procedimento, ambito_procedimento, entradas, saidas, indicadores, norma_pontos_norma, acompanhamento, avaliacao_e_medicao, tbl_procedimentos_id_procedimento, metodo) VALUES ('$objectivoprocedimento','$ambitoprocedimento','$entradas','$saidas','$indicadores','--','$acompanhamento','$avaliacaomedicao','2', '$metodo')";



$insertResultNewRosto = mysqli_query($link,$insertNewRosto);

//get last inserted ID to use in the next insert function/query
$last_id = $link->insert_id;




//set data to insert on Database -> tbl_versoes_rostos
date_default_timezone_set("Europe/Lisbon");
$dataVersaoRosto = date("Y/m/d") . "-" . date("h:i:sa");

//set name to insert on Database -> tbl_versoes_rostos
$nomeVersaoRosto = "Versão do rosto nº XX ";
$nomeFinalVersaoRosto = utf8_decode($nomeVersaoRosto);


$insertNewRostoVersao = "INSERT INTO tbl_versoes_rostos (nome_versao_rosto, data_versao_rosto, aprovado_versao_rosto, publicado_versao_rosto, tbl_rostos_id_rosto) VALUES ('$nomeFinalVersaoRosto', '$dataVersaoRosto','0','0','$last_id')";


$insertResultNewRostoVersao = mysqli_query($link,$insertNewRostoVersao);

header('location:controlodocumental.php');

?>
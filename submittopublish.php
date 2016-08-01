<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$idrostoedicao = $_GET['id'];
$idprocedimento = $_GET['idprocedimento'];



// get the old published 

$getIdPublished = "SELECT * FROM tbl_rostos INNER JOIN tbl_versoes_rostos ON tbl_versoes_rostos.tbl_rostos_id_rosto = tbl_rostos.id_rosto WHERE publicado_versao_rosto = 1 AND tbl_procedimentos_id_procedimento = '$idprocedimento'";

$resultGetIdPublished = mysqli_query($link,$getIdPublished);

while ($rowGetIdPublished = mysqli_fetch_object($resultGetIdPublished)) {

	$idToChange = $rowGetIdPublished->id_versao_rosto;

}


// remove published status of old rosto

$notPublish = 0;

$changeOldPublished = "UPDATE tbl_versoes_rostos SET publicado_versao_rosto = '$notPublish' WHERE id_versao_rosto = '$idToChange'";

$resultChangeOldPublished = mysqli_query($link,$changeOldPublished);




// publish new rosto

$publishNewRosto = "UPDATE tbl_versoes_rostos SET publicado_versao_rosto = 1 WHERE tbl_rostos_id_rosto = '$idrostoedicao'";

$resultPublishNewRosto = mysqli_query($link,$publishNewRosto);


header('location: controlodocumental.php');

?>

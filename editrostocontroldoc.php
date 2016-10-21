<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>



<!-- TODO
1. RECEBER E GUARDAR NA BD OS DADOS DO DOCUMENTO ROSTO
    - objectivoprocedimento;
    - ambitoprocedimento;
    - entradas
    - saidas
    - indicadores
    - acompanhamento
    - avaliacaomedicao

2. GUARDAR VERSAO NA TABELA DE VERSOES DO ROSTO

3. RECEBER E GUARDAR NOVOS SUB PROCESSOS E RESPECTIVAS ACTIVIDADES-->

    -
<?php


/* -------------------------- ETAPA 1 - BEGIN ------------------------------ >*/

/* -------------------------- ETAPA 1 - END ------------------------------ >*/

/* -------------------------- ETAPA 2 - BEGIN ------------------------------ >*/

/* -------------------------- ETAPA 2 - END ------------------------------ >*/

/* -------------------------- ETAPA 3 - BEGIN ------------------------------ >*/


    $contArray = 0;
    $actividadeArray = array();

        echo "<table style='border:1px solid;'>";
        foreach ($_POST as $key => $value) {

            $keys = array_keys($_POST);
            //var_dump($keys);

            if ( $contArray > 6) {

                $subProcessoStringCheck = "subprocesso";

                if (strpos($key, $subProcessoStringCheck) !== false) {

                    //echo "o sub processo encontrado foi o seguinte: ".$key;

                    $nomeSubProcesso = $_POST[$key];

                    echo "o novo nome do subprocesso é: " . $nomeSubProcesso . " ------------------------------------------------------------------------- <br>";

                    /*
                        3.1.guardar sub processo CHECKED
                        3.2. verificar qual o ultimo id so sub processo inserido CHECKED
                        3.3. inserir as actividades correspondentes a esse sub processo

                    */

                    // 3.1 query aqui para inserir o novo sub processo - atenção à chave estrangeira do rosto
                    //  $queryInsertSubProcesso = "INSERT INTO tbl_sub_processos (nome_sub_processo, tbl_rostos_id_rosto) VALUES ('$nomeSubProcesso','$lastIdRostoInserted')";
                    //$ResultInsertSubProcesso = mysqli_query($link,$queryInsertSubProcesso);

                    // 3.2 check last if of sub processo inserted
                    $lastIdSubProcesso = mysqli_insert_id($link);
                }
                    // 3.3

                    //recepcao dos dados para inserir a actividade
                    $nomeActividadeStringCheck = "nomeactividade";
                    if (strpos($key, $nomeActividadeStringCheck) !== false) {

                        $newNomeActividade = $_POST[$key];
                         echo "<b>O novo nome da actividade é:</b> ".$newNomeActividade."<br>";
                        array_push($actividadeArray, $newNomeActividade);
                        //echo "o meu array : ". print_r($actividadeArray);
                    }


                    $descricaoActividadeStringCheck = "descricaoactividade";
                    if (strpos($key, $nomeActividadeStringCheck) !== false) {
                        $newDescricaoActividade = $value;
                        echo "<b>A nova descrição da actividade é: </b>".$newDescricaoActividade;
                        array_push($actividadeArray, $newDescricaoActividade);
                    }

                    $observacaoActividadeStringCheck = "observacaoactividade";
                    if (strpos($key, $observacaoActividadeStringCheck) !== false) {
                        $newObservacaoActividade = $_POST[$key];
                        //echo $newObservacaoActividade;
                        array_push($actividadeArray, $newObservacaoActividade);
                    }

                    $c90012008IdActActividadeStringCheck = "c90012008IdAct";
                    if (strpos($key, $c90012008IdActActividadeStringCheck) !== false) {
                        $newc90012008IdActActividade = $_POST[$key];
                        //echo $newc90012008IdActActividade;
                        array_push($actividadeArray, $newc90012008IdActActividade);
                    }

                    $c90012015IdActActividadeStringCheck = "c90012015IdAct";
                    if (strpos($key, $c90012015IdActActividadeStringCheck) !== false) {
                        $newc90012015IdActActividade = $_POST[$key];
                        // echo $newc90012015IdActActividade;
                        array_push($actividadeArray, $newc90012015IdActActividade);
                    }


                    $fscIdActActividadeStringCheck = "fscIdAct";
                    if (strpos($key, $fscIdActActividadeStringCheck) !== false) {
                        $newfscIdActActividade = $_POST[$key];
                        //echo $newfscIdActActividade;
                        array_push($actividadeArray, $newfscIdActActividade);
                    }

                    $pefcIdActActividadeStringCheck = "pefcIdAct";
                    if (strpos($key, $pefcIdActActividadeStringCheck) !== false) {
                        $newpefcIdActActividade = $_POST[$key];
                        //echo $newpefcIdActActividade;
                        array_push($actividadeArray, $newpefcIdActActividade);
                    }


                    $numElementosArray = count($actividadeArray);
                    echo $numElementosArray."<br>";

                    // query para inserir nova actividade com os dados recolhidos
                    //$queryInsertActividade = "INSERT INTO tbl_actividades (nome_actividade, descricao_actividade, observacao_actividade, c9001_2008, c9001_2015, fsc, pefc, tbl_sub_processos_id_sub_processo)
                    //              VALUES ('$newNomeActividade', '$newDescricaoActividade', '$newObservacaoActividade', '$newc90012008IdActActividade', '$newc90012015IdActActividade', '$newfscIdActActividade','$newpefcIdActActividade', $lastIdSubProcesso)";
                    //$resultInsertActividade = mysqli_query($link,$queryInsertActividade);
                    //$actividadeArray =[];

/*
                    echo "<tr style='border:1px solid;'>";
                    echo "<td style='border:1px solid;'>";
                    echo "<b>key: " . $key;
                    echo "</td>";
                    echo "<td style='border:1px solid;'>";
                    echo $value;
                    echo "</td>";
                    echo "</tr>";*/
                }

            $contArray++;
        }

    echo "</table>";

/* -------------------------- ETAPA 3 - END ------------------------------ >*/
?>

<?php
//$values = array_values($_POST);

/*

//recolha de dados para o documento rosto
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
$nomeFinalVersaoRosto =$nomeVersaoRosto;


$insertNewRostoVersao = "INSERT INTO tbl_versoes_rostos (nome_versao_rosto, data_versao_rosto, aprovado_versao_rosto, publicado_versao_rosto, tbl_rostos_id_rosto) VALUES ('$nomeFinalVersaoRosto', '$dataVersaoRosto','0','0','$last_id')";


$insertResultNewRostoVersao = mysqli_query($link,$insertNewRostoVersao);

header('location:controlodocumental.php'); */

?>
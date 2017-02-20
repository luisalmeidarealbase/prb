<?php 

require_once("connection/conn.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();



/* TODO
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
*/


/* -------------------------- ETAPA 1 - BEGIN ------------------------------ >*/

//recolha de dados para o documento rosto
$objectivoprocedimento = htmlentities($_POST['objectivoprocedimento']);
$ambitoprocedimento = htmlentities($_POST['ambitoprocedimento']);
$entradas = htmlentities($_POST['entradas']);
$saidas = htmlentities($_POST['saidas']);
$indicadores = htmlentities($_POST['indicadores']);
$acompanhamento = htmlentities($_POST['acompanhamento']);
$avaliacaomedicao = htmlentities($_POST['avaliacaomedicao']);


$insertNewRosto = "INSERT INTO tbl_rostos (objectivo_procedimento, ambito_procedimento, entradas, saidas, indicadores, norma_pontos_norma, acompanhamento, avaliacao_e_medicao, tbl_procedimentos_id_procedimento) VALUES ('$objectivoprocedimento','$ambitoprocedimento','$entradas','$saidas','$indicadores','--','$acompanhamento','$avaliacaomedicao','5')";



$insertResultNewRosto = mysqli_query($link,$insertNewRosto);

//get last inserted ID to use in the next insert function/query
$last_id = $link->insert_id;

/* -------------------------- ETAPA 1 - END ------------------------------ >*/

/* -------------------------- ETAPA 2 - BEGIN ------------------------------ >*/

//set data to insert on Database -> tbl_versoes_rostos
date_default_timezone_set("Europe/Lisbon");
$dataVersaoRosto = date("Y/m/d") . "-" . date("h:i:sa");

//set name to insert on Database -> tbl_versoes_rostos
$nomeVersaoRosto = "Versão do rosto nº XXxx ";
$nomeFinalVersaoRosto = $nomeVersaoRosto;

$insertNewRostoVersao = "INSERT INTO tbl_versoes_rostos (nome_versao_rosto, data_versao_rosto, aprovado_versao_rosto, publicado_versao_rosto, tbl_rostos_id_rosto) VALUES ('$nomeFinalVersaoRosto', '$dataVersaoRosto','0','0','$last_id')";


$insertResultNewRostoVersao = mysqli_query($link,$insertNewRostoVersao);

/* -------------------------- ETAPA 2 - END ------------------------------ >*/

/* -------------------------- ETAPA 3 - BEGIN ------------------------------ >*/
    $contArray = 0;
    $actividadeArray = array();

        //echo "<table style='border:1px solid;'>";
        foreach ($_POST as $key => $value) {

            $keys = array_keys($_POST);
            //var_dump($keys);

            if ( $contArray > 6) {

                $subProcessoStringCheck = "subprocesso";

                if (strpos($key, $subProcessoStringCheck) !== false) {

                    //echo "o sub processo encontrado foi o seguinte: ".$key;

                    $nomeSubProcesso = htmlentities($_POST[$key]);

                    //echo "o novo nome do subprocesso é: " . $nomeSubProcesso . " ------------------------------------------------------------------------- <br>";

                    /*
                        3.1.guardar sub processo CHECKED
                        3.2. verificar qual o ultimo id so sub processo inserido CHECKED
                        3.3. inserir as actividades correspondentes a esse sub processo

                    */
                    $lastIdRostoInserted = $last_id;
                    // 3.1 query aqui para inserir o novo sub processo - atenção à chave estrangeira do rosto
                    $queryInsertSubProcesso = "INSERT INTO tbl_sub_processos (nome_sub_processo, tbl_rostos_id_rosto) VALUES ('$nomeSubProcesso','$lastIdRostoInserted')";
                    $ResultInsertSubProcesso = mysqli_query($link,$queryInsertSubProcesso);

                    // 3.2 check last if of sub processo inserted
                    $lastIdSubProcesso = mysqli_insert_id($link);
                }
                    // 3.3

                    //recepcao dos dados para inserir a actividade
                    $nomeActividadeStringCheck = "nomeactividade";
                    if (strpos($key, $nomeActividadeStringCheck) !== false) {

                        $newNomeActividade = $value;
                         //echo "<b>O novo nome da actividade é:</b> ".$newNomeActividade."<br>";
                        $actividadeArray[0] = htmlentities($newNomeActividade);
//                        array_push($actividadeArray, $newNomeActividade);
                        //echo "o meu array : ". print_r($actividadeArray);
                    }


                    $descricaoActividadeStringCheck = "descricaoactividade";
                    if (strpos($key, $descricaoActividadeStringCheck) !== false) {
                        $newDescricaoActividade = $value;
                        //echo "<b>A nova descrição da actividade é: </b>".$newDescricaoActividade . "<br>";
                        $actividadeArray[1] = htmlentities($newDescricaoActividade);
                        //array_push($actividadeArray, $newDescricaoActividade);
                    }

                    $observacaoActividadeStringCheck = "observacaoactividade";
                    if (strpos($key, $observacaoActividadeStringCheck) !== false) {
                        $newObservacaoActividade = $_POST[$key];
                        //echo "<b>A nova observacao é: </b> ".$newObservacaoActividade . "<br>";
                        $actividadeArray[2] = htmlentities($newObservacaoActividade);
                        array_push($actividadeArray, $newObservacaoActividade);
                    }

                    $c90012008IdActActividadeStringCheck = "c90012008IdAct";
                    if (strpos($key, $c90012008IdActActividadeStringCheck) !== false) {
                        $newc90012008IdActActividade = $_POST[$key];
                        //echo "<b>valor da 9001:2008 é: </b>".$newc90012008IdActActividade . "<br>";
                        $actividadeArray[3] = htmlentities($newc90012008IdActActividade);
                        //array_push($actividadeArray, $newc90012008IdActActividade);
                    }

                    $c90012015IdActActividadeStringCheck = "c90012015IdAct";
                    if (strpos($key, $c90012015IdActActividadeStringCheck) !== false) {
                        $newc90012015IdActActividade = $_POST[$key];
                        //echo "<b>O vlaor da 9001:2015 é: </b>".$newc90012015IdActActividade . "<br>";
                        $actividadeArray[4] = htmlentities($newc90012015IdActActividade);
                        //array_push($actividadeArray, $newc90012015IdActActividade);
                    }


                    $fscIdActActividadeStringCheck = "fscIdAct";
                    if (strpos($key, $fscIdActActividadeStringCheck) !== false) {
                        $newfscIdActActividade = $_POST[$key];
                        //echo "<b>O valor da fsc é: </b>".$newfscIdActActividade . "<br>";
                        $actividadeArray[5] = htmlentities($newfscIdActActividade);
                        //array_push($actividadeArray, $newfscIdActActividade);
                    }

                    $pefcIdActActividadeStringCheck = "pefcIdAct";
                    if (strpos($key, $pefcIdActActividadeStringCheck) !== false) {
                        $newpefcIdActActividade = $_POST[$key];
                        //echo "<b>O valor da pefc é: </b>".$newpefcIdActActividade . "<br>";
                        $actividadeArray[6] = htmlentities($newpefcIdActActividade);
                       // array_push($actividadeArray, $newpefcIdActActividade);
                    }


                    $numElementosArray = count($actividadeArray);

                    if ($numElementosArray == 7) {

                        //echo "<br>" . $numElementosArray . "<br>";
                        /*echo "<br><br>";
                        echo "o ultimo sub processo inserido foi o: ".$lastIdSubProcesso."<br>";
                        echo "posicao 0 do actividadearray: ".$actividadeArray[0]."<br>";
                        echo "posicao 1 do actividadearray: ".$actividadeArray[1]."<br>";
                        echo "posicao 2 do actividadearray: ".$actividadeArray[2]."<br>";
                        echo "posicao 3 do actividadearray: ".$actividadeArray[3]."<br>";
                        echo "posicao 4 do actividadearray: ".$actividadeArray[4]."<br>";
                        echo "posicao 5 do actividadearray: ".$actividadeArray[5]."<br>";
                        echo "posicao 6 do actividadearray: ".$actividadeArray[6]."<br>";*/

                        // query para inserir nova actividade com os dados recolhidos
                        $queryInsertActividade = "INSERT INTO tbl_actividades (nome_actividade, descricao_actividade, observacao_actividade, c9001_2008, c9001_2015, fsc, pefc, tbl_sub_processos_id_sub_processo)
                                  VALUES ('$actividadeArray[0]', '$actividadeArray[1]', '$actividadeArray[2]', '$actividadeArray[3]', '$actividadeArray[4]', '$actividadeArray[5]','$actividadeArray[6]', '$lastIdSubProcesso')";

                        //echo $queryInsertActividade;
                        $resultInsertActividade = mysqli_query($link,$queryInsertActividade);
                        
                        $actividadeArray=[];
                        
                        
                    }

               
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
/* -------------------------- ETAPA 3 - END ------------------------------ >*/
header('location: revisao.php');
?>
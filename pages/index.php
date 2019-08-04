<?php

/**
 * Description of index
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */

$root = $_SERVER["DOCUMENT_ROOT"];
require_once $root.'/template/htmlHeader.php';
require_once $root.'/template/htmlFooter.php';
require_once $root.'/pages/cont/index.php';
require_once $root.'/class/ext/menuInterativo.php';
require_once $root.'/class/ext/conBD.php';
$conBD = new conBD();
$linkBD =$conBD->conectarBD("Erro interno ao conectar no Banco de dados. Erro em :");
$objMenuInterativo = new menuInterativo(0);
$objConteudo = new index();
$objHeader = new htmlHeader();
$objFooter = new htmlFooter();


//$conBD->finalizarBD($linkBD);


echo $objHeader->header();
echo $objMenuInterativo->menu();
echo $objConteudo->conteudo();
echo $objFooter->footer();

//fim do arquivo index

<?php

/**
 * Description of index
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */
$root = $_SERVER["DOCUMENT_ROOT"];
require_once $root . '/template/htmlHeader.php';
require_once $root . '/template/htmlFooter.php';
require_once $root . '/pages/cont/mesa.php';
require_once $root . '/class/ext/menuInterativo.php';
//require_once $root.'/class/ext/conBD.php';
//require_once $root . '/class/DAO/produtoDAO.php';
require_once $root . '/class/DAO/mesaDAO.php';
//$conBD = new conBD();
//$linkBD =$conBD->conectarBD("Erro interno ao conectar no Banco de dados. Erro em :");
$objMenuInterativo = new menuInterativo(2);
$objConteudo = new mesa();
$objMesa = new mesaDAO();
$objHeader = new htmlHeader();
$objFooter = new htmlFooter();
//$registros = new produtoDAO();

$dados = NULL;

if (isset($_POST["act"])) {

    $dados = $_POST["act"];

}

/*
  if (isset($_POST["incluir"])) {
  $objUsuario = new usuarioDAO();
  $objUsuario->cadastrarUsuario();
  } */

//$conBD->finalizarBD($linkBD);


echo $objHeader->header();
echo $objMenuInterativo->menu();
echo $objConteudo->conteudo($objMesa->consultaMesas($dados));
echo $objFooter->footer();
//session_abort();
//fim do arquivo index

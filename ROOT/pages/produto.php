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
require_once $root . '/pages/cont/produto.php';
require_once $root . '/class/ext/menuInterativo.php';
//require_once $root.'/class/ext/conBD.php';
require_once $root . '/class/DAO/produtoDAO.php';
require_once $root . '/class/DAO/comandaDAO.php';
//$conBD = new conBD();
//$linkBD =$conBD->conectarBD("Erro interno ao conectar no Banco de dados. Erro em :");
$objMenuInterativo = new menuInterativo(1);
$objConteudo = new produto();
$objComanda = new comandaDAO();
$objHeader = new htmlHeader();
$objFooter = new htmlFooter();
$objProduto = new produtoDAO();

if (isset($_POST["act"])) {
    if ($_POST["act"] == "Incluir") {
        $objProduto->validaProduto($_POST);
//        exit();
    } else if ($_POST["act"] == "Atualizar") {
        echo 'entrou2';
        exit();
    } else if ($_POST["act"] == "Deletar") {
        echo 'entrou3';
        exit();
    }
//    echo 'entrou';
//    exit();
//    $objComanda->validaComanda($_POST);
//    $objComanda
}

/*
  if (isset($_POST["incluir"])) {
  $objUsuario = new usuarioDAO();
  $objUsuario->cadastrarUsuario();
  } */

//$conBD->finalizarBD($linkBD);


echo $objHeader->header();
echo $objMenuInterativo->menu();
echo $objConteudo->conteudo($objProduto->consultarProdutoUsuario());
echo $objFooter->footer();
//session_abort();
//fim do arquivo index

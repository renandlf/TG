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
require_once $root . '/pages/cont/cadastrar.php';
require_once $root . '/class/ext/menuInterativo.php';
//require_once $root.'/class/ext/conBD.php';
require_once $root . '/class/DAO/usuarioDAO.php';
$conBD = new conBD();
//$linkBD =$conBD->conectarBD("Erro interno ao conectar no Banco de dados. Erro em :");
$objMenuInterativo = new menuInterativo(5);
$objConteudo = new cadastrar();
$objHeader = new htmlHeader();
$objFooter = new htmlFooter();

if (isset($_POST["cadastrar"])) {
    $objUsuario = new usuarioDAO();
    $objUsuario->cadastrarUsuario();
}

//$conBD->finalizarBD($linkBD);


echo $objHeader->header();
echo $objMenuInterativo->menu();
echo $objConteudo->conteudo();
echo $objFooter->footer();
//session_abort();
//fim do arquivo index

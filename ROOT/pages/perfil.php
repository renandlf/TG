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
require_once $root . '/pages/cont/perfil.php';
require_once $root . '/class/ext/menuInterativo.php';
//require_once $root.'/class/ext/conBD.php';
require_once $root . '/class/DAO/usuarioDAO.php';
$conBD = new conBD();
//$linkBD =$conBD->conectarBD("Erro interno ao conectar no Banco de dados. Erro em :");
$objMenuInterativo = new menuInterativo(4);
$objConteudo = new perfil();
$objHeader = new htmlHeader();
$objFooter = new htmlFooter();
session_start();

if (!isset($_SESSION["login"])) {
    header("location:./login.php");
} else if (isset($_POST["act"])) {
    if ($_POST["act"] == 'atu') {
        $objUsuario = new usuarioDAO();
        $objUsuario->atualizarUsuario();
        header("location:./login.php");
    }
    if ($_POST["act"] == 'del') {
        $objUsuario = new usuarioDAO();
//        $objUsuario->atualizarUsuario();
        header("location:./login.php");
    }
}
$objUsuario = new usuarioDAO();
$registro = $objUsuario->consultaDadosUsuario();
//$conBD->finalizarBD($linkBD);


echo $objHeader->header();
echo $objMenuInterativo->menu();
echo $objConteudo->conteudo($registro);
echo $objFooter->footer();
//session_abort();
//fim do arquivo index

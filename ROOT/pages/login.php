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
require_once $root . '/pages/cont/login.php';
require_once $root . '/class/ext/menuInterativo.php';
//require_once $root.'/class/ext/conBD.php';
require_once $root . '/class/DAO/usuarioDAO.php';
$conBD = new conBD();
//$linkBD =$conBD->conectarBD("Erro interno ao conectar no Banco de dados. Erro em :");
$objMenuInterativo = new menuInterativo(5);
$objConteudo = new login();
$objHeader = new htmlHeader();
$objFooter = new htmlFooter();
session_start();
if (isset($_SESSION["login"]))
    session_destroy();
//        unset ($_SESSION);
else if (isset($_POST["cadastrar"])) {
    header("location:./cadastrar.php");
}
else if (isset($_POST["act"]) && isset($_POST['login']) && isset($_POST['senha'])) {

    unset($_POST["act"]);



    $_SESSION["login"] = $_POST['login'];
    $_SESSION["senha"] = $_POST['senha'];
    $_SESSION["senhamd5"] = md5($_POST['senha']);

    $objUsuario = new usuarioDAO();
    $objUsuario->login();
//    foreach ($_SESSION as $key => $value) {
//        echo $key . "->" . $value;
//    }

    exit();
}



//$conBD->finalizarBD($linkBD);


echo $objHeader->header();
echo $objMenuInterativo->menu();
echo $objConteudo->conteudo();
echo $objFooter->footer();
//session_abort();
//fim do arquivo index

<?php

/**
 * Description of conBD
 *
 * @author Felipe Correa Gomes
 * @since 04-07-2019
 */
$root = $_SERVER["DOCUMENT_ROOT"];
require_once $root . '/class/ext/conBD.php';

class usuarioDAO extends conBD {

    private $linkBD;

    function getLinkBD() {
        return $this->linkBD;
    }

    function setLinkBD($linkBD) {
        $this->linkBD = $linkBD;
    }

    function __construct() {
        $this->setLinkBD($this->conectarBD('Erro interno:'));
    }

    function consultaDadosUsuario() {
        if (!isset($_SESSION)) {
            header("location:./login.php");
        } else if (isset($_SESSION["login"]) && isset($_SESSION["senha"])) {
            $login=$_SESSION["login"];
            $senha=$_SESSION["senha"];
            $query = "SELECT usuarios.nome, usuarios.email, usuarios.cpf, usuarios.rg, usuarios.datanascimento, ENDERECO.rua, ENDERECO.numero, ENDERECO.bairro, ENDERECO.cidade, ENDERECO.estado, ENDERECO.cep, TELEFONE.telefone FROM usuarios,(SELECT * FROM enderecos WHERE enderecos.pkendereco = (SELECT usuarios.fkendereco FROM usuarios where usuarios.email = '$login' AND usuarios.senha = '$senha')) AS ENDERECO,(SELECT * FROM telefones where telefones.pktelefone = (SELECT usuarios.fktelefone FROM usuarios where usuarios.email = '$login' AND usuarios.senha = '$senha')) AS TELEFONE WHERE usuarios.email = '$login' AND usuarios.senha = '$senha'";
            $result = mysqli_query($this->getLinkBD(), $query);
            if(mysqli_num_rows($result) == 1){
                $registro = mysqli_fetch_array($result);
                return $registro;
            }
            else{
                header("location:./perfil.php");
            }
            exit();
        }
    }

    function cadastrarUsuario() {
//        foreach ($_POST as $key => $value) {
//            echo $key . "->" . $value . "<br>";
//        }
        $queryTelefone = "INSERT INTO `comanda`.`telefones` (`telefone`) VALUES ('$_POST[telefone]');";
        mysqli_query($this->getLinkBD(), $queryTelefone);
        $fktelefone = mysqli_insert_id($this->getLinkBD()) OR DIE("Erro ao Incluir Telefone");

        $queryEndereco = "INSERT INTO `comanda`.`enderecos` (`cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`) VALUES ('$_POST[cep]', '$_POST[rua]', '$_POST[numero]', '$_POST[bairro]', '$_POST[cidade]', '$_POST[estado]');";
        mysqli_query($this->getLinkBD(), $queryEndereco);
        $fkendereco = mysqli_insert_id($this->getLinkBD()) OR DIE("Erro ao Incluir Endereco");

        $queryUsuario = "INSERT INTO `comanda`.`usuarios` (`nome`, `cpf`, `rg`, `email`, `datanascimento`, `senha`, `fktelefone`, `fkendereco`) VALUES ('$_POST[nome]', '$_POST[cpf]', '$_POST[rg]', '$_POST[email]', '$_POST[datanascimento]', '$_POST[senha]', '$fktelefone', '$fkendereco');";
//        echo $queryUsuario;
//        exit();
        mysqli_query($this->getLinkBD(), $queryUsuario) OR DIE("Erro ao Incluir Usuário");
        echo $queryUsuario;
        if (!isset($_POST))
            session_start();
        $_SESSION["login"] = $_POST["email"];
        $_SESSION["senha"] = $_POST["senha"];
        header("location:./perfil.php");
    }
    function atualizarUsuario() {
        if (!isset($_POST))
            session_start();
        foreach ($_POST as $key => $value) {
            echo $key . "->" . $value . "<br>";
        }
//        filter_input("array", $_POST);
        $queryTelefone = "UPDATE `comanda`.`telefones` SET `telefone`='$_POST[telefone]' WHERE  `pktelefone`=(SELECT fktelefone FROM usuarios WHERE usuarios.email = '$_SESSION[login]');";
        mysqli_query($this->getLinkBD(), $queryTelefone) OR DIE ("Erro ao Atualizar Registro do Telefone");
//        mysqli_insert_id($this->getLinkBD()) OR DIE("Erro ao Incluir Telefone");

        $queryEndereco = "UPDATE `comanda`.`enderecos` SET `cep`='$_POST[cep]', `rua`='$_POST[rua]', `numero`='$_POST[numero]',`bairro`='$_POST[bairro]',`cidade`='$_POST[cidade]',`estado`='".strtoupper($_POST['estado'])."'  WHERE  `pkendereco`=(SELECT fkendereco FROM usuarios WHERE usuarios.email = '$_SESSION[login]');";
        mysqli_query($this->getLinkBD(), $queryEndereco) OR DIE ("Erro ao Atualizar Registro do Endereço");
//        $fkendereco = mysqli_insert_id($this->getLinkBD()) OR DIE("Erro ao Incluir Endereco");

        $queryUsuario = "UPDATE `comanda`.`usuarios` SET `rg`='$_POST[rg]',`email`='$_POST[email]', `senha` = '$_POST[senha]' WHERE usuarios.email =  '$_SESSION[login]';";
//        echo $queryTelefone."<br>".$queryEndereco."<br>".$queryUsuario;
//        exit();
        mysqli_query($this->getLinkBD(), $queryUsuario) OR DIE("Erro ao Atualizar Registro do Usuário");
        echo $queryUsuario;
//        exit();
    }

    function login() {
        if (!isset($_SESSION)) {
            echo"<script>"
            . "alert('Erro ao carregar a sessão');"
            . "history.go(-1);"
            . "</script>";
            exit();
        }

        $login = $_SESSION["login"];
        $senha = $_SESSION["senha"];

        $query = "SELECT pkusuario FROM usuarios WHERE usuarios.email = '$login' AND usuarios.senha = '$senha'";
        $result = mysqli_query($this->getLinkBD(), $query) OR DIE(mysqli_error($this->getLinkBD()));
        echo $query;
//        if(mysqli_error($this->getLinkBD())){
//            unset($_SESSION);
//            session_destroy();
//        }
        if (mysqli_num_rows($result) == 1) {
//echo "ettttt";
//exit();
//        session_abort();
            header("location:./perfil.php");
        } else {

//            session_destroy();
            unset($_SESSION['login']);
            unset($_SESSION['senhamd5']);
            unset($_SESSION['senha']);
            echo"<script>"
            . "alert('Login ou Senha incorretos: $query');"
            . "history.go(-1);"
            . "</script>";
        }
    }

}

<?php

/**
 * Description of conBD
 *
 * @author Felipe Correa Gomes
 * @since 04-07-2019
 */
$root = $_SERVER["DOCUMENT_ROOT"];
require_once $root . '/class/ext/conBD.php';

class comandaDAO extends conBD {

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

    function validaComanda($dados) {
        if (isset($_SESSION))
            session_start();
        if (!(isset($_SESSION["login"])))
            header("location:./login.php");
        $login = $_SESSION["login"];
        $query = "SELECT * FROM comandas WHERE comandas.fkusuario = ("
                . "SELECT usuarios.pkusuario FROM usuarios WHERE usuarios.email='$login') "
                . "AND DATE(comandas.datacadastrado) = date(NOW())";
        $result = mysqli_query($this->getLinkBD(), $query);
        if (mysqli_num_rows($result) > 0) {
            $this->incluiNaComanda($dados, $login);
        } else {
            $this->cadastrarComanda($dados, $login);
        }
//        verificar se o id do usuario relacionada com uma comanda cadastrada existe
    }

    private function cadastrarComanda($dados, $login) {
        $query = "SELECT MAX(comandas.numerocomanda) AS ULT FROM comandas";

        echo $login;
        $result = mysqli_query($this->getLinkBD(), $query);
        $registro = mysqli_fetch_array($result);
        if (isset($registro["ULT"]) || $registro["ULT"] != NULL)
            $lastId = $registro["ULT"] + 1;
        else
            $lastId = 1;
//        echo $lastId;
        $produtos = $dados["produto"];
        $qtdprod = count($produtos);

        foreach ($produtos as $key => $value) {

            echo $key . "->" . $value . "<br>";
            $quantidade = $dados["quatidadeprod$value"];
            echo $dados["quatidadeprod$value"] . '<br>';
            $queryUsuario = "SELECT pkusuario FROM usuarios WHERE usuarios.email =  '$login'";
            echo $queryUsuario;
            $result = mysqli_query($this->getLinkBD(), $queryUsuario) or die(mysqli_error($this->getLinkBD()));

            $registro = mysqli_fetch_array($result);
//            echo $registro["pkusuario"];
            $query = "INSERT INTO `comanda`.`comandas` (`numerocomanda`, `quantidadeproduto`, `fkproduto`, `fkusuario`) "
                    . "VALUES ('$lastId', '$quantidade', '$value', '$registro[pkusuario]');";
//            exit();
            mysqli_query($this->getLinkBD(), $query);
            $queryQt = "SELECT estoque FROM produtos WHERE pkproduto = $value";
            $resultQt = mysqli_query($this->getLinkBD(), $queryQt);

            $registroQt = mysqli_fetch_array($resultQt);


            $queryUp = "UPDATE `comanda`.`produtos` SET `estoque`=" . ($registroQt['estoque'] - $quantidade) . " WHERE `pkproduto`=$value;";
//            exit();
            mysqli_query($this->getLinkBD(), $queryUp);
        }
        exit();
//        se não houver o id do usuario relacionada com uma comanda cadastrada no dia criar uma
    }

    private function incluiNaComanda($dados, $login) {
        $queryUsuario = "SELECT pkusuario FROM usuarios WHERE usuarios.email =  '$login'";
        $result = mysqli_query($this->getLinkBD(), $queryUsuario) or die(mysqli_error($this->getLinkBD()));
        $registroUsuario = mysqli_fetch_array($result);
        $query = "SELECT MAX(comandas.numerocomanda) AS ULT FROM comandas WHERE fkusuario = '$registroUsuario[pkusuario]'";
        $result = mysqli_query($this->getLinkBD(), $query);

        $registro = mysqli_fetch_array($result);

        if (isset($registro["ULT"]) || $registro["ULT"] != NULL)
            $lastId = $registro["ULT"];
        else
            $this->cadastrarComanda($dados, $login);
        $produtos = $dados["produto"];
//        $qtdprod = count($produtos);

        foreach ($produtos as $key => $value) {

            echo $key . "->" . $value . "<br>";
            $quantidade = $dados["quatidadeprod$value"];
            echo $dados["quatidadeprod$value"] . '<br>';

//            echo $registro["pkusuario"];
            $query = "INSERT INTO `comanda`.`comandas` (`numerocomanda`, `quantidadeproduto`, `fkproduto`, `fkusuario`) "
                    . "VALUES ('$lastId', '$quantidade', '$value', '$registroUsuario[pkusuario]');";
//            exit();
            mysqli_query($this->getLinkBD(), $query);

            
            $queryQt = "SELECT estoque FROM produtos WHERE pkproduto = $value";
            $resultQt = mysqli_query($this->getLinkBD(), $queryQt);

            $registroQt = mysqli_fetch_array($resultQt);


            $queryUp = "UPDATE `comanda`.`produtos` SET `estoque`=" . ($registroQt['estoque'] - $quantidade) . " WHERE `pkproduto`=$value;";
//            exit();
            mysqli_query($this->getLinkBD(), $queryUp);
        }



        echo "chegou aqui";
        exit();
//        se houver o id do usuario relacionada com uma comanda cadastrada no dia adicionar produtos com o mesmo numero da comanda
    }

    public function consultaComanda($dados = NULL) {
        
    }

}

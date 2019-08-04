<?php

/**
 * Description of conBD
 *
 * @author Felipe Correa Gomes
 * @since 04-07-2019
 */
$root = $_SERVER["DOCUMENT_ROOT"];
require_once $root . '/class/ext/conBD.php';

class produtoDAO extends conBD {

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

    function consultarProdutoUsuario() {
//        if (!isset($_SESSION)) {
//            header("location:./login.php");
//        } else if (isset($_SESSION["login"]) && isset($_SESSION["senha"])) {
//            $login = $_SESSION["login"];
//            $senha = $_SESSION["senha"];
        $query = "SELECT * FROM produtos";
        $result = mysqli_query($this->getLinkBD(), $query);
        $rows = 0;
        if (($rows = mysqli_num_rows($result)) > 0) {
            $registros;
            for ($i = 0; $i < $rows; $i++) {
                $registros[$i] = mysqli_fetch_array($result); 
//                $registros=$rows;
            }
            
            
            return $registros;
        } else {
            echo "Produtos Indisponíveis";
//                header("location:./perfil.php");
        }
        exit();
//        }
    }

}

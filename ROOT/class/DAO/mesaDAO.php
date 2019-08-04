<?php

/**
 * Description of conBD
 *
 * @author Felipe Correa Gomes
 * @since 04-07-2019
 */
$root = $_SERVER["DOCUMENT_ROOT"];
require_once $root . '/class/ext/conBD.php';

class mesaDAO extends conBD {

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

    public function consultaMesas($dados = NULL) {
        if (!isset($_SESSION)) {
            session_start();
        } else if (!isset($_SESSION["login"])) {
            header("location:./login.php");
        } else if ($dados != NULL) {
            $query = "SELECT U.nome AS NOME, U.cpf AS CPF, SUM(P.preco * C.quantidadeproduto) AS PRECOTOTAL, M.numeromesa AS NUMEROMESA "
                    . "FROM mesas AS M, comandas AS C, produtos AS P, usuarios AS U "
                    . "WHERE M.numeromesa ='$dados' "
                    . "AND M.fkcomanda = C.numerocomanda "
                    . "AND C.fkproduto = P.pkproduto "
                    . "AND C.fkusuario = U.pkusuario "
                    . "GROUP BY U.cpf ORDER BY U.nome;";
//            echo $query;
//            exit();
            $result = mysqli_query($this->getLinkBD(), $query);
            $dados = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $dados[] = $row;
            }

//            $dados
//            $dados["result"] = $result;
            $dados2 = array("act"=>"comandaACT");
            return $dados2;
        } else if (isset($_SESSION["login"])) {
            $query = "SELECT mesas.numeromesa FROM "
                    . "mesas LEFT JOIN comandas ON comandas.numerocomanda = mesas.fkcomanda "
                    . "GROUP BY mesas.numeromesa ORDER BY mesas.numeromesa";
            $result = mysqli_query($this->getLinkBD(), $query);
            return $result;
        }
    }

}

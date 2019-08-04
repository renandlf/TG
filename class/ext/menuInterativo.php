<?php

/**
 * Description of menuInterativo
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */
$root=$_SERVER["DOCUMENT_ROOT"];
require_once $root.'/class/ext/conBD.php';

class menuInterativo extends conBD {

    private $ativo = array('', '', '', '', '');
    private $link = array('index.php', 'produto.php', 'comanda.php', '', '', 'login.php');
    private $item = array('Início', 'Produtos', 'Comanda', '', '', 'Login');
    private $conteudoMenu = 'Erro interno, não foi possivel carregar o menu';
    public $sessao = FALSE;
    private $linkBD = '';

    function getLinkBD() {
        return $this->linkBD;
    }

    function setLinkBD($linkBD) {
        $this->linkBD = $linkBD;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function getLink() {
        return $this->link;
    }

    function getItem() {
        return $this->item;
    }

    function setAtivo($posicao) {
        $this->ativo[$posicao] = 'ativo';
    }

    function setLink($link, $posicao) {
        $this->link[$posicao] = $link;
    }

    function setItem($item, $posicao) {
        $this->item[$posicao] = $item;
    }

    function getConteudoMenu() {
        return $this->conteudoMenu;
    }

    function getSessao() {
        return $this->sessao;
    }

    function setConteudoMenu($conteudoMenu) {
        $this->conteudoMenu = $conteudoMenu;
    }

    function setSessao($sessao) {
        $this->sessao = $sessao;
    }

    public function __construct($page) {
        session_start();
        $this->setLinkBD($this->conectarBD('Erro interno:'));
        $this->verificarSessao($this->getLinkBD());
        $this->setAtivo($page);
        $this->alterarConteudoMenu();
        session_abort();
    }

    public function verificarSessao($linkBD) {
        if ((!isset($_SESSION['login'])) && ((!isset($_SESSION['senha'])) || (!isset($_SESSION['senhamd5'])))) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            unset($_SESSION['senhamd5']);
            $this->setItem('', 3);
            $this->setLink('', 3);
            $this->setItem("Login", 5);
            $this->setLink("login.php", 5);
            $this->setSessao(FALSE);
        } else if ((isset($_SESSION['login'])) && ( isset($_SESSION['senhamd5']))) {
            $login = $_SESSION['login'];
//            $bd = mysqli_connect("localhost", "felipecg", "", "tg");
            $query = "SELECT usuarios.nome FROM usuarios WHERE email='$login'";
            $result = mysqli_query($linkBD, $query);
            $registro = mysqli_fetch_array($result);
            $this->setItem('Perfil', 3);
            $this->setLink('perfil.php', 3);
            $this->setItem("Sair", 5);
            $this->setLink("logout.php", 5);
            $this->finalizarBD($linkBD);
            $this->setSessao(TRUE);
        } else {
            session_destroy();
            $this->setSessao(TRUE);
       }
    }

    public function alterarConteudoMenu() {
        $link = $this->getLink();
        $item = $this->getItem();
        $ativo = $this->getAtivo();


        $quartoItem = ($item["3"] != '') ? ("<a href='$link[3]'><span id='$ativo[3]'><center>$item[3]</center></span></a>\n") : ('');
        $quintoItem = ($item["4"] != '') ? ("<a href='$link[4]'><span id='$ativo[4]'><center>$item[4]</center></span></a>\n") : ('');

        $conteudo = "<div id='menu'> \n"
                . "<div id='logo'> \n"
                . "<a href='index.php'><span>Restaurante</span></a>\n"
                . "</div><div id='itens-menu'>\n"
                . "<a href='$link[0]'><span id='$ativo[0]'><center>$item[0]</center></span></a>\n"
                . "<a href='$link[1]'><span id='$ativo[1]'><center>$item[1]</center></span></a>\n"
                . "<a href='$link[2]'><span id='$ativo[2]'><center>$item[2]</center></span></a>\n"
                . $quartoItem
                . $quintoItem
                . "</div>\n"
                . "<div id='bt-conectar'>\n"
                . "<a href='$link[5]'><span><center>$item[5]</center></span></a>\n"
                . "</div>\n"
                . "</div>\n";

        $this->setConteudoMenu($conteudo);
    }

    function menu() {
        return $this->conteudoMenu;
    }

}

//fim da classe menuInterativo

<?php

/**
 * Description of index
 * Conteúdo da página principal
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */
class mesa {

    function conteudo($registros = 0, $t = 0) {
//        if ($registros != null)
//            header("location:./login.php");
//      
        $conteudoTemp = '';
        $precoFinal = 0;
        $numero = '';
echo "<br><br><br><br><br><br><br><br><br><br>".gettype($registros);
exit();
        if (is_object($registros)) {
            echo 'Objeto';
            exit();
        }
        if (is_array($registros)) {
            echo 'Array';
            exit();
        }

        if ($numero != '') {
//        if ($registros["act"]=="comandaACT") {
            $dados = "<div class='titulo'>"
                    . "<p><span>Comandas em Aberto</span></p>"
                    . "<p><span>Mesa -01</span></p>"
                    . "</div>"
                    . "<div id='comandas'>"
                    . "<label for='comanda01' >"
                    . "<div class='comanda'>"
                    . "<p>Nome: Felipe Correa</p>"
                    . "<p>CPF: 46188259878</p>"
                    . "<p>Valor Total: R$ 20,00</p>"
                    . "<input type='submit' id='comanda01' name='act' value='01' style='display:none;' />"
                    . "<p><span>X Fechar Conta X</span></p>"
                    . "</div>"
                    . "</label>"
                    . "</div>";
        } else {
            foreach ($registros as $key => $value) {
                /* foreach ($value as $key2 => $value2) {
                  /* foreach ($value as $key2 => $value2) {
                  $conteudo2 .= $key2 . '->' . $value2 . '<br>';
                  }
                  $conteudo2 .= '<br>'; */
                if (isset($value["numeromesa"]))
                    $numero = $value["numeromesa"];


                $conteudoTemp .= "<label for='mesa$numero'>\n"
                        . "<div class='mesa'>\n"
                        . "<p>Mesa $numero</p>\n"
                        . "<p>Comandas em Aberto</p>\n"
                        . "<input id='mesa$numero' type='submit' name='act' value='$numero'/>\n"
                        . "<p>Acessar</p></div></label>\n";
            }
        }
        $conteudo = "<div class = 'item-campo'>\n"
                . "<div id='conteudo'>\n"
                . "<p class='titulo'><span>Mesas</span></p>\n"
                . "<form action='' method='POST'>\n"
                . "<div id='mesas'>\n"
                . $conteudoTemp
                . "</div>\n"
                . "</form>\n"
                . "</div>\n"
                . "<br>\n";
        return $conteudo;
    }

}

//fim da classe index

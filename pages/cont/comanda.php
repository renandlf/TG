<?php

/**
 * Description of index
 * Conteúdo da página principal
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */
class comanda {

    function conteudo($registros = 0) {
//        if ($registros != null)
//            header("location:./login.php");
//      
        $conteudoTemp = '';
        $precoFinal=0;
        foreach ($registros as $key => $value) {
            /* foreach ($value as $key2 => $value2) {
              /* foreach ($value as $key2 => $value2) {
              $conteudo2 .= $key2 . '->' . $value2 . '<br>';
              }
              $conteudo2 .= '<br>'; */
            $nome = $value["NOMEPROD"];
//            $descricao = (isset($value["descricao"]))?($value["descricao"]):('');
            $precoTotal = $value["PRECOPROD"];
            $mesa = $value["numeromesa"];
            $precoUnitario = $value["PRECOUN"];
            $qtd = $value["QTDTOTALPROD"];

            /* $conteudoTemp .= "<label for='produto$id'>"
              . "<div class='produto $desativado'>"
              . "<p><span>Nome: $nome</span></p>"
              . "<p><span>Descrição: $descricao</span>"
              . "<div class='produto-b'>"
              . "<p><span>&nbsp;Preço: R$ $preco</span>"
              . "</div>"
              . "<div class='produto-c'>"
              . "<span>Quantidade: <input type='number' name='quatidadeprod$id' value='$value' min='1' max='$estoque' $disabled/></span>"
              . "<span><input type='checkbox' id='produto$id' name='produto[]' value='$id' $disabled/></span></p>"
              . "</div>"
              . "</div>"
              . "</label>";
             */




            $conteudoTemp .= "<div class='produto-comanda'>"
                    . "<p><span>Nome: $nome</span></p>"
                    . "<p><span>Quantidade: $qtd</span></p>"
                    . "<p><span>Preço Unitario: R$ $precoUnitario</span></p>"
                    . "<p><span>Preço Total: R$ $precoTotal</span></p>"
                    . "</div>";
            $precoFinal+=$precoTotal;
        }

        $conteudo = "<div class = 'item-campo'>\n"
                . "<div id='conteudo'>\n"
                . "<p class='titulo'><span>Comanda - Mesa $mesa </span></p>"
                . "<form action='' method='POST'>"
                . $conteudoTemp
                . "<div class='produto-comanda'>"
                . "<br>"
                . "<p><span>Preço Total: R$ $precoFinal</span></p>"
                . "</div>"
                . "<input type='submit' name='act' value='Realizar Pagamento'/>"
                . "</form>"
                . "</div>"
                . "<br>";
        return $conteudo;
    }

}

//fim da classe index

<?php

/**
 * Description of index
 * Conteúdo da página principal
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */

class produto {

    function conteudo($registros = 0) {
//        if ($registros != null)
//            header("location:./login.php");
//      
        $conteudoTemp = '';
        foreach ($registros as $key => $value) {
            /* foreach ($value as $key2 => $value2) {
            /* foreach ($value as $key2 => $value2) {
              $conteudo2 .= $key2 . '->' . $value2 . '<br>';
              }
              $conteudo2 .= '<br>'; */
            $id = $value["pkproduto"];
            $nome = $value["nome"];
            $descricao = (isset($value["descricao"]))?($value["descricao"]):('');
            $preco = $value["preco"];
            $estoque = ($value["estoque"]>0)?($value["estoque"]):(0);
            $desativado = ($value["estoque"]>0)?(""):("desativado");
            $disabled  = ($value["estoque"]>0)?(""):("disabled");
            $value = ($value["estoque"]==0)?(0):(1);
            
            $conteudoTemp .= "<label for='produto$id'>"
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
                
        }

        $conteudo = "<div class = 'item-campo'>\n"
                . "<div id='conteudo'>\n"
                . "<p class='titulo'><span>Produtos </span></p>"
                . "<form action='' method='POST'>"
                . $conteudoTemp
                . "<p><span>Número da mesa: <input type='number' name='numeromesa' value='' min='1' max='30' required/></span></p>"
                . "<input type='submit' name='act' value='Adicionar na Comanda'/>"
                . "</form>"
                
                . "</div>"
                . "<br>";
        return $conteudo;
    }

}

//fim da classe index

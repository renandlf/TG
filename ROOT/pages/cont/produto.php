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
            $valor = ($value["estoque"]==0)?(0):(1);
            $quantidade = $value["estoque"];
            
            $conteudoTemp .= "<label for='produto$id'>"
                . "<div class='produto '>"
                . "<p><span>Nome: <input type='text' name='nome' value='$nome'/></span></p>"
                . "<p><span style='width:1em;'>Descrição: <input type='text' name='descricao' value='$descricao'/></span>"
                . "<div class='produto-b'>"
                . "<p><span>&nbsp;Preço: R$ <input type='text' name='preco' value='$preco'  style='width:3em;'/></span>"
                . "</div>"
                . "<div class='produto-c'>"
                . "<span>Quantidade: <input type='number' name='quatidadeprod$id' value='$quantidade' min='$valor' max='$quantidade' /></span>"
                . "<span><input type='checkbox' id='produto$id' name='produto[]' value='$id' /></span></p>"
                . "</div>"
                . "</div>"
                . "</label>";
                
        }

        $conteudo = "<div class = 'item-campo'>\n"
                . "<div id='conteudo'>\n"
                . "<p class='titulo'><span>Selecione os produtos para realizar a alteração</span></p>"
                . "<form action='' method='POST'>"
                . $conteudoTemp
                . "<input type='submit' name='act' value='Atualizar'/>"
                . "<input type='submit' name='act' value='Deletar'/>"
                . "</form>"
                . "<br>"
                . "<form action='' method='POST'>"
                . "<p><span>Nome: </span><input type='text' name='nome'/></p>"
                . "<p><span>Descrição: </span><input type='text' name='descricao'/></p>"
                . "<p><span>Preço: </span><input type='text' name='preco'/></p>"
                . "<p><span>Quantidade: <input type='number' name='quantidade' value='1' min='1' max='300' /></span></p>"
                . "<p><input type='submit' name='act' value='Incluir'/></p>"
                . "</form>"
                . "</div>"
                . "<br>";
        return $conteudo;
    }

}

//fim da classe index

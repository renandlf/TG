<?php

/**
 * Description of index
 * Conteúdo da página principal
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */
class perfil {

    function conteudo($dados) {
        if ($dados == null)
            header("location:./login.php");
        /*
          foreach ($dados as $key => $value) {
          echo $key.'->'.$value.'<br>';
          }
          exit(); */

//        $estado = array('$dados[estado]'=>'selected');
        $estado = array('AC' => '', 'AL' => '', 'AM' => '', 'AP' => '', 'BA' => '', 'CE' => '', 'DF' => '', 'ES' => '', 'GO' => '', 'MA' => '', 'MG' => '', 'MS' => '', 'MT' => '', 'PA' => '', 'PB' => '', 'PE' => '', 'PI' => '', 'PR' => '', 'RJ' => '', 'RN' => '', 'RS' => '', 'RO' => '', 'RR' => '', 'SC' => '', 'SE' => '', 'SP' => '', 'TO' => '');
        $dadosEstadoM = strtoupper($dados['estado']);
        $estado["$dadosEstadoM"] = 'selected';
        $conteudoEstado = null;
        foreach ($estado as $key => $value) {
            $selected = 'false';
            if ($key == strtoupper($dados['estado'])) {
                $selected = 'selected';
            }
            
            $conteudoEstado .= "<option value = '$key' $value>$key</option>\n";
        }
        $conteudo = "<div class = 'item-campo'>\n"
                . "<div id='conteudo'>\n"
                . "<form action='' method='POST'>\n"
                . "<p><span style='font-size:1.5em;'>Dados da Empresa</span></p>\n"
                . "<br>\n"
                . "<p><span>Nome:* </span>\n"
                . "<input type='text' name='nome' value='$dados[nome]'/></p>\n"
                . "<br>\n"
                . "<p><span>CNPJ:* </span>\n"
                . "<input type='text' name='CNPJ' value='$dados[cnpj]'/></p>\n"
                . "<br>\n"
                . "<p><span>Telefone:* </span>\n"
                . "<input type='text' name='telefone' value='$dados[telefone]'/></p>\n"
                . "<br>\n"
                . "<p><span>CEP:* </span><input type = 'text' name = 'cep' id = 'cep' value='$dados[cep]' onblur = 'pesquisacep(this.value);'/></p>\n"
                . "<p><span>Rua:* </span><input type = 'text' name = 'rua' id = 'rua' value='$dados[rua]'/></p>\n"
                . "<p><span>Numero:* </span><input type = 'text' name = 'numero' id = 'numero' value='$dados[numero]'/></p>\n"
                . "<p><span>Bairro:* </span><input type = 'text' name = 'bairro' id = 'bairro' value='$dados[bairro]'/></p>\n"
                . "<p><span>Cidade:* </span><input type = 'text' name = 'cidade' id = 'cidade' value='$dados[cidade]'/></p>\n"
                . "<p><span>Estado:* </span>"
                . "<select name = 'estado' id = 'estado'>\n"
//                . "<option value = '' disabled = 'disabled'>Selecione</option>\n"
                . "$conteudoEstado"
                . "</select></p>\n"
                . "<p><span>E-mail:* </span>\n"
                . "<input type='text' name='email' value='$dados[email]'/></p>\n"
                . "<p><span>Senha:* </span>\n"
                . "<input type='password' name='senha'/></p>\n"
                . "<input type='hidden' name='act' value='atu'/>\n"
                . "<br><input type='submit' name='Atualizar' value='atualizar'/>\n"
                . "<input type='submit' name='Excluir Registro' value='deletar'/>\n"
                . "</form>\n"
                . "</div>"
                . "</div>"
                . "<br>";
        return $conteudo;
    }

}

//fim da classe index

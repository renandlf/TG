<?php

/**
 * Description of index
 * Conteúdo da página principal
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */
class cadastrar {

    function conteudo() {
        $conteudo = "<div class = 'item-campo'>\n"
                . "<div id='conteudo'>\n"
                . "<form action='' method='POST'>\n"
                . "<p><span style='font-size:1.5em;'>Login</span></p>\n"
                . "<br>\n"
                . "<p><span>Nome:* </span>\n"
                . "<input type='text' name='nome'/></p>\n"
                . "<br>\n"
                . "<p><span>CPF:* </span>\n"
                . "<input type='text' name='cpf'/></p>\n"
                . "<br>\n"
                . "<p><span>RG:* </span>\n"
                . "<input type='text' name='rg'/></p>\n"
                . "<br>\n"
                . "<p><span>Data de nascimento:* </span>\n"
                . "<input type='date' name='datanascimento'/></p>\n"
                . "<br>\n"
                . "<p><span>Telefone:* </span>\n"
                . "<input type='text' name='telefone'/></p>\n"
                . "<br>\n"
                . "<!------------------------->\n"
                . "<p><span>CEP:* </span><input type = 'text' name = 'cep' id = 'cep' onblur = 'pesquisacep(this.value);'/></p>\n"
                . "<p><span>Rua:* </span><input type = 'text' name = 'rua' id = 'rua' /></p>\n"
                . "<p><span>Numero:* </span><input type = 'text' name = 'numero' id = 'numero' /></p>\n"
                . "<p><span>Bairro:* </span><input type = 'text' name = 'bairro' id = 'bairro'/></p>\n"
                . "<p><span>Cidade:* </span><input type = 'text' name = 'cidade' id = 'cidade'/></p>\n"
                . "<p><span>Estado:* </span><select name = 'estado' id = 'estado' >\n"
                . "<option value = '' disabled = 'disabled' selected>Selecione</option>\n"
                . "<option value = 'AC'>AC</option>\n"
                . "<option value = 'AL'>AL</option>\n"
                . "<option value = 'AM'>AM</option>\n"
                . "<option value = 'AP'>AP</option>\n"
                . "<option value = 'BA'>BA</option>\n"
                . "<option value = 'CE'>CE</option>\n"
                . "<option value = 'DF'>DF</option>\n"
                . "<option value = 'ES'>ES</option>\n"
                . "<option value = 'GO'>GO</option>\n"
                . "<option value = 'MA'>MA</option>\n"
                . "<option value = 'MG'>MG</option>\n"
                . "<option value = 'MS'>MS</option>\n"
                . "<option value = 'MT'>MT</option>\n"
                . "<option value = 'PA'>PA</option>\n"
                . "<option value = 'PB'>PB</option>\n"
                . "<option value = 'PE'>PE</option>\n"
                . "<option value = 'PI'>PI</option>\n"
                . "<option value = 'PR'>PR</option>\n"
                . "<option value = 'RJ'>RJ</option>\n"
                . "<option value = 'RN'>RN</option>\n"
                . "<option value = 'RS'>RS</option>\n"
                . "<option value = 'RO'>RO</option>\n"
                . "<option value = 'RR'>RR</option>\n"
                . "<option value = 'SC'>SC</option>\n"
                . "<option value = 'SE'>SE</option>\n"
                . "<option value = 'SP'>SP</option>\n"
                . "<option value = 'TO'>TO</option>\n"
                . "</select><p>\n"
                . "<!------------------------->\n"
                . "<p><span>E-mail:* </span>\n"
                . "<input type='text' name='email'/></p>\n"
                . "<p><span>Senha:* </span>\n"
                . "<input type='password' name='senha'/></p>\n"
                . "<input type='hidden' name='act' value='cons'/>\n"
                . "<br><input type='submit' name='cadastrar' value='Cadastrar'/>\n"
                . "</form>\n"
                . "</div>"
                . "</br>";
        return $conteudo;
    }

}

//fim da classe index

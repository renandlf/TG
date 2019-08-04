<?php

/**
 * Description of index
 * Conteúdo da página principal
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */

class login {
    function conteudo() {
        $conteudo = "<div id='conteudo'>\n"
                . "<form action='' method='POST'>\n"
                . "<p><span style='font-size:1.5em;'>Login</span></p>\n"
                . "<br>\n"
                . "<p><span>Email:* </span>\n"
                . "<input type='email' name='login'/></p>\n"
                . "<br>\n"
                
                . "<p><span>Senha:* </span>\n"
                . "<input type='password' name='senha'/></p>\n"
                . "<input type='hidden' name='act' value='cons'/>\n"
                . "<br><input type='submit' name='cadastrar' value='Cadastrar'/>\n"
                . "<input type='submit' value='Avançar'/>\n"
                . "</form>\n"
                . "</div>\n";
        return $conteudo;
    }
}

//fim da classe index

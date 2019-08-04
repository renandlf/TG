<?php

/**
 * Description of htmlHeader
 *
 * @author Felipe
 */
class htmlFooter {

    function footer($param = '') {
        $conteudo = "<footer>\n"
                . "<center>\n"
                . "<span style='position: relative; top: 0.5em;'>Ourinhos - 2019</span>\n"
                . "</center>\n"
                . "</footer>\n"
                . "</body>\n"
                . "</html>\n";
        return $conteudo;
    }

}

<?php

/**
 * Description of teste
 *
 * @author Felipe Correa Gomes
 * @since 09/07/2019
 * 
 */

foreach ($_POST as $key => $value) {
    echo $key."->".$value."<br>";
}
foreach ($_POST["produto"] as $key => $value) {
    echo $key."->".$value."<br>";
}

//fim do arquivo teste

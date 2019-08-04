<?php

/**
 * Description of logout
 *
 * @author Felipe Correa Gomes
 * @since 05/07/2019
 * 
 */

session_start();
unset($_SESSION);
session_destroy();
    header("location:/index.php");

//fim do arquivo logout

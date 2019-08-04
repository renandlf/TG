<?php

/**
 * Description of conBD
 *
 * @author Felipe Correa Gomes
 * @since 04/07/2019
 * 
 */
class conBD {

    private $user = "felipecg";
    private $key = "";
    private $host = "localhost";
    private $nameDb = "comanda";

    function getUser() {
        return $this->user;
    }

    function getKey() {
        return $this->key;
    }

    function getHost() {
        return $this->host;
    }

    function getNameDb() {
        return $this->nameDb;
    }

    function conectarBD($falha) {
        $user = $this->getUser();
        $key = $this->getKey();
        $host = $this->getHost();
        $nameDb = $this->getNameDb();
        $con = mysqli_connect($host, $user, $key, $nameDb) or die($falha . mysqli_error($con));
        return $con;
    }

    function finalizarBD($linkBD) {
        mysqli_close($linkBD);
        unset($linkBD);
    }

}

//fim da classe conBD

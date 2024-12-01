<?php

class Conexion{

    static public function conectar(){
        $link = new PDO ("mysql:host=localhost;dbname=deber" ,"root" ,"");
        return $link;
    }

}

<?php

try{
    /*Classe PDO est une classe qui va nous permettre de faire des requetes SQL facilement*/
    $bdd = new PDO('mysql:host=localhost;dbname=forum php & mysql;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('Error : ' . $e->getMessage());
}

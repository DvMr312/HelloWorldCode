<?php
session_start();
/*Sécurité d'authentification*/
if(!isset($_SESSION['auth'])){
    header('Location: Signin.php');

}
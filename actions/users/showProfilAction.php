<?php
require('actions/database.php');

/*Récupération de l'id de l'utilisateur*/
if(isset($_GET['id']) AND !empty($_GET['id'])){

    /*id de l'utilisateur*/
    $idOfUser = $_GET['id'];

    /*Vérifier si l'utilisateur existe*/
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, name, lastname FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){

        /*Récupérer toutes les données de l'utilisateur*/
        $userInfos = $checkIfUserExists->fetch();
        $user_pseudo = $userInfos['pseudo'];
        $user_name = $userInfos['name'];
        $user_lastname = $userInfos['lastname'];

        /*Récupération de toutes les questions publié de l'utilisateur*/
        $getQuestions = $bdd->prepare('SELECT object, description, content, pseudo_author, date_publication FROM objectsnotices WHERE id_author =? ORDER BY id DESC');
        $getQuestions->execute(array($idOfUser));

    }else{
        $ErrorMsg = "No user found !";
    }




}else{
    $ErrorMsg = "No user found !";
}
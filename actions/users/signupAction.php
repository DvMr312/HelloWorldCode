<?php
session_start();
require('actions/database.php');

/*Validation du formulaire isset pour vérifier si notre variable existe*/
if(isset($_POST['validate'])){

    /*Verification si les champs ont été complété*/
    if(!empty($_POST['pseudo'])  &&  !empty($_POST['name'])  &&  !empty($_POST['lastname'])  &&  !empty($_POST['password'])){
        /*Ici nous stockons nos données collecté dans des variable*/
        /*htmlspecialchars pour éviter des risques d'injections de la par ds utilisateurs et password_hash pour crypter les mdp de notre bdd*/
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_name = htmlspecialchars($_POST['name']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        /*Verification si l'utilisateur est deja inscrit*/
        /*Appel de la methode prepare pour effectuer la requete SQL*/
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() <= 0){
            /*Inscription de l'utilisateur*/
            $insertUserOnTheForum = $bdd->prepare('INSERT INTO users (pseudo, name, lastname, password)VALUES (?, ?, ?, ?)');
            $insertUserOnTheForum->execute(array($user_pseudo, $user_name, $user_lastname, $user_password));

            /*Authentification de l'utilisateur*/
            $getInfoOfUser = $bdd->prepare('SELECT id, name, lastname FROM users WHERE name = ? AND lastname = ?');
            $getInfoOfUser->execute(array($user_name, $user_lastname));
            /*Pour pouvoir récupérer ces données on les stock dans un tableau grace à la méthode fetch, et comme ca on récupere nos données d'utilisateurs dans notre variable userInfos */
            $userInfos = $getInfoOfUser->fetch();

            /*D'eclaration session auth pour authentifierl'utilisateur*/
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['lastname'];
            $_SESSION['name'] = $userInfos['name'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            /*Redirection vers la page d'acceuil de notre forum*/
            header('Location: index.php');


        }else{
            $ErrorMsg = "This pseudo is already in use!";
        }


    }else{
        $ErrorMsg = "Please complete all fields !";
    }
    
}
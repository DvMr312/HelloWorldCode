<?php
session_start();
require('actions/database.php');

/*Validation du formulaire isset pour vérifier si notre variable existe*/
if(isset($_POST['validate'])){

    /*Verification si les champs ont été complété*/
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])){

        /*Ici nous stockons nos données collecté dans des variable*/
        /*htmlspecialchars pour éviter des risques d'injections de la par ds utilisateurs et password_hash pour crypter les mdp de notre bdd*/
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        /*Verification si l'utilisateur existe*/
        $checkIfUserExist = $bdd->prepare('SELECT id, pseudo, name, lastname, password FROM users WHERE pseudo = ?');
        $checkIfUserExist->execute(array($user_pseudo));

        /*Verifier si le password correspond a celui en brut et hasher*/
        if($checkIfUserExist->rowCount() == 1){

            $userInfos = $checkIfUserExist->fetch();
            if(password_verify($user_password, $userInfos['password'])){
            
            /*D'eclaration session auth pour authentifierl'utilisateur*/
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['lastname'];
            $_SESSION['name'] = $userInfos['name'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            /*Si tous ce passe bien accès au forum autorisé*/
            header('Location: index.php');

            }else{
                $ErrorMsg = "Your username or password is incorrect !";  

            }

        }else{
            $ErrorMsg = "Your username or password is incorrect !";          

        }

    }else{
        $ErrorMsg = "Please complete all fields !";
    }
    
}
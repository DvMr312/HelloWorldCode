<?php

/*Vérification de l'authentification*/
session_start();
if(!isset($_SESSION['auth'])){
    /*On sort deux fois pour accéder à la page signin*/
    header('Location: ../../SigninActions.php');
}
require ('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTheQuestion = $_GET['id'];

    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM objectsnotices WHERE ID = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        /*Récupération des infos de la question*/
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_author'] == $_SESSION['id']){
            /*Supprimer la question en fonction de son id en parametre (regarder l'url)*/
            $deleteThisQuestion = $bdd->prepare('DELETE FROM objectsnotices WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            header('Location: ../../myQuestions.php');

        }else{
            echo "Not your POST";
        }


    }else{
        echo "No question was found :( ";
    }

}else{
    
    echo "No question was found :( ";
}


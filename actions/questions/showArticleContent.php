<?php

require('actions/database.php');

/*Vérifier si l'id de la question est rentrée dans l'url*/
if(isset($_GET['id']) AND !empty($_GET['id'])){

    /*Recupérer l'identifiant de la question*/
    $idOfTheQuestion = $_GET['id'];

    /*Vérification si la question existe*/
    $checkIfQuestionExist = $bdd->prepare('SELECT * FROM objectsnotices WHERE id = ?');
    $checkIfQuestionExist->execute(array($idOfTheQuestion));

    if($checkIfQuestionExist->rowCount() > 0){

        /*Récupérer les données de nos questions*/
        $questionInfos = $checkIfQuestionExist->fetch();

        /*Stocker les données dans nos variables*/
        $question_object = $questionInfos['object'];
        $question_description = $questionInfos['description'];
        $question_content = $questionInfos['content'];
        $question_id_author = $questionInfos['id_author'];
        $question_pseudo_author = $questionInfos['pseudo_author'];
        $question_date_publication = $questionInfos['date_publication'];

    }else{
        $ErrorMsg =  "No question found !";
    }

}else{
    $ErrorMsg = "No question found !";
}
<?php

require('actions/database.php');

/*Vérifier Si l'id de la question est bien présente...*/
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    //Vérifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM objectsnotices WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    /*Verification  si notre question existe bien sur le site*/
    if($checkIfQuestionExists->rowCount() > 0){
        /*Recupération des données sur le site de la question*/
        /*Si l'id de l'auteur correspond à celui de la question et qu'il s'agit bien de cette personne actuellement connect affichage du formulaire
        modifyQuestions.php*/
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_author'] == $_SESSION['id']){
            
            $question_object = $questionInfos['object'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['content'];

            $question_description = str_replace('<br />', '', $question_description);
            $question_content = str_replace('<br />', '', $question_content);

        }else{
            $errorMsg = "You are not the author of this question !!";
        }

    }else{
        $errorMsg = "No question was found :(";
    }

}else{
    $errorMsg = "No question was found :(";
}
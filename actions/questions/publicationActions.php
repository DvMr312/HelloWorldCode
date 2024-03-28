<?php
require('actions/database.php');

/*Valider le formulaire*/
if(isset($_POST['validate'])){

    /*Vérifier si les champs ne sont pas vides*/
    if(!empty($_POST['object']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        
        /*Les données de la question*/
        $question_title = htmlspecialchars($_POST['object']);
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/Y');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        /*Insérer la question sur le site*/
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO objectsnotices(object, description, content, id_author, pseudo_author, date_publication)VALUES(?, ?, ?, ?, ?, ?)');
        $insertQuestionOnWebsite->execute(
            array(
                $question_title, 
                $question_description, 
                $question_content, 
                $question_id_author, 
                $question_pseudo_author, 
                $question_date
            )
        );
        
        $successMsg = "Congrat ! Your message as sent !!";
        
    }else{
        $ErrorMsg = "Please complete all fiels !";
    }

}
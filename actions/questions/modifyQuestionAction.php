<?php

require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si les champs sont remplis
    if(!empty($_POST['object']) AND !empty($_POST['description']) AND !empty($_POST['content'])){

        //Les données à faire passer dans la requête
        $new_question_object = htmlspecialchars($_POST['object']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));
        
        //Modifier les informations de la question qui possède l'id rentré en paramètre dans l'URL
        $editQuestionOnWebsite = $bdd->prepare('UPDATE objectsnotices SET object = ?, description = ?, content = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($new_question_object, $new_question_description, $new_question_content, $idOfQuestion));

        //Redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: myQuestions.php');

    }else{
        $errorMsg = "Please modify your post !";
    }

}
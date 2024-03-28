<?php
require('actions/database.php');
require('actions/users/security.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['answer'])){

        $user_answer = nl2br(htmlspecialchars($_POST['answer']));

        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_author, pseudo_author, id_question, content, pseudo_author_Of_Ques)VALUES(?, ?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $idOfTheQuestion, $user_answer, $question_pseudo_author));

    }

}


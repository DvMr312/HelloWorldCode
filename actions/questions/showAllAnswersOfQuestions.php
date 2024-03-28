<?php

require('actions/database.php');

$getAllAnswersOfThisQuestion = $bdd->prepare('SELECT id_author, pseudo_author, id_question, content FROM answers WHERE id_question = ? ORDER BY id DESC');
$getAllAnswersOfThisQuestion->execute(array($idOfTheQuestion));
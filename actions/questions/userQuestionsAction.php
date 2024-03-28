<?php
require('actions/database.php');

$getAllMyQuestions = $bdd->prepare('SELECT object, description, id, content FROM objectsnotices WHERE id_author = ?');
$getAllMyQuestions->execute(array($_SESSION['id']));
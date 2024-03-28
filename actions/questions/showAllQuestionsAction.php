<?php

require('actions/database.php');

/*Récupération des questions par défault*/
$getAllQuestions = $bdd->query('SELECT id, id_author, object, content, description, pseudo_author, date_publication FROM objectsnotices ORDER BY id DESC LIMIT 0,8 ');
/*Verification si une recherche a été éffectuer*/
if(isset($_GET['search']) AND !empty($_GET['search'])){     
    
  /*Recherche...*/
    $userSearch = $_GET['search'];
    /*Recupération de toutes les données de la question avec SELECT
      De notre table objectsnotices
      Et récupère les question qui ressemble le plus a la recherche de l'utilisateur par ordre d'id décroissant*/
    $getAllQuestions = $bdd->query('SELECT id, id_author, object, content, description, pseudo_author, date_publication FROM objectsnotices WHERE object LIKE "%'.$userSearch.'%" ORDER BY id DESC');
    $successMsg = "Here are the messages that match your search !";
    $ErrorMsg = false;
}else{
  if($_GET['search'] = 'NULL'){
    $ErrorMsg = "There is no question matching your search !";
  }
}
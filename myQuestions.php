<?php 
require ('actions/users/security.php');
require ('actions/questions/userQuestionsAction.php');

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<link rel="stylesheet" href="assets/signup.css">
<link rel="stylesheet" href="assets/myQuestions.css">

<body>
  <?php include 'includes/navbar.php';?>
<?php 
    while($question = $getAllMyQuestions->fetch()){
      ?>
      <br>
      <div class="card">
          <h5 class="card-header">
              <?php echo $question['object']; ?>
          </h5>
      <div class="card-body">
        <p class="card-text">
          <?= $question['description'];  ?>
        </p>
        <p class="card-text2">
          <?= $question['content'];  ?>
        </p>
          <a href="article.php?id=<?php echo $question['id']; ?>" class="btnGo">Go To</a>
          <a href="modifyQuestions.php?id=<?= $question['id'];?>" class="modify">Modify</a>
          <a href="actions/questions/deleteQuestionsAction.php?id=<?= $question['id'];?>" class="btn btn-danger">Delete</a>
        </div>
      </div>            
      <?php
    }
    
?>
</body>
</html>

<!-----------------------COOKIE POLICY----------------------------->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Popup Cookie Consent Box</title>
    <link rel="stylesheet" href="cookiespolicy.css" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <script src="scriptcookie.js" defer></script>
  </head>
  <body>
    <div class="wrapper">
      <header>
        <i class="bx bx-cookie"></i>
        <h2>Cookies Consent</h2>
      </header>
      <div class="data">
      <p>This website use cookies to help you have a superior and more relevant browsing experience on the website... <a href="CookiePolicy.php"> Read more</a></p>
      </div>
      <div class="buttons">
        <button class="button" id="acceptBtn">Accept</button>
      </div>
    </div>
  </body>
</html>
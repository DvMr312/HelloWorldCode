<?php
    session_start();
    require('actions/questions/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/signup.css">
<link rel="stylesheet" href="assets/index.css">
<body>
<?php include 'includes/navbar.php'; ?>
<br><br>

<div class="container">
    
<!--Method GET pour récupérer les données de la recherche-->
<form method="GET">
    <div class="form-group row">
        <div class="col-8">
            <input type="search" name="search" class="form-control">
        </div>
        <div class="col-4">
            <button class="btn-btn-success" type="submit">Search</button>
        </div>

    </div>
</form>
<br>

<?php if(isset($ErrorMsg)){ echo '<p>'.$ErrorMsg.'</p>'; } ?>
<?php if(isset($successMsg)){ echo '<p>'.$successMsg.'</p>'; } ?>
<?php
     while($question = $getAllQuestions->fetch()){
        ?>
            <div class="card">
                <div class="card-header">
                    <a class="obj" href="article.php?id=<?php echo $question['id']; ?>">
                    <?= $question['object']; ?> 
                    </a>              
                </div>
                <div class="card-body">
                    <?= $question['description']; ?>
                </div>
                <div class="card-footer">
                Post by <a class="prof" href="profil.php?id=<?= $question['id_author']; ?>"><?= $question['pseudo_author']; ?></a> le <?= $question['date_publication']; ?>

                </div>
            </div>
            <br>
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
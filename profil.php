<?php 
session_start(); 
require('actions/users/showProfilAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/profil.css">
<body>
    <?php include 'includes/navbar.php'; ?>

    <br>
    <div class="container">
    <?php
        if(isset($ErrorMsg)){
            echo $ErrorMsg;
        }

        if(isset($getQuestions)){
            ?>
            <div class="card">
                <div class="card-body">
                    <h5><?= $user_pseudo; ?></h5>
                    <hr>
                    <p><?= $user_name. ' ' .$user_lastname ?></p>
                </div>
            </div>
            <br>            
            <?php
            while($question = $getQuestions->fetch()){
                ?>
                    <div class="card">
                        <div class="card-header">
                        <a class="obj" href="index.php?id=<?php echo $question['object']; ?>">
                        <?= $question['object']; ?> 
                        </a> 
                        </div>
                        <div class="card-body">
                        <?= $question['content']; ?>
                        </div>
                        <div class="card-footer">
                       By <?= $question['pseudo_author']; ?> the <?= $question['date_publication'] ?>
                        </div>
                    </div>
                    <br>

                <?php
            }
        }



    ?>
    </div>
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
      <p>This website use cookies to help you have a superior and more relevant browsing experience on the website...<a href="CookiePolicy.php"> Read more</a></p>
      </div>
      <div class="buttons">
        <button class="button" id="acceptBtn">Accept</button>
      </div>
    </div>
  </body>
</html>



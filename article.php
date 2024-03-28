<?php 
    require('actions/questions/showArticleContent.php'); 
    require('actions/questions/answersAction.php');
    require('actions/questions/showAllAnswersOfQuestions.php');
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/article.css">
<?php include 'includes/head.php';?>

<body>
    <?php include 'includes/navbar.php';?>    
    <br><br>

    <div class="container">
        <?php            
            if(isset($ErrorMsg)){
                echo $ErrorMsg;}

            if(isset($question_date_publication)){
                ?>
                <section class="content-ques">
                    <h3><?= $question_object; ?></h3>
                    <hr>
                    <p><?= $question_description; ?></p>
                    <hr>
                    <p><?= $question_content; ?></p>
                    <hr>
                    <small><?= $question_pseudo_author. ' ' .$question_date_publication; ?></small>
                </section>
                <br>
                <section class="answers-ques">

                    <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Reply :</label>
                            <textarea name="answer"class="form-control"></textarea>                            
                        </div>
                        <button type="submit" class="btn-btn-primary" name="validate">Reply To</button>
                    </form>
                    <br><br>

                    <?php 
                       while($answer = $getAllAnswersOfThisQuestion->fetch()){
                        ?>
                        <div class="card">
                                <div class="card-header">
                                        <?= $answer['pseudo_author']; ?>                                    
                                </div>
                                <div class="card-body">
                                    <?= $answer['content']; ?>
                                </div>
                            </div>
                            <br>
                        <?php
                       }
                    
                    ?>

                </section>
                
                <?php
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
      <p>This website use cookies to help you have a superior and more relevant browsing experience on the website... <a href="CookiePolicy.php"> Read more</a></p>
      </div>
      <div class="buttons">
        <button class="button" id="acceptBtn">Accept</button>
      </div>
    </div>
  </body>
</html>
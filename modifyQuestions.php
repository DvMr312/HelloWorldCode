<?php  
  require('actions/users/security.php');  
  require('actions/questions/getInfosOfModifyQuestions.php');
  require('actions/questions/modifyQuestionAction.php');
  

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<link rel="stylesheet" href="assets/signup.css">
<link rel="stylesheet" href="assets/myQuestions.css">
<link rel="stylesheet" href="assets/modifQues.css">

<body>
    <?php include 'includes/navbar.php';?>    

    <br><br>
    <div class="container">
      <?php if(isset($ErrorMsg)){ echo '<p>'.$ErrorMsg.'</p>'; } ?>

  <?php
     if(isset($question_content)){            
       ?>
         <form method="POST">
         <!--------------------------------Object of the question or notice----------------------------------------->
         <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Object/Notice</label>
          <input type="text" class="form-control" name="object" value="<?= $question_object ?>">
         </div>
         <!-------------------------------Description of the question or notice ----------------------------------------->
         <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Description</label>
          <textarea type="text" class="form-control" name="description"> <?= $question_description; ?></textarea>
         </div>
         <!-------------------------------Content----------------------------------------->
         <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Content</label>
          <textarea type="text" class="form-control" name="content"> <?= $question_content; ?></textarea> 
         </div>
          <button type="submit" class="btn-btn-primary" name="validate">MODIFY</button>
          </form>
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
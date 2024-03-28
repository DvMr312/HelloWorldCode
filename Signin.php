<?php require ('actions/users/SigninActions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';?>
<link rel="stylesheet" href="assets/signup.css">

<body>
    
<br><br>
    <form class="container" method="POST">
        <?php if(isset($ErrorMsg)){ echo '<p>'.$ErrorMsg.'</p>'; } ?>

      <!--------------------------------Input Pseudo----------------------------------------->
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Pseudo</label>
        <input type="text" class="form-control" name="pseudo">
        <div id="emailHelp" class="form-text">Never give out your username and password.</div>
      </div>

      <!-------------------------------Input Password----------------------------------------->
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="myInput">
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <script src="checkUp.js"></script>

      <button type="submit" class="btn btn-primary" name="validate">Connect</button>
      <br><br>
      <a href="signup.php"><p>No account? Register here!</p></a>

    </form>
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
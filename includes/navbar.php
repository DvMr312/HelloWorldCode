<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navbar.css">
    <title>Nav-Bar</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">HelloWorldCode</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Questions/Notices</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="zz" aria-current="page" href="publication.php">+ Add post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="myq" aria-current="page" href="myQuestions.php">My Questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="cookie" aria-current="page" href="CookiePolicy.php">Cookie Policy</a>
        </li>
        
        <?php 
          if(isset($_SESSION['auth'])){
            ?>
            <li class="nav-item">
              <a class="nav-link active"  aria-current="page" href="profil.php?id=<?= $_SESSION['id']; ?>">My profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="actions/users/logout.php">Log Out</a>
            </li>
            <?php


          }
        ?>
        
      </ul>
    </div>
  </div>
</nav>
    
</body>
</html>
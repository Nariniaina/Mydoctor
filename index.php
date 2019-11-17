<?php
    session_start();
?>
<!DOCTYPE html>
</html>
<html>
<head>
<meta charset="utf-8">
  <title>home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="script.js">
  </script>
</head>
<body id="acc" onload="debut()">    
  <div class="float">
      <a href="adminmode.php"><img src="adminsetting.png" alt="admin" height="50px;"></a>
  </div>
  <div class="heure">
    <p id="date" class="date"></p>
    <p id="txt" class="hour"><p>
  </div>
  <div class="espace1">
    <div class="fenetre">
      <form method="post" action="login.php">
        <div class="logtext">
          <h4><label>Login</label></h4>  
        </div>
        <div class="espace">
          <input class="loginput" type="text" name="username" placeholder="Dr" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>"
                        placeholder="Dr.">
        </div>
        <div>
          <input class="loginput" type="password" name="password" placeholder="Password" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" 
                        placeholder="Mot de passe">
        </div>
        <div class="espace">
          <input type="checkbox" name="remember"> <span style="color: rgb(96, 101, 95);">Remember me</span>
        </div>
        <button class="button" name="login"><span>Connexion</span></button>
        <div class="espace">
          <span style="color: #333">
              <?php
                if (isset($_SESSION['message'])){
                  echo $_SESSION['message'];
                }
                unset($_SESSION['message']);
              ?>
              </span>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
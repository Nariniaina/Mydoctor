<?php 
  include("auth.php");
  include('conn.php');
  if (isset($_POST['Champ1'])) {
     $dip = $_POST['dip'];
     $doc = $_SESSION['username'];
     $connect = mysqli_connect('localhost','root','') or die ('error'); //connexion au serveur SQL
     mysqli_select_db($connect,"mydoctor");  //connexion à la base
     $req="INSERT INTO t_diplome(dip_nom) values ('$dip');";  //requete SQL insertion 
    mysqli_query($connect,$req);
    header('location:adminmode.php');
   }
   if (isset($_POST['Champ2'])) {
     $spec = $_POST['spec'];
     $doc = $_SESSION['username'];
     $connect = mysqli_connect('localhost','root','') or die ('error'); //connexion au serveur SQL
     mysqli_select_db($connect,"mydoctor");  //connexion à la base
     $req1="INSERT INTO t_specialite(spec_nom) values ('$spec');";  //requete SQL insertion 
    mysqli_query($connect,$req1);
    header('location:adminmode.php');
   }
   if (isset($_POST['Champ3'])) {
     $mal = $_POST['mal'];
     $doc = $_SESSION['username'];
     $connect = mysqli_connect('localhost','root','') or die ('error'); //connexion au serveur SQL
     mysqli_select_db($connect,"mydoctor");  //connexion à la base
     $req2="INSERT INTO t_maladie(mal_nom) values ('$mal');";  //requete SQL insertion 
    mysqli_query($connect,$req2);
    header('location:adminmode.php');
   }
   if (isset($_POST['Champ4'])) {
     $sym = $_POST['sym'];
     $doc = $_SESSION['username'];
     $connect = mysqli_connect('localhost','root','') or die ('error'); //connexion au serveur SQL
     mysqli_select_db($connect,"mydoctor");  //connexion à la base
     $req3="INSERT INTO t_symptome(sym_nom) values ('$sym');";  //requete SQL insertion 
    mysqli_query($connect,$req3);
    header('location:adminmode.php');
   }
   if (isset($_POST['Champ5'])) {
     $sexe = $_POST['sexe'];
     $doc = $_SESSION['username'];
     $connect = mysqli_connect('localhost','root','') or die ('error'); //connexion au serveur SQL
     mysqli_select_db($connect,"mydoctor");  //connexion à la base
     $req4="INSERT INTO t_sexe(sexe_nom) values ('$sexe');";  //requete SQL insertion 
    mysqli_query($connect,$req4);
    header('location:adminmode.php');
   }
   $req0 = "select * from t_diplome;";
   $rs0 = mysqli_query($conn,$req0) or die(mysqli_error());
   $req11 = "select * from t_specialite;";
   $rs1 = mysqli_query($conn,$req11) or die(mysqli_error());
   $req22 = "select * from t_maladie;";
   $rs2 = mysqli_query($conn,$req22) or die(mysqli_error());
   $req33 = "select * from t_symptome;";
   $rs3 = mysqli_query($conn,$req33) or die(mysqli_error());
   $req44 = "select * from t_sexe;";
   $rs4 = mysqli_query($conn,$req44) or die(mysqli_error());
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="script.js">
  </script>
</head>
<body> 
  <body id="patientadd">
  <div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="addpatient.php" class="active1">Ajouter Patient</a>
  <a href="adddocteur.php" class="active1">Ajouter Docteur</a>
  <a href="listepatient">Liste des patients</a>
  <a href="listedocteur">Listes des docteurs</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
  <span style="float: right; color: white; padding: 13px;" style="color: white;"><?php echo "Bienvenue Administrateur, ";echo $_SESSION['username']; ?></span>
</div>
    <span style="float: right">
        <form method="post" action="logout.php">
            <p><button class="button button1">Se déconnecter</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
        </form>
    </span>
    <div class="float-left">
      <h1>Paramètre de la base de donnée :</h1>
      <div class="verifiepat">
        <form method="post" action="adminmode.php">
              <div><h2>Ajouter un diplome de docteur :</h2></div>
              <div class="espace1">
                  <table id="tablever" class="">
                      <tr>
                          <th>Nom</th>
                      </tr>
                      <?php  while ($et0 = mysqli_fetch_assoc($rs0))  {  ?>
                    <tr>
                        <td><?php echo ($et0['dip_nom']); ?></td>
                    </tr>
                    <?php } ?>
                    </table>
      </div>
              <p><input class="inptext" type="text" name="dip"placeholder="Champ1"></p>
              <div class="espace"><button class="buttons button2" name="Champ1"><span>Ajouter</span></button></div>
        </form>
      </div>
      <div class="espace"></div>
      <div class="verifiepat">
        <form method="post" action="adminmode.php">
              <div><h2>Ajouter une spécialité de docteur :</h2></div>
              <div class="espace1">
                  <table id="tablever" class="">
                      <tr>
                          <th>Nom</th>
                      </tr>
                      <?php  while ($et1 = mysqli_fetch_assoc($rs1))  {  ?>
                    <tr>
                        <td><?php echo ($et1['spec_nom']); ?></td>
                    </tr>
                    <?php } ?>
                    </table>
      </div>
              <p><input class="inptext" type="text" name="spec"placeholder="Champ2"></p>
              <div class="espace"><button class="buttons button2" name="Champ2"><span>Ajouter</span></button></div>
        </form>
      </div>
      <div class="espace"></div>
      <div class="verifiepat">
        <form method="post" action="adminmode.php">
              <div><h2>Ajouter une maladie :</h2></div>
              <div class="espace1">
                  <table id="tablever" class="">
                      <tr>
                          <th>Nom</th>
                      </tr>
                      <?php  while ($et2 = mysqli_fetch_assoc($rs2))  {  ?>
                    <tr>
                        <td><?php echo ($et2['mal_nom']); ?></td>
                    </tr>
                    <?php } ?>
                    </table>
      </div>
              <p><input class="inptext" type="text" name="mal"placeholder="Champ3"></p>
              <div class="espace"><button class="buttons button2" name="Champ3"><span>Ajouter</span></button></div>
        </form>
      </div>
      <div class="espace"></div>
      <div class="verifiepat">
        <form method="post" action="adminmode.php">
              <div><h2>Ajouter un symptome :</h2></div>
              <div class="espace1">
                  <table id="tablever" class="">
                      <tr>
                          <th>Nom</th>
                      </tr>
                      <?php  while ($et3 = mysqli_fetch_assoc($rs3))  {  ?>
                    <tr>
                        <td><?php echo ($et3['sym_nom']); ?></td>
                    </tr>
                    <?php } ?>
                    </table>
      </div>
              <p><input class="inptext" type="text" name="sym"placeholder="Champ4"></p>
              <div class="espace"><button class="buttons button2" name="Champ4"><span>Ajouter</span></button></div>
        </form>
      </div>
      <div class="espace"></div>
      <div class="verifiepat">
        <form method="post" action="adminmode.php">
              <div><h2>Ajouter un sexe :</h2></div>
              <div class="espace1">
                  <table id="tablever" class="">
                      <tr>
                          <th>Nom</th>
                      </tr>
                      <?php  while ($et4 = mysqli_fetch_assoc($rs4))  {  ?>
                    <tr>
                        <td><?php echo ($et4['sexe_nom']); ?></td>
                    </tr>
                    <?php } ?>
                    </table>
      </div>
              <p><input class="inptext" type="text" name="sexe"placeholder="Champ5"></p>
              <div class="espace"><button class="buttons button2" name="Champ5"><span>Ajouter</span></button></div>
        </form>
      </div>
    </div>
</body>
</html>
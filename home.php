<?php 
  include("auth.php");
  include('conn.php');
  $req = "select * from t_patient";
  $rs = mysqli_query($conn,$req) or die(mysqli_error());
  $option = NULL;
  while($row = mysqli_fetch_assoc($rs))
      {
        $option .= '<option value = "'.$row['pat_id'].'">'.$row['pat_nom'].' '.$row['pat_prenom'].' '.$row['pat_ddn'].'</option>';
      }
  $req1 = "select * from t_maladie";
  $rs1 = mysqli_query($conn,$req1) or die(mysqli_error());
  $option1 = NULL;
  while($row1 = mysqli_fetch_assoc($rs1))
      {
        $option1 .= '<option value = "'.$row1['mal_id'].'">'.$row1['mal_nom'].'</option>';
      }
  $req2 = "select * from t_symptome";
  $rs2 = mysqli_query($conn,$req2) or die(mysqli_error());
  $option2 = NULL;
  while($row2 = mysqli_fetch_assoc($rs2))
      {
        $option2 .= '<option value = "'.$row2['sym_id'].'">'.$row2['sym_nom'].'</option>';
      }
  if (isset($_POST['add'])) {
     $patient = $_POST['patient'];
     $maladie = $_POST['maladie'];
     $symptome = $_POST['symptome'];
     $date = date("Y-m-d H:i:s");
     $temper = $_POST['temper'];
     $poids = $_POST['poids'];
     $taille = $_POST['taille'];
     $tension = $_POST['tension'];
     $doc = $_SESSION['username'];
     $connect = mysqli_connect('localhost','root','') or die ('error'); //connexion au serveur SQL
     mysqli_select_db($connect,"mydoctor");  //connexion à la base
     $req="INSERT INTO a_consultation(pat_id,mal_id,sym_id,con_date,con_temp, con_poids,con_taille,con_tension,user_name) values ('$patient','$maladie','$symptome','$date','$temper','$poids','$taille','$tension','$doc');";  //requete SQL insertion 
    mysqli_query($connect,$req);
    header('location:accueil.php');
   }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="topnav" id="myTopnav">
  <a href="accueil.php" class="active">Home</a>
  <a href="addpatient.php" class="active1">Ajouter Patient</a>
  <a href="listepatient">Liste des patients</a>
  <a href="listedocteur">Listes des docteurs</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
  <span style="float: right; color: white; padding: 13px;" style="color: white;"><?php echo "Bienvenue, ";echo $_SESSION['username']; ?></span>
</div>
<span style="float: right">
        <form method="post" action="logout.php">
            <p><button class="button button1">Se déconnecter</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
        </form>
    </span>
<form method="post" action="accueil.php">
<div class="fenetre1">
  <h1>Consultation du jour</h1>
  <br>
    <p>Patient</p>
    <select name="patient" class="inptext"> 
        <option value = "<?php while($row = mysqli_fetch_assoc($rs))
    {
      $option .= '<option value = "'.$row['pat_id'].'">'.$row['pat_nom'].'+'.$row['pat_prenom'].'+'.$row['pat_ddn'].'</option>';
    }  ?>"><?php echo $option; ?></option>
    </select>
    <p>Maladie</p>
    <select name="maladie" class="inptext"> 
        <option value = "<?php while($row1 = mysqli_fetch_assoc($rs1))
    {
      $option1 .= '<option value = "'.$row1['mal_id'].'">'.$row1['mal_nom'].'</option>';
    }  ?>"><?php echo $option1; ?></option>
    </select>
    <p>Symptome</p>
    <select name="symptome" class="inptext"> 
        <option value = "<?php while($row2 = mysqli_fetch_assoc($rs2))
    {
      $option2 .= '<option value = "'.$row2['sym_id'].'">'.$row2['sym_nom'].'</option>';
    }  ?>"><?php echo $option2; ?></option>
    </select>
    <p><label>Poids</label> : </p>
    <p><input class="range" type="range" id="poids" name="poids" value="0" min="0" max="250"><i class="right">Valeur en Kg: <span id="kg"></span></i></p>
    <p><label>Taille</label> : </p><p><input class="range" type="range" id="taille" name="taille" value="0" min="0" max="300"><i class="right">Valeur en Cm: <span id="cm"></span></i></p>
    <p><label>Tension</label> : </p><p><input class="range" type="range" id="tension" name="tension" value="0" min="0.0" max="20.0" step="0.1"><i class="right">Valeur en RT: <span id="rt" min="0" max="25"></span></i></p>
    <p><label>Temperature</label> : </p><p><input class="range" type="range" id="temp" name="temper" value="0" min="0.0" max="50.0" step="0.1"><i class="right">Valeur en C: <span id="tmp" min="0" max="50"></span></i></p>
  <div class="espace"><button class="buttons" name="add"><span>Valider</span></button></div>
  </form>
</div>

</body>
  <script src="script.js">
  </script>
</html>

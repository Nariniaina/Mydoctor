<?php 
  include('conn.php');
    $req = "select * from t_sexe";
    $rs = mysqli_query($conn,$req) or die(mysqli_error());
    $option = NULL;
    while($row = mysqli_fetch_assoc($rs))
        {
          $option .= '<option value = "'.$row['sexe_id'].'">'.$row['sexe_nom'].'</option>';
        }
    $nomver1 = "NULL";
    $prenomver1 = "NULL";
    $ddnver1 = "NULL";
    if (isset($_POST['nomver'])) {
        $nomver1 = $_POST['nomver'];
        $prenomver1 = $_POST['prenomver'];
        $ddnver1 = $_POST['ddnver'];
     }
     $req1 = "select pat.pat_nom as nom, pat.pat_prenom as prenom, pat.pat_id as id , pat.pat_ddn as date, sexe.sexe_nom as sexe from t_patient pat inner join t_sexe sexe on sexe.sexe_id = pat.sexe_id having pat.pat_nom like '$nomver1%' && pat.pat_prenom like '$prenomver1%' && pat.pat_ddn like '$ddnver1%';";
        $rs4 = mysqli_query($conn,$req1) or die(mysqli_error());
     if (isset($_POST['ver'])) {
       $nom = htmlspecialchars($_POST['nom']);
       $prenom = htmlspecialchars($_POST['prenom']);
       $sexe = $_POST['sexe'];
       $date = $_POST['ddn'];
       $trn_date = date("Y-m-d");
       $email = $_POST['email'];
       $numero = $_POST['numero'];
       $poids = $_POST['poids'];
       $taille = $_POST['taille'];
       $tension = $_POST['tension'];
       $adresse = $_POST['adresse'];
       $connect = mysqli_connect('localhost','root','') or die ('error'); //connexion au serveur SQL
       mysqli_select_db($connect,"mydoctor");  //connexion à la base
       $req="INSERT INTO t_patient(pat_nom,pat_prenom,sexe_id,pat_ddn,pat_inscription,pat_email,pat_numero,pat_poids,pat_taille,pat_tension,pat_adresse) values ('$nom','$prenom','$sexe','$date','$trn_date','$email','$numero','$poids','$taille','$tension','$adresse');";  //requete SQL insertion 
      mysqli_query($connect,$req);
      header('location:addpatient.php');
     }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="patientadd">
  <div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="addpatient.php" class="active1">Ajouter Patient</a>
  <a href="listepatient">Liste des patients</a>
  <a href="listedocteur">Listes des docteurs</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
</div>
    <table>
      <tr>
        <td><form method="post" action="addpatient.php">
        <div class="Ajoutpat">
          <div class="centrer"><h1>Ajouter un patient :</h1></div>
          <p><label>Nom</label> : </p><p><input class="inptext" type="text" name="nom" required></p>
          <p><label>Prenom</label> : </p><p><input class="inptext" type="text" name="prenom" required></p>
          <p><label>Email</label> : </p><p><input class="inptext" type="email" name="email" placeholder="Exemple@email.ex"></p>
          <p><label>Date de naissance :</label><p><input class="inpdate" type="date" name='ddn' required></p>
          <p><label>Sexe</label> : </p>
          <p>
              <select name="sexe" class="inptext" required>
                  <option value = "<?php while($row = mysqli_fetch_assoc($rs))
              {
                $option .= '<option value = "'.$row['sexe_id'].'">'.$row['sexe_nom'].'</option>';
              }  ?>"><?php echo $option; ?></option>
              </select>
          </p>
          <p><label>Numero</label> : </p><p><i class="num"><input class="numer" style="background-color: #cccccccc" type="text" value="+261" readonly><input class="inpnumber1" type="number" name="numero" required placeholder="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9"></p>
          <p><label>Poids (Optionnel)</label> : </p>
          <p><input class="range" type="range" id="poids" name="poids" value="0" min="0" max="250"><i class="right">Valeur en Kg: <span id="kg"></span></i></p>
          <p><label>Taille (Optionnel)</label> : </p><p><input class="range" type="range" id="taille" name="taille" value="0" min="0" max="300"><i class="right">Valeur en Cm: <span id="cm"></span></i></p>
          <p><label>Tension (Optionnel)</label> : </p><p><input class="range" type="range" id="tension" name="tension" value="0" min="0.0" max="20.0" step="0.1"><i class="right">Valeur en RT: <span id="rt" min="0" max="25"></span></i></p>
          <p><label>Adresse</label> : </p><p><input class="inptext" type="text" name="adresse" required></p>
          <div class="espace"><button class="buttons button2" name="ver"><span>Ajouter</span></button></div>
          <script src="script.js">
          </script>
        </div>
      </form></td>
      <td><div class="verifiepat">
        <div class="block">
          <form method="post" action="addpatient.php">
            <div class="centrer"><h1>Verifier si un patient existe deja :</h1></div>
            <p><input class="inptext" type="text" name="nomver" placeholder="Nom"></p>
            <p><input class="inptext" type="text" name="prenomver"placeholder="Prenom"></p>
            <p><input class="inpdate" type="date" name='ddnver'></p>
            <div class="espace"><button class="buttons button2"><span>Chercher</span></button></div>
          </form>
        </div>
        <div>
          <table id="tablever">
          <tr>
              <th>Numero</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Date de anissance</th>
              <th>Sexe</th>
          </tr>
          <?php  while ($et = mysqli_fetch_assoc($rs4))  {  ?>
          <tr>
              <td><?php echo ($et['id']); ?></td>
              <td><?php echo ($et['nom']); ?></td>
              <td><?php echo ($et['prenom']); ?></td>
              <td><?php echo ($et['date']); ?></td>
              <td><?php echo ($et['sexe']); ?></td>
          </tr>
          <?php } ?>
          </table>
        </div>
      </div></td>
      </tr>
    </table>
</body>
</html>
<?php 
  include('conn.php');
  $req = "select * from t_sexe";
  $rs = mysqli_query($conn,$req) or die(mysqli_error());
  $req1 = "select * from t_diplome";
  $rs1 = mysqli_query($conn,$req1) or die(mysqli_error());
  $req2 = "select * from t_specialite";
  $rs2 = mysqli_query($conn,$req2) or die(mysqli_error());
  $option = NULL;
  $option1 = NULL;
  $option2 = NULL;
  while($row = mysqli_fetch_assoc($rs))
      {
        $option .= '<option value = "'.$row['sexe_id'].'">'.$row['sexe_nom'].'</option>';
      }
  while($row1 = mysqli_fetch_assoc($rs1))
      {
        $option1 .= '<option value = "'.$row1['dip_id'].'">'.$row1['dip_nom'].'</option>';
      }
  while($row2 = mysqli_fetch_assoc($rs2))
      {
        $option2 .= '<option value = "'.$row2['spec_id'].'">'.$row2['spec_nom'].'</option>';
      }
  if (isset($_POST['add'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $date = $_POST['ddn'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $diplome = $_POST['diplome'];
    $adresse = $_POST['adresse'];
    $spec = $_POST['spec'];
    $connect = mysqli_connect('localhost','root','') or die ('error'); //connexion au serveur SQL
    mysqli_select_db($connect,"mydoctor");  //connexion à la base
    $req="INSERT INTO t_docteur(doc_nom,doc_prenom,sexe_id,doc_ddn,dip_id,doc_email,doc_num,spec_id,doc_adresse) values ('$nom','$prenom','$sexe','$date','$diplome','$email','$numero','$spec','$adresse');";  //requete SQL insertion 
    mysqli_query($connect,$req);
    header('location:adddocteur.php');
  }
  $nomver1 = "NULL";
  $prenomver1 = "NULL";
  $ddnver1 = "NULL";
  if (isset($_POST['ver'])) {
        $nomver1 = $_POST['nomver'];
        $prenomver1 = $_POST['prenomver'];
        $ddnver1 = $_POST['ddnver'];
     }
     $req1 = "select doc.doc_id as id,doc.doc_nom as nom, doc.doc_prenom as prenom, doc.doc_ddn as date, sexe.sexe_nom as sexe , dip.dip_nom as diplome, spec.spec_nom as spec from t_docteur doc1 inner join t_sexe sexe inner join (t_diplome dip inner join t_docteur inner join (t_specialite spec inner join t_docteur doc on spec.spec_id = doc.spec_id) on dip.dip_id = doc.dip_id) on sexe.sexe_id = doc1.sexe_id group by doc.doc_nom, sexe.sexe_nom , dip.dip_nom, spec.spec_nom having nom like '$nomver1%' && prenom like '$prenomver1%' && date like '$ddnver1%';";
        $rs4 = mysqli_query($conn,$req1) or die(mysqli_error());
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="script.js">
  </script>
  <link rel="stylesheet" type="text/css" href="style.css">
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
</div>
    <table>
      <tr>
        <td>
          <form method="post" action="adddocteur.php">
        <div class="Ajoutdoc">
          <div class="centrer"><h1>Ajouter un docteur :</h1></div>
          <p><label>Nom</label> : </p><p><input class="inptext" type="text" name="nom" required></p>
          <p><label>Prenom</label> : </p><p><input class="inptext" type="text" name="prenom" required></p>
          <p><label>Date de naissance :</label><p><input class="inpdate" type="date" name='ddn' required></p>
          <p><label>Email</label> : </p><p><input class="inptext" type="text" name="email" placeholder="Exemple@email.ex"></p>
          <p><label>Diplome</label> : </p>
          <p>
              <select name="diplome" class="inptext" required> 
                  <option value = "<?php while($row1 = mysqli_fetch_assoc($rs1))
              {
                $option .= '<option value = "'.$row1['dip_id'].'">'.$row1['dip_nom'].'</option>';
              }  ?>"><?php echo $option1; ?></option>
              </select>
          </p>
          <p><label>Sexe</label> : </p>
          <p>
              <select name="sexe" class="inptext" required>
                  <option value = "<?php while($row = mysqli_fetch_assoc($rs))
              {
                $option .= '<option value = "'.$row['sexe_id'].'">'.$row['sexe_nom'].'</option>';
              }  ?>"><?php echo $option; ?></option>
              </select>
          </p>
          <p><label>Adresse</label> : </p><p><input class="inptext" type="text" name="adresse" required></p>
          <p><label>Numero</label> : </p><p><i class="num"><input class="numer" style="background-color: #cccccccc" type="text" value="+261" readonly><input class="inpnumber1" type="number" name="numero" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9"></i></p>
           <p><label>Specialité</label> : </p>
          <p>
            <select name="spec" class="inptext" required> 
                <option value = "<?php while($row2 = mysqli_fetch_assoc($rs2))
            {
              $option .= '<option value = "'.$row2['spec_id'].'">'.$row2['spec_nom'].'</option>';
            }  ?>"><?php echo $option2; ?></option>
            </select>
          </p>
          <div class="espace"><button class="buttons button2" name="add"><span>Ajouter</span></button></div>
        </div>
      </form>
        </td>
        <td>
          <td><div class="verifiedoc">
        <div class="block">
          <form method="post" action="adddocteur.php">
            <div class="centrer"><h1>Verifier si un docteur existe deja :</h1></div>
            <p><input class="inptext" type="text" name="nomver" placeholder="Nom"></p>
            <p><input class="inptext" type="text" name="prenomver"placeholder="Prenom"></p>
            <p><input class="inpdate" type="date" name='ddnver'></p>
            <div class="espace"><button class="buttons button2" name="ver"><span>Chercher</span></button></div>
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
              <th>Diplome</th>
              <th>Specialite</th>
          </tr>
          <?php  while ($et = mysqli_fetch_assoc($rs4))  {  ?>
          <tr>
              <td><?php echo ($et['id']); ?></td>
              <td><?php echo ($et['nom']); ?></td>
              <td><?php echo ($et['prenom']); ?></td>
              <td><?php echo ($et['date']); ?></td>
              <td><?php echo ($et['sexe']); ?></td>
              <td><?php echo ($et['diplome']); ?></td>
              <td><?php echo ($et['spec']); ?></td>
          </tr>
          <?php } ?>
          </table>
        </div>
      </div></td>
      </tr>
    </table>
</body>
</html>
<?php
    include('conn.php');
    $query=mysqli_query($conn,"select count(pat_id) as total from `t_patient`");
    $row=mysqli_fetch_array($query);
    $query1=mysqli_query($conn,"select count(pat_id) as total from `t_patient` where sexe_id = 1");
    $row1=mysqli_fetch_array($query1);
    $query2=mysqli_query($conn,"select count(pat_id) as total from `t_patient` where sexe_id = '2'");
    $row2=mysqli_fetch_array($query2);
    $requete1 = mysqli_query($conn,"select count(pat_id) from t_patient as total");
    $nomver1 = "NULL";
    $prenomver1 = "NULL";
    $ddnver1 = "NULL";
    $req = "select pat.pat_nom as nom, pat.pat_prenom as prenom, pat.pat_id as id , pat.pat_ddn as date, sexe.sexe_nom as sexe, pat.pat_inscription as ins, pat.pat_email as email, pat.pat_numero as num, pat.pat_poids as poids, pat.pat_taille as taille, pat.pat_tension as tension , pat.pat_adresse as adresse from t_patient pat inner join t_sexe sexe on sexe.sexe_id = pat.sexe_id";
    $rs4 = mysqli_query($conn,$req) or die(mysql_error());
    if (isset($_POST['ver'])) {
      $nomver1 = $_POST['nomver'];
      $prenomver1 = $_POST['prenomver'];
      $ddnver1 = $_POST['ddnver'];
      $req1 = "select pat.pat_nom as nom, pat.pat_prenom as prenom, pat.pat_id as id , pat.pat_ddn as date, sexe.sexe_nom as sexe, pat.pat_inscription as ins, pat.pat_email as email, pat.pat_numero as num, pat.pat_poids as poids, pat.pat_taille as taille, pat.pat_tension as tension , pat.pat_adresse as adresse from t_patient pat inner join t_sexe sexe on sexe.sexe_id = pat.sexe_id having pat.pat_nom like '$nomver1%' && pat.pat_prenom like '$prenomver1%' && pat.pat_ddn like '$ddnver1%';";
      $rs4 = mysqli_query($conn,$req1) or die(mysqli_error());
    }  
?>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="script.js">
  </script>
</head>
 <body>
    <div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="addpatient.php" class="active1">Ajouter Patient</a>
  <a href="listepatient">Liste des patients</a>
  <a href="listedocteur">Listes des docteurs</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
</div>
    <div class="float-left">
        <h1>Voici la liste de tous les patients :</h1>
        <br>
        <p>
            <label>Nombre total :</label>
            <label><?php echo $row['total']; ?> </label>
        </p>
        <br>
        <p>
            <label>Homme :</label>
            <label><?php echo $row1['total']; ?> </label>
        </p>
        <br>
        <p>
            <label>Femme :</label>
            <label><?php echo $row2['total']; ?> </label>
        </p>
    </div>
    <div class="float-left">
          <form method="post" action="listepatient4.php">
            <div class="centrer"><h1>Rechercher un patient :</h1></div>
            <p><input class="inptext" type="text" name="nomver" placeholder="Nom"></p>
            <p><input class="inptext" type="text" name="prenomver"placeholder="Prenom"></p>
            <p><input class="inpdate" type="date" name='ddnver'></p>
            <div class="espace"><button class="buttons" name="ver"><span>Chercher</span></button></div>
          </form>
        </div>
    </form>
    <div class="espace1">
        <table id="tablever1">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de anissance</th>
                <th>Sexe</th>
                <th>Inscription</th>
                <th>Email</th>
                <th>Numero</th>
                <th>Poids (Kg)</th>
                <th>Taille (cm)</th>
                <th>Tension (RT)</th>
                <th>Adresse</th>
                <th>Modification</th>
            </tr>
            <?php  while ($et = mysqli_fetch_assoc($rs4))  {  ?>
          <tr>
              <td><?php echo ($et['nom']); ?></td>
              <td><?php echo ($et['prenom']); ?></td>
              <td><?php echo ($et['date']); ?></td>
              <td><?php echo ($et['sexe']); ?></td>
              <td><?php echo ($et['ins']); ?></td>
              <td><?php echo ($et['email']); ?></td>
              <td><?php echo ($et['num']); ?></td>
              <td><?php echo ($et['poids']); ?></td>
              <td><?php echo ($et['taille']); ?></td>
              <td><?php echo ($et['tension']); ?></td>
              <td><?php echo ($et['adresse']); ?></td>
              <td><span><a href="dossier.php?code=<?php echo ($et['id']); ?>">Voir</a></span></td>
          </tr>
          <?php } ?>
          </table>
    </div>
    <?php echo "<br></br>"; ?>
 </body>
 </html>
<link rel="stylesheet" type="text/css" href="style.css">
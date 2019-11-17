<?php
    include('conn.php');
    $query=mysqli_query($conn,"select count(doc_id) as total from `t_docteur`");
    $row=mysqli_fetch_array($query);
    $query1=mysqli_query($conn,"select count(doc_id) as total from `t_docteur` where sexe_id = 1");
    $row1=mysqli_fetch_array($query1);
    $query2=mysqli_query($conn,"select count(doc_id) as total from `t_docteur` where sexe_id = '2'");
    $row2=mysqli_fetch_array($query2);
    $requete1 = mysqli_query($conn,"select count(doc_id) from t_docteur as total");
    $row3 = mysqli_fetch_array($requete1);
    $nomver1 = "NULL";
    $prenomver1 = "NULL";
    $ddnver1 = "NULL";
    $req = "select doc.doc_id as id, doc.doc_nom as nom, doc.doc_prenom as prenom, doc.doc_ddn as date, sexe.sexe_nom as sexe, doc.doc_email as email, doc.doc_num as numero , doc.doc_adresse as adresse,dip.dip_nom as diplome, spec.spec_nom as specialite from (t_sexe sexe, t_specialite spec) inner join (t_docteur doc inner join t_diplome dip on dip.dip_id = doc.dip_id) on (sexe.sexe_id = doc.sexe_id and spec.spec_id = doc.spec_id);";
    $rs4 = mysqli_query($conn,$req) or die(mysql_error());
    if (isset($_POST['ver'])) {
      $nomver1 = $_POST['nomver'];
      $prenomver1 = $_POST['prenomver'];
      $ddnver1 = $_POST['ddnver'];
      $req1 = "select doc.doc_id as id, doc.doc_nom as nom, doc.doc_prenom as prenom, doc.doc_ddn as date, sexe.sexe_nom as sexe, doc.doc_email as email, doc.doc_num as numero , doc.doc_adresse as adresse,dip.dip_nom as diplome, spec.spec_nom as specialite from (t_sexe sexe, t_specialite spec) inner join (t_docteur doc inner join t_diplome dip on dip.dip_id = doc.dip_id) on (sexe.sexe_id = doc.sexe_id and spec.spec_id = doc.spec_id) having nom like '$nomver1%' && prenom like '$prenomver1%' && date like '$ddnver1%';";
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
        <h1>Voici la liste de tous les docteurs :</h1>
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
          <form method="post" action="listedocteur.php">
            <div class="centrer"><h1>Rechercher un docteur :</h1></div>
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
                <th>Email</th>
                <th>Numero</th>
                <th>Adresse</th>
                <th>Diplome</th>
                <th>Specialite</th>
            </tr>
            <?php  while ($et = mysqli_fetch_assoc($rs4))  {  ?>
          <tr>
              <td><?php echo ($et['nom']); ?></td>
              <td><?php echo ($et['prenom']); ?></td>
              <td><?php echo ($et['date']); ?></td>
              <td><?php echo ($et['sexe']); ?></td>
              <td><?php echo ($et['email']); ?></td>
              <td><?php echo ($et['numero']); ?></td>
              <td><?php echo ($et['adresse']); ?></td>
              <td><?php echo ($et['diplome']); ?></td>
              <td><?php echo ($et['specialite']); ?></td>
          </tr>
          <?php } ?>
          </table>
    </div>
    <?php echo "<br></br>"; ?>
 </body>
 </html>
<link rel="stylesheet" type="text/css" href="style.css">
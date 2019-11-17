<?php
    include('conn.php');
    $code = $_GET['code'];    
    $query=mysqli_query($conn,"select count(con_id) as total from `a_consultation` where pat_id = $code");
    $row=mysqli_fetch_array($query);
    $query1=mysqli_query($conn,"select count(pat_id) as total from `t_patient` where sexe_id = 1");
    $row1=mysqli_fetch_array($query1);
    $query2=mysqli_query($conn,"select count(pat_id) as total from `t_patient` where sexe_id = '2'");
    $row2=mysqli_fetch_array($query2);
    $requete1 = mysqli_query($conn,"select count(pat_id) from t_patient as total");
    $req = "select pat.pat_id as id,pat.pat_nom as nom,pat.pat_prenom as prenom,con.con_date as date,sym.sym_nom as symptome,mal.mal_nom as maladie,con.con_temp as temperature,con.con_tension as tension,con.con_poids as poids, con.con_taille as taille,con.user_name as user from (t_symptome sym,t_maladie mal) inner join (a_consultation con inner join t_patient pat on pat.pat_id = con.pat_id) on (sym.sym_id = con.sym_id and mal.mal_id = con.mal_id) having id= $code;";
    $rs4 = mysqli_query($conn,$req) or die(mysql_error());
    $req1 = "select pat.pat_id as id,pat.pat_nom as nom,pat.pat_prenom as prenom,con.con_date as date,sym.sym_nom as symptome,mal.mal_nom as maladie,con.con_temp as temperature,con.con_tension as tension,con.con_poids as poids, con.con_taille as taille,con.user_name as user from (t_symptome sym,t_maladie mal) inner join (a_consultation con inner join t_patient pat on pat.pat_id = con.pat_id) on (sym.sym_id = con.sym_id and mal.mal_id = con.mal_id) group by id,maladie,symptome,user having id= $code;";
    $rs5 = mysqli_query($conn,$req1) or die(mysql_error());  
?>
<html>
 <body>
    <div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="#news">Liste des patients</a>
  <a href="#contact">Listes des docteurs</a>
  <a href="#about">Information d'un patient</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
</div>
    <div class="espace1">
        <h1>Voici le dossier de ce patient :</h1>
        <br>
        <p>
            <label>Nombre total de consultation :</label>
            <label><?php echo $row['total']; ?> </label>
        </p>
        <br>
        <br>
    </div>
    <div class="espace1">
      <h2>Maladie et symptome connu du patient</h2>
        <table id="tablever1">
            <tr>
                <th>symptome</th>
                <th>Maladie</th>
                <th>Docteur</th>
            </tr>
            <?php  while ($et1 = mysqli_fetch_assoc($rs5))  {  ?>
          <tr>
              <td><?php echo ($et1['symptome']); ?></td>
              <td><?php echo ($et1['maladie']); ?></td>
              <td><?php echo ($et1['user']); ?></td>
          </tr>
          <?php } ?>
          </table>
    </div>
    <?php echo "<br></br>"; ?>
    <div class="espace1">
      <h2>Listes des consultations</h2>
        <table id="tablever1">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de consultation</th>
                <th>symptome</th>
                <th>Maladie</th>
                <th>Température</th>
                <th>Tension</th>
                <th>Poids (Kg)</th>
                <th>Taille (cm)</th>
                <th>Docteur ayant consulté</th>
                <th>Modification</th>
            </tr>
            <?php  while ($et = mysqli_fetch_assoc($rs4))  {  ?>
          <tr>
              <td><?php echo ($et['nom']); ?></td>
              <td><?php echo ($et['prenom']); ?></td>
              <td><?php echo ($et['date']); ?></td>
              <td><?php echo ($et['symptome']); ?></td>
              <td><?php echo ($et['maladie']); ?></td>
              <td><?php echo ($et['temperature']); ?></td>
              <td><?php echo ($et['tension']); ?></td>
              <td><?php echo ($et['poids']); ?></td>
              <td><?php echo ($et['taille']); ?></td>
              <td><?php echo ($et['user']); ?></td>
              <td><span><a href="dossier.php?code=<?php echo ($et['id']); ?>">Editer</a></span></td>
          </tr>
          <?php } ?>
          </table>
    </div>
    <?php echo "<br></br>"; ?>
 </body>
 </html>
<link rel="stylesheet" type="text/css" href="style.css">
<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid trajets-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Tableau de bord</a>
            <a href="users" class="breadcrumb">Utilisateurs</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container scroll">
     <table class="highlight striped">
        <thead>
          <tr>
              <th data-field="nom">Nom et prénom</th>
              <th data-field="email">email</th>
              <th data-field="ville">Ville</th>
              <th data-field="pays">Pays</th>
              <th data-field="address">addresse</th>
              <th data-field="delete">Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../db.php';

                  //get users
                  $queryuser = "SELECT id, email, prenom, nom, address, ville, pays  FROM utilisateurs WHERE role = 'client'";
                  $resultuser = $connection->query($queryuser);
                  if ($resultuser->num_rows > 0) {
                    // output data of each row
                    while($rowuser = $resultuser->fetch_assoc()) {
                      $id_utilisateur = $rowuser['id'];
                      $prenom = $rowuser['prenom'];
                      $lasttname = $rowuser['nom'];
                      $email = $rowuser['email'];
                      $ville = $rowuser['ville'];
                      $pays = $rowuser['pays'];
                      $address = $rowuser['address'];
              ?>
              <tr>
                <td><?php echo" $prenom "." $lasttname"; ?></td>
                <td><?= $email; ?></td>
                <td><?= $pays; ?></td>
                <td><?= $pays; ?></td>
                <td><?= $address; ?></td>
                <td><a href="deleteuser.php?id=<?= $id_utilisateur; ?>"><i class="material-icons red-text">close</i></a></td>
              </tr>
              <?php }}  ?>
            </tbody>
          </table>
          </div>

   <?php require 'includes/footer.php'; ?>

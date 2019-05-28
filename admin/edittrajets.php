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
            <a href="infotrajets.php" class="breadcrumb">trajets</a>
            <a href="edittrajets" class="breadcrumb">Réservations</a>
          </div>
        </div>
      </nav>
    </div>
   </div>


<div class="container scroll">
  <table class="highlight striped">
     <thead>
       <tr>
           <th data-field="name">Trajet</th>
           <th data-field="prix">prix</th>
           <th data-field="nbr_place_reservees">nombre de places total :</th>
           <th data-field="nbr_place_reservees">places disponibles :</th>
           <th data-field="nbr_place_reservees">places réservées :</th>
           <th data-field="user">Utilisateurs</th>
           <th data-field="statut">Statut</th>
           <th data-field="delete">Supprimer</th>
       </tr>
     </thead>
     <tbody>
<?php
include '../db.php';

$queryfirst = "SELECT
trajets.id as 'id',
trajets.nbr_place_dispo as 'nbr_place_dispo',
trajets.trajet as 'name',
trajets.prix as 'prix',
SUM(reservation.nbr_place_reservees),
reservation.statut as 'statut',
reservation.id_trajet,
reservation.nbr_place_reservees as 'nbr_place_reservees',
reservation.id_utilisateur as 'user'
FROM trajets, reservation
WHERE trajets.id = reservation.id_trajet
GROUP BY reservation.id
ORDER BY SUM(reservation.id_utilisateur) DESC ";
$resultfirst = $connection->query($queryfirst);
if ($resultfirst->num_rows > 0) {
  // output data of each row
  while($rowfirst = $resultfirst->fetch_assoc()) {

        $idp = $rowfirst['id'];
        $name = $rowfirst['name'];
        $statut = $rowfirst['statut'];
        $nbr_place_reservees = $rowfirst['nbr_place_reservees'];
        $nbr_place_dispo = $rowfirst['nbr_place_dispo'];
        $prix = $rowfirst['prix'];
        $user = $rowfirst['user'];

        //get user name
        $queryuser = "SELECT prenom, nom FROM utilisateurs WHERE id = '$user'";
        $resultuser = $connection->query($queryuser);
        if ($resultuser->num_rows > 0) {
          // output data of each row
          while($rowuser = $resultuser->fetch_assoc()) {
            $userprenom = $rowuser['prenom'];
            $userlasttname = $rowuser['nom'];
    ?>
    <tr>
      <td><?= $name; ?></td>
      <td><?= $prix; ?></td>
      <td><?= $nbr_place_reservees+$nbr_place_dispo; ?></td>
      <td><?= $nbr_place_reservees; ?></td>
      <td><?= $nbr_place_dispo ; ?></td>
      <td><?php echo" $userprenom "." $userlasttname"; ?></td>
      <td><?= $statut; ?></td>
      <td><a href="suppressionreservation.php?id=<?=$idp; ?>&userid=<?= $user; ?>"><i class="material-icons red-text">close</i></a></td>
    </tr>
    <?php }} }} ?>
  </tbody>
</table>
</div>

 <?php require 'includes/footer.php'; ?>

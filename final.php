<?php
  session_start();

 if (!isset($_SESSION['logged_in']) && !isset($_POST['pay'])) {
     header('Location: sign.php');
 }

 if (isset($_POST['pay'])) {

    include 'db.php';

    $querycmd ="SELECT trajets.id,
                       trajets.trajet as 'trajets',
                       trajets.prix as 'prix',

                       reservation.id as 'idcmd',
                       reservation.id_trajet,
                       reservation.nbr_place_reservees as 'nbr_place_reservees',
                       reservation.statut,
                       reservation.id_utilisateur as 'iduser',

                       utilisateurs.id

                       FROM trajets, reservation, utilisateurs
                       WHERE trajets.id = reservation.id_trajet AND utilisateurs.id = reservation.id_utilisateur
                       AND reservation.id_utilisateur = '{$_SESSION['id']}' AND reservation.statut = 'no_payee'";
    $resultcmd = $connection->query($querycmd);
    if($resultcmd->num_rows > 0){
      while ($rowcmd = $resultcmd->fetch_assoc()) {
           $trajetscmd = $rowcmd['trajets'];
           $nbr_place_reserveescmd = $rowcmd['nbr_place_reservees'];
           $prixcmd = $rowcmd['prix'];
           $idcmd = $rowcmd['idcmd'];
           $prenomcmd = $_POST['prenom'];
           $nomcmd = $_POST['nom'];
           $payscmd = $_POST['pays'];
           $villecmd = $_POST['ville'];
           $addresscmd = $_POST['address'];

           $idusercmd = $rowcmd['iduser'];


    $prix = $prixcmd * $nbr_place_reserveescmd;
    $fullname = $prenomcmd . " " . $nomcmd ;

    $query_details = "INSERT INTO details_reservation(trajet,
                                                  nbr_place_reservees,
                                                  prix_total,
                                                  id_reservation,
                                                  id_utilisateur,
                                                  utilisateur,
                                                  address,
                                                  pays,
                                                  ville,
                                                  statut) VALUES('$trajetscmd',
                                                               '$nbr_place_reserveescmd',
                                                               '$prix',
                                                               '$idcmd',
                                                               '$idusercmd',
                                                               '$fullname',
                                                               '$addresscmd',
                                                               '$payscmd',
                                                               '$villecmd',
                                                               'ready')";
    $resultdetails = $connection->query($query_details);

    $querypay = "UPDATE reservation SET statut = 'payee' WHERE id_utilisateur = '{$_SESSION['id']}' AND statut = 'no_payee'";
    $resultpay = mysqli_query($connection, $querypay);
  }
}
    unset($_SESSION["item"]);

   $nav ='includes/navconnected.php';
   $idsess = $_SESSION['id'];

   $email_sess = $_SESSION['email'];
   $pays_sess = $_SESSION['pays'];
   $prenom_sess = $_SESSION['prenom'];
   $nom_sess = $_SESSION['nom'];
   $ville_sess = $_SESSION['ville'];
   $address_sess = $_SESSION['address'];
 }

  require 'includes/header.php';
  require $nav;?>
  <div class="container-fluid trajets-page">
    <div class="container current-page">
       <nav>
         <div class="nav-wrapper">
           <div class="col s12">
             <a href="index.php" class="breadcrumb">Accueil</a>
             <a href="checkout" class="breadcrumb">Vérifier</a>
             <a href="final.php" class="breadcrumb">Merci <3 </a>
           </div>
         </div>
       </nav>
     </div>
    </div>

<div class="container thanks">
  <div class="row">
    <div class="col s12 m3">

    </div>

  <div class="col s12 m6">
  <div class="card center-align">
     <div class="card-image">
       <img src="src/img/thanks.png" class="responsive-img" alt="">
     </div>
     <div class="card-content center-align">
       <h5>Merci pour votre confiance</h5>
       <p>votre réservation a été bien effectuée : <h5 class="green-text"><?php echo"$prenom_sess". " " . "$nom_sess";  ?></h5></p>
     </div>
   </div>

   <div class="center-align">
    <a href="details.php" class="button-rounded blue btn waves-effects waves-light">Details</a>
     <a href="index.php" class="button-rounded btn waves-effects waves-light">Accueil</a>
   </div>
  </div>
  <div class="col s12 m3">

  </div>
 </div>
</div>

    <?php require 'includes/footer.php'; ?>

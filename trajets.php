<?php
session_start();

if (!isset($_GET['id'])) {
    header('Location: index.php');
}

if (!isset($_SESSION['logged_in'])) {
  $nav = 'includes/nav.php';
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}

$id_trajets =$_GET['id'];
 require 'includes/header.php';
 require $nav;?>

 <div class="container-fluid trajets-page" id="top">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Accueil</a>
            <a href="trajets.php?id=<? $id_trajets; ?>" class="breadcrumb">Trajet</a>
          </div>
        </div>
      </nav>
    </div>
   </div>


<div class="container-fluid trajets">
  <div class="container">
   <div class="row">
     <div class="col s12 m6">
        <div class="card">
          <div class="card-image">
            <?php

            include 'db.php';

            //get trajets
            $querytrajets = "SELECT id, trajet,nbr_place_dispo,prix, description, id_image, nom_image, date
              FROM trajets WHERE id = '{$id_trajets}'";
            $result1 = $connection->query($querytrajets);
            if ($result1->num_rows > 0) {
            // output data of each row
            while($rowtrajets = $result1->fetch_assoc()) {
              $id_trajetsdb = $rowtrajets['id'];
              $name_trajets = $rowtrajets['trajet'];
              $nbr_place_dispo = $rowtrajets['nbr_place_dispo'];
              $prix_trajets = $rowtrajets['prix'];
              $id_pic = $rowtrajets['id_image'];
              $description = $rowtrajets['description'];
              $nom_image_trajets = $rowtrajets['nom_image'];
              $date = $rowtrajets['date'];
                }}?>
            <img class="materialboxed" width="650" src="trajets/<?= $nom_image_trajets; ?>" alt="">
          </div>
        </div>
      
     </div>

     <div class="col s12 m6">
       <form method="post"  action="checkout.php?idtrj=<?=$id_trajetsdb?>&idsess=<?=$idsess?>;?>" >
       <h2 ><?= $name_trajets; ?></h2>
       <div class="divider"  ></div>
       <div class="stuff">
       <h5 class="woow">La date : </h5> 
        <h5> <?= $date;?> </h5>

        <h5 class="woow">Prix par place :</h5> 
        <h5> <?= $prix_trajets; ?> Dhs</h5>
        <h5 class="woow">les places restent disponibles :</h5>
          <h5> <?=$nbr_place_dispo ?>  places</h5>
          <h5 class="woow">Description : </h5>
           <h5><?= $description; ?></h5>
       <div class="input-field col s12">
            <i class="material-icons prefix" style="opacity: 0 ">shopping_basket</i>
            <input id="icon_prefix" type="number" name="quantity" min="1" max="<?=$nbr_place_dispo ?>" class="validate" required>
            <label for="icon_prefix">Nombre de places à réserver </label>
          </div>



       <div class="center-align">
           <button type="submit" name="buy"  class="btn-large meh button-rounded waves-effect waves-light ">Continuer </button>
       </div>
       </div>
        </form>





   









     </div>
   </div>
  </div>
</div>
<?php
 require 'includes/secondfooter.php';
 require 'includes/footer.php'; ?>

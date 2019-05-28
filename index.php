<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
  $nav ='includes/nav.php';
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}


require 'includes/header.php';
require $nav; ?>

<div class="container-fluid home" id="top">
  <div class="container search">
    <nav class="animated slideInUp wow">
      <div class="nav-wrapper">
        <form method="GET" action="search.php">
          <div class="input-field">
            <input id="search" class="searching" type="search" name='searched' value='Okk'required>
            <label for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>

          <div class="center-align">
            <button type="submit" name="search" class="blue waves-light miaw waves-effect btn hide">Rechercher</button>
          </div>
        </form>
      </div>
    </nav>
  </div>
</div>

<div class="container most">
  <div class="row">
    <?php

     include 'db.php';

 
    $queryfirst = "SELECT

   id as 'id',
   trajet as 'trajet',
   prix as 'prix',
   nom_image as 'nom_image' FROM trajets group by prix desc limit 3 "   
;

    $resultfirst = $connection->query($queryfirst);
    if ($resultfirst->num_rows > 0) {
      // output data of each row
      while($rowfirst = $resultfirst->fetch_assoc()) {

            $id_best = $rowfirst['id'];
            $trajet_best = $rowfirst['trajet'];
            $prix_best = $rowfirst['prix'];
            $nom_image_best = $rowfirst['nom_image'];
           

            ?>

            <div class="col s12 m4">
              <div class="card hoverable animated slideInUp wow">
                <div class="card-image">
                  <a href="trajets.php?id=<?= $id_best;  ?>"><img src="trajets/<?= $nom_image_best; ?>"></a>
                 
                  <a href="trajets.php?id=<?= $id_best; ?>" class="btn-floating red halfway-fab waves-effect waves-light right"><i class="material-icons">more</i></a>
                </div>
                  <div class="card-content">
                    <div class="container">
                      <div class="row">
                        <div class="col s12">
                      
                          <p class="white-text red-text"><span class="card-title red-text"><h5><?= $trajet_best; ?></h5></span>
                        </div>
                          <?= $prix_best; ?><h6>Dhs</h6></p>
                        

                        
                      </div>
                    </div>

                  </div>

                </div>
              </div>
              <?php }} ?>


            </div>
          </div>

          <div class="container-fluid center-align categories">
            <a href="admin/addp.php?id=1&category=Proposer%20un%20trajet&icon=trajet" class="button-rounded btn-large waves-effect waves-light">Poposer un trajet</a>
           
              </div>


              <div class="container-fluid about" id="about">
                <div class="container">
                  <div class="row">
                    <div class="col s12 m6">
                      <div class="card animated slideInUp wow">
                        <div class="card-image">
                          <img src="src/img/about.jpg" alt="">
                        </div>
                      </div>
                    </div>

                    <div class="col s12 m6">
                      <h3 class="animated slideInUp wow">À propos :</h3>
                      <div class="divider animated slideInUp wow"></div>
                      <p class="animated slideInUp wow"><p>Covoiturage rassemble une large communauté de covoiturage longue distance au monde. Nous mettons en relation des conducteurs voyageant avec des places libres et des passagers souhaitant faire le même trajet. Les coûts du trajet sont partagés entre les covoitureurs.</p>
                      </div>

                    </div>
                  </div>
                </div>





                    


                <div class="container contact" id="contact">
                  <div class="row">
                    <form class="col s12 animated slideInUp wow">
                      <div class="row">
                        <div class="input-field col s12 m6">
                          
                         
                        </div>
                        <div class="input-field col s12 m6">
                         
                          
                        </div>



                        <div class="input-field col s12 ">
                        
                          
                        </div>

                        <div class="center-align">
                          
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <?php
                require 'includes/secondfooter.php';
                require 'includes/footer.php'; ?>

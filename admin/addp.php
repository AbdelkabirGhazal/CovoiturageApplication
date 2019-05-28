<?php

session_start();

error_reporting(0);
if(!isset($_GET['id']) && !isset($_GET['icon'])){
header('Location: index.php');
}



else {

  if($_SESSION['role']=='admin'){
    $nav1 ='includes/header.php';
    $nav2 ='includes/navconnectedadmin.php';
}
else{
  $nav1 ='includes/header.php';
  $nav2 ='includes/navconnected.php';
}


require $nav1;
require $nav2; } ?>

<div class="container-fluid trajets-page">
  <div class="container current-page">
    <nav>
      <div class="nav-wrapper">
        <div class="col s12">
          <a href="index.php" class="breadcrumb">Accueil</a>
          
        </div>
      </div>
    </nav>
  </div>
</div>
<div class="container addp">
  <form method="post" enctype="multipart/form-data">
    <div class="card">
      <?php

       include '../db.php';
       ?>
      <div class="center-align">
        <img class="responsive-img" src="src/img/trajet.png">
      </div>

      <div class="row">
        <div class="input-field col s6">
          <i class="fa fa-trajets-hunt prefix"></i>
          <input id="icon_prefix" type="text" class="validate" name="trajet">
          <label for="icon_prefix">Départ -> Destination</label>
        </div>

        <div class="input-field col s6">
          <i class="prefix fa fa-usd"></i>
          <input id="icon_prefix" type="number" class="validate" name="prix">
          <label for="icon_prefix">le prix</label>
        </div>



        <div class="input-field col s6">
          <i class="fa fa-car"></i>
           <input id="icon_prefix" type="number" class="validate" name="nbr_place_dispo">
         
          <label for="icon_prefix2">Nombre de places disponibles</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" class="materialize-textarea" name="description"></textarea>
          <label for="icon_prefix2">Description</label>
        </div>


       <div class="file-field input-field col s6">
         
          <input type="datetime-local" name="datetime">
          
        </div>

      
        


   
   <div class="file-field input-field col s6">
          <div class="btn blue">
            <span>Image</span>
            <input type="file" style="opacity:0;" name="nom_image">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" name="nom_image">
          </div>
        </div>

         <div class="center-align">
        <button type="submit" name="done" class="waves-effect button-rounded waves-light btn">Ajouter</button>
      </div>
    </div>

    <?php require 'success.php'; ?>
  </form>
</div>

<?php require 'includes/footer.php'; ?>

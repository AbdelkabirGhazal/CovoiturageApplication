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
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container">
     <div class="row">
       <div class="col s12 m4">
         <div class="card">
           <div class="card-image">
             <img src="src/img/add.png" alt="">
           </div>
           <div class="card-action">
             <a class="blue-text" href="http://localhost/Covoiturage/admin/addp.php?id=1&category=Proposer%20un%20trajet&icon=trajet">Proposer un trajet </a>
           </div>
         </div>
       </div>

       

       <div class="col s12 m4">
         <div class="card">
           <div class="card-image">
             <img src="src/img/edit.png" alt="">
           </div>
           <div class="card-action">
             <a class="blue-text" href="edittrajets.php">Réservations</a>
           </div>
         </div>
       </div>
     </div>
   </div>


 <?php require 'includes/footer.php'; ?>

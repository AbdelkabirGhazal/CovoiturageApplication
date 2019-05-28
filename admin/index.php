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
            <a href="../index.php" class="breadcrumb">Covoiturage</a>
            <a href="index.php" class="breadcrumb">Tableau de bord</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container Tableau de bord">
  <div class="row">
         <div class="col s12 m4">
           <div class="card horizontal">
             
             <div class="card-stacked">
              <div class="card-content">
                <p>Trajets et réservations</p>
              </div>
               <div class="card-action">
                 <a href="infotrajets.php" class="blue-text">Plus de détails</a>
               </div>
             </div>
           </div>
         </div>

        

         <div class="col s12 m4">
           <div class="card horizontal">
             
             <div class="card-stacked">
              <div class="card-content">
                <p>Utilisateurs</p>
              </div>
               <div class="card-action">
                 <a href="allusers.php" class="blue-text">Plus de détails</a>
               </div>
             </div>
           </div>
         </div>
         <?php

            include '../db.php';
            //get total users
            $queryusers = "SELECT count(id) as total FROM utilisateurs";
            $resultusers = $connection->query($queryusers);

            if($resultusers->num_rows > 0) {
              while ($rowusers = $resultusers->fetch_assoc()) {
                $totalusers = $rowusers['total'];
              }
            }

            //get total no_payee reservations
            $queryorder = "SELECT count(id) as total, statut FROM reservation WHERE statut = 'payee'";
            $resultorder = $connection->query($queryorder);

            if($resultorder->num_rows > 0) {
              while ($roworder = $resultorder->fetch_assoc()) {
                $totalorder = $roworder['total'];
              }
            }

  
           
          ?>
         <div class="col s12 m4">
           <div class="card horizontal red lighten-1">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">supervisor_account</i> Nombre total d'utilisateurs</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalusers-1; ?></h5>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card blue lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i> Nombre total de réservations</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalorder; ?></h5>
               </div>
             </div>
           </div>
         </div>

        
       </div>
</div>
 <?php require 'includes/footer.php'; ?>

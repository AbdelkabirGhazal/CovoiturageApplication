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
            <a href="trajets" class="breadcrumb">Stock</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container stock">
     <div class="container">
       <div class="row">
           <?php
           include '../db.php';
            // get stock
            $querystock = "SELECT
            trajets.id_category as 'name',
            count(trajets.id_category) as 'total',

            category.id as 'id_cat',
            category.name as 'name',
            category.icon as 'icon'

            FROM trajets, category
            WHERE trajets.id_category = category.id
            GROUP BY category.id";
            $resultstock = $connection->query($querystock);
            if ($resultstock->num_rows > 0) {
              while($rowstock = $resultstock->fetch_assoc()) {
               $id_cat = $rowstock['id_cat'];
               $name = $rowstock['name'];
               $icon = $rowstock['icon'];
               $total = $rowstock['total'];

           ?>

           <div class="col s12 m4">
             <div class="card hoverable animated slideInUp wow">
               <div class="card-image">
                 <a href="trajetstock.php?id=<?= $id_cat; ?>&category=<?= $name; ?>&icon=<?= $icon; ?>">
                   <img src="src/img/<?= $icon; ?>.png" alt=""></a>
                 <span class="card-title blue-text"><?= $name; ?>s</span>
               </div>
               <div class="card-content">
                 <h5 class="white-text"><?= $total; ?></h5>
               </div>
             </div>
           </div>

         <?php }} ?>
       </div>
     </div>
   </div>
 <?php require 'includes/footer.php'; ?>

<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
    if (!isset($_GET['search'])) {
      header('Location: index.php');
    }
    else {
      $word = $_GET['searched'];
    }
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
  if (!isset($_GET['search'])) {
    header('Location: index.php');
  }
  else {
    $word = $_GET['searched'];
  }
}

 require 'includes/header.php';
 require $nav;?>

 <div class="container-fluid trajets-page" id="top">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Accueil</a>
            <a href="search" class="breadcrumb">Chercher..</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container search-page">
     <div class="row">
       <?php

       include 'db.php';
       //get trajets

       //pages links
       $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
       $perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 16 ? (int)$_GET['per-page'] : 16;

       $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

       $querytrajets = "SELECT SQL_CALC_FOUND_ROWS id, trajet, prix, id_image, nom_image FROM trajets WHERE trajet LIKE '%{$word}%' ORDER BY id DESC LIMIT {$start}, 16";
       $result = $connection->query($querytrajets);

       //pages
        $total = $connection->query("SELECT FOUND_ROWS() as total")->fetch_assoc()['total'];
        $pages = ceil($total / $perpage);

         if ($result->num_rows > 0) {
         // output data of each row
         while($rowtrajets = $result->fetch_assoc()) {
           $id_trajets = $rowtrajets['id'];
           $name_trajets = $rowtrajets['trajet'];
           $prix_trajets = $rowtrajets['prix'];
           $id_pic = $rowtrajets['id_image'];
           $nom_image_trajets = $rowtrajets['nom_image'];

         ?>

             <div class="col s12 m4">
               <div class="card hoverable animated slideInUp wow">
                 <div class="card-image">
                     <a href="trajets.php?id=<?= $id_trajets; ?>">
                       <img src="trajets/<?= $nom_image_trajets; ?>"></a>
                     <span class="card-title blue-text"><?= $name_trajets; ?></span>
                     <a href="trajets.php?id=<?= $id_trajets; ?>" class="btn-floating halfway-fab waves-effect waves-light right"><i class="material-icons">add</i></a>
                   </div>
                   <div class="card-action">
                     <div class="container-fluid">
                       <h5 class="white-text"><?= $prix_trajets; ?> Dhs</h5>
                     </div>
                   </div>
               </div>
             </div>
           <?php }} else {
             echo "<div class='container center-align'>
                   <h4 class='black-text'>Element non trouvé ..</h4>
                   </div>";
           }?>

           </div>

           <div class="center-align animated slideInUp wow">
             <ul class="pagination <?php if($total<15){echo "hide";} ?>">
             <li class="<?php if($page == 1){echo 'hide';} ?>"><a href="?page=<?php echo $page-1; ?>&per-page=15"><i class="material-icons">chevron_left</i></a></li>
             <?php for ($x=1; $x <= $pages; $x++) : $y = $x;?>


                 <li class="waves-effect pagina  <?php if($page === $x){echo 'active';} elseif($page <  ($x +1) OR $page > ($x +1)){echo'hide';} ?>"><a href="?page=<?php echo $x; ?>&per-page=15" ><?php echo $x; ?></a></li>



             <?php endfor; ?>
             <li class="<?php if($page == $y){echo 'hide';} ?>"><a href="?page=<?php echo $page+1; ?>&per-page=15"><i class="material-icons">chevron_right</i></a></li>
           </ul>
           </div>
   </div>

<?php require 'includes/footer.php'; ?>

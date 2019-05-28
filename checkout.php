<?php
session_start();

if (!isset($_SESSION['logged_in']) && !isset($_SESSION['item'])) {
    header('Location: sign.php');
}


else {
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
 require $nav;




    include 'db.php';




    $quantity = $_POST['quantity'];
    $id_trajetsdb = $_GET['idtrj'];
    //$idsess1 = $_GET['idsess'];
              //inserting into command
              include 'db.php';

              $querybuy = "INSERT INTO reservation(id_trajet, nbr_place_reservees, statut, id_utilisateur)
              VALUES ('$id_trajetsdb','$quantity','no_payee', '$idsess')";

              $connection->query($querybuy) ;

              
              $queryupdate = "UPDATE trajets SET nbr_place_dispo = nbr_place_dispo-'$quantity' where trajets.id='$id_trajetsdb' ;";

               $connection->query($queryupdate) ;

                     

              
                 $connection->close();























 ?>
 <div class="container-fluid trajets-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index.php" class="breadcrumb">Accueil</a>
            <a href="checkout" class="breadcrumb">Vérifier</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

















<div class="container checkout">
    <div class="card pay">
      <form method="post" action="final.php">
        <div class="row">

            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="icon_prefix" type="text" name="email" value='<?= $email_sess; ?>' class="validate" required>
              <label for="icon_prefix">Email</label>
            </div>

            <div class="input-field col s6">
              <select class="icons" name="pays" value="<?= $pays_sess; ?>">
   


<option value="$pays_sess"  selected>Veuillez sélectionner votre pays</option>
      <option value="Moroc">Maroc</option>
      <option value="Algérie"> Algérie</option>
      <option value="Egypte">Égypte </option>
      <option value="Palestine">  Palestine </option>
      <option value="US">US</option>
      <option value="France"> France</option>




        </select>
        <label>Pays</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" name="prenom" value='<?= $prenom_sess; ?>' class="validate" required>
              <label for="icon_prefix">Prénom</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input id="icon_prefix" type="text" name="nom" value='<?= $nom_sess; ?>' class="validate" required>
              <label for="icon_prefix">Nom</label>
            </div>


            <div class="input-field col s6">
              <i class="material-icons prefix">business</i>
              <input id="icon_prefix" type="text" value='<?= $ville_sess; ?>' name="ville" class="validate" required>
              <label for="icon_prefix">Ville</label>
            </div>

            <div class="input-field col s6 meh">
              <i class="material-icons prefix">location_on</i>
              <input id="icon_prefix" type="text" value='<?= $address_sess; ?>' name="address" class="validate" required>
              <label for="icon_prefix">Addresse</label>
            </div>

                <div class="center-align">
                    <button type="submit" id="confirmed" name="pay" class="btn meh button-rounded waves-effect waves-light ">Réserver</button>
                </div>
          </div>
      </form>
    </div>
</div>

 <?php require 'includes/footer.php'; ?>

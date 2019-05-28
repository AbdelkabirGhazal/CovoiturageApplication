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
            <a href="editprofile" class="breadcrumb">Edit Profile</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container editprofile">
  <div class="container">
    <div class="card">
      <div class="row">

   <form class="col s12" method="POST" >
     <div class="row">
       <div class="input-field col s12">
         <i class="material-icons prefix">email</i>
         <input id="icon_prefix" type="text" name="email" class="validate" required>
         <label for="icon_prefix">Email</label>
       </div>

       <div class="input-field col s12">
         <i class="material-icons prefix">lock</i>
         <input id="icon_prefix" type="password" name="password" class="validate value1" required>
         <label for="icon_prefix">nouveau mot de passe</label>
       </div>

       <div class="input-field col s12 meh">
         <i class="material-icons prefix">lock</i>
         <input id="icon_prefix" type="password" name="confirmation" class="validate value2" required>
         <label for="icon_prefix">Confirmer votre mot de passe</label>
       </div>
            <?php

             if (isset($_POST['update'])) {

               $newemail = $_POST['email'];
               $newpassword = md5($_POST['password']);

              include '../db.php';
              // update info on utilisateurs Toble
              $queryupdate = "UPDATE utilisateurs SET email ='$newemail', password ='$newpassword' WHERE role='admin'";
              $result = $connection->query($queryupdate);

              echo "<meta http-equiv='refresh' content='0'; url='editprofile.php' />";

             }

             ?>
           <div class="center-align">
               <button type="submit" id="confirmed" name="update" class="btn meh button-rounded waves-effect waves-light ">Modifier mes infos</button>
           </div>

     </div>
   </form>
 </div>
    </div>
  </div>
</div>
    <?php require 'includes/footer.php'; ?>

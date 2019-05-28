<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
}

elseif($_SESSION['logged_in'] == 'True') {
  header('Location: index.php');
}

else{
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}
error_reporting(0);

 require 'includes/header.php';
 require $nav; ?>



<div class="container-fluid center-align sign.php">
  <div class="container">

  <div class="row">
    <div class="col s12">
       <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#test1">Se connecter</a></li>
        <li class="tab col s3"><a  href="#test2">s'enregistrer</a></li>
       </ul>
   </div>

 

     


     <div class="container forms">
 <div class="row">






<div id="test1" class="col s12 left-align">

        <div class="card">
          <div class="row">
      <form class="col s12" method="POST">

           <div class="input-field col s12">
             <i class="material-icons prefix">email</i>
             <input id="icon_prefix" type="text" name="emaillog" class="validate" placeholder="Votre email ..">
             
           </div>
           <div class="input-field col s12 meh">
             <i class="material-icons prefix">lock</i>
             <input id="icon_prefix" type="password" name="passworddb" class="validate" placeholder="votre mot de passe ..">
            
           </div>

           <?php require 'includes/loginconfirmation.php';?>
           
               <div class="center-align">
                   <button type="submit" name="login" class="btn button-rounded waves-effect waves-light ">Se connecter</button>
               </div>

       </form>
     </div>
        </div>

      </div>






















  

<div id="test2" class="col s12 left-align">
     <div class="card">
       <div class="row">

    <form class="col s12" method="POST" enctype="multipart/form-data">
      <div class="row">

        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="icon_prefix" type="text" name="email" class="validate" placeholder="Votre email SVP .." required>
          
        </div>

     










        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="prenom" class="validate" placeholder="Votre prénom .." required>
          
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">perm_identity</i>
          <input id="icon_prefix" type="text" name="nom" class="validate" placeholder="Votre nom .." required>
         
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="password" class="validate value1" placeholder="Votre mot de passe .." required>
          
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="confirmation" class="validate value2" placeholder="Confirmer votre mot de passe .." required>
         
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">business</i>
          <input id="icon_prefix" type="text" name="ville" class="validate" placeholder="Votre ville .. " required>
          
        </div>

        <div class="input-field col s6 meh">
          <i class="material-icons prefix">location_on</i>
          <input id="icon_prefix" type="text" name="address" class="validate" placeholder="Votre adresse .. " required>
         
        </div>




          <div class="input-field col s6">
          <select class="icons" name="pays">
      <option value=""  disabled selected>Veuillez sélectionner votre pays</option>
      <option value="Moroc">Maroc</option>
      <option value="Algérie"> Algérie</option>
      <option value="Egypte">Égypte </option>
      <option value="Palestine">  Palestine </option>
      <option value="US">US</option>
      <option value="France"> France</option>


    </select>
    
        </div>


       </br>


        <?php include 'includes/signupconfirmation.php'; ?>

        <div class="center-align">
                <button type="submit" id="confirmed" name="signup" class="btn meh button-rounded waves-effect waves-light ">s'enregistrer</button>
        </div>





         
      
      </div>
    </form>






  </div>
     </div>
     </div>
      
      </div>
      </div>








      </div>
      </div>
   </div>
  </div>
</div>


  <?php require 'includes/footer.php'; ?>

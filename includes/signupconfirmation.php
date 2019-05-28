<?php
if (isset($_POST['signup'])) {

  $email = $_POST['email'];
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $ville = $_POST['ville'];
  $pays = $_POST['pays'];

  $encryptedpass = md5($password);


  include 'db.php';

  //connecting & inserting data

  $query = "INSERT INTO utilisateurs(email,
prenom,
nom,
password,
address,
ville,
pays,
role) VALUES ('$email',
'$prenom',
'$nom',
'$encryptedpass',
'$address',
'$ville',
'$pays',
'client')";

if ($connection->query($query) === TRUE) {


         echo "<div class='center-align'>
         <h5 class='black-text'>Welcome <span class='green-text'>$prenom</span> Se connectez SVP</h5><br><br>
         <a class='button-rounded btn waves-effects waves-light'>Log In</a>
         </div>";

     } else {
         echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
     }

     $connection->close();

}

?>

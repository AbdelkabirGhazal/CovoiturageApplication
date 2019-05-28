<?php
session_start();

  include_once '../db.php';

if (isset($_GET['id']) && isset($_GET['userid'])) {
   $id=$_GET['id'];
   $iduser = $_GET['userid'];

   $query_delete = "DELETE FROM reservation WHERE id_trajet = '$id' AND id_utilisateur = '$iduser'";
   $query_delete2 = "DELETE FROM details_reservation WHERE  id_utilisateur = '$iduser'";
   $result_delete = $connection->query($query_delete);
    $result_delete2 = $connection->query($query_delete2);

header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../sign.php');
}
?>

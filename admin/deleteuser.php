<?php
session_start();

  include_once '../db.php';

if (isset($_GET['id'])) {
   $id=$_GET['id'];

   $query_delete = "DELETE FROM utilisateurs	 WHERE id = '$id'";
   $result_delete = $connection->query($query_delete);

   $query_delete2 = "DELETE FROM reservation WHERE id_utilisateur = '$id'";
   $result_delete2 = $connection->query($query_delete2);

header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../sign.php');
}
?>

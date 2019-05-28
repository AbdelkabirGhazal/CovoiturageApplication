<?php
  session_start();

 if (!isset($_SESSION['logged_in'])) {
     header('Location: sign');
 }

else {
 $idsess = $_SESSION['id'];
}
 require 'includes/header.php';
 ?>

 <div class="container print">
   <table>
      <thead>
        <tr>
            <th data-field="name">Trajet</th>
            <th data-field="category">Nombre de places réservées</th>
            <th data-field="price">prix</th>
            <th data-field="price">total</th>
            <th data-field="quantity">utilisateur</th>
            <th data-field="country">pays</th>
            <th data-field="city">ville</th>
            <th data-field="address">addresse</th>
        </tr>
      </thead>
      <tbody class="scroll">
        <?php
         include 'db.php';
        //get detailss
        $querydetails = "SELECT * FROM details_reservation WHERE id_utilisateur = '$idsess' AND statut ='ready'";
        $result = $connection->query($querydetails);
        if ($result->num_rows > 0) {
        // output data of each row
        while($rowdetails = $result->fetch_assoc()) {
          $id_details = $rowdetails['id'];
          $product_details = $rowdetails['trajet'];
          $quantity_details = $rowdetails['nbr_place_reservees'];
          $price_details = $rowdetails['prix_total'];
          $user_details = $rowdetails['utilisateur'];
          $country_details = $rowdetails['pays'];
          $city_details = $rowdetails['ville'];
          $address_details = $rowdetails['address'];
          $idcmdd = $rowdetails['id_reservation'];

          ?>
        <tr>
          <td><?= $product_details; ?></td>
          <td><?= $quantity_details; ?></td>
          <td><?= $price_details/$quantity_details; ?>dhs</td>
          <td><?= $price_details; ?>dhs</td>
          <td><?= $user_details; ?></td>
          <td><?= $country_details; ?></td>
          <td><?= $city_details; ?></td>
          <td><?= $address_details; ?></td>
        </tr>
      <?php }} ?>
      <div class="left-align">
        <?php

        $querycmd = "SELECT id FROM reservation WHERE id = '$idcmdd' ";
        $getid = mysqli_query($connection, $querycmd);
        $rowcmd = mysqli_fetch_array($getid);
        $idcmd = $rowcmd['id'];

        ?>
        <h5>Facture #<?= $idcmd; ?></h5>
      </div>
      </tbody>
    </table>
    <div class="right-align">
      <p>Merci pour votre confiance! <?= date('Y'); ?></p>
    </div>

    <form method="post">
      <button type="submit" name="done" class="button-rounded waves-effect waves-light btn">Accueil</button>
      <!--<button type="submit" name="done2" class="blue waves-effect waves-light btn">
      save as pdf <i class="fa fa-print"></i></button>-->
      <?php

        if (isset($_POST['done'])) {



          $queryupdate = "UPDATE details_command SET statut = 'done' WHERE id_user = '$idsess' AND statut = 'ready'";
          $queryupdate = mysqli_query($connection, $queryupdate);

          echo "<meta http-equiv='refresh' content='0;url=index.php' />";
        }

       ?>
    </form>
 </div>

<?php require 'includes/footer.php'; ?>

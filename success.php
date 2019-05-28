<?php

if (isset($_POST['done'])) {
  //resize_function//////////////////////////////////////////////////
function CreateThumbs($src, $dst, $width, $height, $crop=0){


  list($w, $h) = getimagesize($src);


  $type = strtolower(substr(strrchr($src,"."),1));

  if($type == 'jpeg') $type = 'jpg';
  switch($type){
  case 'bmp': $img = imagecreatefromwbmp($src); break;
  case 'gif': $img = imagecreatefromgif($src); break;
  case 'jpg': $img = imagecreatefromjpeg($src); break;
  case 'png': $img = imagecreatefrompng($src); break;
  default : return "Invalid Picture Type!";
  }

  // resize
  if($crop){
  if($w < $width or $h < $height) return "Picture is too small!";
  $ratio = max($width/$w, $height/$h);
  $h = $height / $ratio;
  $x = ($w - $width / $ratio) / 2;
  $w = $width / $ratio;
  }
  else{
  if($w < $width and $h < $height) return "Picture is too small!";
  $ratio = min($width/$w, $height/$h);
  $width = $w * $ratio;
  $height = $h * $ratio;
  $x = 0;
  }

   $new = imagecreatetruecolor($width, $height);
  if($type == "gif" or $type == "png"){
  imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
  imagealphablending($new, false);
  imagesavealpha($new, true);
  }

  imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

  switch($type){
  case 'bmp': imagewbmp($new, $dst); break;
  case 'gif': imagegif($new, $dst); break;
  case 'jpg': imagejpeg($new, $dst); break;
  case 'png': imagepng($new, $dst); break;
  }

  return true;

}

  $path = "../trajets/";
  $file = $path . basename($_FILES["nom_image"]["name"]);
  $uploadOk = 1;
  $type = pathinfo($file,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["nom_image"]["tmp_name"]);
  if($check !== false) {
  $uploadOk = 1;
  } else {
  echo "<a class='btn-large red waves-effects light-effects'>File is not an image</a><br><br>";
  $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["nom_image"]["size"] > 50000000) {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, your picture is too large</a><br><br>";
  $uploadOk = 0;
  }

  // Allow certain file formats
  if($type != "png" && $type != "jpeg" && $type != "jpg" ) {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, only JPEG, JPG, PNG pictures are allowed</a><br><br>";
  $uploadOk = 0;
  }

 else {
    $uploadOk = 1;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, your file was not uploaded</a><br><br>";
  // if everything is ok, try to upload file
  } else {
  if (move_uploaded_file($_FILES["nom_image"]["tmp_name"], $file)) {

  } else {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, there was an error uploading your picture</a>";
  }
  }



$img_path = "../trajets/".$_FILES["nom_image"]["name"];
//resize_function//////////////////////////////////////////////////
CreateThumbs($img_path, $img_path, 602, 600, 1);

function get_last_id(){
		$connection = $GLOBALS['connection'];
		$stmt = $connection->prepare('SELECT * FROM trajets');
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
			    $last = $row["id"];
			}
			return $last;
		}else{
			return "0";
		}
}

$idtrajets = get_last_id() + 1;

require 'includes/pictures.php';

  $name = $_POST['name'];
  $prix = $_POST['prix'];
  $description = addslashes($_POST['description']);
  $img_title=$_FILES["nom_image"]["name"];


  //adding trajets
  $queryaddtrajets = "INSERT INTO trajets(id_category, name, description, prix, id_picture, nom_image)
  VALUES ('$id_category', '$name', '$description','$prix', '$idtrajets', '$img_title')";

if ($connection->query($queryaddtrajets) === TRUE ) {
          echo "<div class='center-align'>
                 <h5 class='green-text'>trajets Added Successfully</h5>
                 </div><br><br>";

     } else {
         echo "<h5 class='red-text '>Error: " . $queryaddtrajets . "</h5><br><br><br>" . $connection->error;
     }

     $connection->close();

}


 ?>

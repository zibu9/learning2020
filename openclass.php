<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document PHP</title>
</head>
<body>
	<br />
<?php
try {
     $bdd = new PDO ('mysql:host=localhost;dbname=test','root','') ;
   
     } 
 catch (Exception $e) 
 {
   die('Erreur : '. $e->getMessage());
 }
?>
<?php
if (isset($_FILES['image'])AND !empty($_FILES['image']['name'])) 
{
    $taille = 11000000;
    $extensionvalid = array('jpg', 'jpeg', 'gif', 'png');
    if ($_FILES['image']['size'] <= $taille) 
    {
      $extension = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      echo $extension;
      if (in_array($extension, $extensionvalid)) 
      {
        $chemin = md5(uniqid()).".".$extension;
        $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
        if ($resultat) 
        {
          $insere = $bdd->prepare('INSERT INTO `test`.`imge` (image, id) VALUES (:image, null) ');
          $insere->execute(array( 'image'=>$chemin ));
        }
        else{echo "erreur d'importation";}
      }
      else{echo "non autaurisé";}
    }
    else{ echo "trop grande";}
}
  else{echo "Image non pris en chrage";}
?>
<form method="post" enctype="multipart/form-data">
  
  <input type="file" name="image">
  <input type="submit" value="envoyer">
</form>
</p>
</body>
</html>
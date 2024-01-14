
<!DOCTYPE html>
<html>
<head>
	<title>
		minichat
	</title>
</head>
<body>
  <form  action="minichat_post.php" method="post">
  	<label>pseudo</label>:
  	<input type="text" name="nom" id="nom"><br><br>
  	<label>message</label>:
  	<input type="text" name="message" id="message"><br><br>
  	<label>image</label>:
  	<input type="file" name="image" id="image">
  	<input type="submit" value="envoyer">
  </form>
  <?php 
 try {
     $bdd = new PDO ('mysql:host=localhost;dbname=rdt','root','') ;
   
     } 
 catch (Exception $e) 
 {
   die('Erreur : '. $e->getMessage());
 }
$reponse = $bdd->query('SELECT photo FROM accueil ORDER BY id DESC LIMIT 0, 10');

   while ($donnees = $reponse->fetch()) 

		    {
		    	?>
		    	<img src="<?php echo $donnees['photo'];?>"/>
		    	<?php
		    } 
		    $reponse->closeCursor();
		    ?>
</body>
</html>
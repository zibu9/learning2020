 <?php 
 try {
     $bdd = new PDO ('mysql:host=localhost;dbname=test','root','') ;
   
     } 
 catch (Exception $e) 
 {
   die('Erreur : '. $e->getMessage());
 }
 $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_de_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0,5');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>mon blog</title>
</head>
<body>
	<style>
		h1,h3{ text-align: center; }
		h3{background-color: black;
			color: white;
			font-size: 0.9em;
			margin-bottom: 0px;
		}
		.news p{
			background-color: #cccccc;
			margin-top: 0px;
		}
		.news{
				width: 70%;
				margin:auto;
			}
			a{
				text-decoration: none;
				color: rgb(0,0,200);
			}
	</style>
	<h1>mon blog</h1>
	<p>derniers billets:</p>

		<?php 
		while ($donnees = $req->fetch()) 
		{ ?>
	 <div class="news">
	 	<h3>
	 	<?php echo nl2br($donnees['titre']); ?>
	 		<em> le <?php echo $donnees['date_de_creation_fr']; ?></em>
	 	</h3>
	 	<p> 
	 		<?php echo nl2br($donnees['contenu']); ?>
	 		<br>
	 		<em> <a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">commentaires</a></em>
	 	</p>
	 </div>
	 <?php }
	 $req->closeCursor();
	  ?>

</body>
</html>
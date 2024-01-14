 
<!DOCTYPE html>
<html>
<head>
	<title> mon blog</title>
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
	<p><a href="ind.php">retour</a></p>
	<?php 
 try {
     $bdd = new PDO ('mysql:host=localhost;dbname=test','root','') ;
   
     } 
 catch (Exception $e) 
 {
   die('Erreur : '. $e->getMessage());
 }
 $req=$bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_de_creation_fr FROM billets WHERE id = ?');
 $req->execute(array($_GET['billet']))
   $donnees = $req->fetch();
 ?>
	 <div class="news">
	 	<h3>
	 	<?php echo nl2br($donnees['titre']); ?>
	 		<em> le <?php echo $donnees['date_de_creation_fr']; ?></em>
	 	</h3>
	 	<p> 
	 		<?php echo nl2br($donnees['contenu']); ?>
	 	</p>
	 </div>
	 <h2>commentaires</h2>

				 <?php 
				 $req->closeCursor();
				 $rec = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
						 $req->execute(array($_GET['billet']))
					 	 $donnes->fetch();
					while ($donnees = $req->fetch()) 
					{ ?>
						<p><strong><?php echo ($donnees['auteur']); ?></strong>
						le <?php echo ($donnees['date_commentaire_fr']); ?>
				  </p>
				  <p><?php echo nl2br($donnees['commentaires']); ?> </p>
			<?php
			 } 
			 $req->closeCursor(); ?>
</body>
</html>
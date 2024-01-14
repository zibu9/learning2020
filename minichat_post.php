<?php
 try {
     $bdd = new PDO ('mysql:host=localhost;dbname=minichat','root','') ;
   
     } 
 catch (Exception $e) 
 {
   die('Erreur : '. $e->getMessage());
 }

		   $req = $bdd->prepare("INSERT INTO `minichat`.`mes` (`id`, `pseudo`,`image`, `message`,`ladate`) VALUES (NULL, ?, ?, ?,NOW())");
            $req->execute(array($_POST['nom'],$_POST['image'],$_POST['message']));
		   header('Location: minichat.php'); 
		   ?>
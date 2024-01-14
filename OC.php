 <?php 
 try {
     $bdd = new PDO ('mysql:host=localhost;dbname=test','root','') ;
   
     } 
 catch (Exception $e) 
 {
   die('Erreur : '. $e->getMessage());
 }
    $reponse = $bdd->query('SELECT * FROM news');
    $rep= $bdd->query('SELECT UPPER(nom) AS NOM FROM jeux_video');

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document PHP</title>
</head>
<body>

       <?php while ($donnees = $reponse->fetch())
        {?>
       <p>
         <strong>titre</strong> <?php echo $donnees['id']; ?> <br>
         <?php echo $donnees['titre']; ?><br>
         <?php echo $donnees['contenu']; ?>
       </p>

    
       <?php 
    } 
    $reponse->closeCursor();
    ?>
       <?php while ($don = $rep->fetch()) 
    { echo $don['NOM'] . '<br>';}
    $rep->closeCursor();

      ?>
</body>
</html>
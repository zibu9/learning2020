 <?php 
setcookie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document PHP</title>
</head>
<body>
	<br />
 <?php 
 echo '<br />';
 echo $_COOKIE['pseudo'];
 if (isset($_POST['text']))
  {
  		echo $_POST['text'];
  } 
  else{
  	echo'vous devez entrer le mot de passe correct';
  }
  ?>

</body>
</html>
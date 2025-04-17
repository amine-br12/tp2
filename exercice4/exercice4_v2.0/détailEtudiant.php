<?php









require('Connection.php');

 
$id=$_POST['id'];
echo $id;
$req=$Bd->prepare('select * from etudiant where id=?');
$req ->execute(array($id));
$row=$rep->fetch();
echo '<p>'.$row[1].'</p><br>';
echo '<p>'.$row[3].'</p>';
echo '<p>'.$row[2].'</p>';



?>
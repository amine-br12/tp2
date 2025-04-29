<?php









require('Connection.php');


$id=$_POST['id'];
echo $id;
$req='select * from student where id='.$id;

$rep=$Bd->query($req);
$row=$rep->fetch();
echo '<p>'.$row[1].'</p><br>';
echo '<p>'.$row[3].'</p>';
echo '<p>'.$row[2].'</p>';



?>
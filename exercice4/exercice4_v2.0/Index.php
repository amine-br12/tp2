
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    

<?php






require('Connection.php');

$Bd=Connection::GetInstance();

$req = 'select * from student';

$rep = $Bd->query($req);
$rows= $rep->fetchAll();

echo '<div class= "container">';
echo '<div class= "row">';
echo '<table class = "table ">';

echo '<tr>';
echo '<th scope="col">id</th>';
echo '<th scope="col">name</th>';
echo '<th scope="col">birthday</th>';
echo'</tr>';
echo '  <tbody class="table-group-divider">';


foreach($rows as $row){
    echo '<tr style="border: none;">';
    echo '<td style="border: none;">'.$row[0].'</td>';
    echo '<td style="border: none;">'.$row[1].'</td>';
    echo '<td style="border: none;">'.$row[2].'</td>';
    echo   '<td style="border: none;">
    <form action="détailEtudiant.php" method="post">';
    echo '<input type="hidden" value ="'.$row[0].'" name= "id">';
        echo '<button type="submit" class="btn btn-primary rounded-circle p-2">
  <i class="bi bi-info-lg" ></i>
</button>';    


    echo'</form></td>';
    echo'</tr>';
echo '</svg>';
}

echo '</tbody>';

echo '</table>';

echo '</div>';
echo '</div>';



?>
</body>
</html>
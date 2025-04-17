<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <title>Document</title>
</head>
<body>
<?php
require("Etudiant.php");

$LesEtudiant=array();
$LesEtudiant[0]=$Aymen;
$LesEtudiant[1]=$Skander;
echo "<div class='container'>";
echo "<div class='row'>";

foreach ( $LesEtudiant as $Etudiant){
    echo "<div class ='col'>";
    echo "<div class ='names p-3'>";
    echo $Etudiant->getName();
    echo"</div>";
    foreach($Etudiant->getNotes() as $Note){
        echo "<div class='note p-3 card rounded-0 '>";
        echo $Note;
        echo"</div>";

    }
    echo"<div class = 'moy p-3 card'>";
    echo 'Votre moyenne est '.$Etudiant->Calcule_moy();
    echo"</div>";

echo"</div>";
}
echo "</div>";
echo "</div>";







?>
    
</body>
<script src="exercice1/script.js"></script>

</html>
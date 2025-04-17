<?php

require("Connection.php");

$id = $_POST['id'];
$name = $_POST['name'];
$section = $_POST['section'];
$date = $_POST['date'];
$imageName = $_FILES['image']['name'];
$tmpName = $_FILES['image']['tmp_name'];
$folder = "uploads/";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

$targetFile = $folder . basename($imageName);
move_uploaded_file($tmpName, $targetFile);

$req = $Bd->prepare('SELECT * FROM section WHERE Designation = ?');
$req->execute(array($section));
$section_data = $req->fetch();
$section_id = $section_data ? $section_data[0] : null;

$req = $Bd->prepare('SELECT * FROM student WHERE id = ?');
$req->execute(array($id));
$row = $req->fetch();

if (!$row && isset($id) && isset($name) && isset($section_id) && isset($date) && isset($imageName) && !empty($imageName)) {
    $req = $Bd->prepare('INSERT INTO student(id, name, date_de_naissance, image, section_id) VALUES(?,?,?,?,?)');
    $req->execute(array($id, $name, $date, $targetFile, $section_id));
    echo '<script>
    alert("INSERER AVEC SUCCESS");
    window.location.href = "addEtudiant.php";
    </script>';
} else {
    echo '<script>
    alert("ETUDIANT EXISTE DEJA OU CHAMPS MANQUANTS !!!!!");
    window.location.href = "addEtudiant.php";
    </script>';
}
?>

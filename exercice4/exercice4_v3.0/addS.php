<?php

require("Connection.php");

$id = $_POST['id'];
$desge = $_POST['name'];
$des = $_POST['section'];

if ($id && $desge && $des) {
    $req = $Bd->prepare('SELECT * FROM section WHERE id = ?');
    $req->execute(array($id));
    $row = $req->fetch();

    if (!$row) {
        $req = $Bd->prepare('INSERT INTO section(id, designation, description) VALUES(?,?,?)');
        $req->execute(array($id, $desge, $des));
        echo '<script>
        alert("INSÉRÉ AVEC SUCCÈS !");
        window.location.href = "addSection.php";
        </script>';
    } else {
        echo '<script>
        alert("SECTION EXISTE DÉJÀ !");
        window.location.href = "addSection.php";
        </script>';
    }
} else {
    echo '<script>
    alert("VEUILLEZ REMPLIR TOUS LES CHAMPS !");
    window.location.href = "addSection.php";
    </script>';
}

?>

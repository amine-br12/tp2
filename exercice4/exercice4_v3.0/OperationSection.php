<?php
require('Connection.php');

session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id']; 

    if (isset($_POST['afficher'])) {
        $req = $Bd->prepare('SELECT * FROM section WHERE id = ?');
        $req->execute(array($id));
        $row = $req->fetch();

        if ($row) { 


            echo '<p> Section : ' . htmlspecialchars($row[1]) . '</p><br>'; 
            echo '<p> Description : ' . htmlspecialchars($row[2]) . '</p>';
        } 
    }

    if (isset($_POST['suprimer'])) {
        require("classes.php");
        Section::removeSection($id);
        header("Location:sectionlist.php");


    }

    if (isset($_POST['modifier'])) {
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['date'] = $_POST['date'];
        header(header: "Location: modSection.php");
        exit();
    }
    
    }

?>
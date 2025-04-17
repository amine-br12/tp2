<?php
require('Connection.php');

session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id']; 

    if (isset($_POST['afficher'])) {
        $req = $Bd->prepare('SELECT * FROM student WHERE id = ?');
        $req->execute(array($id));
        $row = $req->fetch();

        if ($row) { 
            $req1 = $Bd->prepare('SELECT * FROM section WHERE id = ?');
            $req1->execute(array($row[4]));  
            $row1 = $req1->fetch();

            echo '<p>' . htmlspecialchars($row[1]) . '</p><br>'; 
            echo '<p>' . htmlspecialchars($row1[1]) . '</p>';
            echo '<p>' . htmlspecialchars($row[2]) . '</p>';
        } 
    }

    if (isset($_POST['suprimer'])) {
        require("classes.php");
        Student::removeStudent($id);
        header("Location:student.php");


    }

    if (isset($_POST['modifier'])) {
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['date'] = $_POST['date'];
        $_SESSION['section'] = $_POST['section'];
        header(header: "Location: modstudent.php");
        exit();
    }
}



?>
<?php
session_start();
require('Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $section = $_POST['section'];

    require("classes.php");
    $req = $Bd->prepare("SELECT * FROM section WHERE Designation =?");
    $req->execute(array($section));
    $row = $req->fetch();
    $section_id = $row[0];

    Student::modifyStudent($id, $name, $date, $section_id);
    header("Location: student.php");
    exit();
}

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$date = $_SESSION['date'];
$section = $_SESSION['section'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Étudiant</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4">
        <h2 class="text-center">Modifier Étudiant</h2>
        <form method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" value="<?= $id ?> "  readonly>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" value="<?= $name ?>" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" name="date" value="<?= $date ?>" required>
            </div>

            <?php
            $req = $Bd->prepare('SELECT * FROM section WHERE id=?');
            $req->execute(array($section));
            $row = $req->fetch();
            $section = $row[1];
            ?>
            <div class="mb-3">
                <label for="section" class="form-label">Section</label>
                <input type="text" class="form-control" name="section" value="<?= $section ?>" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Enregistrer les modifications</button>
        </form>
    </div>
</div>

<!-- Add Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

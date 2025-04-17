<?php
session_start();
require('Connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $desge = $_POST['name'];
    $des = $_POST['date'];
    require("classes.php");


    Section::modifySection($id,$desge,$des);
    header("Location: sectionlist.php");
    exit();
}

$id = $_SESSION['id'];
$desge= $_SESSION['name'];
$des = $_SESSION['date'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Section</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4">
        <h2 class="text-center">Modifier Section</h2>
        <form method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" value="<?= $id ?> "  readonly>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Designation</label>
                <input type="text" class="form-control" name="name" value="<?= $desge ?>" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Description</label>
                <input type="text" class="form-control" name="date" value="<?= $des ?>" required>
            </div>



            <button type="submit" class="btn btn-primary w-100">Enregistrer les modifications</button>
        </form>
    </div>
</div>

<!-- Add Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

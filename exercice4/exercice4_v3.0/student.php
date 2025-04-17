
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


    <title>Document</title>
</head>
<body    >
  <?php session_start();
  ?>
<header>
    <nav class=" navbar navbar-expand-lg navbar-dark fixed-top" style=' background-color:rgb(43, 77, 110);'>
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Management System </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="Home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="student.php">Liste des étudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sectionlist.php">Liste des sections</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.html">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<br>
<br>
<br>

<div class= "container">
<div class=" row card p-3 rounded-0"  style="border: none; background-color: rgb(242, 237, 237);"   >Liste de etudiants</div>
<br>
<div class="row ">
<div class="col">
<form method="post" action="">
    <input type="text" placeholder="Filtrer par nom"  name="filtrer">
    <button type="submit" class="btn btn-danger border-1" id="filtrer" name="filtrerBtn">Filtrer</button>
    <span style="visibility: hidden;">
    <?php  if($_SESSION['admin']){ echo '</span><span>';}  ?>
    <button name="addBtn" type="submit"style="width: 40px; height: 40px;" class="btn btn-primary  btn-link p-0 m-0 border-0">
    <i class="bi bi-person-plus-fill"></i>

    </button>
  </span>
    
</form>



<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['filtrerBtn'])) {
        $ch = "%".$_POST['filtrer']."%";
    }

    if (isset($_POST['addBtn'])) {
        header("Location: addEtudiant.php?ch=" . urlencode($_POST['filtrer']));
        exit();
    }
}else{
  $ch="%%";

}
?>





</div>
</div>
<br>


<?php





require('Connection.php');
$req = $Bd->prepare( 'select * from student where name like ?');
$req->execute(array($ch));
$rows= $req->fetchAll();



echo '<div class= "row container mt-5">';

?>
<table id="myTable"  class="table  table-borderless">
  <thead>
    <tr>
      <th>id</th>
      <th>image</th>
      <th>name</th>
      <th>birthday</th>
      <th>section</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody  >
    <?php foreach($rows as $row): ?>
      <?php
        $req = $Bd->prepare('SELECT * FROM section WHERE id=?');
        $req->execute([$row[4]]);
        $section = $req->fetch();
      ?>
      <tr >
        <td style="    background-color: #f8f9fa; "><?= $row[0] ?></td>
        <td style="    background-color: #f8f9fa; "><img src="<?= $row[3] ?>" alt="Image" width="40" height="40" style="border-radius: 50%;"></td>
        <td style="    background-color: #f8f9fa; "><?= $row[1] ?></td>
        <td style="    background-color: #f8f9fa; "><?= $row[2] ?></td>
        <td style="    background-color: #f8f9fa; "><?= $section[1] ?? 'Inconnue' ?></td>
        <td style="    background-color: #f8f9fa; ">
          <form action="OperationEtudiant.php" method="post">
            <input type="hidden" name="id" value="<?= $row[0] ?>">
            <button name="afficher" type="submit" style="width: 20px; 
            height: 40px;" class="btn btn-link p-0 m-0 border-0" style="color: #007bff;">
            <i class="fas fa-info-circle"></i></button>
           <span style="visibility: hidden;">
            <?php  if($_SESSION['admin']){ echo '</span><span>';}  ?>
            <button name="suprimer" style="width: 20px; height: 40px;" type="submit"class="btn btn-link p-0 m-0 border-0" ><i class="bi bi-eraser-fill"></i></button>
            <input type="hidden" name="id" value="<?= $row[0] ?>">
                            <input type="hidden" name="name" value="<?= $row[1] ?>">
                            <input type="hidden" name="date" value="<?= $row[2] ?>">
                            <input type="hidden" name="section" value="<?= $row[4] ?>">
                            <button style="width: 20px; height: 40px;" name="modifier" type="submit" class="btn btn-link p-0 m-0 border-0"> <i class="bi bi-pencil-square"></i></button>
            </span>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  $(document).ready(function() {
    var table = $('#myTable').DataTable({
      pageLength: 2,
      lengthChange: false,
      dom: 'Bfrtip',
      buttons: ['copy', 'excel', 'csv', 'pdf'],
      
    });

    $('#filterBtn').on('click', function() {
      let value = $('#myFilterInput').val();
      table.search(value).draw(); 
    });
  });
</script>

</body>
</html>
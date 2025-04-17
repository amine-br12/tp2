 
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">Ajouter une section</h2>
  <form action="addS.php" method="post" enctype="multipart/form-data">
    
    <div class="mb-3">
      <label for="id" class="form-label">ID</label>
      <input type="text" name="id" id="id" class="form-control">
    </div>

    <div class="mb-3">
      <label for="name" class="form-label">Designation</label>
      <input type="text" name="name" id="name" class="form-control">
    </div>



    <div class="mb-3">
      <label for="section" class="form-label">description</label>
      <input type="text" name="section" id="section" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
  <br>
 <form action="" method="post">
<button type="submit" class="btn btn-primary" name="Return">Return </button>
<?php
  if(isset($_POST['Return'])){
    header("Location:sectionlist.php");
  }

?>
 </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
</div>
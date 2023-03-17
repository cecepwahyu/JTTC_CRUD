<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>JTTC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
 
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>JTTC</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jabatan.php">Jabatan Pegawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontrak.php">Kontrak</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-lg">
    <br/>
    <a class="btn btn-success" href="add.php">Add New User</a><br/><br/>
    
    <table class="table">
      <thead class="thead-dark">
        <tr>
            <th>Pegawai</th> <th>Jabatan Pegawai</th> <th>Kontrak</th> <th>Update</th>
        </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['pegawai']."</td>";
        echo "<td>".$user_data['jabatan']."</td>";
        echo "<td>".$user_data['kontrak']."</td>";    
        echo "<td><a class='btn btn-primary' href='edit.php?id=$user_data[id]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</div>

</body>
</html>
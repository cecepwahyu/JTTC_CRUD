<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $pegawai=$_POST['pegawai'];
    $jabatan=$_POST['jabatan'];
    $kontrak=$_POST['kontrak'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE users SET pegawai='$pegawai',jabatan='$jabatan',kontrak='$kontrak' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $pegawai = $user_data['pegawai'];
    $jabatan = $user_data['jabatan'];
    $kontrak = $user_data['kontrak'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
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
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="jabatan.php">Jabatan Pegawai</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Kontrak</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container-lg">
        </br>
        <a class='btn btn-secondary' href="index.php">Home</a>
        <br/><br/>
        
        <form name="update_user" method="post" action="edit.php">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Pegawai</label>
                <input type="text" name="pegawai" class="form-control" id="exampleFormControlInput1" placeholder="Nama" value=<?php echo $pegawai;?>>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Jabatan Pegawai</label>
                <input type="text" name="jabatan" class="form-control" id="exampleFormControlInput1" placeholder="Jabatan" value=<?php echo $jabatan;?>>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Masa Kontrak</label>
                <input type="text" name="kontrak" class="form-control" id="exampleFormControlInput1" placeholder="Kontrak" value=<?php echo $kontrak;?>>
            </div>
            <div>
                </br>
                <tr>
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                    <td><input class='btn btn-primary' type="submit" name="update" value="Update"></td>
                </tr>
            </div>
        </form>
    </div>
    
</body>
</html>
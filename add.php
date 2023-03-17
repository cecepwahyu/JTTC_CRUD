<html>
<head>
    <title>Add Users</title>
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
        <a class='btn btn-secondary' href="index.php">Go to Home</a>
        <br/><br/>

        <form action="add.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr> 
                    <td>Pegawai</td>
                    <td><input type="text" name="pegawai"></td>
                </tr>
                <tr> 
                    <td>Jabatan Pegawai</td>
                    <td><input type="text" name="jabatan"></td>
                </tr>
                <tr> 
                    <td>Kontrak</td>
                    <td><input type="text" name="kontrak"></td>
                </tr>
                <tr> 
                    <td></td>
                    <td><input class='btn btn-success' type="submit" name="Submit" value="Add"></td>
                </tr>
            </table>
        </form>
        
        <?php
    
        // Check If form submitted, insert form data into users table.
        if(isset($_POST['Submit'])) {
            $pegawai = $_POST['pegawai'];
            $jabatan = $_POST['jabatan'];
            $kontrak = $_POST['kontrak'];
            
            // include database connection file
            include_once("config.php");
                    
            // Insert user data into table
            $result = mysqli_query($mysqli, "INSERT INTO users(pegawai,jabatan,kontrak) VALUES('$pegawai','$jabatan','$kontrak')");
            
            // Show message when user added
            echo "User added successfully. <a href='index.php'>View Users</a>";
        }
        ?>
    </div>
</body>
</html>
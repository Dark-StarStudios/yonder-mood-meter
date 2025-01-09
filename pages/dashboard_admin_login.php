<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard admin login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dashboard_admin_login.css">
    <?php
        include_once '../account.php';
        $account = new Account();
        if(isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])){
            $account->Login($_POST['gebruikersnaam'], $_POST['wachtwoord']);
        }
    ?>
</head>
</head>
<body>
<img src="../img/logo-yonder.svg" alt="Logo Yonder" class="logo">
     <h3><b>Admin login</b></h3>
     <div class="container-fluid d-flex flex-column justify-content-between" style="height: 71vh;">
        <div class="row">
            <div class="col-8" ></div>
            <div class="col-4 bg-dark" ></div>
        </div>
        
        <form class="AdminForm container" action="dashboard_admin_login.php" method="post" action="dashboard_admin_login.php">
            <?php
            if(isset($_COOKIE["waarschruwing"])){
                echo "<div class='alert alert-info'><h4>" . $_COOKIE["waarschruwing"] . "<h4></div>";
            }
            ?>
            <div class="mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Gebruikersnaam:" name="gebruikersnaam">
            </div>
            <div class="mb-3">
            <input type="password" class="form-control" placeholder="Wachtwoord:" name="wachtwoord">
            </div>
            <button type="submit" class="btn bg-paars rounded-0 px-5 mt-5">Verzend</button>
        </form>

        <div class="row">
            <div class="col-4" ></div>
            <div class="col-8 bg-paars" ></div>
            <div class="col-4 bg-rood" ></div>
            <div class="col-8" ></div>
        </div> 
     </div>
    <!-- div balk 2 paars -->
     <!-- div balk 3  rood -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
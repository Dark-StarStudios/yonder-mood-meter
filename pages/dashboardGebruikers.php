<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard gebruikers</title>
    <?php
    //Controleer of ben je wel ingellogd
    require_once '../session.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dashboardGebruikers.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<img src="../img/logo-yonder.svg" alt="Logo Yonder" class="logo">
    <H1 class="dashboardH1">Dashboard</H1>
     <div class="container-fluid d-flex flex-column justify-content-between" style="height: 71vh;">
        <div class="row">
            <div class="col-8" ></div>
            <div class="col-4 bg-paars" ></div>
        </div> 

        <a class="algemeen" href="DashboardAlgemeen.php">Algemeen</a>
        <a class="gebruikers" href="dashboardGebruikers.php">gebruikers</a>
        <a class="admin" href="dashboardAdmin.php">admin</a>

        <div class="row">
            <div class="col-4 bg-rood" ></div>
            <div class="col-8" ></div>
            <div class="col-4" ></div>
            <div class="col-8 bg-zwart" ></div>
        </div> 
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
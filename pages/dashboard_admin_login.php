<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard admin login</title>
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
     <h1>Admin login</h1>
     <!-- div balk 1 zwart -->
    <form class="AdminForm" action="dashboard_admin_login.php" method="post">
        <input type="text" placeholder="gebruikersnaam:" name="gebruikersnaam" id="gebruikersnaam"><br>
        <input type="text" placeholder="wachtwoord:" name="wachtwoord" id="wachtwoord"><br>
        <input type="submit" value="login">
    </form>
    <!-- div balk 2 paars -->
     <!-- div balk 3  rood -->
</body>
</html>
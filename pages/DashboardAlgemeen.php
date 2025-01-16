<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard algemeen</title>
    <?php
    //Controleer of ben je wel ingellogd
    require_once '../session.php';
    require_once '../CR.php';
    $cr = new CR();
    $moodCounts = $cr->Totaalmood();
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/dashboardAlgemeen.css">
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
        <div class="container-fluid d-flex flex-row justify-content-around">
            <div class="d-flex flex-column">
                <a class="algemeen" href="DashboardAlgemeen.php">Algemeen</a>
                <a class="gebruikers" href="dashboardGebruikers.php">gebruikers</a>
                <a class="admin" href="dashboardAdmin.php">admin</a>
            </div>
            <div class="container-fluid">
                <div>
                    <canvas id="myChart"></canvas>
                </div>

                <div class="container-fluid d-flex justify-content-around"> 
                    <svg class="smiley ms-4" data-id="happy" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                        <circle cx="40" cy="40" r="40" fill="limegreen"/>
                        <circle cx="30" cy="30" r="6" fill="black"/>
                        <circle cx="50" cy="30" r="6" fill="black"/>
                        <path d="M25,55 Q40,65 55,55" fill="none" stroke="black" stroke-width="3"/>
                    </svg>
                    <svg class="smiley" data-id="light-happy" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                        <circle cx="40" cy="40" r="40" fill="yellowgreen"/>
                        <circle cx="30" cy="30" r="6" fill="black"/>
                        <circle cx="50" cy="30" r="6" fill="black"/>
                        <path d="M25,55 Q40,60 55,55" fill="none" stroke="black" stroke-width="3"/>
                    </svg>
                    <svg class="smiley" data-id="neutral" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                        <circle cx="40" cy="40" r="40" fill="gold"/>
                        <circle cx="30" cy="30" r="6" fill="black"/>
                        <circle cx="50" cy="30" r="6" fill="black"/>
                        <path d="M25,60 L55,60" fill="none" stroke="black" stroke-width="3"/>
                    </svg>
                    <svg class="smiley ms-3" data-id="light-angry" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                        <circle cx="40" cy="40" r="40" fill="darkorange"/>
                        <circle cx="30" cy="30" r="6" fill="black"/>
                        <circle cx="50" cy="30" r="6" fill="black"/>
                        <path d="M25,60 Q40,50 55,60" fill="none" stroke="black" stroke-width="3"/>
                    </svg>
                    <svg class="smiley" data-id="angry" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                        <circle cx="40" cy="40" r="40" fill="crimson"/>
                        <circle cx="30" cy="30" r="6" fill="black"/>
                        <circle cx="50" cy="30" r="6" fill="black"/>
                        <path d="M25,60 Q40,45 55,60" fill="none" stroke="black" stroke-width="3"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4 bg-rood" ></div>
            <div class="col-8" ></div>
            <div class="col-4" ></div>
            <div class="col-8 bg-zwart" ></div>
        </div> 
     </div>
     <script>
            const ctx = document.getElementById('myChart');

             // Передача данных из PHP
            const moodData = <?php echo json_encode($moodCounts); ?>;

            // Формируем массивы для графика
            const labels = Object.keys(moodData); // Массив с mood
            const data = Object.values(moodData); // Массив с количествами

            new Chart(ctx, {
                type: 'bar',
                data: {
                labels: ['happy', 'light-happy', 'neutral', 'light-angry', 'angry'],
                datasets: [{
                    label: '# of Votes',
                    data: data,
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/beoordeling.css">
</head>
<body>
    <?php include_once '../CR.php'; 
    $cr = new CR();
    if(isset($_POST['name'])) {
        $cr->create($_POST['smiley'], $_POST['name'], $_POST['address'], $_POST['city'], $_POST['age'], $_POST['education'], $_POST['course']);
    }
    ?>
<img class="logo" src="../img/logo-yonder.svg" alt="fortnite">
<form class="AdminForm" action="#" method="POST" onsubmit="return validateSmileySelection()">
    <?php
        if(isset($_GET['register'])){
            echo "<div class='alert alert-primary' role='alert'> Bedankt voor mood!</div>";
        }
    ?>
    <h2>Hoe vind je de open dag?</h2>
    <div class="smiley-container container-fluid d-flex justify-content-around align-items-center">
        <div type="radio">
            <svg class="smiley" data-id="happy" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                <circle cx="40" cy="40" r="40" fill="limegreen"/>
                <circle cx="30" cy="30" r="6" fill="black"/>
                <circle cx="50" cy="30" r="6" fill="black"/>
                <path d="M25,55 Q40,65 55,55" fill="none" stroke="black" stroke-width="3"/>
            </svg>
        </div>
        <div type="radio">
            <svg class="smiley" data-id="light-happy" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                <circle cx="40" cy="40" r="40" fill="yellowgreen"/>
                <circle cx="30" cy="30" r="6" fill="black"/>
                <circle cx="50" cy="30" r="6" fill="black"/>
                <path d="M25,55 Q40,60 55,55" fill="none" stroke="black" stroke-width="3"/>
            </svg>
        </div>
        <div type="radio">
            <svg class="smiley" data-id="neutral" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                <circle cx="40" cy="40" r="40" fill="gold"/>
                <circle cx="30" cy="30" r="6" fill="black"/>
                <circle cx="50" cy="30" r="6" fill="black"/>
                <path d="M25,60 L55,60" fill="none" stroke="black" stroke-width="3"/>
            </svg>
        </div>
        <div type="radio">
            <svg class="smiley" data-id="light-angry" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                <circle cx="40" cy="40" r="40" fill="darkorange"/>
                <circle cx="30" cy="30" r="6" fill="black"/>
                <circle cx="50" cy="30" r="6" fill="black"/>
                <path d="M25,60 Q40,50 55,60" fill="none" stroke="black" stroke-width="3"/>
            </svg>
        </div>
        <div type="radio">
            <svg class="smiley" data-id="angry" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
                <circle cx="40" cy="40" r="40" fill="crimson"/>
                <circle cx="30" cy="30" r="6" fill="black"/>
                <circle cx="50" cy="30" r="6" fill="black"/>
                <path d="M25,60 Q40,45 55,60" fill="none" stroke="black" stroke-width="3"/>
            </svg>
        </div>
        <input type="hidden" name="smiley" id="smiley-input" value="">
    </div>
    <div>
        <div class="mb-3 mt-3">
            <input class="form-control" placeholder="Naam:" type="text" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <input class="form-control" placeholder="Leeftijd:" type="number" id="age" name="age" required>
        </div>

        <div class="mb-3">
            <input class="form-control" placeholder="Adres:" type="text" id="address" name="address" required>
        </div class="mb-3">

        <div class="mb-3">
            <input class="form-control" placeholder="Woonplaats:" type="text" id="city" name="city" required>
        </div>
        <div class="d-flex">
            <div class="form-item mx-2">
                <label for="education">Vooropleiding:</label>
                <select id="education" name="education" required>
                    <option value="">Kies</option>
                    <option value="havo">Havo</option>
                    <option value="vwo">Vwo</option>
                    <option value="mbo">MBO</option>
                    <option value="hbo">HBO</option>
                </select>
            </div>
            
            <div class="form-item">
                <label for="course">Opleiding:</label>
                <select id="course" name="course" required>
                    <option value="">Kies</option>
                    <option value="software-development">Software Development</option>
                    <option value="ICT">ICT</option>
                    <option value="media-design">Media Design</option>
                    <option value="web-development">Web Development</option>
                </select>
            </div>
        </div>    
    </div>

    <div class="form-check mb-3">
    <label class="form-check-label mt-3">
      <input class="input-box form-check-input" type="checkbox" name="remember" required>Ik ga akkoord met verzenden van mijn gegevens. *
    </label>
  </div>

    <button type="submit" class="btn bg-paars rounded-0 px-5 mt-5">Verzend</button>
</form>






<div class="kleur-balkje"></div>
<div class="kleur-balkje2"></div>
<div class="kleur-balkje3"></div>
<script>
    let selectedSmiley = null;

    function selectSmiley(smiley) {
        document.querySelectorAll('.smiley').forEach(s => s.classList.remove('selected'));
        smiley.classList.add('selected');
        selectedSmiley = smiley.getAttribute('data-id');
        document.getElementById('smiley-input').value = selectedSmiley;
    }

    function validateSmileySelection() {
        if (!selectedSmiley) {
            alert('Selecteer een smiley voordat je het formulier indient.');
            return false;
        }
        return true;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
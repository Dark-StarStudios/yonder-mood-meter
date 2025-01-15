<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding-top: 150px;
            overflow: hidden; /* Voeg deze regel toe */
        }

        .smileys-container {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 700px;
            margin: 30px 0;
        }

        .smiley {
            cursor: pointer;
            transition: transform 0.3s;
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        .smiley.selected {
            transform: scale(1.3);

        }



        input, select {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #ccc;
            box-sizing: border-box;
            background-color: transparent;
        }

        select {
            width: 100%;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            font-size: 16px;
            text-align: left;
        }

        .submit-btn {
            width: 15%;
            padding: 15px;
            background-color: #8F88FD;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            margin-top: 55px;
        }
        .kleur-balkje {
            width: 300px;
            height: 50px;
            background-color: #8F88FD;
            position: absolute;
            top: 30%;
            right: 0;
        }
        .kleur-balkje2 {
            width: 700px;
            height: 50px;
            background-color: black;
            position: absolute;
            top: 73%;
            right: 0;
        }
        .kleur-balkje3 {
            width: 850px;
            height: 50px;
            background-color: #FD6555;
            position: absolute;
            top: 66%;
            right: 45.5%;
        }
        .logo{
            height: auto;
            width: 300px;
            margin-right: 75%;
            margin-top: -7%;
        }
        @media (max-width: 600px) {

            .submit-btn {
                font-size: 16px;
                width: 150px;
            }

            .smileys-container {
                font-size: 24px;
            }
            .logo{
                margin-left: 200px;
                margin-bottom: -1px;
            }

            svg{
                width: 60px;
                height: 60px;
            }
            .kleur-balkje {
                width: 100px;
                height: 40px;
                background-color: #8F88FD;
                position: absolute;
                top: 25%;
                right: 0;
            }
            .kleur-balkje2 {
                width: 252px;
                height: 40px;
                background-color: black;
                position: absolute;
                top: 83%;
                right: 0;
            }
            .kleur-balkje3 {
                width: 200px;
                height: 40px;
                background-color: #FD6555;
                position: absolute;
                top: 77.4%;
                right: 55.8%;
            }
        }
    </style>
</head>
<body>
<img class="logo" src="../img/logo-yonder.svg" alt="fortnite">

<div class="smileys-container">
    <svg class="smiley" data-id="happy" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
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
    <svg class="smiley" data-id="light-angry" width="80" height="80" xmlns="http://www.w3.org/2000/svg" onclick="selectSmiley(this)">
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
    <button type="submit" class="submit-btn">Verstuur</button>
<div class="kleur-balkje"></div>
<div class="kleur-balkje2"></div>
<div class="kleur-balkje3"></div>
<script>
    let selectedSmiley = null;

    function selectSmiley(smiley) {
        document.querySelectorAll('.smiley').forEach(s => s.classList.remove('selected'));
        smiley.classList.add('selected');
        selectedSmiley = smiley.getAttribute('data-id');
    }

    function validateSmileySelection() {
        if (!selectedSmiley) {
            alert('Selecteer een smiley voordat je het formulier indient.');
            return false;
        }
        return true;
    }
</script>

</body>
</html>
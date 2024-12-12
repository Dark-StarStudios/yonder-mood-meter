<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smileys met Selectie en Formulier</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }
        svg {
            cursor: pointer;
        }
        .smiley {
            transition: transform 0.2s ease-in-out, stroke-width 0.2s ease-in-out;
        }
        .smiley:hover {
            transform: scale(1.05);
            stroke-width: 3px;
        }
        .selected .checkmark {
            display: block;
        }
        .checkmark {
            display: none;
        }
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 5px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            font-size: 0.9rem;
            display: none;
        }
    </style>
</head>
<body>

<svg width="900" height="250" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 250">
    <!-- Vinkjes en smileys -->
    <g>
        <path class="checkmark" id="checkmark-happy" d="M85 45 L95 60 L120 30" fill="none" stroke="green" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" filter="url(#shadow)"/>
    </g>
    <g class="smiley" data-id="happy" onclick="selectSmiley('happy', 'checkmark-happy')">
        <circle cx="100" cy="150" r="50" fill="limegreen" stroke="black" stroke-width="2"/>
        <circle cx="80" cy="135" r="7" fill="black"/>
        <circle cx="120" cy="135" r="7" fill="black"/>
        <path d="M75,165 Q100,185 125,165" fill="none" stroke="black" stroke-width="3"/>
    </g>
    <g>
        <path class="checkmark" id="checkmark-light-happy" d="M235 45 L245 60 L270 30" fill="none" stroke="green" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" filter="url(#shadow)"/>
    </g>
    <g class="smiley" data-id="light-happy" onclick="selectSmiley('light-happy', 'checkmark-light-happy')">
        <circle cx="250" cy="150" r="50" fill="yellowgreen" stroke="black" stroke-width="2"/>
        <circle cx="230" cy="135" r="7" fill="black"/>
        <circle cx="270" cy="135" r="7" fill="black"/>
        <path d="M225,165 Q250,175 275,165" fill="none" stroke="black" stroke-width="3"/>
    </g>
    <g>
        <path class="checkmark" id="checkmark-neutral" d="M385 45 L395 60 L420 30" fill="none" stroke="green" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" filter="url(#shadow)"/>
    </g>
    <g class="smiley" data-id="neutral" onclick="selectSmiley('neutral', 'checkmark-neutral')">
        <circle cx="400" cy="150" r="50" fill="gold" stroke="black" stroke-width="2"/>
        <circle cx="380" cy="135" r="7" fill="black"/>
        <circle cx="420" cy="135" r="7" fill="black"/>
        <path d="M375,165 L425,165" fill="none" stroke="black" stroke-width="3"/>
    </g>
    <g>
        <path class="checkmark" id="checkmark-light-angry" d="M535 45 L545 60 L570 30" fill="none" stroke="green" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" filter="url(#shadow)"/>
    </g>
    <g class="smiley" data-id="light-angry" onclick="selectSmiley('light-angry', 'checkmark-light-angry')">
        <circle cx="550" cy="150" r="50" fill="darkorange" stroke="black" stroke-width="2"/>
        <circle cx="530" cy="135" r="7" fill="black"/>
        <circle cx="570" cy="135" r="7" fill="black"/>
        <path d="M525,165 Q550,150 575,165" fill="none" stroke="black" stroke-width="3"/>
    </g>
    <g>
        <path class="checkmark" id="checkmark-angry" d="M685 45 L695 60 L720 30" fill="none" stroke="green" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" filter="url(#shadow)"/>
    </g>
    <g class="smiley" data-id="angry" onclick="selectSmiley('angry', 'checkmark-angry')">
        <circle cx="700" cy="150" r="50" fill="crimson" stroke="black" stroke-width="2"/>
        <circle cx="680" cy="135" r="7" fill="black"/>
        <circle cx="720" cy="135" r="7" fill="black"/>
        <path d="M675,165 Q700,140 725,165" fill="none" stroke="black" stroke-width="3"/>
    </g>
    <defs>
        <filter id="shadow" x="-20%" y="-20%" width="140%" height="140%">
            <feDropShadow dx="2" dy="2" stdDeviation="2" flood-color="rgba(0, 0, 0, 0.2)"/>
        </filter>
    </defs>
</svg>

<form id="smileyForm">
    <span class="error-message" id="error-message">Selecteer een smiley voordat je het formulier indient.</span>
    <input type="hidden" id="selectedSmiley" name="selectedSmiley" required>

    <label for="naam">Naam</label>
    <input type="text" id="naam" name="naam" placeholder="Voer je naam in" required>

    <label for="leeftijd">Leeftijd</label>
    <input type="number" id="leeftijd" name="leeftijd" placeholder="Voer je leeftijd in" required>

    <label for="adres">Adres</label>
    <input type="text" id="adres" name="adres" placeholder="Voer je adres in" required>

    <label for="woonplaats">Woonplaats</label>
    <input type="text" id="woonplaats" name="woonplaats" placeholder="Voer je woonplaats in" required>

    <button type="submit">Versturen</button>
</form>

<script>
    let previousCheckmark = null;

    function selectSmiley(smileyId, checkmarkId) {
        // Verberg vorige vinkje
        if (previousCheckmark) {
            previousCheckmark.style.display = "none";
        }

        // Toon het nieuwe vinkje
        const newCheckmark = document.getElementById(checkmarkId);
        newCheckmark.style.display = "block";

        // Bewaar de nieuwe vinkje referentie
        previousCheckmark = newCheckmark;

        // Zet de waarde van het verborgen invoerveld
        document.getElementById('selectedSmiley').value = smileyId;

        // Verberg foutmelding
        document.getElementById('error-message').style.display = "none";
    }

    // Formulierverwerking
    document.getElementById('smileyForm').addEventListener('submit', function(e) {
        if (!document.getElementById('selectedSmiley').value) {
            const errorMessage = document.getElementById('error-message');
            errorMessage.style.display = "block";
            e.preventDefault();
        }
    });
</script>

</body>
</html>
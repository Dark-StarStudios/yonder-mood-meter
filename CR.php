<?php
class CR {
    private $serverConnectieData = ["localhost","root","","mood-meter"];

    public function create($mood, $naam, $adres, $woonplaats, $leeftijd, $vooropleiding){
        try{
            $connectie = new \mysqli($this->serverConnectieData[0], 
            $this->serverConnectieData[1],
            $this->serverConnectieData[2],
            $this->serverConnectieData[3]);
            if ($connectie->error)
            {
                throw new \Exception($connectie->connect_error);
            }
            $query = "INSERT INTO gebruikers(mood,wanneer,naam,adres,woonplaats,leeftijd,vooropleiding) VALUES $mood, NOW(), 
            $naam,$adres,$woonplaats, $leeftijd, $vooropleiding";
            //Bereid de SQL-query voor en bind de parameters.
            $statement = $connectie->prepare($query);
            // Argumenten binden aan ?
            $statement->bind_param("sss",$postEmail,$postNaam,$postHash);
            // Voer de query uit en controleer op fouten
            if (!$statement->execute())
            {
                throw new \Exception($connectie->error);
            }
        }
        catch(\Exception $e)
        {
            //Als er fouten zijn, komt de volgende melding: 
            echo "<div class='alert alert-warning'><h4>Oops: Is het iets met de Server!</h4></div>"; //. $e->getMessage();
        }
        finally
        {
                // Sluit de statement en de connectie
                if($statement){
                    $statement->close();
                } 
                if($connectie){
                    $connectie->close();
                }
                // Redirect de gebruiker naar de login pagina
                header("location: login.php?register=true");
                exit(); // Zorg ervoor dat het script stopt na de header redirect
        }
    }
}
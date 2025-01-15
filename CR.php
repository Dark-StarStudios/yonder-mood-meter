<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
class CR {
    private $serverConnectieData;

    public function __construct() {
        $this->serverConnectieData = [
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_NAME']
        ];
    }

    public function create($mood, $naam, $adres, $woonplaats, $leeftijd, $vooropleiding, $opleiding){
        try{
            $connectie = new \mysqli($this->serverConnectieData[0], 
            $this->serverConnectieData[1],
            $this->serverConnectieData[2],
            $this->serverConnectieData[3]);
            if ($connectie->error)
            {
                throw new \Exception($connectie->connect_error);
            }
            $query = "INSERT INTO gebruikers(wanneer,mood,naam,adres,woonplaats,leeftijd,vooropleiding, opleiding) VALUES (NOW(),?,?,?,?,?,?,?)";
            //Bereid de SQL-query voor en bind de parameters.
            $statement = $connectie->prepare($query);
            // Argumenten binden aan ?
            $statement->bind_param("ssssiss",$mood,$naam,$adres,$woonplaats, $leeftijd, $vooropleiding, $opleiding);
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
                header("location: beoordeling.php?register=true");
                exit(); // Zorg ervoor dat het script stopt na de header redirect
        }
    }
    public function read(){
        try{
            $connectie = new \mysqli($this->serverConnectieData[0], 
            $this->serverConnectieData[1],
            $this->serverConnectieData[2],
            $this->serverConnectieData[3]);
            if ($connectie->error)
            {
                throw new \Exception($connectie->connect_error);
            }
            $query = "SELECT * FROM gebruikers";
            //Bereid de SQL-query voor en bind de parameters.
            $statement = $connectie->prepare($query);
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
                // header("location: login.php?register=true");
                exit(); // Zorg ervoor dat het script stopt na de header redirect
        }
    }
}
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
    public function Totaalmood($query = "WITH moods AS (
    SELECT 'happy' AS mood
    UNION ALL
    SELECT 'light-happy'
    UNION ALL
    SELECT 'neutral'
    UNION ALL
    SELECT 'light-angry'
    UNION ALL
    SELECT 'angry'
)
SELECT m.mood, COUNT(g.mood) AS count
FROM moods m
LEFT JOIN gebruikers g ON m.mood = g.mood
GROUP BY m.mood
ORDER BY FIELD(m.mood, 'happy', 'light-happy', 'neutral', 'light-angry', 'angry');
")
    {
        $result = []; // Массив для хранения результата

        try {
            $connectie = new \mysqli(
                $this->serverConnectieData[0], 
                $this->serverConnectieData[1],
                $this->serverConnectieData[2],
                $this->serverConnectieData[3]
            );

            if ($connectie->connect_error) {
                throw new \Exception($connectie->connect_error);
            }

            // Подготовка и выполнение SQL-запроса
            $statement = $connectie->prepare($query);
            if (!$statement->execute()) {
                throw new \Exception($statement->error);
            }

            // Получение результата
            $resultData = $statement->get_result();
            while ($row = $resultData->fetch_assoc()) {
                $result[$row['mood']] = (int)$row['count']; // Добавляем mood и count в массив
            }
        } catch (\Exception $e) {
            // Обработка ошибок
            echo "<div class='alert alert-warning'><h4>Oops: Is het iets met de Server!</h4></div>";
        } finally {
            // Закрытие соединений
            if (isset($statement) && $statement) {
                $statement->close();
            }
            if (isset($connectie) && $connectie) {
                $connectie->close();
            }
        }

       if($result){
        return $result;
       } // Возвращаем массив
    }

    public function read($query = "SELECT * FROM gebruikers"){
        try{
            $connectie = new \mysqli($this->serverConnectieData[0], 
            $this->serverConnectieData[1],
            $this->serverConnectieData[2],
            $this->serverConnectieData[3]);
            if ($connectie->error)
            {
                throw new \Exception($connectie->connect_error);
            }
            //Bereid de SQL-query voor en bind de parameters.
            $statement = $connectie->prepare($query);
            // Voer de query uit en controleer op fouten
            if (!$statement->execute())
            {
                throw new \Exception($connectie->error);
            }
            $statement->bind_result($id, $wanneer, $mood, $naam, $adres, $woonplaats, $leeftijd, $vooropleiding, $opleiding);
            while ($statement->fetch()){
                echo "<tr>
                <td>$id</td>
                <td>$wanneer</td>
                <td>$mood</td>
                <td>$naam</td>
                <td>$adres</td>
                <td>$woonplaats</td>
                <td>$leeftijd</td>
                <td>$vooropleiding</td>
                <td>$opleiding</td>
                </tr>";
            }
        }
        catch(\Exception $e)
        {
            //Als er fouten zijn, komt de volgende melding: 
            echo "<div class='alert alert-warning'><h4>Oops: Is het iets met de Server!</h4></div>". $e->getMessage();
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
                if(isset($result)){
                    return $result;
                }
                // Redirect de gebruiker naar de login pagina
                // header("location: login.php?register=true");
                exit(); // Zorg ervoor dat het script stopt na de header redirect
        }
    }
}
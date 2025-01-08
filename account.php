<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class account{
    private $serverConnectieData;

    public function __construct() {
        $this->serverConnectieData = [
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_NAME']
        ];
    }

    
    public function herhaal_wachtwoord_control($wachtwoord,$herhaal_wachtwoord){
        return $wachtwoord === $herhaal_wachtwoord ? true : false;
    }
    
    public function post_control($array){
        foreach($array as $element){
            if(empty($element)){
                return false;
            }
        }
        return true;
    }
    
   public function Registreren($postNaam,$postWachtwoord){
        $serverConnectieData = $this->serverConnectieData;
        try
        {
            
            $connectie = new \mysqli($serverConnectieData[0],$serverConnectieData[1],$serverConnectieData[2],$serverConnectieData[3]);
            
            if ($connectie->error)
            {
                throw new \Exception($connectie->connect_error);
            }
            
            $query = "INSERT INTO admins(naam,hash) VALUES (?,?)";
            
            $postHash = password_hash($postWachtwoord, PASSWORD_DEFAULT);
                
                $statement = $connectie->prepare($query);
                
                $statement->bind_param("ss",$postNaam,$postHash);
                
                if (!$statement->execute())
                {
                    throw new \Exception($connectie->error);
                }
        }
        catch(\Exception $e)
        {
            
            echo "<div class='alert alert-warning'><h4>Oops: Is het iets met de Server!</h4></div>"; 
        }
        finally
        {
                
                if($statement){
                    $statement->close();
                } 
                if($connectie){
                    $connectie->close();
                }
                
                // header("location: login.php?register=true");
                exit(); 
        }
    }
    
    public function login($postNaam,$postWachtwoord){
        $serverConnectieData = $this->serverConnectieData;
        try
            {
                
                $connectie = new \mysqli($serverConnectieData[0],$serverConnectieData[1],$serverConnectieData[2],$serverConnectieData[3]);
                
                if ($connectie->error)
                {
                    throw new \Exception($connectie->connect_error);
                }
              
                $query = "SELECT * FROM admins WHERE naam=?";
                
                $statement = $connectie->prepare($query);

              
                $statement->bind_param("s",$postNaam);
               
                if (!$statement->execute())
                {
                    throw new \Exception($connectie->error);
                }
          
                $statement->bind_result($id,$naam,$hash);

                $dataNaam = "<error>";
              
                while($statement->fetch())
                {
               
                    $dataWachtwoord = password_verify($postWachtwoord,$hash);
                    $dataNaam = $naam;
                    if($dataWachtwoord)
                    {
                  
                        $_SESSION["login"] = [$id,$naam];
                    }
                    else
                    {
                   
                        $_SESSION["login"] = null;
                       
                        setcookie("waarschruwing","Verkeerde wachtowoord!",time()+2);
                    }   
                }
               
                if($dataNaam === "<error>"){
                
                    setcookie("waarschruwing","Verkeerd e-mailadres of geen dergelijk account!",time()+2);
                  
                    $_SESSION["login"] = null;
                } 
                
            }
            catch(\Exception $e)
            {
              
                echo "<div class='alert alert-warning'><h4>Oops: Is het iets met de Server!</h4></div>";
            }
            finally
            {
       
                if($statement){
                    $statement->close();
                } 
                if($connectie){
                    $connectie->close();
                }
             
                // header("location: home.php");
                exit(); 
            }
    }
}
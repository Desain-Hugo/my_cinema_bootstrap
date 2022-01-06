<?php
	
       define("DBHOST", "localhost");
       define("DBUSER", "root");
       define("DBPASS", "pass");
       define("DBNAME", "cinema");

       $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

    try
    {
           $db = new PDO($dsn, DBUSER, DBPASS);
           echo "On est connecté";
    }
    
    catch(PDOException $e)
    {
    
           die('Erreur : '.$e->getMessage());
    }
    
 ?>
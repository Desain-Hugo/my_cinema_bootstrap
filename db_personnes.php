<?php

    
if(!empty($_GET))
{
        $recherche = $_GET["prenom"];
        
        $sql = "SELECT firstname, lastname, email FROM user WHERE firstname OR lastname LIKE '%$recherche%'";

        $requete = $db->query($sql);
    
        $membres = $requete->fetchAll();
}

    
 ?>
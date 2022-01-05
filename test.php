<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>My Cinéma</title>
</head>



<body>
    <h1>My Cinéma Bootstrap</h1>

    <?php

include_once "connect.php";
include_once "db_personnes.php";
        
    ?>

    <form method="GET">
        Prénom : <input type="text" name="prenom">
        <input type="submit" value="rechercher">
    </form>

 <h2>Résultats</h2>

 <table>
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>

 <?php
    foreach($membres as $membre){

 echo " 
        <tr>
            <td>".$membre["firstname"]."</td>
            <td>".$membre["lastname"]."</td>
            <td>".$membre["email"]."</td>
        </tr>";

    }
 ?>
     </tbody>
</table>

    
</body>
</html>


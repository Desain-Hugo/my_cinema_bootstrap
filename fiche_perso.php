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

    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Date de naissance</th>
            <th>Ville</th>
        </tr>
    </thead>
    <tbody>
    <?php

include_once "db_personnes.php";
goPerso();
       
    ?>
    </tbody>
</table>
</body>
</html>
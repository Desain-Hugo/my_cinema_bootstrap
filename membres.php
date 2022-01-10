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
    <p><a href="index.php">Retour à l'accueil</a></p>


<?php
        include_once "db_personnes.php";
        champMembre();
        // champFilm();
        searchMembre();
        goPerso();
?>

</body>
<html>
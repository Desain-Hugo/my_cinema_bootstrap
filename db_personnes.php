<?php

function champMembre(){
    echo
"   
    <form method=".'GET'." action=".'membres.php'.">
    <label for=".'membre'.">Rechercher Membre :</label>
            <input type=".'text'." name=".'membre'.">
            <input type=".'submit'." value=".'Membre'.">
    </form>";
}

function champFilm(){

    include_once "connect.php";

    $i = 0;

                
            $sqlgenre = "SELECT name FROM genre";
    
            $requete = $db->query($sqlgenre);
        
            $genres = $requete->fetchAll();



            $sqldist = "SELECT name FROM distributor";
    
            $requete = $db->query($sqldist);
        
            $dist = $requete->fetchAll();


    echo
"
    <form method=".'GET'." action=".'films.php'.">

    <label for=".'film'.">Rechercher Film</label>
        <input type=".'text'." name=".'film'.">
        <input type=".'submit'." value=".'film'.">

    <label for=".'genre'.">Genre :</label>
    <select id=".'genre'.">
    <option value=".'default'.">".'-- Genre'."</option>

    ";
    foreach ($genres as $name){
        $genre = "<option value=".$name[$i].">".$name[$i]."</option>";
        echo $genre;
    }

    echo"
    
    </select>

    <label for=".'dist'.">Distributeur :</label>
    <select id=".'dist'.">
    <option value=".'default'.">".'-- Distributeur'."</option>
    ";
    foreach ($dist as $name){
        $distributeur = "<option value=".$name[$i].">".$name[$i]."</option>";
        echo $distributeur;
    }"
    
    </select>
    </form>";
}

function searchMembre(){

        if(isset($_GET['membre']) && !empty($_GET['membre']))
        {
            echo  "
                    <h2>Résultats</h2>
                
                    <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>"
                    ;

                include_once "connect.php";

                $searchMembre = $_GET["membre"];
                
                $sqlMembre = "SELECT * FROM user WHERE firstname LIKE '%$searchMembre%' OR lastname LIKE '%$searchMembre%'";
        
                $requete = $db->query($sqlMembre);
            
                $membres = $requete->fetchAll();

                foreach($membres as $membre){
                        $id_perso = $membre["id"];
                
                 echo "     
                 

                        <tr>
                            <td>".$id_perso."</td>
                            <td>".$membre["firstname"]."</td>
                            <td>".$membre["lastname"]."</td>
                            <td>".$membre["email"]."</td>
                            <td> 
                                <form method='GET' action='fiche_perso.php'>
                                        <button type='submit' name='boutton' value='".$id_perso."'>Voir</button>
                                </form>
                            </td>
                        </tr>";

                }
                echo  "
                </tbody>
                </table>";
        }else{
            echo "Aucun résultat";
        }
}

function searchFilm(){

    if(isset($_GET['film']) && !empty($_GET['film']))
    {
        echo  "
                <h2>Résultats</h2>
            
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Réalisateur</th>
                        <th>Durée</th>
                        <th>Date de sortie</th>
                        <th>Genre</th>
                    </tr>
                </thead>
                <tbody>"
                ;

    $searchFilm = $_GET["film"];
    $sqlfilm = "SELECT * FROM movie JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON genre.id = movie_genre.id_genre where movie.title LIKE '%$searchFilm%'";
    include_once "connect.php";
    $requete = $db->query($sqlfilm);

    $films = $requete->fetchAll();
    print_r($films);

    //SELECT * FROM movie JOIN movie_genre ON movie.id = movie_genre.id_movie JOIN genre ON genre.id = movie_genre.id_genre LIMIT 30;


        foreach($films as $film){
            echo "     
        
                <tr>
                    <td>".$film["id"]."</td>
                    <td>".$film["title"]."</td>
                    <td>".$film["director"]."</td>
                    <td>".$film["duration"]."</td>
                    <td>".$film["release_date"]."</td>
                    <td>".$film["genre"]."</td>
                </tr>";
        }

    echo  "
    </tbody>
    </table>";

    }else{

    echo "Aucun résultat";
    }

}

       
// function abonnementStatus(){
    
// }

function goPerso(){



    if(isset($_GET['boutton']))
    {

        include_once "connect.php";


                $button = $_GET['boutton'];
        
                $sql2 = "SELECT * FROM user WHERE id LIKE $button";
        
                $requete = $db->query($sql2);
        
                $info_perso = $requete->fetchAll();
                print_r($info_perso);
                foreach($info_perso as $info){
                        
                
                echo " 

                <h2>Résultats</h2>
            
                <table>
                    <thead>
                       <tr>
                       <th>ID</th>
                       <th>Prénom</th>
                       <th>Nom</th>
                       <th>Email</th>
                       <th>Date de naissance</th>
                       <th>Ville</th>
                       <th>Abonnement</th>
                       </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>".$info["id"]."</td>
                            <td>".$info["firstname"]."</td>
                            <td>".$info["lastname"]."</td>
                            <td>".$info["email"]."</td>
                            <td>".$info["birthdate"]."</td>
                            <td>".$info["city"]."</td>
                            <td>Aucun
                                <form method='GET' action='fiche_perso.php'>
                                        <button type='submit' name='boutton' value='".$id_perso."'>Ajouter</button>
                                </form></td>
                        </tr>
                    </tbody>
                <table>";
        
            }
    }
}


?>
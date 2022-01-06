<?php

function searchMembre(){

        echo " 
        <h2>Résultats</h2>

        <table>
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Prénom</th>
                   <th>Nom</th>
                   <th>Email</th>
               </tr>
           </thead>";

        if(isset($_GET['prenom']))
        {
                include_once "connect.php";

                $recherche = $_GET["prenom"];
                
                $sql1 = "SELECT * FROM user WHERE firstname OR lastname LIKE '%$recherche%'";
        
                $requete = $db->query($sql1);
            
                $membres = $requete->fetchAll();

                foreach($membres as $membre){
                        $id_perso = $membre["id"];
                
                 echo "     

                    <tbody>
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
        }

}
        

function goPerso(){

        include_once "connect.php";


                $button = $_GET['boutton'];
        
                $sql2 = "SELECT id, firstname, lastname, email, birthdate, city FROM user WHERE id LIKE $button";
        
                $requete = $db->query($sql2);
        
                $info_perso = $requete->fetchAll();

                foreach($info_perso as $info){
                        
                
                 echo " 
                        <tr>
                            <td>".$info["id"]."</td>
                            <td>".$info["firstname"]."</td>
                            <td>".$info["lastname"]."</td>
                            <td>".$info["email"]."</td>
                            <td>".$info["birthdate"]."</td>
                            <td>".$info["city"]."</td>
                        </tr>";
        
        }
}

// function searchFilms(){

// }

?>
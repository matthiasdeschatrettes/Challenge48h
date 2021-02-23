 <?php
            $servername = 'localhost:8080';
            $username = 'root';
            $password = '';
            $dbname = 'search';
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion réussie';
  ?>
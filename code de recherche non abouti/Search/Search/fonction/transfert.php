<?php
    function transfert(){
        $ret        = false;
        $taille_img = 0;
        $nom_img    = $_FILES['fic']['type'];
        $blob_img = file_get_contents ($_FILES['fic']['tmp_name']);
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);

        include('../connexion.php');
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['fic']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['fic']['type'];
            $img_nom  = $_FILES['fic']['name'];
        }

            $req = "INSERT INTO images (" . 
                                "nom_img, taille_img, blob_img " .
                                ") VALUES (" .
                                "'" . $nom_img . "', " .
                                "'" . $taille_img . "', " .
                                "'" . addcslashes ($img_blob) . "') ";
        $ret = mysql_query ($req) or die (mysql_error ());
        return true;

    }
?>
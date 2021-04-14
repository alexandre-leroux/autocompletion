<?php
include('database.php');



function moteur_de_recherche_get()
    {


        $bdd = connection_bdd();

        $motclef = $_GET['key'];
        $motclef_secure = htmlspecialchars($motclef);

        $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE nom_complet LIKE ? ");
        $req_search->execute(array("%$motclef_secure%"));
        $res = $req_search->fetchAll();
        
        $req_search_2 = $bdd->prepare("SELECT * FROM sportifs WHERE bio LIKE ?  ");
        $req_search_2->execute(array("%$motclef_secure%"));
        $res_2 = $req_search_2->fetchAll();


        $res_total = $res + $res_2;

        return $res_total;



    }


<?php
include('database.php');



function moteur_de_recherche_element()
    {


        $bdd = connection_bdd();

        $id = $_GET['id'];
       

        $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE id = ?");
        $req_search->execute(array("$id"));
        $res = $req_search->fetch();
        
        return $res;



    }

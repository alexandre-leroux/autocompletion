
<?php
include('database.php');



function moteur_de_recherche()
    {

        $bdd = connection_bdd();
        $motclef = 'Bâle';
        // var_dump($_POST['motclef']);
        // echo '</br>';

        $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE nom_complet LIKE ? LIMIT 8 ");
        $req_search->execute(array("%$motclef%"));
        $res = $req_search->fetchAll();

        if($res != null)
        {
            echo json_encode($res);
        }


        else
        {
            $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE bio LIKE ? LIMIT 8 ");
            $req_search->execute(array("%$motclef%"));
            $res = $req_search->fetchAll();
            // echo json_encode($res);

            echo '<pre>';
            var_dump($res);
            echo '</pre>';
            echo '<pre>';
            var_dump($res[0]['bio']);
            echo '</pre>';

            $occ = strpos (  $res[0]['bio'] ,  $motclef ,1 );
            var_dump($occ);

        }


    }


moteur_de_recherche();
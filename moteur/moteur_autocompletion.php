
<?php
include('database.php');



function moteur_de_recherche()
    {

        $bdd = connection_bdd();
        $motclef = $_POST['motclef'];
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
            echo json_encode($res);
        }


    }


moteur_de_recherche();



    // $motclef = $_GET['key'];
    // $motcle_secure = htmlspecialchars($motclef);
    // $req_search = $bdd->query(" SELECT * FROM sportifs WHERE MATCH (nom,prénom,nom_complet,bio) AGAINST ('$motcle_secure' IN NATURAL LANGUAGE MODE);  ");
    // // $req_search->execute(array("%$motclef%" ));

    // $res = $req_search->fetch();
    // // var_dump($res);
    //     // echo ($res);
    // echo json_encode($res);
    
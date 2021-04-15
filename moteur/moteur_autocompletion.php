
<?php
include('database.php');


function moteur_de_recherche()
    {


        $bdd = connection_bdd();

        $motclef = $_POST['motclef'];
        $motclef_secure = htmlspecialchars($motclef);

        $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE nom_complet LIKE ?  LIMIT 8 ");
        $req_search->execute(array("%$motclef_secure%"));
        $res = $req_search->fetchAll();
        
        $req_search_2 = $bdd->prepare("SELECT * FROM sportifs WHERE bio LIKE ? AND nom_complet NOT LIKE ? LIMIT 8  ");
        $req_search_2->execute(array("%$motclef_secure%","%$motclef_secure%"));
        $res_2 = $req_search_2->fetchAll();


        $res_total = $res + $res_2;
        echo json_encode($res_total);
        // return $res_total;


    }


moteur_de_recherche();



// function moteur_de_recherche()
//     {

//         $bdd = connection_bdd();
//         $motclef = $_POST['motclef'];
//         // var_dump($_POST['motclef']);
//         // echo '</br>';

//         $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE nom_complet LIKE ? LIMIT 8 ");
//         $req_search->execute(array("%$motclef%"));
//         $res = $req_search->fetchAll();

//         if($res != null)
//         {
//             echo json_encode($res);
//         }


//         else
//         {
//             $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE bio LIKE ? LIMIT 8 ");
//             $req_search->execute(array("%$motclef%"));
//             $res = $req_search->fetchAll();
//             echo json_encode($res);
//         }


//     }


// moteur_de_recherche();




    

<?php



    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }




    // // $motclef = 'na';

    // $motclef = $_POST['motclef'];
    // // var_dump($_POST['motclef']);
    // // echo '</br>';

    // $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE nom LIKE ? OR  prénom LIKE ? ");
    // $req_search->execute(array("%$motclef%","%$motclef%" ));


    // $res = $req_search->fetchAll();

    // echo json_encode($res);
    // // var_dump($res);




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


    
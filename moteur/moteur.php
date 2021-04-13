
<?php



    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    var_dump($bdd);
    // var_dump($e);



    $motclef = 'na';



    $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE nom LIKE ? OR  prénom LIKE ? ");
    $req_search->execute(array("%$motclef%","%$motclef%" ));


    $res = $req_search->fetchAll();

    var_dump($res);
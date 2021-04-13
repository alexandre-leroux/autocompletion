
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



$motclef = 'zve';


    $req_search = $bdd->query(" SELECT * FROM sportifs WHERE nom LIKE '%$motclef%' OR  prénom LIKE '%$motclef%' ");
                               

    $res = $req_search->fetchAll();

    var_dump($res);
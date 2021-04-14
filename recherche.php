<?php 
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=autocompletion;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }


    // $motclef = 'Pete Sampras';
    // var_dump($motclef);
    // var_dump($_GET['key']);
    // $req_search = $bdd->prepare("SELECT * FROM sportifs WHERE nom LIKE ? OR  prénom LIKE ?  OR  bio LIKE ?  ");
    // $req_search->execute(array("%$motclef%","%$motclef%","%$motclef%" ));
    // $res = $req_search->fetchAll();
    
    $motclef = $_GET['key'];
    $motcle_secure = htmlspecialchars($motclef);
    $req_search = $bdd->query(" SELECT * FROM sportifs WHERE MATCH (nom,prénom,nom_complet,bio) AGAINST ('$motcle_secure' IN NATURAL LANGUAGE MODE);  ");
    // $req_search->execute(array("%$motclef%" ));

    $res = $req_search->fetchAll();

?>



<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>MA RECHERCHE.COM</title>
  <link rel="stylesheet" href="style/style.css">
</head>

<html>

<body>
    
<main>


    <h1>MA RECHERCHE.COM</h1>

<div id="div_recherche">


    <div>
    <div id="conteneur_input_resultat_autocompl">
        <input id="input_recherche" type="text" nom="recherche">
        <div id="resultat_autocompl"></div>
    </div>
    </div>
    <button>Recherche</button>

</div>


<div id="conteneur_resultat_recherche">
    <?php
    $i = 0;
        while ( $res[$i] != null)
        {?>
            <div>
                <a id="titre_result_recherche" href="element.php?id=<?=$res[$i]['id'];?>"><?=$res[$i]['prénom']; ?> <?=$res[$i]['nom']; ?></a>
                <p id="resume_bio_result_recherche"><?=$res[$i]['bio']; ?></p>
            
            </div>

        <?php  $i++;
        }

    ?>

</div>





</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='script.js'></script>
</body>

</html>
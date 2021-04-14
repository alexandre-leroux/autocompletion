<?php 
include('moteur/moteur_recherche_get.php');
$res = moteur_de_recherche_get();
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

<div id="conteneur_titre">
  <a id="titre_principal" href="index.php">MA RECHERCHE.COM</a>  
</div>

<div id="div_recherche">

    <img id="loupe" src="style/loupe.svg" alt="">
 
      <div id="conteneur_input_resultat_autocompl">
          <input id="input_recherche" type="text" nom="recherche">
          <div id="resultat_autocompl"></div>
      </div>

    <button id="boutton_recherche">Recherche</button>

</div>


<div id="conteneur_resultat_recherche">
    <?php
    $i = 0;
        while ( $res[$i] != null)
        {?>
            <div id="div_resultat_recherche_boucle">
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
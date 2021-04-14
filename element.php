<?php
include('moteur/moteur_element.php');
$resultat = moteur_de_recherche_element();
// var_dump($resultat);
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



<a id="titre_principal" href="index.php">MA RECHERCHE.COM</a> 

<div id="div_recherche">

    <div>
      <div id="conteneur_input_resultat_autocompl">
          <input id="input_recherche" type="text" nom="recherche">
          <div id="resultat_autocompl"></div>
      </div>
    </div>
    <button id="boutton_recherche">Recherche</button>

</div>


<section id="resultatrecherche_element">
<h1><?=$resultat['nom_complet'];?></h1>
<p><?=$resultat['bio'];?></p>
</section>






</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='script.js'></script>
</body>

</html>
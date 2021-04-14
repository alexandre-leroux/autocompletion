


var input = document.getElementById("input_recherche")

// ------------------------------------------------fonction sur les touches, lance une recherche dans la bdd à chaque touche utilisée
input.addEventListener("keyup", function(e){

    console.log(e)
    if(e.code == 'Enter' || e.code == "NumpadEnter" )
    {
        mot_clef_input = document.getElementById("input_recherche").value
        console.log(mot_clef_input)
        window.location.replace("recherche.php?key="+mot_clef_input+"");
    }
    else
    {
        donnees = document.getElementById("input_recherche").value

        if(donnees.length>1)
        {
            $.ajax({
                url: "moteur/moteur_autocompletion.php",
                type: "POST",
                data: {"motclef":donnees},
                dataType: "json",
              
                success : function(dataType){
    
                    $('#resultat_autocompl').empty();
                    let i = 0;
                    while ( i < dataType.length)
                    {
                        $('#resultat_autocompl').append("<div  class='result_auto'>"+dataType[i].nom_complet +"</div>");
                        i++
                    }
                
                },
            
                error: function (request, status, error) {
                    console.log(request.responseText);
                },
            
                complete : function(resultat, statut){
                    // console.log(resultat);
                    // console.log(statut);
                }
            
            })
    
        }
        else
        {
            $('#resultat_autocompl').empty();
    
        }
    
        finChargement()

    }

})

// ----------------------------------------------recupère les div crées sur la recherche, en autocompletion. Delay pour l'excuter en dernier, une fois les DOM modifié
function finChargement() {
    setTimeout(function() {

        div_generees_boucle = document.querySelectorAll("#resultat_autocompl  div") 

        for (var i = 0, len = div_generees_boucle.length; i < len; i++) {

            div_generees_boucle[i].addEventListener('click', function(e){

                var get = e.path[0].innerHTML
                window.location.replace("recherche.php?key="+get+"");

            });
        }

    }, 80); // on retarde l'exécution de 1 seconde
}






// -------------------------------------redirection get vers la page recherche.php sur le click du boutton 
// ---------- + evenements pour vider autocomplétion en clickant dans la page + 
// ---------- + recherche impossible sir input vide
document.addEventListener('click', function(e){

        if (e.toElement.id == "input_recherche")
        {
        }
        else if (e.toElement.id == "boutton_recherche")
        {
            mot_clef_input = document.getElementById("input_recherche").value;
            if(mot_clef_input == "")
            {

            }
            else
            {
                  window.location.replace("recherche.php?key="+mot_clef_input+"");
            }
        }
        else
        {
            $('#resultat_autocompl').empty();
        }

})


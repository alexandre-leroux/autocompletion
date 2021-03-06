



// ------------------------------------------------fonction sur les touches, lance une recherche dans la bdd à chaque touche utilisée
var input = document.getElementById("input_recherche")
input.addEventListener("keyup", function(e){

    if(e.code == 'Enter' || e.code == "NumpadEnter" )
    {
        mot_clef_input = document.getElementById("input_recherche").value
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
                        tableau = dataType[i].bio
                        var indexOfFirst = tableau.toLowerCase().indexOf(donnees);
                        debut = indexOfFirst
                        var petit_extrait = tableau.substr(debut, 40)
                        
                        $('#resultat_autocompl').append("<div class='result_auto'><p class='p_titre_autocompl'>"+dataType[i].nom_complet +"</p><span class='petit_extrait'>..."+petit_extrait+"...</span></div>");
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

// ---------------------recupère les div crées sur la recherche, en autocompletion. Delay pour l'excuter en dernier, une fois les DOM modifié
function finChargement() {

    setTimeout(function() {

        p_generees_boucle = document.querySelectorAll("div.result_auto p") 

        for (var i = 0, len = p_generees_boucle.length; i < len; i++) {

            p_generees_boucle[i].addEventListener('click', function(e){
                var get = e.path[0].innerHTML
                window.location.replace("recherche.php?key="+get+"");
                return
            });
        }
        
        span_generees_boucle = document.querySelectorAll("div.result_auto span") 

        for (var i = 0, len = span_generees_boucle.length; i < len; i++) {

            span_generees_boucle[i].addEventListener('click', function(e){
                console.log (p_generees_boucle[i]) 
                var get = e.path[1].childNodes[0].innerHTML
                console.log(e.path[1].childNodes[0].innerHTML)
                console.log(e)
                window.location.replace("recherche.php?key="+get+"");
                return
            });
        }

    }, 80); // on retarde l'exécution de 1 seconde
}




// -------------------------------------redirection get vers la page recherche.php sur le click du boutton 
// ---------- + evenements pour vider autocomplétion en clickant dans la page + 
// ---------- + recherche impossible sir input vide
document.addEventListener('click', function(e){

    // console.log(e)
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


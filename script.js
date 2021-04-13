


var input = document.getElementById("input_recherche")
var div_a_cliquer;



input.addEventListener("keyup", function(){

    donnees = document.getElementById("input_recherche").value
    // console.log(donnees.length)
    // console.log(donnees)

    if(donnees.length>1)
    {

        console.log('ok')

        $.ajax({
            url: "moteur/moteur.php",
            type: "POST",
            data: {"motclef":donnees},
            dataType: "json",
          
            success : function(dataType){
              
                // console.log(dataType)
                // console.log(dataType.length)
                // console.log(dataType[0].id)
                
                // console.log(data[0]["id"])

              $('#resultat_autocompl').empty();
                let i = 0;
                while ( i < dataType.length)
                {
                    $('#resultat_autocompl').append("<div name="+dataType[i].id+" class='result_auto' id="+i+">"+dataType[i].prénom + " " + dataType[i].nom +'</div>');
                    i++
                }
     
            
            }})


    }


    finChargement()

    
})


function finChargement() {
    setTimeout(function() {

        div_generees_boucle = document.querySelectorAll("#resultat_autocompl  div") 

        for (var i = 0, len = div_generees_boucle.length; i < len; i++) {

            div_generees_boucle[i].addEventListener('click', function(e){
                console.log(e)
                console.log(e.path[0])

                // id du sportif
                console.log(e.path[0].attributes[0].nodeValue)
                console.log(e.path[0].innerHTML)
                var get = e.path[0].innerHTML
                console.log(get)
                window.location.replace("recherche.php?key="+get+"");
            });
        }



    }, 80); // on retarde l'exécution de 1 seconde
}







// html = document.querySelector('html');
// html.addEventListener('click',function(){
//     $('#resultat_autocompl').empty();

// })


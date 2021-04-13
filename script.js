


var input = document.getElementById("input_recherche")




input.addEventListener("keyup", function(){

    donnees = document.getElementById("input_recherche").value
    console.log(donnees.length)
    console.log(donnees)

    if(donnees.length>1)
    {

        console.log('ok')

        $.ajax({
            url: "moteur/moteur.php",
            type: "POST",
            data: {"motclef":donnees},
            dataType: "json",
          
            success : function(dataType){
              
                console.log(dataType)
                console.log(dataType.length)
                // console.log(dataType[0].id)
                
                // console.log(data[0]["id"])

              $('#resultat_autocompl').empty();
                let i = 0;
                while ( i < dataType.length)
                {
                    $('#resultat_autocompl').append("<div class='result_auto' id="+i+">"+dataType[i].nom + " " + dataType[i].prénom +'</div>');
                    i++
                }
     
            
            }})


    }

})



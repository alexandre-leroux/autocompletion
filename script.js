


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
                console.log(dataType[0].id)
                
                // console.log(data[0]["id"])
         
              $('#resultat_autocompl').append(dataType[0].id)
     
            
            }})


    }

})
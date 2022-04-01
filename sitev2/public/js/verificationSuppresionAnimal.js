var btnSup = document.querySelector("#btnSup");

btnSup.addEventListener("click", function()
{
    event.preventDefault();
    var idanimal = document.querySelector("#animal").value;
    var titleanimal = document.querySelector("#nom").value;
    if(confirm("Voulez vous supprimer l'animal "+idanimal+" - "+titleanimal+" ?" ))
    {
        document.location.href = "genererPensionnaireAdminSup&sup="+idanimal;
    }
})
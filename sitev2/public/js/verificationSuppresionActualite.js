var btnSup = document.querySelector("#btnSup");

btnSup.addEventListener("click", function()
{
    event.preventDefault();
    var idactualite = document.querySelector("#Actus").value;
    var titleactus = document.querySelector("#titreActus").value;
    if(confirm("Voulez vous supprimer l'actualité "+idactualite+" - "+titleactus+" ?" ))
    {
        document.location.href = "genererNewsAdminSup&sup="+idactualite;
    }
})
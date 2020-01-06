function functionAnnonce(str)
{
    var xhttp;
    if(str==null)
    {
        document.getElementById("annonce_selected").innerHTML="";
        return 0;
    }
    else
    {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("annonce_selected").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET","../controllers/main.php?action=afficherAnnonces&idRub="+str, true);
        xhttp.send();
    } 
}
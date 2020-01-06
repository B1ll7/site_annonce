function functionAnnonce()
{
    var x = document.getElementById("mySelect").value;
    document.getElementById("annonce_selected").innerHTML = "<h1>You selected: " + x + "</h1>";
}
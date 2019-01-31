alert("Załadowałem skrypt");
window.onload = alert("Załadowałem skrypt");

function quiz(){
alert("<Z></Z>aładowałem skrypt");
var decodedCookie = decodeURIComponent(document.cookie);
var ca = decodedCookie.split(';');

var quizeHTML = document.getElementById("quiz");
var quizeContent = "<ul>";

for(var i = 0; i <ca.length; i++) {
  var c = ca[i];
  quizeContent += "<li> Pytanie: "+ i +" "+ c[0] + ". Odpowiedz: "+ c[1]+"</li>";
  
}
quizeContent += "</ul>";
quizeHTML.innerHTML = quizeContent;
}


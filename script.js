var poids = document.getElementById("poids");
var output = document.getElementById("kg");
output.innerHTML = poids.value;
poids.oninput = function() {
output.innerHTML = this.value;
}
var taille = document.getElementById("taille");
var output1 = document.getElementById("cm");
output1.innerHTML = taille.value;
taille.oninput = function() {
output1.innerHTML = this.value;
}
var tension = document.getElementById("tension");
var output3 = document.getElementById("rt");
output3.innerHTML = tension.value;
tension.oninput = function() {
output3.innerHTML = this.value;
}
var temp = document.getElementById("temp");
var output4 = document.getElementById("tmp");
output4.innerHTML = temp.value;
temp.oninput = function() {
output4.innerHTML = this.value;
}

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function debut() {
  var today= new Date();
  var h=today.getHours();
  var y=today.getFullYear();
  var m=today.getMinutes();
  var s=today.getSeconds();
  var months = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aoùt","Septembre","Octobre","Novembre","Decembre"];
  var days = ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
  var dayss = ["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
  var mo = months[today.getMonth()];
  var day = days[today.getDay()];
  var wekks = dayss[today.getDay()];
  var y=today.getFullYear();
  document.getElementById("date").innerHTML =wekks+"  "+y+"  "+mo+"  "+day;
  m=verifier(m);
  s=verifier(s);
  document.getElementById('txt').innerHTML=+h+":"+m+":"+s;
  t=setTimeout('debut()',500);
}
function verifier(i) { if (i<10) {
  i="0" + i; }
  return i;
  }
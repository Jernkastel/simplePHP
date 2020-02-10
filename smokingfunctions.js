// Funktion för att visa redigeringsformulär. Gömmer samtidigt inloggningsformulär.
function toggleReg() {
    var x = document.getElementById("hiddenReg");
	var y = document.getElementById("but");
	var z = document.getElementById("logForm");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
		y.style.display = "none";
		z.style.display = "none";
    }
}
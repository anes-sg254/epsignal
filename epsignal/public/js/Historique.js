var now = new Date();
var heure = ('0' + now.getHours()).slice(-2);
var minute = ('0' + now.getMinutes()).slice(-2);

let select = document.getElementById("select").value;
console.log(select);

const btnafficher = document.getElementById("btnafficher");
btnafficher.addEventListener("click", function (e) {
    e.preventDefault();
    GetEnregistreurs();
});

function GetEnregistreurs() {
    let url = "https://epsignal.alwaysdata.net/Api/Signalement/";
    fetch(url, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => onGetEnregistreursSucces(data))
        .catch((error) => onGetEnregistreursErreur(error));
}

function onGetEnregistreursSucces(data) {
    console.log(data);
}

function onGetEnregistreursErreur(error) {
    console.log(error);
}


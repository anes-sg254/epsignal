var now = new Date();
var tempsHeure = ('0' + now.getHours()).slice(-2);
var minute = ('0' + now.getMinutes()).slice(-2);
var seconde = ('0' + now.getSeconds()).slice(-2);
console.log("Il est " + tempsHeure + "h" + minute + "min" + seconde);


let objSignalement = {};
let iduser = 1;
const btnenvoie = document.getElementById("btnenvoie");
btnenvoie.addEventListener("click", function (e) {
  e.preventDefault();


  let idEtudiantSignal = document.getElementById("idEtudiantSignal").value;
  console.log(idEtudiantSignal);
  let idMotif = document.getElementById("idMotif").value;
  console.log(idMotif);
  let idLieu = document.getElementById("idLieu").value;
  console.log(idLieu);
  let idTemps = document.getElementById("idTemps").value;
  console.log(idTemps);
  let idCommentaire = document.getElementById("idCommentaire").value;
  console.log(idCommentaire);

  objSignalement.etu = idEtudiantSignal;
  objSignalement.mot = idMotif;
  objSignalement.li = idLieu;
  objSignalement.tps = idTemps;
  objSignalement.com = idCommentaire;
  objSignalement.ide = iduser;

  let objSignalementFinal = {
    etudiant: objSignalement.etu,
    motif: objSignalement.mot,
    lieu: objSignalement.li,
    horaire: objSignalement.tps,
    commentaire: objSignalement.com,
    idEtudiant: objSignalement.ide
  }

  console.log(objSignalementFinal);


  fetch("https://epsignal.alwaysdata.net/Api/Signalement", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: JSON.stringify(objSignalementFinal)
  })
    .then(function (postReponse) {
      console.log("Le serveur a répondu avec le code " + postReponse.status);
      if (postReponse.ok == true) {
        console.log("La requête a été traitée avec succès");
      } else {
        console.log("La requête n'a pas pu être traitée correctement");
      }
      return postReponse.json();
    })
    .then(function (postReponse) {
      CreateSignalementSucces(postReponse);
      let newP = document.createElement("p");
      newP.textContent = "Le signalement à été enregistré";
      document.getElementById("text").appendChild(newP);
    })
    .catch(function (postError) {
      console.log("La réponse n'a pas abouti");
      CreateSignalementErreur();
    });

  function CreateSignalementSucces(postReponse) {
    console.log(postReponse);
  }

  function CreateSignalementErreur(postError) {
    console.log(postError);
  }
  console.log("Envoie des données...");

});



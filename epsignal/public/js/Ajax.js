/***********************************************************************Methode POST***********************************************************************/
function PostEnregistreurs() {
    let url = "https://controle.alwaysdata.net/Api/Conteneurs";
    let datas = new FormData();
    datas.append('dto', '{"numTransport": "12341234","password": "passwordtest","dateDepart": "05/04/2024"}');
    fetch(url, {
        method: "POST",
        body: datas
    })
        .then((response) => response.json())
        .then((data) => succes(data))
        .catch((error) => erreur(error));
}

function onPostEnregistreursSucces(data) {
    console.log(data);
}
function onPostEnregistreursErreur(error) {
    console.log(error);
}

/***********************************************************************Methode GET***********************************************************************/
function GetEnregistreurs(prmId) {
    let url = "https://controle.alwaysdata.net/Api/Conteneurs";
    fetch(url + prmId, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => succes(data))
        .catch((error) => erreur(error));

}

function onGetEnregistreursSucces(data) {
    console.log(data);
}
function onGetEnregistreursErreur(error) {
    console.log(error);
}

/***********************************************************************Methode UPDATE***********************************************************************/
function UpdateContainer() {
    let url = "https://controle.alwaysdata.net/Api/Conteneurs/1541934580";
    let datas = { "validite": "valide" }
    fetch(url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/raw"
        },
        body: JSON.stringify(datas)
    })
        .then((response) => response.json())
        .then((data) => succes(data))
        .catch((error) => erreur(error));
}

function onUpdateContainerSucces(data) {
    console.log(data);
}
function onUpdateContainerErreur(error) {
    console.log(error);
}
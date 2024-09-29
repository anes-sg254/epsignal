<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les données</title>
</head>

<body>
    <table border="1" id="dataTable">
        <br><br><br>
        <thead>
            <tr>
                <th>Etudiant</th>
                <th>Motif</th>
                <th>Lieu</th>
                <th>Horaire</th>
                <th>Commentaire</th>



                <th>Statut</th>
                <th>Choix du statut</th>

                </select><br><br> -->
            </tr>
        </thead>
        <tbody id="dataBody">
        </tbody>
    </table>


    <script>
        // Fonction pour récupérer les données et les afficher dans le tableau
        function fetchData() {
            fetch('https://epsignal.alwaysdata.net/Api/Signalement/')
                .then(response => response.json())
                .then(data => {
                    let tableBody = document.getElementById("dataBody");
                    tableBody.innerHTML = "";
                    data.forEach(row => {
                        let tr = document.createElement("tr");

                        const tdetudiant = document.createElement('td');
                        tdetudiant.textContent = row.etudiant;
                        tr.appendChild(tdetudiant);

                        const tdmotif = document.createElement('td');
                        tdmotif.textContent = row.motif;
                        tr.appendChild(tdmotif);

                        const tdlieu = document.createElement('td');
                        tdlieu.textContent = row.lieu;
                        tr.appendChild(tdlieu);

                        const tdhoraire = document.createElement('td');
                        tdhoraire.textContent = row.horaire;
                        tr.appendChild(tdhoraire);

                        const tdcommentaire = document.createElement('td');
                        tdcommentaire.textContent = row.commentaire;
                        tr.appendChild(tdcommentaire);


                        
                        const choix = document.createElement('td');
                        const select = document.createElement('select');

                        const options = ['Reçu', 'En cours', 'Traité'];
                        options.forEach(option => {
                            let opt = document.createElement('option');
                            opt.value = option.toLowerCase().replace(/\s+/g, '_');
                            opt.textContent = option;
                            select.appendChild(opt);
                        });

                        const form = document.createElement('form');
                        form.appendChild(select);
                        choix.appendChild(form);
                        tr.appendChild(choix);

                        const tdstatut = document.createElement('td');

                        tdstatut.textContent = select.options[select.selectedIndex].textContent;
                        tr.appendChild(tdstatut);

                        select.addEventListener('change', function() {
                            const selectedValue = select.options[select.selectedIndex].textContent;
                            console.log('La valeur sélectionnée est : ' + selectedValue);

                            tdstatut.textContent = selectedValue;


                            let datas = {
                                "statut": selectedValue
                            }
                            let url = "https://epsignal.alwaysdata.net/Api/Signalement/";
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

                            function succes(data) {
                                console.log(data);
                            }

                            function erreur(error) {
                                console.log(error);
                            }
                        });








                        tableBody.appendChild(tr);
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));


        }
        window.onload = fetchData;
    </script>
    <br>
    <div class="divbouton"><button class="boutonMAJ">Mettre à jour la validité</button><br></div>

    <div class="divbouton"><a href="<? echo base_url("Cconnexion/logout")  ?>"><button class="boutondeconnexion">Se déconnecter</button><br></div>
</body>

</html>
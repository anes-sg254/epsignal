<article class="main-article-arreter">
    <script src="<?php echo base_url("js/Signalement.js"); ?>" defer></script>
    <strong>Singaler un incident</strong><br>
    <?php
    function getFranceTime()
    {
        // Définir le fuseau horaire de la France
        date_default_timezone_set('Europe/Paris');
        // Récupérer la date et l'heure actuelles
        $heureFrance = date('H:i:s');
        return $heureFrance;
    }
    $heureFinale = getFranceTime();
    ?>

    <input id="idEtudiantSignal" class="id" type="text" name="identifiant" placeholder="Nom et Prénom" /><br>
    <input id="idMotif" class="id" type="text" name="identifiant" placeholder="Motif" /><br>
    <input id="idLieu" class="id" type="text" name="identifiant" placeholder="Lieu" /><br>
    <input id="idTemps" class="id" type="text" name="identifiant" placeholder="Heure" value=<?php echo $heureFinale ?> /><br>
    <input id="idCommentaire" class="id" type="text" name="identifiant" placeholder="Commentaire" /><br><br>
    
    <strong>Envoyer le signalement</strong><br><br>
    <p id="text"></p><br>

    <div class="divbouton"><button id="btnenvoie" class="bouton">Envoyer</button></div><br><br>

    <div class="divbouton"><a href="<? echo base_url("Cconnexion/logout")  ?>"><button class="boutondeconnexion">Se déconnecter</button><br></div>
</article>
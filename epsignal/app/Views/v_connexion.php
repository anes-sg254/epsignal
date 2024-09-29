<article class="main-article">
<form method="POST" action="Cconnexion">
<link rel="stylesheet" href="<?php echo base_url("css/style.css"); ?>">
    <strong>CONNEXION</strong><br><br><br>
    <strong>IDENTIFIANT DE CONNEXION</strong><br><br>
    <input id="login" class="id" type="text" name="login" placeholder="Saisissez votre login..." required><br><br>
    <strong>MOT DE PASSE</strong><br><br>
    <input id="motdepasse" class="id" type="password" name="password" placeholder="Mot de passe" required><br><br><br><br>
    <div class="divbouton"><a href="<? echo base_url("Cconnexion/refresh")  ?>"><input class="bouton2" type="submit" id="form_submit" formaction="/Cconnexion/authentication">
    </form>
</article>

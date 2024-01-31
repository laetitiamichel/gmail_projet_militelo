<?php
    session_start();
        
    # retenir l'email de la personne connectée pendant 1 an
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        # Récupérer l'adresse e-mail du formulaire
        $email = $_POST["Mail"];
    
        # Définir le cookie avec une durée de vie de 30 jours (en secondes)
        setcookie("user_email", $email, time() + 30 * 24 * 60 * 60, "/");
    
        /*
        Rediriger l'utilisateur vers une autre page ou afficher un message de confirmation
        header("Location: index.php");
        exit();
        */
    }

    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="projet GMAIL Laetitia MICHEL">
    
    <link rel="apple-touch-icon" sizes="180x180" href="./favicone/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicone/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicone/favicon-16x16.png">
    <link rel="manifest" href="./favicone/site.webmanifest">

    <link rel="stylesheet" href="./css/formulaire_connexion.css">
    <link rel="stylesheet" href="./css/formulaire_page_1.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/reset.css">
    <title>Gmail</title>
</head>
<body>
<header class="menu_principal">
    <!-- MENU GMAIL-->
    <figure class="imageGmail">
        <img src="./asset/mail.png" class="logo" alt="logo">
        <figcaption>
            <h1 class="item_gmail">Gmail</h1>
        </figcaption>    
    </figure>
    <ul class="menu_gmail">       
        <li class="item"><a class="menu__item" href="#pour_les_pros">pour les pros</a></li>
        <li class="item"><a class="menu__item" href="./connexion.html" target="blank">connexion</a></li>
        <li class="item"><a class="menu__item active-page2" href="#creer_un_compte">créer un compte</a></li>
    </ul>    
    
</header>
<main>
    <div class="accueil">
            <div class="image_accueil" >
                <img src="./asset/home-hero.jpg" alt="image page d'accueil gmail">
            </div>

            <h1 class="h1_accueil">
                Retrouvez la fluidité et la simplicité de GMail sur tous vos appareils
            </h1>
        
            <div class="bouton_creer_un_compte">
                <a class="bouton_compte" href="#creer_un_compte" target="blank">créer un compte</a>
            </div>
            <a class="bouton_fleche" type="button" href="#creer_un_compte">
                <img class="fleche" id="fleche" src="./asset/arrow.png" alt="fleche du bas">
            </a>
    </div>

        <!-- page 2 GMAIL => formulaire créer un compte -->
        <div class="formulaire_creer_un_compte" id="creer_un_compte">
            <h1 class="h1_formulaire">
                Une boîte de réception entièrement repensée
            </h1>
            <h2 class="h2_formulaire">
                Avec les nouveaux onglets personnalisables, repérez
                immédiatement les nouveaux messages et choisissez 
                ceux que vous souhaitez lire en priorité.
            </h2>
            <!-- formulaire pour créer un compte -->
            <div class="inner-form_creer_un_compte" 
            aria-labelledby="creeruncompte nomCreerUnComptee prenomCreerUnCompte emailcreation mdpCreation btncreationcompte">
                <fieldset> <!-- encadré qui contient le formulaire-->
                    <legend>
                        Créer un compte
                    </legend>
                    <?php
                    require_once __DIR__ . "/controller/controller.class.php";
                    ControllerBase::event();
                    ?>
                    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" id="creeruncompte">  
                        <label for="nomCreerUnCompte">
                         Nom*
                        </label>
                            <input 
                            id="nomCreerUnCompte"
                            type="text"
                            name="nom"
                            placeholder="Votre nom" 
                            autofocus="true" 
                            aria-required="true"
                            >
        
                        <label for="prenomCreerUnCompte">
                        Prénom*
                        </label>
                            <input
                            id="prenomConnexion"
                            type="text"
                            name="Prénom"
                            placeholder="Votre Prénom"
                            aria-required="true"
                            >
        
                        <label for="emailcreation">
                        Mail*
                        </label>
                            <input 
                            id="emailconnexion"
                            type="email"
                            name="Mail"
                            placeholder="giusmili67@gmail.com"
                            aria-required="true"
                            >
        
                        <label for="mdpCreation">
                        Choisir votre mot de passe*
                        </label>
                            <input
                            id="mdpCreation" 
                            type="password"
                            name="password"
                            placeholder="*****"
                            aria-required="true"
                            >
        
                        <input
                            id="btncreationcompte"
                            type="submit"
                            value="valider votre compte"
                            >
                    </form>
                </fieldset>    
            </div>
        <!-- fin du formulaire pour créer un compte -->
        </div>
</main>
        
<footer>
    &copy;
</footer>
</body>
</html>
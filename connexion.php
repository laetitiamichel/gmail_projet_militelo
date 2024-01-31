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
        <li class="item"><a class="menu__item  active-page" href="#connexion">connexion</a></li>
        <li class="item"><a class="menu__item" href="#creer_un_compte">créer un compte</a></li>
    </ul>    
    
</header>
<main>
    
            <button class="bouton_fleche" type="button" href="#creer_un_compte">
                <img class="fleche" id="fleche" src="./asset/arrow.png" alt="fleche du bas">
            </button>
         
        <!-- page 2 GMAIL => formulaire CONNEXION -->

        <div class="formulaire_connexion" id="connexion">
            <h1 class="h1_formulaire_connexion">
                Bienvenue dans votre espace null
            </h1>
            
            <!-- formulaire pour se connecter -->
            <div class="inner-form_connexion" aria-labelledby="connexion emailConnexion mdpconnexion btnConnexion">
                <!-- encadré qui contient le formulaire-->
                <fieldset> 
                    <legend>
                        Connectez-vous à votre compte
                    </legend>
                    <?php
                require_once __DIR__ . "/controller/controller.class.php";
                ControllerBase::event();
                    ?>
                    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" id="creeruncompte">  
                        <label for="emailConnexion">
                        Mail ou login*
                        </label>
                            <input 
                            id="emailConnexion"
                            type="email"
                            name="Mail"
                            placeholder="giusmili67@gmail.com"
                            aria-required="true"
                            >
        
                        <label for="mdpconnexion">
                        Mot de passe*
                        </label>
                            <input 
                            id="mdpconnexion" 
                            type="password"
                            name="password"
                            placeholder="*****"
                            aria-required="true"
                            >
        
                        <input 
                        id="btnConnexion" 
                        type="submit" 
                        value="connexion à votre compte">
                    </form>
                </fieldset>    
            </div>
            <!-- fin du formulaire pour créer un compte -->
        
        </div>
        <!-- fin de la page 1 -->
        
</main>
        
<footer>
    &copy;
</footer>
</body>
</html>
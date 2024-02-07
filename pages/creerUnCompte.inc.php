<body>
<header class="menu_principal">
   <!--  # MENU GMAIL -->
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

        <!-- #page 2 GMAIL => formulaire créer un compte -->
        <div class="formulaire_creer_un_compte" id="creer_un_compte">
            <h1 class="h1_formulaire">
                Une boîte de réception entièrement repensée
            </h1>
            <h2 class="h2_formulaire">
                Avec les nouveaux onglets personnalisables, repérez
                immédiatement les nouveaux messages et choisissez 
                ceux que vous souhaitez lire en priorité.
            </h2>
           <!--  #formulaire pour créer un compte -->
            <div class="inner-form_creer_un_compte" 
            aria-labelledby="creeruncompte nomCreerUnComptee prenomCreerUnCompte emailcreation mdpCreation btncreationcompte">
                  
            <fieldset> <!-- encadré qui contient le formulaire-->
                    <legend>
                        Créer un compte
                    </legend>
                    <!-- méthode POST car PHP en post -->
                    <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post" id="creeruncompte">  
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
                            name="prenom"
                            placeholder="Votre Prénom"
                            aria-required="true"
                            >
        
                        <label for="emailcreation">
                        Mail*
                        </label>
                            <input 
                            id="emailconnexion"
                            type="email"
                            name="mail"
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
                <?php
                   include_once __DIR__ ."/pages/bdd.inc.php"
                ?>
            </div>
        <!-- #fin du formulaire pour créer un compte  -->
        </div>
</main>
        
<footer>
    <?= Page::$_copyrigt ?>
</footer>
</body>
</html>
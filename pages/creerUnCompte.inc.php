<?php
    /* session_start(); */
    $_id_session=session_id();
# inclusion du head
    include_once __DIR__ ."/pages/head.inc.php";
?>

<body>
<header class="menu_principal">
    <!-- #MENU GMAIL -->
    <figure class="imageGmail">
        <img src="./asset/mail.png" class="logo" alt="logo">
        <figcaption>
            <h1 class="item_gmail">Gmail</h1>
        </figcaption>    
    </figure>
    <ul class="menu_gmail">       
        <li class="item"><a class="menu__item" href="#pour_les_pros">pour les pros</a></li>
        <li class="item"><a class="menu__item  active-page" href="./connexion.php">connexion</a></li>
        <li class="item"><a class="menu__item " href="./index.php">créer un compte</a></li>
    </ul>    
    
</header>
<main>
    
            <button class="bouton_fleche" type="button" href="#creer_un_compte">
                <img class="fleche" id="fleche" src="./asset/arrow.png" alt="fleche du bas">
            </button>
         
       <!--  #page 2 GMAIL => formulaire CONNEXION -->
        <div class="formulaire_connexion" id="connexion">
            <h1 class="h1_formulaire_connexion">
                Bienvenue dans votre espace null
            </h1>
            
           <!--  #formulaire pour se connecter -->
            <div class="inner-form_connexion" aria-labelledby="connexion emailConnexion mdpconnexion btnConnexion">
                <!-- encadré qui contient le formulaire-->
                <fieldset> 
                    <legend>
                        Connectez-vous à votre compte
                    </legend>
                    <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">  
                        <label for="emailConnexion">
                        Mail ou login*
                        </label>
                            <input 
                            id="emailConnexion"
                            type="email"
                            name="Mail"
                            placeholder=""
                            aria-required="true"
                            >
        
                        <label for="mdpconnexion">
                        Mot de passe*
                        </label>
                            <input 
                            id="mdpconnexion" 
                            type="password"
                            name="password"
                            placeholder=""
                            aria-required="true"
                            >
        
                        <input 
                        id="btnConnexion" 
                        type="submit" 
                        value="connexion à votre compte">
                    </form>
                </fieldset>  
                <?php
                   //include_once __DIR__ ."/connexionBdd.inc.php"
                ?>  
            </div>
            <!-- #fin du formulaire pour créer un compte  -->
        
        </div>
        <!-- #fin de la page 1 -->
        
</main>

<?php
    $_id_session ? 
    print "<em class=\"mark_id\">ID de session récupérer via session_id()<br>" .$_id_session. "<br></em>" : 
    false;
    
    require_once __DIR__ . "/pages/connexionBdd.inc.php";
    # appel de la class Login
    Login::connect();
?> 

<footer>
    <?= Page::$_copyrigt ?>
</footer>
</body>
</html>


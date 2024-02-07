<?php
 

    // Configuration de la base de données
    $serveur = "localhost";
    $nomBaseDeDonnees = "creer_un_compte";
    $utilisateur = "root";
    $motDePasse = "root";
    
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mail = $_POST["mail"];
        $password = $_POST["password"];
    
        // Valider les données du formulaire
        $errors = [];
    
        if (empty($nom) || empty($prenom) || empty($mail) || empty($password)) {
            $errors[] = "Tous les champs sont obligatoires";
        }
    
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Adresse email invalide";
        }
    
        // Si aucune erreur, procéder à l'insertion dans la base de données
        if (empty($errors)) {
            try {
                // Connexion à la base de données avec PDO
                $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Hasher le mot de passe
                $motDePasseHash = password_hash($password, PASSWORD_DEFAULT);
    
                // Préparer la requête SQL pour insérer les données dans la base de données
                $requete = $connexion->prepare("INSERT INTO utilisateurs (nom, prenom, mail, password) VALUES (:nom, :prenom, :mail, :password)");
    
                // Binder les paramètres
                $requete->bindParam(":nom", $nom);
                $requete->bindParam(":prenom", $prenom);
                $requete->bindParam(":mail", $mail);
                $requete->bindParam(":password", $motDePasseHash);
    
                // Exécuter la requête
                $requete->execute();
    
                echo "Enregistrement réussi !";
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }
        } else {
            // Afficher les erreurs
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
        }
    }
    
    ?>
    
   
    
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
                   
            </div>
        <!-- #fin du formulaire pour créer un compte  -->
        </div>
</main>
        
<footer>
    <?= Page::$_copyrigt ?>
</footer>
</body>
</html>
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
    
                    echo 'Enregistrement réussi ! <a href="connexion.php">connectez-vous</a>';
                exit;
            } catch (PDOException $e) {
                echo "<span class='error-message'>Erreur de connexion à la base de données : </span>" . $e->getMessage();

            }
        } else {
            // Afficher les erreurs
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
        }
    }
    
    ?>
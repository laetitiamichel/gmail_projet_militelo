<?php
  #ici on doit vérifier le mot de passe login de la session de l'user
  # vérif si il existe déjà
  # vider au préalable la BDD
  # retester en se connectant avec les mêmes paramètres d'enregistrement
  # confère exo user_connextion

    // Configuration de la base de données
    $serveur = "localhost";
    $nomBaseDeDonnees = "creer_un_compte";
    $utilisateur = "root";
    $motDePasse = "root";
    
# Vérifier si le formulaire a été soumis
if(isset($_POST['mail']) && isset($_POST['password'])){

    try {
        // Connexion à la base de données avec PDO
        $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer la requête SQL pour récupérer l'utilisateur avec le mail spécifié
        $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
        $requete->bindParam(":mail", $mail);
        $requete->execute();
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'ID de l'utilisateur est stocké dans la session
/*     if (isset($_SESSION['ID'])) {
        $userID = $_SESSION['ID'];
        echo "L'utilisateur est connecté avec l'ID : $userID";
    } else {
        echo "Aucun utilisateur n'est connecté.";
    } */
        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($utilisateur && password_verify($password, $utilisateur["password"])) {
            // L'utilisateur est authentifié
            // Stocker l'ID de l'utilisateur dans la session
            $_SESSION['ID'] = $utilisateur['ID'];
            
            echo "Connexion réussie !";

        } else {
            // Identifiants invalides
            echo "Adresse email ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>
   
     
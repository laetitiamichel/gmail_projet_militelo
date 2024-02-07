<?php
  #ici on doit vérifier le mot de passe login de la session de l'user
  # vérif si il existe déjà
  # vider au préalable la BDD
  # retester en se connectant avec les mêmes paramètres d'enregistrement
  # confère exo user_connextion

# Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $mail = $_POST["mail"];
    $password = $_POST["password"];

    // Valider les données (vous pouvez ajouter des validations supplémentaires si nécessaire)

    // Vérifier les informations de connexion dans la base de données
    require_once("configBdd.inc.php"); // Inclure le fichier de configuration de la base de données

    try {
        // Connexion à la base de données avec PDO
        $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer la requête SQL pour récupérer l'utilisateur avec le mail spécifié
        $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
        $requete->bindParam(":mail", $mail);
        $requete->execute();
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($utilisateur && password_verify($password, $utilisateur["password"])) {
            // L'utilisateur est authentifié, vous pouvez effectuer d'autres actions comme rediriger vers une page sécurisée
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
   
     
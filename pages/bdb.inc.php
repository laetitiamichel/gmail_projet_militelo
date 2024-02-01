<?php
    class ControllerBDD{
    static function insertbdd(){
    require_once("configBdb.inc.php"); # Configuration de la base de données

        try {
            // Connexion à la base de données avec PDO
            $connexion = new PDO("mysql:host=$serveur;
                                dbname=$nomBaseDeDonnees", 
                                $utilisateur, 
                                $motDePasse);
        
            // Afficher les erreurs PDO
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                // Récupérer nom/prenom/mail/password du formulaire
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $mail = $_POST["mail"];
                $password = $_POST["password"];
        
                if($login && $motDePasse && filter_var($login, FILTER_VALIDATE_EMAIL )){
                    $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);
        
                    // Préparer la requête SQL pour insérer les données dans la base de données
                    $requete = $connexion->prepare("INSERT INTO creer_un_compte (nom, prenom, mail, password) VALUES (?, ?, ? , ?)");
            
                    // Binder les paramètres
                    $requete->bindParam(1, $nom);
                    $requete->bindParam(2, $prenom);
                    $requete->bindParam(3, $mail);
                    $requete->bindParam(4, $password);
                   
            
                    // Exécuter la requête
                    $requete->execute();
            
                    print '<p class="warning msg-success">Enregistrement réussi !</p>';
        
                }
                else{
                    print '<p class="warning msg-alert">Tous les champs sont obligatoires ou mail invalide</p>';
                }
        
                // Hasher le mot de passe
               
        
                // Fermer la connexion
                $connexion = null;
            }
        } 
        catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
}
ControllerBDD::insertbdd();
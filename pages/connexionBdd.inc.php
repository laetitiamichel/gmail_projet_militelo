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

    // class pour récupérer l'id de la session:
    class Login{
        static function connect(){
            
            //connexion user
            if(isset($_POST['password']) && isset($_COOKIE['PHPSESSID'])){
                
                $password = $_POST["password"];
                if(!$password){
                    print "<section><p>Remplir les champs</p></section>";
                }
                else{
                    $_SESSION["nom"] = $password;
                    print "<section><p class=\"button-success-color\">Bonjour : ".$_SESSION["nom"]."</p></section>";
                    print "<section><p><a href=\"session_user.php\" class=\"button-success button-success-color\">Vos infos</a></p></section>";
                    // afficher la section récupérée
                    echo '<section><p class="mark_id">ID de session récuperé via $_COOKIE : <br>'.$_COOKIE["PHPSESSID"].'</p></section>';
                }
            }
        }
    } 
       
# Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $mail = $_POST["mail"];
    $password = $_POST["password"];

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
            echo "<span style='color: red;'>Adresse email ou mot de passe incorrect.</span>";;
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>
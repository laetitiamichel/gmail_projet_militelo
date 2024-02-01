<?php
    class ControllerBDD{
        static function insertbdd(){
            require_once("configBdd.inc.php"); // Configuration de la base de données

            try {

                // Connexion à la base de données avec PDO
                $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", 
                                    $utilisateur,$motDePasse);

                // Afficher les erreurs PDO
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Vérifier si le formulaire a été soumis

                if ($_SERVER["REQUEST_METHOD"] == "POST"){ 

                    // Récupérer nom/prenom/mail/password du formulaire
                    $_nom = $_POST["nom"];
                    $_prenom = $_POST["prenom"];
                    $_mail = $_POST["mail"];
                    $_password = $_POST["password"];

                    // Vérifier si l'utilisateur existe déjà dans la base de données
                    $_requete_Verif = $connexion->prepare("SELECT id FROM utilisateurs WHERE password = ?");
                    $_requete_Verif->bindParam(4, $_password);
                    $_requete_Verif->execute(); 

                    if ($_requete_Verif->rowCount() > 0) {

                        // L'utilisateur existe déjà, afficher un message d'erreur
                        print '<p class="warning msg-alert">Cette adresse e-mail est déjà enregistrée. Choisissez une autre adresse e-mail.</p>';
                    
                    }else{

                        // L'utilisateur n'existe pas, procéder à l'insertion
                        if (!empty($_nom) && !empty($_prenom) && !empty($_mail) && !empty($_password) && filter_var($_password, FILTER_VALIDATE_EMAIL)) {
                            $motDePasseHash = password_hash($_password, PASSWORD_DEFAULT);

                            // Préparer la requête SQL pour insérer les données dans la base de données
                            $requete = $connexion->prepare("INSERT INTO utilisateurs (nom,prenom,mail,password) VALUES (?, ?, ?, ?)");
                        
                            // Binder les paramètres
                            $requete->bindParam(1, $_nom);
                            $requete->bindParam(2, $_prenom);
                            $requete->bindParam(3, $_mail);
                            $requete->bindParam(4, $_password);

                            // Exécuter la requête
                            $requete->execute();

                                print '<p class="warning msg-success">'.$_password.' : Enregistrement réussi !</p>';

                        }else{
                            print '<p class="warning msg-alert">Tous les champs sont obligatoires ou mail invalide</p>';
                        }
                    }
                    // Fermer la connexion
                    $connexion = null;
                }
            }
            catch(PDOException $e){
                    echo '<p class="warning msg-alert">Erreur de connexion à la base de données : </p>' . $e->getMessage();
                }
        }
    }
ControllerBDD::insertbdd();

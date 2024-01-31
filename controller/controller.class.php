<?php

class ControllerBase{
    static function event(){
        
        if(isset($_POST['mail']) && isset($_POST['pass'])){ # vérification des champs
                
            # vérification si le format du mail est correct
            if( filter_var($_POST['Mail'], FILTER_VALIDATE_EMAIL) && $_POST['password']){
                    print "<p>Bonjour ".$_POST['Mail']."</p>";
                    
                    print '<p><a href="mailto:'.$_POST['Mail'].'">Contactez moi</a></p>';
                    print "<p>Votre sécurité c'est notre tranquilité : ".password_hash($_POST['password'], PASSWORD_DEFAULT)."</p>";
                    /* print "<p>".$_COOKIE['mail']."</p>"; */
                    
                    /* password_verify(1984, $hash) */
            }
            else{
                
                die("<p> Champs Obligatoires!!! <a href=\"index.php\">Rechargez la page</a></p>");
            }
            return false;
            
        }
    }
}
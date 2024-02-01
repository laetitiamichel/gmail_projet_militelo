<?php
    const title = "Gmail";
        $_date = date("Y-m-d");

    /* création d'une classe avec les différentes variables, commence par une majuscule */
        class Page{
            static $_copyrigt = " LM ";
            /* quand c'est public => on appelle la variable en pointant 
            <?= $_page->_title ?>*/
            /* public $_title = "ciné"; */
            public $_link_reset = "./css/reset.css";
            public $_link_header = "./css/header.css";
            public $_link_formulaire_page_1 = "./css/formulaire_page_1.css";
            public $_link_formulaire_connexion = "./css/formulaire_connexion.css";
            /* quand c'est static=> <?= Page::$_manifest ?> */
            static $_manifest = "./favicone/site.webmanifest";
            static $_lang = ["fr","en"];
        }

$_page = new Page();
?>
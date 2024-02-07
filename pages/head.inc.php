<!-- ici on fait appel au controller pour activer les variables et la class: sinon le fichier ne s'execute pas-->
<?php
session_start();
    include_once __DIR__ ."/controller.inc.php";
?>
<!DOCTYPE html>
<html lang="<?= Page::$_lang[0] ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="projet GMAIL Laetitia MICHEL">
    
    <link rel="apple-touch-icon" sizes="180x180" href="./favicone/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicone/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicone/favicon-16x16.png">
    <link rel="manifest" href="<?= Page::$_manifest ?>">

    <link rel="stylesheet" href="<?= $_page->_link_formulaire_connexion ?>">
    <link rel="stylesheet" href="<?= $_page->_link_formulaire_page_1 ?>">
    <link rel="stylesheet" href="<?= $_page->_link_header ?>">
    <link rel="stylesheet" href="<?= $_page->_link_reset ?>">
    <title><?= title ?></title>
</head>
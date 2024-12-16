<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Accueil</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
        <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo '<div>Vous êtes connecté en tant que '. $_SESSION['username'] . '</div>';
            };
        ?>
        <a href="loginPage.php">Connexion</a>
        <a href="signupPage.php">Inscription</a>
        <form id="logout-form" action="forms/logout.php" method="POST">
            <button type="submit">Déconnexion</button>
        </form>

        
        <script src="assets/script.js" async defer></script>
    </body>
</html>
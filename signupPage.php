<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inscription</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
        <?php
            session_start();

            // Générer un token CSRF si ce n'est pas déjà fait
            if (empty($_SESSION['csrf_token'])) {
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Génère un token unique de 32 octets
            }

            // Inclure le token CSRF dans le formulaire
            $csrf_token = $_SESSION['csrf_token'];
        ?>
        <form id="signup-form" action="forms/signup.php" method="POST">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required>
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        
            <label for="confirm-password">Confirmer le mot de passe:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <!-- Ajout du token CSRF dans un champ caché -->
            <input type="hidden" name="csrf_token" value="<?=$csrf_token; ?>">
        
            <input type="submit" value="S'inscrire">
        </form>        
        
        <script src="assets/script.js" async defer></script>
    </body>
</html>
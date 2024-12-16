<?php
session_start();
session_unset();
session_destroy();
header('Location: ../loginPage.php'); // Rediriger vers la page de connexion
exit();
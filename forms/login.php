<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier la réponse reCAPTCHA
    $recaptcha_response = $_POST['g-recaptcha-response'];
    
    if (empty($recaptcha_response)) {
        echo "Veuillez vérifier que vous n'êtes pas un robot.";
        exit;
    }
    
    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'db_auth');

    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Récupérer l'utilisateur de la base de données
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Identifiants corrects, démarrage de la session
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
        header('Location: ../index.php');
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    $stmt->close();
    $conn->close();
}
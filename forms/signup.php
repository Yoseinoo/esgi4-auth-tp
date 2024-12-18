<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur CSRF. Veuillez réessayer.");
    }

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'db_auth');

    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    $username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
    $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insertion dans la base de données
    $stmt = $conn->prepare("INSERT INTO user (email, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $username, $password);
    $result = $stmt->execute();

    $stmt->close();
    $conn->close();
    // Après avoir validé et utilisé le token, vous pouvez le supprimer
    unset($_SESSION['csrf_token']);

    if ($result) {
        header('Location: ../index.php');
        exit();
    } else {
        echo 'échec de l\'inscription';
    }
}
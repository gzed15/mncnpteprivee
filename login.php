<?php
session_start();

$host = 'mysql.justhost.ru';
$dbname = 's968162_accessgci';
$user = 's968162_accessgci';
$password = 'CXv5UH3cSsVnQJ3QB8cF';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Erreur de connexion à la base de données : " . $e->getMessage());
    die("Erreur de connexion à la base de données.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiant = $_POST['identifiant'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT id, identifiant, mot_de_passe FROM utilisateurs WHERE identifiant = :identifiant";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':identifiant' => $identifiant]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['identifiant'] = $user['identifiant'];
        header("Location: connexion.php");
        exit();
    } else {
        echo "<script>
            alert('Identifiant ou mot de passe incorrect.');
            window.location.href="index.html";
        </script>";
        exit();
    }
}
?>
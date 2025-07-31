<?php
// ⚠️ This is a phishing simulation for educational awareness only.
$sessionId = $_GET['session'] ?? '';
$clientIp = $_GET['ip'] ?? '';
if (empty($sessionId) || empty($clientIp)) die("Paramètres manquants");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Chargement...</title>
    <style>body{margin:0;padding:20px;font-family:Segoe UI;background:#f0f2f5;text-align:center}.spinner{border:4px solid #ddd;border-top:4px solid #3498db;border-radius:50%;width:40px;height:40px;animation:spin 2s linear infinite}@keyframes spin{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}</style>
</head>
<body>
    <h2>⏳ Chargement en cours...</h2>
    <div class="spinner"></div>
    <p>Veuillez patienter.</p>
</body>
</html>

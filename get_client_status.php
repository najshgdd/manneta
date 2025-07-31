<?php
// ⚠️ This is a phishing simulation for educational awareness only.
$sessionId = $_GET['session'] ?? '';
$clientIp = $_GET['ip'] ?? '';
if (empty($sessionId) || empty($clientIp)) {
    echo json_encode(['error' => 'Missing params']);
    exit;
}
$trackingFile = "tracking/$sessionId.json";
$page = 'Inconnue';
if (file_exists($trackingFile)) {
    $data = json_decode(file_get_contents($trackingFile), true);
    $page = $data['page'] ?? 'Inconnue';
}
echo json_encode(['page' => $page]);

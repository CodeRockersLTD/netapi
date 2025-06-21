<?php

$apiUrl = 'https://netapi.com/api2/';
$token = 'YOUR_API_KEY';

$params = [
    'method' => 'compromised',
    'dataset_type' => 'url'   // 'ip', 'url', 'ip-all', or 'url-all'    
];

$url = $apiUrl . '?' . http_build_query($params);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    $lines = explode("\n", $response);

    // Optional: parse CSV header
    $header = str_getcsv(array_shift($lines));
    echo "<strong>Header:</strong> " . implode(', ', $header) . "<br><br>";

    // Print first 10 rows
    foreach (array_slice($lines, 0, 10) as $line) {
        $columns = str_getcsv($line);
        echo implode(' | ', $columns) . "<br>";
    }
} else {
    echo "Error: HTTP $httpCode";
}

?>

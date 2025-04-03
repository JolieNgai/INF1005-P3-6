<?php
// NewsAPI Endpoint and API Key (Replace with your actual API key)
//$apiKey = "";

$envFile = dirname($_SERVER['DOCUMENT_ROOT']) . '/.env';

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // Skip comments
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
    }
}

$apiKey = getenv('NEWS_API_KEY');

$apiBaseURL = "https://newsapi.org/v2/everything?q=";

// Keyword variables
$sustainableLivingKeywords = '"sustainable agriculture" OR "local farming"';
$zeroWasteKeywords = '"food waste" OR "zero waste food"';
$foodRescueKeywords = '"food bank" OR "food recovery"';
$hungerAwarenessKeywords = '"food shortage" OR "food insecurity" OR "global hunger"';

// Categories
$categoryMap = [
    "All" => "$sustainableLivingKeywords OR $zeroWasteKeywords OR $foodRescueKeywords OR $hungerAwarenessKeywords",
    "Sustainable Living" => $sustainableLivingKeywords,
    "Zero Waste" => $zeroWasteKeywords,
    "Food Rescue" => $foodRescueKeywords,
    "Hunger Awareness" => $hungerAwarenessKeywords,
];
?>
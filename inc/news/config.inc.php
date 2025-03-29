<?php
// NewsAPI Endpoint and API Key (Replace with your actual API key)
$apiKey = "6d268065fd9648d5b6978af5891eb0c9";
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
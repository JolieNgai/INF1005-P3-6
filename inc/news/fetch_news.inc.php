<?php
// Function to fetch news via cURL
function fetchNews($category, $sortBy = 'publishedAt')
{
    global $apiKey, $apiBaseURL, $categoryMap;
    $query = isset($categoryMap[$category]) ? $categoryMap[$category] : $categoryMap["All"];
    $apiURL = "{$apiBaseURL}" . urlencode($query) . "&sortBy=$sortBy&language=en&pageSize=100&apiKey={$apiKey}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    // Add the required User-Agent header
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "User-Agent: MyNewsApp/1.0 (https://mywebsite.com)"  
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return ["error" => "cURL Error: " . curl_error($ch)];
    }

    curl_close($ch);
    $data = json_decode($response, true);

    if (isset($data['articles']) && is_array($data['articles'])) {
        return $data['articles'];
    }
    
    // If there's an error or unexpected response, return it
    return [
        'error' => $data['message'] ?? "No news found for {$category}.",
        'code' => $data['code'] ?? 'no_articles'
    ];
}
?>
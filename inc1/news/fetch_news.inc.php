<?php
// Function to fetch news via cURL
function fetchNews($category, $sortBy = 'publishedAt') {
    global $API_KEY, $BASE_URL, $categoryMap, $apiErrorMessage;

    $q = $categoryMap[$category] ?? "";
    $url = "$BASE_URL?q=$q&sortBy=$sortBy&apiKey=$API_KEY";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    echo "<script>console.log(" . json_encode($data) . ");</script>";

    echo json_encode($data);


    // If any API error occurs
    if (isset($data['status']) && $data['status'] === 'error') {
        $apiErrorMessage = $data['message'] ?? "An unknown API error occurred.";
        return [];
    }

    return $data["articles"] ?? [];
}

?>
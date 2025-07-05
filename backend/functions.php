<?php

// Get website url...
function getSiteUrl() {
    // Get the protocol (HTTP/HTTPS)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
    // Get the host/domain
    $host = $_SERVER['HTTP_HOST'];
    // Get the base path
    $path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    // Construct the base URL
    $baseUrl = $protocol . $host . $path;
    // Remove trailing slashes
    $baseUrl = rtrim($baseUrl, '/');
    // Explode the URL by slashes
    $segments = explode('/', $baseUrl);
    // Remove the last segment
    array_pop($segments);
    // Recreate the URL without the last segment
    $siteURL = implode('/', $segments);

    return $siteURL;
}

// If nothing uploaded, update the url to default image...
function checkDefaultImage($inputText) {
    $searchString = 'placeholder-image-dark.jpg';
    $replacementString = '/img/icons/default-image-dark.jpg';

    // Check if the input text includes the specified string
    if (strpos($inputText, $searchString) !== false) {
        // If found, return the replacement string
        return $replacementString;
    }

    // If not found, return the input text as it is
    return $inputText;
}

?>
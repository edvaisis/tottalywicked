<?php
$url = 'https://rickandmortyapi.com/api/character/1'; // Replace with the desired endpoint URL

$response = file_get_contents($url);

if ($response === false) {
    // Handle error
    die('Error fetching data from the API.');
}

$data = json_decode($response, true);

if ($data === null) {
    // Handle error
    die('Error decoding API response.');
}

// Now you can access the data
echo $data['name'];

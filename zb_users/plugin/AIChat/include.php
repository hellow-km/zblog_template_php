<?php

$api_key = "你的APIKey";
$url = "https://api.deepseek.com/v1/chat/completions";

$data = [
    "model" => "deepseek-chat",
    "messages" => [
        ["role" => "user", "content" => "你好，帮我写一首诗。"]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $api_key"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

echo $response;
<?php
header("Content-Type: application/json; charset=utf-8");

function AI_Chat($msg){
    $url = "https://api.siliconflow.cn/v1/chat/completions";
    $api_key = "sk-isirpewzrwokmjzhsechkzfpzdfzuibxkjoagyxecugwbaru";

    $data = [
        "model" => "deepseek-ai/DeepSeek-R1-0528-Qwen3-8B",
        "messages" => [
            ["role" => "user", "content" => $msg]
        ]
    ];

    $options = [
        "http" => [
            "method"  => "POST",
            "header"  => "Content-Type: application/json\r\nAuthorization: Bearer $api_key\r\n",
            "content" => json_encode($data),
            "ignore_errors" => true
        ]
    ];

    $context  = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

function outputText($text){
    $chatRes = AI_Chat($text);

    if (!$chatRes) {
        return "请求失败：无法连接 API";
    }

    $chatData = json_decode($chatRes, true);

    return $chatData['choices'][0]['message']['content'] ?? "AI未返回内容";
}

$msg = $_POST['msg'] ?? '';

$reply = outputText($msg);

// ✅ 关键：返回 JSON 给前端
echo json_encode([
    "reply" => $reply
], JSON_UNESCAPED_UNICODE);
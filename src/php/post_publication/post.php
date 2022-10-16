<?php
require_once '../data.php';
require_once '../pdo.php';

if (!empty($_POST['publication-content'])) {
    $userId;
    $content = $_POST['publication-content'];
    $query = $pdo->prepare(query: "INSERT INTO `publication` (userId, content, creation_date) VALUES (:userId, :content, CURRENT_TIMESTAMP)");
    $query->execute([
        ":userId" => $user_id,
        ":content" => $content,
    ]);
}

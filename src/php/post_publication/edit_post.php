<?php
require_once '../pdo.php';
$req = $pdo->prepare(query: "UPDATE `publication` SET `content` = :content WHERE `publi_id` = :publi_id");
$req->execute(array(
    ":content" => $_POST['content'],
    ":publi_id" => $_POST['edit'],
));
header(header: "Location: /pages/home.php");

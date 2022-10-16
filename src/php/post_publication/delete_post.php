<?php
require_once '../pdo.php';
$req = $pdo->prepare(query: "DELETE FROM `publication` WHERE `publi_id` = :publi_id");
$req->execute(array(
    ":publi_id" => $_POST['delete'],
));
header(header: 'Location: /pages/home.php');

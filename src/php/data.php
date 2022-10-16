<?php
session_start();
require_once 'pdo.php';
$req = $pdo->prepare(query:'SELECT * FROM user WHERE user_id = :id');
$req->execute(array(':id' => $_SESSION['user']));
$data = $req->fetch();

$user_id = $data['user_id'];
$username = ucfirst($data['username']);
$password = ucfirst($data['password']);
$admin = $data['admin'];

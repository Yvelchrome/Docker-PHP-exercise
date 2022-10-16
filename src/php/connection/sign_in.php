<?php
session_start();
require_once '../pdo.php';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $username = strtolower($username);

    $check = $pdo->prepare(query: 'SELECT username, password, user_id FROM user WHERE username = :username');
    $check->execute(array(':username' => $username));
    $data = $check->fetch();
    $row = $check->rowCount();

    if (!$row) {
        header(header: 'Location: /index.php?login_err=user_not_found');
        die();
    }
    if ($row > 0) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['user'] = $data['user_id'];
            header(header: 'Location: /pages/home.php');
        } else {
            header(header:  "Location: /index.php?login_err=incorrect_password");
        }
    } else {
        header(header: 'Location: /index.php?login_err=user_already_exists');
    }
} else {
    header(header: 'Location: /index.php?login_err=fields_empty');
}
die();

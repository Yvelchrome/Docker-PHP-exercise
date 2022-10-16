<?php
require_once '../pdo.php';

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    if (isset($_POST['admin'])) {
        $admin = 1;
    } else {
        $admin = 0;
    }

    $username = strtolower($username);

    $check = $pdo->prepare(query: 'SELECT username, user_id FROM user WHERE username = :username');
    $check->execute(array(':username' => $username));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 0) {
        $cost = ['cost' => 12];
        $password = password_hash($password, algo: PASSWORD_BCRYPT, options: $cost);

        $insert = $pdo->prepare(query: "INSERT INTO user (username, password, admin) VALUES (:username, :password, :admin)");
        $insert->execute(array(
            ':username' => $username,
            ':password' => $password,
            ':admin' => $admin
        ));
        header(header: 'location: /index.php');
    } else {
        header(header: 'Location: /index.php?reg_err=user_already_exists');
    }
} else {
    header(header: 'Location: /index.php?reg_err=fields_empty');
}
die();

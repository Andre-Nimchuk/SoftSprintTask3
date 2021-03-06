<?php
    require 'reg/connectBD.php';
    $edid = $_POST['id'];
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $lastName = trim(filter_var($_POST['lastName'], FILTER_SANITIZE_STRING));
    $role = trim(filter_var($_POST['role'], FILTER_SANITIZE_STRING));
    $state = trim(filter_var($_POST['state'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($username) <= 2) 
        $error = 'Введіть імя';
    else if (strlen($lastName) <= 2)
        $error = 'Введіть прізвище';
    else if (strlen($role) <= 2)
        $error = 'Введіть роль';

    if($error != '') {
        echo $error;
        exit();
    }

    require 'connectBD.php';

    $sql = "UPDATE `usersform` SET `name` = '$username', `last` = '$lastName', `role` = '$role', `state` = '$state' WHERE `usersform`.`id` = $edid"; 
    $query = $pdo->prepare($sql);
    $query->execute([$username, $lastName, $role, $state]);

    echo 'Готово';
?>
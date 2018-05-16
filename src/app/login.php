<?php

require_once 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select * from users";
$result = $connection->query($sql);
while($row = $result->fetch_assoc()){
    if($email == $row['email'] && password_verify($password, $row['password'])){
        $_SESSION['loggedIn'] = true;
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        header('Location: /dashboard');
        die();
    }
}
$_SESSION['loginError'] = true;
header('Location: '.__DIR__.'/../../../login');
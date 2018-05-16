<?php
require_once 'src/app/connection.php';
require_once 'src/vendor/Router/src/Bramus/Router/Router.php';

$routePrefixes = [
    'loginRoute',
    'configure-emails',
];
// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->post('/loginRoute', function() use($connection){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from users";
    $result = $connection->query($sql);
    while($row = $result->fetch_assoc()){
        if($email == $row['email'] && password_verify($password, $row['password'])){
            $_SESSION['loggedIn'] = true;
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            header('Location:'.__DIR__.'/../../../');
        }
    }
    $_SESSION['loginError'] = true;
    header('Location:'.__DIR__.'/../../../');
});

$router->post('/configure-emails', function() use($connection){
    $sender = $_POST['emailSender'];
    $senderPassword = $_POST['emailSenderPassword'];
    $reciever = $_POST['emailReciever'];

    $file = fopen('src/config/conf.env', 'w');
    $string = $sender . PHP_EOL;
    $string .= $senderPassword . PHP_EOL;
    $string .= $reciever . PHP_EOL;
    fwrite($file, $string);
    header('Location:'.__DIR__.'/../../../');
});

$router->get('/logout', function(){
    session_unset();
    session_destroy();
    header('Location:'.__DIR__.'/../../../');
});
// Run it!
$router->run();
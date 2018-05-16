<?php

declare(strict_types=1);

require_once __DIR__.'\..\..\vendor/PHPMailer/src/PHPMailer.php';
require_once __DIR__.'\..\..\vendor/PHPMailer/src/Exception.php';
require_once __DIR__.'\..\..\vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail{
    private $mail;
    private static $from = '';
    private static $password = '';
    private static $to = '';
    public function __construct(String $fromName = '', String $subject = '', String $body = ''){
        $this->getConfig();
        $this->mail = new PHPMailer(true);                     // Passing `true` enables exceptions
        try {
            $this->mail->isSMTP();                                      // Set mailer to use SMTP
            $this->mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $this->mail->Port = 587;                                    // TCP port to connect to
            $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $this->mail->Username = self::$from;                 // SMTP username
            $this->mail->Password = self::$password;             // SMTP password

            //Recipients
            $this->mail->setFrom(self::$from, $fromName);
            $this->mail->addAddress(self::$to, 'Account');     // Add a recipient

            //Content
            $this->mail->isHTML(true);                         // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
        }
    }

    public static function getSender() : string {
        return self::$from;
    }
    public static function getSenderPw() : string {
        return self::$password;
    }
    public static function getReciever() : string {
        return self::$to;
    }

    public function send() : bool{
        try{
            $this->mail->send();
            return true;
        }catch(\Exception $e){
            return false;
        }
    }

    public static function getConfig(){
        $configFile = fopen(__DIR__.'\..\..\config\conf.env','r');
        if($configFile){
            $counter = 0;
            while(($line = fgets($configFile)) !== false){
                switch($counter){
                    case 0:
                        self::$from = $line;
                        break;
                    case 1:
                        self::$password = $line;
                        break;
                    case 2:
                        self::$to = $line;
                        break;
                }
                if($counter > 2){
                    return;
                }
                $counter++;
            }
        }
    }
}
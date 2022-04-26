<?php
require_once './vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('newbeginningtorockon@gmail.com')
    ->setPassword('hlo2world@');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail1($email,$name,$message,$subject)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Thank you for signing up on our site. Please click on the link below to verify your account:.</p>
        <a href="http://localhost/verify-user/verify_email.php">Verify Email!</a>

          
      </div>
    </body>

    </html>';

    // Create a message
    $message1 = (new Swift_Message($message))
        ->setFrom('newbeginningtorockon@gmail.com')
        ->setTo($email)
        ->setBody($message, 'text/html')
        ->setSubject($subject,'text/html');
    
    

    // Send the message
    $result = $mailer->send($message1);

    if ($result > 0) {
        header("Location:query.php");
    } else {
        return false;
    }
}

function sendVerificationEmail2($email,$name,$message,$subject)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Thank you for signing up on our site. Please click on the link below to verify your account:.</p>
        <a href="https://localhost/project_iwt/query.php">Go to Query Page</a>

          
      </div>
    </body>

    </html>';

    // Create a message
    $message1 = (new Swift_Message($message))
        ->setFrom('newbeginningtorockon@gmail.com')
        ->setTo('newbeginningtorockon@gmail.com')
        ->setBody($message, 'text/html')
        ->setSubject($subject,'text/html');

    // Send the message
    $result = $mailer->send($message1);

    if ($result > 0) {
        header("Location:usersideindex.php");
    } else {
        return false;
    }
}
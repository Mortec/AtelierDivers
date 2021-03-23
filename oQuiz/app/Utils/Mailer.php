<?php

namespace App\Utils;
use \App\Utils\UserSession;


abstract class Mailer {


    public static function mailscore( $scorehtml ){

        $to = UserSession::getUser()->email;
        $subject = 'Votre Score';
        $from = 'oquiz@oquiz.org';
        
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        
        // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        // Compose a simple HTML email message
        $message = $scorehtml;
        
        // Sending email
        if(mail($to, $subject, $message, $headers)){
            // echo 'Your mail has been sent successfully.';
        } else{
        //  echo 'Unable to send email. Please try again.';
        }

    }
}


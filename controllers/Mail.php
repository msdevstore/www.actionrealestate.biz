<?php

    if(isset($_POST['link'])){
        $to = $_POST['to']; // this is your Email address
        $subject = $_POST['subject'];
        $message ='<!DOCTYPE html>
                                <html>
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                </head>
                                <body>

                                <div>
                                        <p>'.$_POST['message'].'</p>
                                        <p>Please click the following link to open a document "<a href ="'.$_POST['link'].'">'.$_POST['file'].'</a>"</p>
                                </div>
                                </body>
                                </html>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        if(mail($to, $subject, $message, $headers)) echo 1;
        else echo 0;
    }

?>
<?php

/**
 * Created by PhpStorm.
 * User: lukekramer
 * Date: 18/10/2016
 * Time: 23:20
 */
require_once 'swiftmailer/lib/swift_required.php';

class MailSetup
{

    /**
     * MailSetup constructor.
     */
    public function __construct()
    {
    }

    public function mail($username,$subject,$to,$body)
    {
        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('textbookbs@gmail.com')
            ->setPassword('textbookbsAdmin');

        $mailer = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance($subject)
            ->setFrom(array('textbookbs@gmail.com' => $username))
            ->setTo(array($to))
            ->setBody($body);

        $mailer->send($message);

    }


}
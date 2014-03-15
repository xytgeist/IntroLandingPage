<?php
require 'Mandrill.php';

$mandrill = new Mandrill();

$message = array(
    'subject' => 'Test message',
    'from_email' => 'jody@introapp.net',
    'html' => '<p>this is a test message with Mandrill\'s PHP wrapper!.</p>',
    'to' => array(array('email' => 'jody@introapp.net', 'name' => 'Jody')),
    'merge_vars' => array(array(
        'rcpt' => 'jody@introapp.net',
        'vars' =>
        array(
            array(
                'name' => 'FIRSTNAME',
                'content' => 'Jody'),
            array(
                'name' => 'LASTNAME',
                'content' => 'Ford')
    ))));

$template_name = 'Stationary';

$template_content = array(
    array(
        'name' => 'main',
        'content' => 'Hi *|FIRSTNAME|* *|LASTNAME|*, thanks for signing up.'),
    array(
        'name' => 'footer',
        'content' => 'Copyright 2012.')

);

print_r($mandrill->messages->sendTemplate($template_name, $template_content, $message));

?>
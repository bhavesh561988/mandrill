<?php
require 'Mandrill.php';

try {
    $mandrill = new Mandrill('API-KEY');
    $message = array(
        'html' => '<p>Example HTML content</p>',
        'text' => 'Example text content',
        'subject' => 'example subject',
        'from_email' => 'from@gmail.com',
        'from_name' => 'From Name',
        'to' => array(
            array(
                'email' => 'To@gmail.com',
                'name' => 'To Name',
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => 'reply@gmail.com')
    );
    $async = false;
    $result = $mandrill->messages->send($message, $async);
    print_r($result);
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
?>


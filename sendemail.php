<?php
require 'Mandrill.php';

try {
    $mandrill = new Mandrill('HG3g83OBxAJZbaP-MYMHlQ');
    $message = array(
        'html' => '<p>Example HTML content</p>',
        'text' => 'Example text content',
        'subject' => 'example subject',
        'from_email' => 'jaladhi.trivedi@indianic.com',
        'from_name' => 'Jaladhi Trivedi',
        'to' => array(
            array(
                'email' => 'inquiry@citiflite.com',
                'name' => 'Inquiry',
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => 'inquiry@citiflite.com')
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


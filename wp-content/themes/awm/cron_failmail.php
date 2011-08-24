<?php

$data = file_get_contents('fail-mail.txt');
if (strlen($data) > 0) {
    $contact_headers = "From: AwesomeMath <paul@craciunoiu.net>\r\nBCC: mariuscraciunoiu@gmail.com\r\n";
        mail('paulcraciunoiu@gmail.com', 'AwesomeMath Contact Alert'
            , "Failed to send email(s). Details follow,

$data
", $contact_headers);

    // clean up the file
    file_put_contents('fail-mail.txt', '');
}

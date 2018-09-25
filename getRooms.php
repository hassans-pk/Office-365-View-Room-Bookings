<?php


// Enter O365 User Name and Password that has delegate access to all the rooms.
//$username =  '_____@______.onmicrosoft.com';
//$password =     '____';


$URL = 'https://outlook.office365.com/api/v1.0/users/' . $_GET["roomEmailAddress"] . '/calendarview?startDateTime=' . $_GET["sdt"] . '&endDateTime=' . $_GET["edt"];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if( ! $result = curl_exec($ch))
    {
        trigger_error(curl_error($ch));
    }
    curl_close($ch);
    
print_r($result);

?>

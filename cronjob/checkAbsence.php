<?php

$url = 'https://hader.today/api'; ;
//echo $url;
// Initialize a CURL session.
$ch = curl_init();

// Return Page contents.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_URL, $url."/employee/absenceNotification");

$result = curl_exec($ch);
echo $result.PHP_EOL;

echo "CronJobs Are Done";

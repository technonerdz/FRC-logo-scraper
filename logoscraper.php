<?php

$iftttmakername = ''; // The name of your event on the IFTTT maker channel
$iftttmakerkey = ''; // Your IFTTT private API key



for ($c = 0; $c <= 6743; $c++){
  $nbteam = $c;

$json_string = file_get_contents("http://www.thebluealliance.com/api/v2/team/frc{$nbteam}?X-TBA-App-Id=frcbot:teamlogoscraper:1");
$parsed_json = json_decode($json_string);
$websiteurl = $parsed_json->{'website'};

if (($websiteurl == 'http://www.firstinspires.org/') || ($websiteurl == '')) { // Check if the team have a website

}else{

$sentdata = [ 'value1' => $nbteam, 'value2' => $websiteurl ];

 $ch = curl_init("https://maker.ifttt.com/trigger/saveteamlogo/with/key/{$iftttmakerkey}");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sentdata));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_exec($ch);
curl_close($ch);

usleep(600000);
}
}
 ?>

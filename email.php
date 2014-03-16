<?php
$uri = 'https://mandrillapp.com/api/1.0/messages/send.json';

$name = $_POST['n'];
$emailAddress = $_POST['e'];
$message = $_POST['m'];

$postString = '{
"key": "8JCaxDxa5Ec7ZecZEbECsg",
"message": {
    "html": "'. $message .'",
    "text": "' . $message . '",
    "subject": "Message from an !ntro User",
    "from_email": "'. $emailAddress .'",
    "from_name": "' . $name . '",
    "to": [
        {
            "email": "ryan@introapp.net",
            "name": "Ryan Franklin"
        }
    ],
    "headers": {

    },
    "track_opens": true,
    "track_clicks": true,
    "auto_text": true,
    "url_strip_qs": true,
    "preserve_recipients": true,

    "merge": true,
    "global_merge_vars": [

    ],
    "merge_vars": [

    ],
    "tags": [

    ],
    "google_analytics_domains": [

    ],
    "google_analytics_campaign": "...",
    "metadata": [

    ],
    "recipient_metadata": [

    ],
    "attachments": [

    ]
},
"async": false
}';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uri);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

$result = curl_exec($ch);
//echo $postString;
echo $result;
?>

<?php
include "admin_tools.php";

?>
<?php
//require_once '/roomres/mandrill-api-php/src/Mandrill.php'; //Not required with Composer
//$mandrill = new Mandrill('tndQNQe5dKZqXdL0txTtFA');

$uri = 'https://mandrillapp.com/api/1.0/messages/send.json';
$html = "<html><head><style></style></head><body><div style='width:100%; min-height:200px; border-radius:10px; background:#F00;'>This is my div</div></body></html>";
$html = json_encode($html);
$postString = '{
"key": "tndQNQe5dKZqXdL0txTtFA",
"message": {
    "html": '.$html.',
    "text": "this is the emails text content",
    "subject": "MY HTML EMAIL",
    "from_email": "ianmin2@live.com",
    "from_name": "Ian Innocent",
    "to": [
        {
            "email": "ianmin2@live.com",
            "name": "Room Reservation"
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

echo $result;
?>
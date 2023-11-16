<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAA_D_LSS0:APA91bHPG1BHA8eKDhgAzdN1ohq2YpoJR32y_AWX6NTEzPbQTxnpWGC8yhAQKLtLox668MBm9RKYn3ZyKUkgO00HfrLENZtgWbUcT5EwfqrT1_AiOc8nQNz30YY2TrWYl0EWKPAgcuDL'),
        'sender_id' => env('FCM_SENDER_ID', '1083402045741'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'server_topic_url' => 'https://iid.googleapis.com/iid/v1/',
        'timeout' => 30.0, // in second
    ],
];

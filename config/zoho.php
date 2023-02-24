<?php

return [
    'refresh_token' => env('ZOHO_REFRESH_TOKEN'),

    'client_id' => env('ZOHO_CLIENT_ID'),

    'client_secret' => env('ZOHO_CLIENT_SECRET'),

    'redirect_uri' => env('ZOHO_REDIRECT_URI'),

    'grant_type' => env('ZOHO_GRANT_TYPE'),

    'api_url' => env('ZOHO_API_URL', 'https://www.zohoapis.com/inventory'),

    'organization_id' => env('ZOHO_ORGANIZATION_ID'),
];

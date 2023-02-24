<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Zoho
{
    /**
     * Get API access token
     */
    public static function getAccessToken()
    {
        $response = Http::asForm()->post('https://accounts.zoho.com/oauth/v2/token', [
            'refresh_token' => config('zoho.refresh_token'),
            'client_id' => config('zoho.client_id'),
            'client_secret' => config('zoho.client_secret'),
            'redirect_uri' => config('zoho.redirect_uri'),
            'grant_type' => config('zoho.grant_type'),
        ]);

        return $response->object()->access_token;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function edit()
    {
        $zohoSetting = [
            'refreshToken' => config('zoho.refresh_token'),
            'clientId' => config('zoho.client_id'),
            'clientSecret' => config('zoho.client_secret'),
            'redirectUri' => config('zoho.redirect_uri'),
            'grantType' => config('zoho.grant_type'),
            'ApiUrl' => config('zoho.api_url'),
            'organizationId' => config('zoho.organization_id'),
        ];

        return Inertia::render('Setting/Edit', [
            'zohoSetting' => $zohoSetting,
        ]);
    }

    /**
     * Handle the incoming request.
     */
    public function update(Request $request)
    {
        $attributes = $request->validate([
            'ZOHO_REFRESH_TOKEN' => 'required|string',
            'ZOHO_CLIENT_ID' => 'required|string',
            'ZOHO_CLIENT_SECRET' => 'required|string',
            'ZOHO_REDIRECT_URI' => 'required|url',
            'ZOHO_GRANT_TYPE' => 'required|string',
            'ZOHO_API_URL' => 'required|url',
            'ZOHO_ORGANIZATION_ID' => 'required|numeric',
        ]);

        if (file_exists(app()->environmentFilePath())) {
            foreach ($attributes as $key => $value) {
                file_put_contents(
                    app()->environmentFilePath(),
                    str_replace(
                        $key.'='.env($key),
                        $key.'="'.$value.'"',
                        file_get_contents(app()->environmentFilePath())
                    )
                );
            }
        }

        Artisan::call('cache:clear');
        Artisan::call('config:clear');

        return Redirect::route('setting.edit');
    }
}

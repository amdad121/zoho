<?php

namespace App\Http\Controllers;

use App\Services\Zoho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // https://www.zohoapis.com/inventory/v1/salesorders?organization_id=803885919

        $data = Cache::remember('zoho.salesorders', 3600, function () {
            $accessToken = Zoho::getAccessToken();

            $response = Http::asForm()->withToken($accessToken)->get(config('zoho.api_url').'/v1/salesorders', [
                'organization_id' => config('zoho.organization_id'),
            ]);

            return $response->object();
        });

        // if ($response->failed()) {
        //     return $response->throw();
        // }

        return Inertia::render('Dashboard', [
            'salesOrders' => $data,
        ]);
    }
}

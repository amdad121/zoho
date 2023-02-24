<?php

namespace App\Http\Controllers;

use App\Services\Zoho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        // https://www.zohoapis.com/inventory/v1/salesorders?organization_id=803885919

        $data = Cache::remember('zoho.contacts', 3600, function () {
            $accessToken = Zoho::getAccessToken();

            $response = Http::asForm()->withToken($accessToken)->get(config('zoho.api_url').'/v1/contacts', [
                'organization_id' => config('zoho.organization_id'),
            ]);

            return $response->object();
        });

        // if ($response->failed()) {
        //     return $response->throw();
        // }

        return Inertia::render('Customers/Index', [
            'contacts' => $data,
        ]);
    }

    public function create()
    {
        return Inertia::render('Customers/Create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'contact_name' => 'required|string',
            'company_name' => 'nullable|string',
            'payment_terms' => 'nullable|numeric',
            'currency_id' => 'nullable|numeric',
            'website' => 'nullable|url',
            'contact_type' => 'nullable|string',
            'salutation' => 'nullable|string',
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'mobile' => 'nullable|string',
            'is_primary_contact' => 'nullable|boolean',
            'language_code' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $accessToken = Zoho::getAccessToken();

        $response = Http::withToken($accessToken)->post(config('zoho.api_url').'/v1/contacts', [
            'organization_id' => config('zoho.organization_id'),
            'contact_name' => $attributes['contact_name'],
            'company_name' => $attributes['company_name'],
            'payment_terms' => $attributes['payment_terms'],
            'currency_id' => $attributes['currency_id'],
            'website' => $attributes['website'],
            'contact_type' => $attributes['contact_type'],
            'contact_persons.salutation' => $attributes['salutation'],
            'contact_persons.first_name' => $attributes['first_name'],
            'contact_persons.last_name' => $attributes['last_name'],
            'contact_persons.email' => $attributes['email'],
            'contact_persons.phone' => $attributes['phone'],
            'contact_persons.mobile' => $attributes['mobile'],
            'contact_persons.is_primary_contact' => $attributes['is_primary_contact'],
            'language_code' => $attributes['language_code'],
            'notes' => $attributes['notes'],
        ]);

        Cache::forget('zoho.contacts');

        if ($response->successful()) {
            return Redirect::route('customers.index');
        } else {
            return back();
        }
    }
}

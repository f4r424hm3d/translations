<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RedirectBasedOnGeolocation
{
  public function handle($request, Closure $next)
  {
    // Get the user's IP address
    $ip = $request->ip();

    // Fetch geolocation data from ipstack
    try {
      $apiKey = env('IPSTACK_API_KEY');
      $response = Http::get("http://api.ipstack.com/{$ip}?access_key={$apiKey}");
      $locationData = $response->json();
    } catch (\Exception $e) {
      // Fallback to default if the API request fails
      $locationData = ['country_code' => 'EN'];
    }

    $countryCode = $locationData['country_code'] ?? 'EN';
    $languageCode = strtolower($countryCode);

    // Get the current path
    $currentPath = $request->getRequestUri();

    // Redirect only if the user is on the main URL and the language does not match
    if ($currentPath === '/' && $languageCode !== 'en') {
      return redirect('/' . $languageCode);
    }

    return $next($request);
  }
}

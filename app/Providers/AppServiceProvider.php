<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    // Get the first segment from the URL
    $language = Request::segment(1);

    if ($language) {
      // Check if the language exists in the languages table
      $languageExists = DB::table('languages')->where('code', $language)->exists();

      if ($languageExists) {
        // Set the application locale to the language code
        App::setLocale($language);
      } else {
        // If the language code does not exist in the table, set the default locale (e.g., 'en')
        App::setLocale('en');
      }
    } else {
      // Set the default language if no language segment is present
      App::setLocale('en');
    }
  }
}

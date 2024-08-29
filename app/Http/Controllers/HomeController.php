<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
  public function openHomepage(Request $request)
  {
    // Get the current locale
    $languageCode = App::getLocale();

    // Find the language record based on the current locale
    $language = Language::where('code', $languageCode)->first();

    // Get the language ID or null if the language is not found
    $languageId = $language ? $language->id : null;

    // Retrieve the item (assumed to be with ID 1)
    $item = Item::find(1);

    // Find the translation for the item based on the current language ID
    $translation = $item ? $item->translations->where('language_id', $languageId)->first() : null;

    // Get all available languages
    $languages = Language::all();

    // If the item is not found, return a 404 error
    if (! $item) {
      abort(404);
    }

    // Return the view with the translation and languages data
    return view('welcome', compact('translation', 'languages', 'languageCode'));
  }
  public function aboutUs(Request $request)
  {
    // Get the current locale
    $languageCode = App::getLocale();

    // Find the language record based on the current locale
    $language = Language::where('code', $languageCode)->first();

    // Get the language ID or null if the language is not found
    $languageId = $language ? $language->id : null;

    // Retrieve the item (assumed to be with ID 1)
    $item = Item::find(1);

    // Find the translation for the item based on the current language ID
    $translation = $item ? $item->translations->where('language_id', $languageId)->first() : null;

    // Get all available languages
    $languages = Language::all();

    // If the item is not found, return a 404 error
    if (! $item) {
      abort(404);
    }

    // Return the view with the translation and languages data
    return view('welcome', compact('translation', 'languages', 'languageCode'));
  }
}

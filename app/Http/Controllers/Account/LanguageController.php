<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request, $locale)
    {
        //TODO: fix language change
        // if (in_array($locale, config('app.locales'))) {
        //     session(['locales' => $locale]);
        // }

        // return redirect()->back();
    }
}
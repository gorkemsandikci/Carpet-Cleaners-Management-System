<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        if (in_array($locale, ['tr', 'en'])) {
            // Store locale in session
            Session::put('locale', $locale);
            
            // Set locale immediately for this request
            App::setLocale($locale);
            
            // Also set it in the config for this request
            config(['app.locale' => $locale]);
        }
        
        // Get the previous URL or default to home
        $previousUrl = url()->previous();
        if (!$previousUrl || $previousUrl === url()->current()) {
            $previousUrl = route('index');
        }
        
        return redirect($previousUrl);
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function ar()
    {
        Session::put('lang', 'ar');
        app()->setlocale(Session::get('lang'));
        return back();
    }
    public function en()
    {
        Session::put('lang', 'en');
        app()->setlocale(Session::get('lang'));
        return back();
    }
}

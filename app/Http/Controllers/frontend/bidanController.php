<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\model\checkup;
use Illuminate\Http\Request;

class bidanController extends Controller
{
    // Index Landing Page
    public function index ()
    {
        return view('frontend.content.home');
    }

    // Page Data Imunisasi
    public function dataImunisasi ()
    {
        $checkUp = checkup::all();
        return view('frontend.content.data-imunisasi', compact('checkUp'));
    }
}

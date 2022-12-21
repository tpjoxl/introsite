<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = '';
        $custom_page_title = 'HAO CHEN | Personal Site';

        return view('frontend.home', compact('data', 'custom_page_title', 'prefix'));
    }
}

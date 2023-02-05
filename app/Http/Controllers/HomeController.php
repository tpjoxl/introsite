<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = '';
        $custom_page_title = 'HAO CHEN | Personal Site';
        $custom_page_description = '您好我是葦豪，是一名對程式富有熱情的後端工程師!';

        return view('frontend.home', compact('data', 'custom_page_title', 'custom_page_description', 'prefix'));
    }
}

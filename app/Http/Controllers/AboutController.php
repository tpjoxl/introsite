<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->prefix = 'about';
    }

    public function index()
    {
        $prefix = $this->prefix;
        $data = new Setting();
        $custom_page_title = '關於我 - HAO CHEN | Personal Site';
        $custom_page_description = '關於我的簡介與經歷';
        $custom_page_keyword = '';

        return view('frontend.' . $this->prefix . '.index', compact('data', 'custom_page_title', 'custom_page_description', 'custom_page_keyword', 'prefix'));
    }
}

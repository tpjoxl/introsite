<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->prefix = 'contact';
    }

    public function index()
    {
        $prefix = $this->prefix;
        $data = '';
        $custom_page_title = '與我聯絡 - HAO CHEN | Personal Site';
        $custom_page_description = '若有任何合作與疑問歡迎與我聯絡!';
        $custom_page_keyword = '';

        return view('frontend.' . $this->prefix . '.index', compact('data', 'custom_page_title', 'custom_page_description', 'custom_page_keyword', 'prefix'));
    }
}

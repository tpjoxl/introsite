<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkCaseCategory;
use App\Models\WorkCase;

class WorkCaseController extends Controller
{
    public function __construct()
    {
        $this->prefix = 'workcase';
    }

    public function index()
    {
        $prefix = $this->prefix;
        $items = WorkCase::with(['categories' => function ($q) {
            $q->display()->ordered();
        }])->display()->ordered()->get();
        $custom_page_title = '專案成就 - HAO CHEN | Personal Site';
        $custom_page_description = '過去任職為後端工程師完成的專案成就';
        $custom_page_keyword = '';

        return view('frontend.' . $this->prefix . '.index', compact('items', 'custom_page_title', 'custom_page_description', 'custom_page_keyword', 'prefix'));
    }
    public function detail($slug)
    {
        $prefix = $this->prefix;
        $data = WorkCase::with(['categories' => function ($q) {
            $q->display()->ordered();
        }])->where('title', $slug)->first();

        $custom_page_title = $slug . '- 專案成就 - HAO CHEN | Personal Site';
        $custom_page_description = $data->description;
        $custom_page_keyword = '';

        return view('frontend.' . $this->prefix . '.detail', compact('data', 'custom_page_title', 'custom_page_description', 'custom_page_keyword', 'prefix'));
    }
}

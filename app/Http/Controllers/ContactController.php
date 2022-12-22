<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use App\Traits\ReCaptchaTrait;

class ContactController extends Controller
{
    use ReCaptchaTrait;

    public function __construct(Contact $contact)
    {
        $this->prefix = 'contact';
        $this->model = $contact;
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

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'required',
        ], [], []);
        if ($validator->fails()) {
            // return dd($validator->getMessageBag());
            return back()->with('error', '送出失敗')->with('errorText', '請勾選驗證單位')->withErrors($validator)->withInput();
        }

        $recaptchaCheck = $this->ReCaptchaCheck();
        // dd($recaptchaCheck);
        if ($recaptchaCheck['status']) {
            // 儲存表單內容
            $dataSave = $request->except('g-recaptcha-response');
            $data = $this->model->make();
            $data->fill($dataSave);

            if ($data->save()) {
                return back()->with('success', '送出成功')->with('successText', '請留意信箱，我將盡快跟你聯絡');
            } else {
                return back()->with('error', '送出失敗')->withInput();
            }
        } else {
            return redirect()->back()->withInput()->withErrors($recaptchaCheck['errors']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // お問い合わせフォームを表示
    public function contact()
    {
        return view('index');
    }

    // 確認画面を表示
    public function confirm(ContactRequest $request)
    {
        $data = $request->validated();
        $request->session()->put('contact', $data);

        return view('confirm', compact('data'));
    }

    // お問い合わせ内容をDBに保存
    public function submit(Request $request)
    {
        $data = $request->session()->get('contact');

        $data['tell'] = $data['phone1'] . '-' . $data['phone2'] . '-' . $data['phone3'];

        Contact::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'tell' => $data['tell'],
            'address' => $data['address'],
            'building' => $data['building'] ?? null,
            'detail' => $data['inquiry_content'],
            'category_id' => $data['inquiry_type'],
        ]);

        $request->session()->forget('contact');

        return view('thanks');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function admin()
    {
        $contacts = Contact::all();
        return view('admin', compact('contacts'));
    }
}

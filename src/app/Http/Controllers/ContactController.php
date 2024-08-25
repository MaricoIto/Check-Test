<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    // お問い合わせフォームを表示
    public function index()
    {
        return view('index');
    }


    // 確認画面を表示
    public function confirm(ContactRequest $request)
    {
        $data = $request->validated();
        $data['building'] = $data['building'] ?? '';
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

    // ユーザー登録画面を表示
    public function register()
    {
        return view('register');
    }

    // ログイン画面を表示
    public function login()
    {
        return view('login');
    }

    // 管理者画面を表示
    public function admin(Request $request)
    {
        $contacts = Contact::query()
            ->when($request->input('keyword'), function ($query, $keyword) {
                return $query->where(function ($q) use ($keyword) {
                    $q->where('first_name', 'like', "%{$keyword}%")
                        ->orWhere('last_name', 'like', "%{$keyword}%")
                        ->orWhere('email', 'like', "%{$keyword}%");
                });
            })
            ->when($request->input('gender') && $request->input('gender') !== '全部', function ($query, $gender) {
                return $query->where('gender', $gender);
            })
            ->when($request->input('category_id'), function ($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->simplePaginate(7);

        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    // CSVエクスポート

    public function export(Request $request)
    {
        $contacts = Contact::query()
            ->keywordSearch($request->input('keyword'))
            ->categorySearch($request->input('category_id'))
            ->genderSearch($request->input('gender'))
            ->get();

        $filename = 'contacts_export_' . now()->format('Ymd_His') . '.csv';

        $handle = fopen('php://memory', 'r+');

        fputcsv($handle, ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類']);

        foreach ($contacts as $contact) {
            $row = [
                $contact->last_name . ' ' . $contact->first_name,
                $this->getGenderText($contact->gender),
                $contact->email,
                $contact->category ? $contact->category->content : '未設定'
            ];
            fputcsv($handle, $row);
        }

        rewind($handle);
        $csvOutput = stream_get_contents($handle);
        fclose($handle);

        return Response::make($csvOutput, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    private function getGenderText($gender)
    {
        switch ($gender) {
            case 1:
                return '男性';
            case 2:
                return '女性';
            case 3:
                return 'その他';
            default:
                return '未設定';
        }
    }
}

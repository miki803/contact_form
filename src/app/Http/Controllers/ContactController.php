<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact'); // contact.blade.php を表示
    }

     // サンクスページ
    public function thanks()
    {
        return view('thanks');
    }

    //お問い合わせフォームの入力画面
    public function contact()
    {
        return view('contact');
    }
    

    //お問い合わせフォームの確認画面
    public function confirm( ContactRequest $request)
    {
        $contact = $request->validated();
        
        return view('confirm', compact('contact') );
    }

    // お問い合わせフォーム送信処理
    public function store(Request $request)
    {
        $data = $request->only([
            'first_name', 'last_name', 'gender', 'email',
            'tel1', 'tel2', 'tel3', 'address', 'building',
            'category', 'message'
        ]);

        $genderMap = ['男性' => 0, '女性' => 1, 'その他' => 2];
        $data['gender'] = $genderMap[$data['gender']];

        Contact::create($data);

        return redirect()->route('thanks');
    }


    //ログインページ
    public function login()
    {
        return view('login');
    }
    

    public function loginSubmit(LoginRequest $request)
    {
        $data = $request->validated();

        return redirect()->route('admin');
    }

    //登録ページ
    public function showForm()
    {
        return view('register');
    }

    // 登録処理
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        // ユーザー登録処理
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login.show');
    }


    //管理画面
    public function admin(Request $request)
    {
        $query = Contact::query();

     // 検索条件
        if ($request->filled('keyword')) {
            $query->where(function($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->keyword}%")
                    ->orWhere('last_name', 'like', "%{$request->keyword}%")
                    ->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // ページネーション (7件ごと)
        $contacts = $query->paginate(7);

        return view('admin', compact('contacts'));
    }


}

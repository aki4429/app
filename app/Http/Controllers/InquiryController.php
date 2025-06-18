<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminInquiryNotification;
use App\Mail\UserThanksMail;
use Illuminate\Support\Facades\Http;

class InquiryController extends Controller
{
    public function submit(Request $request)
{
    $validated = $request->validate([
        'name'    => ['required', 'string', 'max:255'],
        'company' => ['nullable', 'string', 'max:255'],
        'phone'   => ['required', 'regex:/^[0-9\-]+$/'],
        'email'   => ['required', 'email'],
        'message' => ['required', 'string'],
         // 追加
        'g-recaptcha-response' => ['required', function ($attribute, $value, $fail) {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret'),
                'response' => $value,
            ]);

            if (!$response->json('success') || $response->json('score') < 0.5) {
                $fail('スパム判定されました。もう一度お試しください。');
            }
        }],
    ], [
        'name.required'    => 'お名前を入力してください。',
        'phone.required'   => '電話番号を入力してください。',
        'phone.regex'      => '電話番号は数字とハイフンのみで入力してください。',
        'email.required'   => 'メールアドレスを入力してください。',
        'email.email'      => '正しいメールアドレス形式で入力してください。',
        'message.required' => 'お問い合わせ内容を入力してください。',
    ]);

    $inquiry = Inquiry::create($validated);

    // 管理者に通知
    Mail::to('akiyoshi.oda@gmail.com')->send(new AdminInquiryNotification($inquiry));

    // ユーザーにサンクスメール
    Mail::to($inquiry->email)->send(new UserThanksMail($inquiry));

    return redirect()->back()->with('message', 'お問い合わせありがとうございます。');
}
}

?>
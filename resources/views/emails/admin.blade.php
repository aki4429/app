
@component('mail::message')
# 新しいお問い合わせを受信しました

- お名前: {{ $inquiry->name }}
- 会社名: {{ $inquiry->company ?? '（未記入）' }}
- 電話番号: {{ $inquiry->phone }}
- メールアドレス: {{ $inquiry->email }}

---

**お問い合わせ内容：**

{{ $inquiry->message }}

@endcomponent

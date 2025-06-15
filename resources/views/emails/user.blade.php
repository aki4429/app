
@component('mail::message')
{{ $inquiry->name }} 様

この度はお問い合わせいただき誠にありがとうございます。  
以下の内容でお問い合わせを受け付けました。

---

**お問い合わせ内容：**  
{{ $inquiry->message }}

---

担当者より順次ご連絡いたしますので、今しばらくお待ちください。

{{ config('app.name') }}
@endcomponent

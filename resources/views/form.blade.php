
@extends('layouts.app')


@section('content')

<div class="container mx-auto max-w-xl p-6 bg-grey shadow rounded mt-20 ">
    <h3 class="text-2xl font-bold text-center text-[#a1a9b0]">コンタクト</h3>
    <h2 class="text-3xl mb-4 text-center text-[#483e3e]">お問合わせ</h2>

    @if(session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form id="inquiry-form" method="POST" action="{{ route('inquiry.submit') }}" class="flex-col justify-center gap-10 px-8" novalidate>
        @csrf

        <!-- お名前 -->
        <div class="mb-4">
            <label for="name" class="block font-semibold">お名前<span class="text-red-500">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                   class="w-full border border-gray-300 p-2 rounded">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- 会社名 -->
        <div class="mb-4">
            <label for="company" class="block font-semibold">会社名</label>
            <input type="text" id="company" name="company" value="{{ old('company') }}"
                   class="w-full border border-gray-300 p-2 rounded">
            @error('company')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- 電話番号 -->
        <div class="mb-4">
            <label for="phone" class="block font-semibold">電話番号<span class="text-red-500">*</span></label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                   class="w-full border border-gray-300 p-2 rounded">
            @error('phone')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- メールアドレス -->
        <div class="mb-4">
            <label for="email" class="block font-semibold">メールアドレス<span class="text-red-500">*</span></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="w-full border border-gray-300 p-2 rounded">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- お問い合わせ内容 -->
        <div class="mb-4">
            <label for="message" class="block font-semibold">お問い合わせ内容<span class="text-red-500">*</span></label>
            <textarea id="message" name="message" rows="5"
                      class="w-full border border-gray-300 p-2 rounded">{{ old('message') }}</textarea>
            @error('message')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <input type="hidden" name="g-recaptcha-response" id="recaptcha-token">

        <!-- 送信ボタン -->
        <div class="text-right">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">送信する</button>
        </div>
    </form>
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site') }}"></script>
<script>
    grecaptcha.ready(function() {
        document.getElementById('inquiry-form').addEventListener('submit', function(e) {
            e.preventDefault();
            grecaptcha.execute('{{ config('services.recaptcha.site') }}', {action: 'submit'}).then(function(token) {
                document.getElementById('recaptcha-token').value = token;
                e.target.submit();
            });
        });
    });
</script>
</div>
@endsection

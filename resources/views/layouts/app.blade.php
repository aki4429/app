
<!-- この部分を blade 冒頭に置き換え -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <nav class="bg-white border-b border-gray-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-20">
    <!-- ロゴ + サイト名 -->
    <div class="flex items-center space-x-3">
      <a href="http://localhost/blog" class="flex items-center">
        <img src="{{ asset('img/odachin_logo.png') }}" alt="おだちんWEB" class="h-12 w-auto">
        {{-- <span class="ml-2 text-xl font-semibold text-gray-800">おだちんWEB</span> --}}
      </a>
    </div>

    <!-- PC表示ナビゲーション -->
    <div class="hidden md:flex space-x-6">
      <a href="http://localhost/blog" class="text-gray-600 hover:text-gray-900">ホーム</a>
      <a href="http://localhost/blog/#portfolio" class="text-gray-600 hover:text-gray-900">制作事例</a>
      <a href="http://localhost/blog/#price" class="text-gray-600 hover:text-gray-900">料金</a>
      <a href="http://localhost/blog/#profile" class="text-gray-600 hover:text-gray-900">会社概要</a>
      <a href="http://localhost/blog/colum" class="text-gray-600 hover:text-gray-900">コラム</a>
    </div>

    <!-- モバイル用ハンバーガーメニュー -->
    <div class="md:hidden">
      <button id="menuToggle" class="text-gray-600 focus:outline-none">
        <svg class="h-6 w-6" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- モバイルメニュー -->
  <div id="mobileMenu" class="md:hidden hidden px-4 pb-4">
    <a href="/" class="block py-2 text-gray-600 hover:text-gray-900">ホーム</a>
    <a href="/about" class="block py-2 text-gray-600 hover:text-gray-900">お知らせ</a>
    <a href="/contact" class="block py-2 text-gray-600 hover:text-gray-900">お問い合わせ</a>
  </div>
</nav>

<script>
  document.getElementById('menuToggle').addEventListener('click', function() {
    document.getElementById('mobileMenu').classList.toggle('hidden');
  });
</script>


    @yield('content')
</body>
</html>

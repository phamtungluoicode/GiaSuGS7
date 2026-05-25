<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'GS7 CTV')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Vollkorn:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    @stack('styles')
</head>
<body class="bg-stone-50 text-stone-800">

    {{-- Sidebar --}}
    <aside class="fixed top-0 left-0 bottom-0 w-64 bg-stone-900 text-white overflow-y-auto z-40">
        {{-- Logo --}}
        <div class="px-6 py-5 border-b border-stone-700/50">
            <a href="/ctv" class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center">
                    <svg class="w-4.5 h-4.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <span class="text-lg font-bold font-heading text-white">GS7 CTV</span>
            </a>
        </div>

        {{-- Menu --}}
        <nav class="mt-4 px-3">
            @php
                $menuItems = [
                    ['url' => '/ctv', 'label' => 'Thống kê', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                    ['url' => '/ctv/approvals', 'label' => 'Phê duyệt', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ];
            @endphp

            @foreach($menuItems as $item)
                @php
                    $isActive = request()->is(ltrim($item['url'], '/')) || ($item['url'] !== '/ctv' && request()->is(ltrim($item['url'], '/') . '/*'));
                    if ($item['url'] === '/ctv') {
                        $isActive = request()->is('ctv') && !request()->is('ctv/*');
                    }
                @endphp
                <a href="{{ $item['url'] }}"
                   class="flex items-center space-x-3 px-3 py-2.5 rounded-xl mb-1 transition-all duration-200 {{ $isActive ? 'bg-primary-700 text-white shadow-md shadow-primary-900/30' : 'text-stone-400 hover:bg-stone-800 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                    </svg>
                    <span class="text-sm font-medium">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </aside>

    {{-- Main content area --}}
    <div class="ml-64 min-h-screen">
        {{-- Top bar --}}
        <header class="bg-white shadow-sm sticky top-0 z-30 border-b border-stone-100">
            <div class="flex items-center justify-between px-6 py-4">
                <h1 class="text-lg font-semibold font-heading text-stone-800">@yield('header', 'Trang CTV')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-stone-600 font-medium">{{ Auth::user()->name ?? 'CTV' }}</span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-700 font-medium transition text-sm">
                            Đăng xuất
                        </button>
                    </form>
                </div>
            </div>
        </header>

        {{-- Flash messages --}}
        @if(session('success'))
            <div id="flash-success" class="px-6 pt-4 animate-fade-in-up">
                <div class="bg-primary-50 border border-primary-200 text-primary-800 px-4 py-3 rounded-xl flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 flex-shrink-0 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="font-medium text-sm">{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-primary-400 hover:text-primary-600 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div id="flash-error" class="px-6 pt-4 animate-fade-in-up">
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="font-medium text-sm">{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-400 hover:text-red-600 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{-- Page content --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>

    {{-- Auto-hide flash messages --}}
    <script>
        setTimeout(function() {
            var flash = document.getElementById('flash-success');
            if (flash) flash.style.transition = 'opacity 0.5s', flash.style.opacity = '0', setTimeout(function(){ flash.remove(); }, 500);
            var err = document.getElementById('flash-error');
            if (err) err.style.transition = 'opacity 0.5s', err.style.opacity = '0', setTimeout(function(){ err.remove(); }, 500);
        }, 4000);
    </script>

    @stack('scripts')
</body>
</html>

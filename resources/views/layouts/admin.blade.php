<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'GS7 Admin')</title>

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
            <a href="/admin" class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center">
                    <svg class="w-4.5 h-4.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <span class="text-lg font-bold font-heading text-white">GS7 Admin</span>
            </a>
        </div>

        {{-- Menu --}}
        <nav class="mt-4 px-3">
            @php
                $menuItems = [
                    ['url' => '/admin', 'label' => 'Thống kê', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                    ['url' => '/admin/teachers', 'label' => 'Gia sư', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                    ['url' => '/admin/users', 'label' => 'Người dùng', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                    ['url' => '/admin/subjects', 'label' => 'Môn học', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                    ['url' => '/admin/class-levels', 'label' => 'Lớp học', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                    ['url' => '/admin/timeslots', 'label' => 'Ca học', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['url' => '/admin/rank-salaries', 'label' => 'Mức lương', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['url' => '/admin/approvals', 'label' => 'Phê duyệt', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['url' => '/admin/jobs', 'label' => 'Công việc', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ['url' => '/admin/feedbacks', 'label' => 'Nhận xét', 'icon' => 'M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z'],
                    ['url' => '/admin/ctvs', 'label' => 'CTV', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                    ['url' => '/admin/connects', 'label' => 'Kết nối', 'icon' => 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1'],
                    ['url' => '/admin/contacts', 'label' => 'Liên hệ', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ];
            @endphp

            @foreach($menuItems as $item)
                @php
                    $isActive = request()->is(ltrim($item['url'], '/')) || ($item['url'] !== '/admin' && request()->is(ltrim($item['url'], '/') . '/*'));
                    if ($item['url'] === '/admin') {
                        $isActive = request()->is('admin') && !request()->is('admin/*');
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
                <h1 class="text-lg font-semibold font-heading text-stone-800">@yield('header', 'Trang quản trị')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-stone-600 font-medium">{{ Auth::user()->name ?? 'Admin' }}</span>
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

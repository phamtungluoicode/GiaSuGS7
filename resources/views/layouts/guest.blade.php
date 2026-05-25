<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TutorLink - GS7')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Vollkorn:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4 py-8 relative"
      style="background: linear-gradient(135deg, #0f766e 0%, #115e59 40%, #134e4a 100%);">

    {{-- Background decorations --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary-400/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-accent-400/5 rounded-full blur-2xl"></div>
        <div class="absolute top-1/4 right-1/3 w-48 h-48 bg-primary-300/5 rounded-full blur-2xl"></div>
        {{-- Diagonal pattern --}}
        <svg class="absolute inset-0 w-full h-full opacity-[0.03]" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="guest-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 40" stroke="white" stroke-width="1" fill="none"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#guest-grid)"/>
        </svg>
    </div>

    {{-- Logo / Brand --}}
    <div class="mb-6 relative z-10 animate-fade-in-up">
        <a href="/" class="flex items-center gap-3 group">
            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-105">
                <svg class="w-7 h-7 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <span class="text-3xl font-extrabold font-heading text-white tracking-tight">GS7</span>
        </a>
    </div>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="w-full max-w-md mb-4 rounded-2xl bg-white/90 backdrop-blur-sm border border-primary-200 text-primary-800 px-4 py-3 text-sm relative z-10 shadow-lg animate-fade-in-up">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="w-full max-w-md mb-4 rounded-2xl bg-white/90 backdrop-blur-sm border border-red-200 text-red-800 px-4 py-3 text-sm relative z-10 shadow-lg animate-fade-in-up">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Page Content --}}
    <div class="w-full @yield('container-width', 'max-w-md') relative z-10 animate-fade-in-up" style="animation-delay: 0.1s;">
        @yield('content')
    </div>

    {{-- Footer text --}}
    <p class="mt-8 text-white/50 text-sm relative z-10">&copy; {{ date('Y') }} GS7 - Tìm Kiếm Gia Sư</p>

</body>
</html>

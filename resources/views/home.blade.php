@extends('layouts.app')

@section('title', 'GS7 - Tìm Kiếm Gia Sư Chất Lượng')

@section('content')
    {{-- Hero section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-800 via-primary-700 to-primary-900 text-white">
        {{-- Background geometric pattern --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary-600/20 rounded-full blur-3xl -translate-y-1/3 translate-x-1/4"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-accent-500/10 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>
            {{-- Decorative lines --}}
            <svg class="absolute inset-0 w-full h-full opacity-[0.04]" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="hero-grid" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M 60 0 L 0 60" stroke="white" stroke-width="1" fill="none"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hero-grid)"/>
            </svg>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="animate-fade-in-up">
                    <div class="inline-flex items-center px-4 py-1.5 bg-white/15 backdrop-blur-sm rounded-full text-sm font-medium mb-6 border border-white/10">
                        <span class="w-2 h-2 bg-accent-400 rounded-full mr-2 animate-pulse"></span>
                        Nền tảng tìm gia sư số 1 Hà Nội
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold font-heading mb-6 leading-tight">
                        Tìm gia sư
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-accent-300 to-accent-400">chất lượng cao</span>
                    </h1>
                    <p class="text-lg text-primary-100 mb-8 leading-relaxed max-w-lg">
                        Kết nối với hàng trăm gia sư uy tín, được xác minh. Tìm kiếm gia sư phù hợp chỉ trong vài phút.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/tutors"
                           class="inline-flex items-center justify-center bg-white text-primary-800 px-8 py-3.5 rounded-xl font-bold text-base hover:bg-primary-50 transition-all duration-300 shadow-xl shadow-primary-900/30 hover:-translate-y-0.5 hover:shadow-2xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Tìm gia sư ngay
                        </a>
                        <a href="/register/teacher"
                           class="inline-flex items-center justify-center border-2 border-white/25 text-white px-8 py-3.5 rounded-xl font-semibold text-base hover:bg-white/10 hover:border-white/40 transition-all duration-300">
                            Trở thành gia sư
                        </a>
                    </div>
                </div>
                <div class="hidden md:block animate-fade-in" style="animation-delay: 0.3s;">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-tr from-accent-400/20 to-primary-400/20 rounded-3xl blur-2xl"></div>
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=600&h=500&fit=crop&crop=faces"
                             alt="Gia sư và học sinh"
                             class="relative rounded-2xl shadow-2xl shadow-primary-950/40 border border-white/10 object-cover w-full h-[420px]">
                        {{-- Floating badge --}}
                        <div class="absolute -bottom-4 -left-4 bg-white rounded-2xl shadow-xl p-4 animate-float">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-accent-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 text-accent-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-stone-800">Đánh giá cao</p>
                                    <p class="text-xs text-stone-500">4.9/5 từ phụ huynh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats banner --}}
    <section class="relative -mt-8 z-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl shadow-stone-200/50 p-6 grid grid-cols-2 md:grid-cols-4 gap-6 border border-stone-100">
                <div class="text-center">
                    <p class="text-3xl font-extrabold font-heading text-primary-700">{{ $stats['teachers'] ?? '500+' }}</p>
                    <p class="text-sm text-stone-500 mt-1 font-medium">Gia sư</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-extrabold font-heading text-primary-600">{{ $stats['subjects'] ?? '17' }}</p>
                    <p class="text-sm text-stone-500 mt-1 font-medium">Môn học</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-extrabold font-heading text-accent-600">{{ $stats['students'] ?? '1000+' }}</p>
                    <p class="text-sm text-stone-500 mt-1 font-medium">Học sinh</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-extrabold font-heading text-primary-800">30</p>
                    <p class="text-sm text-stone-500 mt-1 font-medium">Quận/huyện</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Gia sư nổi bật --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <p class="text-sm font-semibold text-primary-600 uppercase tracking-wider mb-2">Được đánh giá cao nhất</p>
                <h2 class="text-3xl md:text-4xl font-extrabold font-heading text-stone-900 mb-4">Gia sư nổi bật</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-primary-500 to-accent-500 mx-auto rounded-full mb-4"></div>
                <p class="text-stone-500 max-w-2xl mx-auto">Những gia sư được phụ huynh và học sinh tin tưởng nhất trên nền tảng của chúng tôi</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @if(isset($featuredTeachers) && count($featuredTeachers) > 0)
                    @foreach($featuredTeachers as $teacher)
                        <a href="/tutors/{{ $teacher->id }}" class="group bg-white border border-stone-100 rounded-2xl hover:shadow-xl hover:shadow-primary-100/50 transition-all duration-300 p-6 text-center hover:-translate-y-1">
                            <div class="w-20 h-20 bg-gradient-to-br from-primary-100 to-primary-50 rounded-2xl mx-auto mb-4 flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                                @if($teacher->avatar)
                                <img src="{{ Str::startsWith($teacher->avatar, ['http://', 'https://']) ? $teacher->avatar : asset('storage/' . $teacher->avatar) }}" alt="{{ $teacher->name }}"
                                class="w-20 h-20 rounded-2xl object-cover border-2 border-primary-100 group-hover:border-primary-200 transition-colors">
                                @else
                                    <span class="text-2xl font-bold text-primary-600">{{ mb_substr($teacher->name, 0, 1) }}</span>
                                @endif
                            </div>
                            <h3 class="font-bold text-stone-800 text-base mb-1">{{ $teacher->name }}</h3>
                            <p class="text-stone-400 text-sm mb-3">{{ $teacher->subjects->count() > 0 ? $teacher->subjects->pluck('name')->join(', ') : 'Nhiều môn học' }}</p>
                            <div class="flex items-center justify-center space-x-0.5">
                                @php $rating = $teacher->rating ?? 5; @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $rating ? 'text-accent-400' : 'text-stone-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </a>
                    @endforeach
                @else
                    @php
                        $placeholders = [
                            ['name' => 'Nguyễn V. An', 'subject' => 'Toán, Hóa', 'color' => 'from-primary-100 to-primary-50', 'text' => 'text-primary-600'],
                            ['name' => 'Trần T. Ngọc', 'subject' => 'Tiếng Anh, IELTS', 'color' => 'from-accent-100 to-accent-50', 'text' => 'text-accent-600'],
                            ['name' => 'Lê H. Nam', 'subject' => 'Toán, Lý', 'color' => 'from-primary-200 to-primary-100', 'text' => 'text-primary-700'],
                            ['name' => 'Phạm T. M. Anh', 'subject' => 'Hóa, Sinh', 'color' => 'from-accent-200 to-accent-100', 'text' => 'text-accent-700'],
                        ];
                    @endphp
                    @foreach($placeholders as $index => $p)
                        <div class="bg-white border border-stone-100 rounded-2xl hover:shadow-xl hover:shadow-primary-100/50 transition-all duration-300 p-6 text-center hover:-translate-y-1"
                             style="animation: fade-in-up 0.5s ease-out {{ $index * 0.1 }}s both;">
                            <div class="w-20 h-20 bg-gradient-to-br {{ $p['color'] }} rounded-2xl mx-auto mb-4 flex items-center justify-center">
                                <span class="text-2xl font-bold {{ $p['text'] }}">{{ mb_substr($p['name'], 0, 1) }}</span>
                            </div>
                            <h3 class="font-bold text-stone-800 text-base mb-1">{{ $p['name'] }}</h3>
                            <p class="text-stone-400 text-sm mb-3">{{ $p['subject'] }}</p>
                            <div class="flex items-center justify-center space-x-0.5">
                                @for($j = 0; $j < 5; $j++)
                                    <svg class="w-4 h-4 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="text-center mt-10">
                <a href="/tutors" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 group transition-colors duration-200">
                    Xem tất cả gia sư
                    <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Quy trình thuê gia sư --}}
    <section class="py-20 bg-gradient-to-b from-stone-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <p class="text-sm font-semibold text-primary-600 uppercase tracking-wider mb-2">Đơn giản và nhanh chóng</p>
                <h2 class="text-3xl md:text-4xl font-extrabold font-heading text-stone-900 mb-4">Quy trình thuê gia sư</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-primary-500 to-accent-500 mx-auto rounded-full mb-4"></div>
                <p class="text-stone-500 max-w-2xl mx-auto">Chỉ với 3 bước đơn giản, bạn có thể tìm được gia sư phù hợp</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $steps = [
                        [
                            'step' => '01',
                            'title' => 'Tìm kiếm gia sư',
                            'desc' => 'Tìm kiếm gia sư theo môn học, khu vực và trình độ phù hợp với nhu cầu của bạn.',
                            'icon' => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z',
                            'color' => 'from-primary-600 to-primary-700',
                            'img' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=400&h=250&fit=crop',
                        ],
                        [
                            'step' => '02',
                            'title' => 'Gửi yêu cầu thuê',
                            'desc' => 'Gửi yêu cầu kết nối đến gia sư bạn chọn. Hệ thống sẽ thông báo cho gia sư ngay lập tức.',
                            'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
                            'color' => 'from-accent-500 to-accent-600',
                            'img' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400&h=250&fit=crop',
                        ],
                        [
                            'step' => '03',
                            'title' => 'Kết nối và học',
                            'desc' => 'Kết nối trực tiếp với gia sư và bắt đầu hành trình học tập hiệu quả của bạn.',
                            'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                            'color' => 'from-primary-500 to-primary-600',
                            'img' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=400&h=250&fit=crop',
                        ],
                    ];
                @endphp
                @foreach($steps as $s)
                    <div class="group relative bg-white rounded-2xl border border-stone-100 overflow-hidden hover:shadow-xl hover:shadow-stone-200/50 transition-all duration-300 hover:-translate-y-1">
                        <div class="h-48 overflow-hidden relative">
                            <img src="{{ $s['img'] }}" alt="{{ $s['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br {{ $s['color'] }} text-white text-sm font-extrabold shadow-lg">{{ $s['step'] }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold font-heading text-stone-900 mb-2">{{ $s['title'] }}</h3>
                            <p class="text-stone-500 text-sm leading-relaxed">{{ $s['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 relative overflow-hidden" style="background: linear-gradient(135deg, #0f766e 0%, #115e59 50%, #134e4a 100%);">
        {{-- Decorative elements --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-1/4 w-64 h-64 bg-accent-400/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-primary-300/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold font-heading text-white mb-4">Sẵn sàng tìm gia sư?</h2>
            <p class="text-lg text-primary-100 mb-8 max-w-2xl mx-auto">
                Đăng ký miễn phí và bắt đầu tìm kiếm gia sư phù hợp với nhu cầu học tập của bạn ngay hôm nay.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/register/user" class="inline-flex items-center bg-white text-primary-800 px-8 py-3.5 rounded-xl font-bold hover:bg-primary-50 transition-all duration-300 shadow-xl hover:-translate-y-0.5 hover:shadow-2xl">
                    Đăng ký miễn phí
                </a>
                <a href="/tutors" class="inline-flex items-center border-2 border-white/25 text-white px-8 py-3.5 rounded-xl font-semibold hover:bg-white/10 hover:border-white/40 transition-all duration-300">
                    Tìm gia sư
                </a>
            </div>
        </div>
    </section>
@endsection

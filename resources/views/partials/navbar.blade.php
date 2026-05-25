<nav class="fixed top-0 left-0 right-0 z-50 bg-white/85 backdrop-blur-xl border-b border-stone-200/60 transition-all duration-300" id="main-nav">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            {{-- Logo --}}
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center space-x-2.5 group">
                    <div class="w-9 h-9 bg-gradient-to-br from-primary-600 to-primary-800 rounded-xl flex items-center justify-center shadow-lg shadow-primary-200/50 group-hover:shadow-primary-300/50 transition-all duration-300 group-hover:scale-105">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-xl font-extrabold font-heading bg-gradient-to-r from-primary-700 to-primary-900 bg-clip-text text-transparent">GS7</span>
                </a>
            </div>

            {{-- Center links (desktop) --}}
            <div class="hidden md:flex items-center space-x-1">
                @php
                    $navLinks = [
                        ['url' => '/', 'label' => 'Trang chủ', 'match' => '/'],
                        ['url' => '/tutors', 'label' => 'Gia sư', 'match' => 'tutors*'],
                        ['url' => '/contact', 'label' => 'Liên hệ', 'match' => 'contact'],
                    ];
                @endphp
                @foreach($navLinks as $link)
                    @php $active = request()->is(ltrim($link['match'], '/')); @endphp
                    <a href="{{ $link['url'] }}"
                       class="relative px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200
                              {{ $active ? 'text-primary-700 bg-primary-50' : 'text-stone-600 hover:text-primary-700 hover:bg-primary-50/50' }}">
                        {{ $link['label'] }}
                        @if($active)
                            <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 w-5 h-0.5 bg-primary-500 rounded-full"></span>
                        @endif
                    </a>
                @endforeach
            </div>

            {{-- Right side (desktop) --}}
            <div class="hidden md:flex items-center space-x-3">
                @guest
                    <a href="/login" class="text-sm text-stone-600 hover:text-primary-700 font-medium px-4 py-2 rounded-lg hover:bg-primary-50/50 transition-all duration-200">
                        Đăng nhập
                    </a>

                    <div class="relative" id="register-dropdown">
                        <button type="button"
                                class="bg-gradient-to-r from-primary-600 to-primary-700 text-white px-5 py-2 rounded-xl hover:shadow-lg hover:shadow-primary-200/50 font-medium text-sm transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0"
                                onclick="toggleDropdown('register-menu')">
                            Đăng ký
                            <svg class="inline-block w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="register-menu" class="hidden absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-xl shadow-stone-200/50 border border-stone-100 overflow-hidden z-50">
                            <a href="/register/user" class="flex items-center space-x-3 px-4 py-3.5 text-stone-700 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200">
                                <div class="w-9 h-9 rounded-xl bg-primary-100 flex items-center justify-center">
                                    <svg class="w-4.5 h-4.5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-sm">Phụ huynh</p>
                                    <p class="text-xs text-stone-400">Tìm gia sư cho con</p>
                                </div>
                            </a>
                            <a href="/register/teacher" class="flex items-center space-x-3 px-4 py-3.5 text-stone-700 hover:bg-accent-50 hover:text-accent-700 transition-all duration-200 border-t border-stone-50">
                                <div class="w-9 h-9 rounded-xl bg-accent-100 flex items-center justify-center">
                                    <svg class="w-4.5 h-4.5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-sm">Gia sư</p>
                                    <p class="text-xs text-stone-400">Đăng ký làm gia sư</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @else
                    {{-- Coin balance --}}
                    <a href="/payment/balance" class="flex items-center space-x-1.5 px-3 py-1.5 bg-accent-50 border border-accent-200 rounded-full text-sm font-semibold text-accent-700 hover:bg-accent-100 hover:border-accent-300 transition-all duration-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.736 6.979C9.208 6.193 9.696 6 10 6c.304 0 .792.193 1.264.979a1 1 0 001.715-1.029C12.279 4.784 11.232 4 10 4s-2.279.784-2.979 1.95c-.285.475-.507 1-.67 1.55H6a1 1 0 000 2h.013a9.358 9.358 0 000 1H6a1 1 0 100 2h.351c.163.55.385 1.075.67 1.55C7.721 15.216 8.768 16 10 16s2.279-.784 2.979-1.95a1 1 0 10-1.715-1.029c-.472.786-.96.979-1.264.979-.304 0-.792-.193-1.264-.979a5.389 5.389 0 01-.421-.821H10a1 1 0 000-2H8.014a7.35 7.35 0 010-1H10a1 1 0 100-2H8.315c.163-.292.347-.56.421-.821z"/>
                        </svg>
                        <span>{{ Auth::user()->coin ?? 0 }} coin</span>
                    </a>

                    {{-- User dropdown --}}
                    <div class="relative" id="user-dropdown">
                        <button type="button"
                                class="flex items-center space-x-2 text-stone-700 hover:text-primary-700 font-medium transition-all duration-200 p-1 rounded-xl hover:bg-primary-50/50"
                                onclick="toggleDropdown('user-menu')">
                            <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center shadow-sm">
                                <span class="text-white font-semibold text-xs">{{ mb_substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="text-sm">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="user-menu" class="hidden absolute right-0 mt-3 w-60 bg-white rounded-2xl shadow-xl shadow-stone-200/50 border border-stone-100 overflow-hidden z-50">
                            <div class="px-4 py-3 bg-gradient-to-r from-primary-50 to-primary-100/50 border-b border-stone-100">
                                <p class="font-semibold text-sm text-stone-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-stone-500">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="@if(Auth::user()->role === 'admin') /admin @elseif(Auth::user()->role === 'ctv') /ctv @elseif(Auth::user()->role === 'teacher') /teacher/profile @else /user/profile @endif"
                               class="flex items-center space-x-3 px-4 py-3 text-sm text-stone-700 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200">
                                <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>Thông tin cá nhân</span>
                            </a>
                            @if(Auth::user()->role === 'user')
                            <a href="{{ route('user.history') }}" class="flex items-center space-x-3 px-4 py-3 text-sm text-stone-700 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200">
                                <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Lịch sử thuê</span>
                            </a>
                            <a href="{{ route('user.connects.index') }}" class="flex items-center space-x-3 px-4 py-3 text-sm text-stone-700 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200">
                                <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                                <span>Kết nối</span>
                            </a>
                            @endif
                            @if(Auth::user()->role === 'teacher')
                            <a href="{{ route('teacher.jobs.index') }}" class="flex items-center space-x-3 px-4 py-3 text-sm text-stone-700 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200">
                                <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span>Yêu cầu dạy</span>
                            </a>
                            <a href="{{ route('teacher.connects.index') }}" class="flex items-center space-x-3 px-4 py-3 text-sm text-stone-700 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200">
                                <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                                <span>Kết nối</span>
                            </a>
                            <a href="{{ route('teacher.feedbacks.index') }}" class="flex items-center space-x-3 px-4 py-3 text-sm text-stone-700 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200">
                                <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                                <span>Nhận xét</span>
                            </a>
                            @endif
                            <a href="/payment/deposit" class="flex items-center space-x-3 px-4 py-3 text-sm text-stone-700 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200">
                                <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Nạp tiền</span>
                            </a>
                            <a href="/change-password" class="flex items-center space-x-3 px-4 py-3 text-sm text-stone-700 hover:bg-primary-50 hover:text-primary-700 transition-all duration-200">
                                <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                <span>Đổi mật khẩu</span>
                            </a>
                            <div class="border-t border-stone-100">
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-all duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        <span>Đăng xuất</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>

            {{-- Mobile hamburger --}}
            <div class="md:hidden">
                <button type="button" id="mobile-menu-button" onclick="toggleMobileMenu()"
                        class="text-stone-600 hover:text-primary-700 focus:outline-none p-2 rounded-lg hover:bg-primary-50 transition-all duration-200">
                    <svg id="hamburger-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-xl border-t border-stone-100 shadow-lg">
        <div class="px-4 py-3 space-y-1">
            <a href="/" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 font-medium text-sm transition-all duration-200">Trang chủ</a>
            <a href="/tutors" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 font-medium text-sm transition-all duration-200">Gia sư</a>
            <a href="/contact" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 font-medium text-sm transition-all duration-200">Liên hệ</a>

            @guest
                <div class="border-t border-stone-100 pt-3 mt-3 space-y-1">
                    <a href="/login" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 font-medium text-sm transition-all duration-200">Đăng nhập</a>
                    <a href="/register/user" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Đăng ký phụ huynh</a>
                    <a href="/register/teacher" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Đăng ký gia sư</a>
                </div>
            @else
                <div class="border-t border-stone-100 pt-3 mt-3">
                    <div class="flex items-center space-x-3 px-3 py-2.5">
                        <div class="w-9 h-9 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">{{ mb_substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="font-medium text-sm text-stone-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-accent-600 font-semibold">{{ Auth::user()->coin ?? 0 }} coin</p>
                        </div>
                    </div>
                    <a href="@if(Auth::user()->role === 'admin') /admin @elseif(Auth::user()->role === 'ctv') /ctv @elseif(Auth::user()->role === 'teacher') /teacher/profile @else /user/profile @endif"
                       class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Thông tin cá nhân</a>
                    @if(Auth::user()->role === 'user')
                    <a href="{{ route('user.history') }}" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Lịch sử thuê</a>
                    <a href="{{ route('user.connects.index') }}" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Kết nối</a>
                    @endif
                    @if(Auth::user()->role === 'teacher')
                    <a href="{{ route('teacher.jobs.index') }}" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Yêu cầu dạy</a>
                    <a href="{{ route('teacher.connects.index') }}" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Kết nối</a>
                    <a href="{{ route('teacher.feedbacks.index') }}" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Nhận xét</a>
                    @endif
                    <a href="/payment/deposit" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Nạp tiền</a>
                    <a href="/change-password" class="block py-2.5 px-3 rounded-lg text-stone-700 hover:bg-primary-50 hover:text-primary-700 text-sm transition-all duration-200">Đổi mật khẩu</a>
                    <form method="POST" action="/logout" class="pt-2 border-t border-stone-100 mt-2">
                        @csrf
                        <button type="submit" class="w-full text-left py-2.5 px-3 rounded-lg text-red-600 hover:bg-red-50 font-medium text-sm transition-all duration-200">Đăng xuất</button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</nav>

<script>
    function toggleDropdown(menuId) {
        var menu = document.getElementById(menuId);
        var allMenus = document.querySelectorAll('#register-menu, #user-menu');
        allMenus.forEach(function(m) {
            if (m.id !== menuId) m.classList.add('hidden');
        });
        menu.classList.toggle('hidden');
    }

    function toggleMobileMenu() {
        var mobileMenu = document.getElementById('mobile-menu');
        var hamburgerIcon = document.getElementById('hamburger-icon');
        var closeIcon = document.getElementById('close-icon');
        mobileMenu.classList.toggle('hidden');
        hamburgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        var registerDropdown = document.getElementById('register-dropdown');
        var userDropdown = document.getElementById('user-dropdown');
        var registerMenu = document.getElementById('register-menu');
        var userMenu = document.getElementById('user-menu');
        if (registerDropdown && !registerDropdown.contains(event.target) && registerMenu) registerMenu.classList.add('hidden');
        if (userDropdown && !userDropdown.contains(event.target) && userMenu) userMenu.classList.add('hidden');
    });

    window.addEventListener('scroll', function() {
        var nav = document.getElementById('main-nav');
        if (window.scrollY > 10) {
            nav.classList.add('shadow-md', 'bg-white/95');
            nav.classList.remove('border-b', 'border-stone-200/60', 'bg-white/85');
        } else {
            nav.classList.remove('shadow-md', 'bg-white/95');
            nav.classList.add('border-b', 'border-stone-200/60', 'bg-white/85');
        }
    });
</script>

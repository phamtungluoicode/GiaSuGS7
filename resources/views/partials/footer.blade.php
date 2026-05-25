<footer class="bg-stone-900 text-white relative overflow-hidden">
    {{-- Decorative top border --}}
    <div class="h-1 w-full bg-gradient-to-r from-primary-500 via-accent-500 to-primary-500"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            {{-- Column 1: Brand --}}
            <div class="lg:col-span-1">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold font-heading">GS7</span>
                </div>
                <p class="text-stone-400 leading-relaxed text-sm">
                    GS7 là nền tảng kết nối gia sư và học sinh hàng đầu. Chúng tôi giúp bạn tìm kiếm gia sư chất lượng,
                    uy tín với chi phí hợp lý nhất.
                </p>
            </div>

            {{-- Column 2: Quick Links --}}
            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-5">Liên kết nhanh</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="/" class="text-stone-400 hover:text-primary-300 transition-colors duration-200 text-sm flex items-center gap-2 group">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary-500/50 group-hover:bg-primary-400 transition-colors"></span>
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="/tutors" class="text-stone-400 hover:text-primary-300 transition-colors duration-200 text-sm flex items-center gap-2 group">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary-500/50 group-hover:bg-primary-400 transition-colors"></span>
                            Tìm gia sư
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="text-stone-400 hover:text-primary-300 transition-colors duration-200 text-sm flex items-center gap-2 group">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary-500/50 group-hover:bg-primary-400 transition-colors"></span>
                            Liên hệ
                        </a>
                    </li>
                    <li>
                        <a href="/terms" class="text-stone-400 hover:text-primary-300 transition-colors duration-200 text-sm flex items-center gap-2 group">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary-500/50 group-hover:bg-primary-400 transition-colors"></span>
                            Điều khoản
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Column 3: Services --}}
            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-5">Dịch vụ</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="/tutors" class="text-stone-400 hover:text-accent-300 transition-colors duration-200 text-sm flex items-center gap-2 group">
                            <span class="w-1.5 h-1.5 rounded-full bg-accent-500/50 group-hover:bg-accent-400 transition-colors"></span>
                            Tìm kiếm gia sư
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register.teacher') }}" class="text-stone-400 hover:text-accent-300 transition-colors duration-200 text-sm flex items-center gap-2 group">
                            <span class="w-1.5 h-1.5 rounded-full bg-accent-500/50 group-hover:bg-accent-400 transition-colors"></span>
                            Đăng ký gia sư
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register.user') }}" class="text-stone-400 hover:text-accent-300 transition-colors duration-200 text-sm flex items-center gap-2 group">
                            <span class="w-1.5 h-1.5 rounded-full bg-accent-500/50 group-hover:bg-accent-400 transition-colors"></span>
                            Đăng ký học viên
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Column 4: Contact --}}
            <div>
                <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-5">Liên hệ</h4>
                <ul class="space-y-4">
                    <li class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-stone-500 mb-0.5">Email</p>
                            <span class="text-stone-300 text-sm">noreply@gs7.vn</span>
                        </div>
                    </li>
                    <li class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-stone-500 mb-0.5">Điện thoại</p>
                            <span class="text-stone-300 text-sm">0123 456 789</span>
                        </div>
                    </li>
                    <li class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-stone-500 mb-0.5">Địa chỉ</p>
                            <span class="text-stone-300 text-sm">Hà Nội, Việt Nam</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="border-t border-white/10 mt-12 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-stone-500 text-sm">
                &copy; {{ date('Y') }} GS7 - Tìm Kiếm Gia Sư. Tất cả quyền được bảo lưu.
            </p>
            <div class="flex items-center gap-6">
                <a href="/terms" class="text-stone-500 hover:text-primary-300 text-sm transition-colors">Điều khoản</a>
                <a href="/contact" class="text-stone-500 hover:text-primary-300 text-sm transition-colors">Liên hệ</a>
            </div>
        </div>
    </div>

    {{-- Background decoration --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-accent-500/5 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3 pointer-events-none"></div>
</footer>

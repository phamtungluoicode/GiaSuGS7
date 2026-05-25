@extends('layouts.app')

@section('title', 'Liên hệ - GS7')

@section('content')
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-bold font-heading text-stone-900 mb-4">Liên hệ</h1>
                <div class="w-16 h-1 bg-gradient-to-r from-primary-500 to-accent-500 mx-auto rounded-full mb-4"></div>
                <p class="text-stone-500 max-w-2xl mx-auto">Bạn có câu hỏi hoặc cần hỗ trợ? Hãy gửi thông tin liên hệ cho chúng tôi.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Contact form --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-6 md:p-8">
                        <h2 class="text-xl font-semibold font-heading text-stone-900 mb-6">Gửi liên hệ</h2>

                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf

                            {{-- Name --}}
                            <div class="mb-5">
                                <label for="name" class="block text-sm font-medium text-stone-600 mb-2">Họ và tên</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                       class="w-full px-4 py-2.5 border border-stone-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all duration-200 bg-stone-50/50 hover:border-stone-300 text-sm"
                                       placeholder="Nhập họ và tên">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="mb-5">
                                <label for="phone" class="block text-sm font-medium text-stone-600 mb-2">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                                       class="w-full px-4 py-2.5 border border-stone-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all duration-200 bg-stone-50/50 hover:border-stone-300 text-sm"
                                       placeholder="Nhập số điện thoại">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Note --}}
                            <div class="mb-6">
                                <label for="note" class="block text-sm font-medium text-stone-600 mb-2">Nội dung</label>
                                <textarea name="note" id="note" rows="5" required
                                          class="w-full px-4 py-2.5 border border-stone-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition-all duration-200 resize-y bg-stone-50/50 hover:border-stone-300 text-sm"
                                          placeholder="Nhập nội dung cần liên hệ">{{ old('note') }}</textarea>
                                @error('note')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <button type="submit"
                                    class="w-full sm:w-auto bg-gradient-to-r from-primary-600 to-primary-700 text-white px-8 py-3 rounded-xl font-semibold hover:from-primary-700 hover:to-primary-800 transition-all duration-300 shadow-md shadow-primary-200/50 hover:shadow-lg text-sm">
                                Gửi liên hệ
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Contact info sidebar --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-6 md:p-8">
                        <h2 class="text-xl font-semibold font-heading text-stone-900 mb-6">Thông tin liên hệ</h2>

                        <div class="space-y-6">
                            {{-- Email --}}
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-primary-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-0.5">Email</p>
                                    <p class="text-stone-800 text-sm">noreply@gs7.vn</p>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-primary-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-0.5">Điện thoại</p>
                                    <p class="text-stone-800 text-sm">0123 456 789</p>
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-primary-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-0.5">Địa chỉ</p>
                                    <p class="text-stone-800 text-sm">Hà Nội, Việt Nam</p>
                                </div>
                            </div>

                            {{-- Working hours --}}
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-primary-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-0.5">Giờ làm việc</p>
                                    <p class="text-stone-800 text-sm">Thứ 2 - Thứ 7: 8:00 - 17:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

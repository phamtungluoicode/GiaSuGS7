@extends('layouts.app')

@section('title', 'Số dư tài khoản - GS7')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-8">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Số dư tài khoản</h2>
                    <p class="text-gray-500 mt-2">Quản lý coin và lịch sử giao dịch của bạn</p>
                </div>

                <div class="hidden sm:flex w-14 h-14 rounded-full bg-amber-100 items-center justify-center">
                    <span class="text-2xl">🪙</span>
                </div>
            </div>

            {{-- Số dư --}}
            <div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-fuchsia-600 rounded-2xl p-8 text-center mb-8 overflow-hidden">
                <div class="absolute -top-10 -right-10 w-36 h-36 bg-white/10 rounded-full"></div>
                <div class="absolute -bottom-12 -left-12 w-44 h-44 bg-white/10 rounded-full"></div>

                <p class="text-indigo-100 text-sm font-medium mb-2">Số dư hiện tại</p>
                <p class="text-6xl font-extrabold text-white tracking-tight">
                    {{ number_format($user->coin ?? 0) }}
                </p>
                <p class="text-indigo-100 mt-2 text-lg font-semibold">coin</p>
            </div>

            {{-- Liên kết --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('payment.deposit.form') }}"
                   class="group flex flex-col items-center justify-center text-center bg-indigo-600 text-white px-6 py-6 rounded-2xl hover:bg-indigo-700 transition shadow-md hover:shadow-lg">
                    <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-lg">Nạp tiền</span>
                    <span class="text-indigo-100 text-sm mt-1">Thêm coin vào tài khoản</span>
                </a>

                <a href="{{ route('payment.transactions') }}"
                   class="group flex flex-col items-center justify-center text-center bg-slate-700 text-white px-6 py-6 rounded-2xl hover:bg-slate-800 transition shadow-md hover:shadow-lg">
                    <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l2 2 4-4M7 7h10M7 11h10M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-lg">Lịch sử nạp</span>
                    <span class="text-slate-200 text-sm mt-1">Xem giao dịch nạp tiền</span>
                </a>

                <a href="{{ route('payment.transactionscoin') }}"
                   class="group flex flex-col items-center justify-center text-center bg-amber-600 text-white px-6 py-6 rounded-2xl hover:bg-amber-700 transition shadow-md hover:shadow-lg">
                    <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center mb-3 group-hover:scale-110 transition">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3.314 0-6 1.343-6 3s2.686 3 6 3 6-1.343 6-3-2.686-3-6-3zM6 11v4c0 1.657 2.686 3 6 3s6-1.343 6-3v-4"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-lg">Lịch sử coin</span>
                    <span class="text-amber-100 text-sm mt-1">Theo dõi coin nội bộ</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
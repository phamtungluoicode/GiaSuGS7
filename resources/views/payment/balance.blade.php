@extends('layouts.app')

@section('title', 'Số dư tài khoản - GS7')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Số dư tài khoản</h2>

        {{-- So du --}}
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg p-8 text-center mb-8">
            <p class="text-indigo-100 text-sm mb-1">Số dư hiện tại</p>
            <p class="text-5xl font-bold text-white">{{ number_format($user->coin ?? 0) }}</p>
            <p class="text-indigo-200 mt-1">coin</p>
        </div>

        {{-- Lien ket --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('payment.deposit.form') }}"
                class="flex items-center justify-center space-x-3 bg-indigo-600 text-white px-6 py-4 rounded-lg hover:bg-indigo-700 transition font-medium">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                <span>Nạp tiền</span>
            </a>

            <a href="{{ route('payment.transactions') }}"
                class="flex items-center justify-center space-x-3 bg-gray-600 text-white px-6 py-4 rounded-lg hover:bg-gray-700 transition font-medium">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <span>Lịch sử giao dịch</span>
            </a>
        </div>
    </div>
</div>
@endsection

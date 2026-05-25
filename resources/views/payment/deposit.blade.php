@extends('layouts.app')

@section('title', 'Nạp tiền - GS7')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Nạp tiền vào tài khoản</h2>

        {{-- So du hien tai --}}
        <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4 mb-6">
            <p class="text-sm text-indigo-600">Số dư hiện tại</p>
            <p class="text-3xl font-bold text-indigo-700">{{ number_format($user->coin ?? 0) }} coin</p>
        </div>

        {{-- Form nap tien --}}
        <form action="{{ route('payment.deposit') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Số tiền (VND)</label>
                <input type="number" name="amount" id="amount" value="{{ old('amount') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Nhập số tiền muốn nạp" min="10000">
                @error('amount')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nut chon nhanh --}}
            <div class="mb-6">
                <p class="text-sm font-medium text-gray-700 mb-2">Chọn nhanh:</p>
                <div class="flex flex-wrap gap-2">
                    <button type="button" onclick="document.getElementById('amount').value=50000"
                        class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition">
                        50,000
                    </button>
                    <button type="button" onclick="document.getElementById('amount').value=100000"
                        class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition">
                        100,000
                    </button>
                    <button type="button" onclick="document.getElementById('amount').value=200000"
                        class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition">
                        200,000
                    </button>
                    <button type="button" onclick="document.getElementById('amount').value=500000"
                        class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-200 transition">
                        500,000
                    </button>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                Nạp tiền
            </button>
        </form>
    </div>
</div>
@endsection

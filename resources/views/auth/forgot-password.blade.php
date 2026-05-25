@extends('layouts.guest')

@section('title', 'Quên mật khẩu - GS7')

@section('content')
<div class="bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">Quên mật khẩu</h2>
    <p class="text-sm text-gray-500 text-center mb-6">
        Nhập email của bạn, chúng tôi sẽ gửi link đặt lại mật khẩu.
    </p>

    <form method="POST" action="{{ route('password.send') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                placeholder="email@example.com"
            >
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit --}}
        <button
            type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-4 rounded-lg transition text-sm"
        >
            Gửi email đặt lại mật khẩu
        </button>
    </form>

    {{-- Back to Login --}}
    <div class="mt-6 text-center">
        <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-800 hover:underline">
            Quay lại đăng nhập
        </a>
    </div>
</div>
@endsection

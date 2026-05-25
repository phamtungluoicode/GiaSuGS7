@extends('layouts.app')

@section('title', '403 - Không có quyền truy cập')

@section('content')
<div class="flex items-center justify-center min-h-[60vh] px-4">
    <div class="text-center">
        <h1 class="text-9xl font-bold text-gray-200">403</h1>
        <div class="mt-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Không có quyền truy cập</h2>
            <p class="text-gray-500 mb-8">Bạn không có quyền truy cập trang này</p>
            <a href="/" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Về trang chủ
            </a>
        </div>
    </div>
</div>
@endsection

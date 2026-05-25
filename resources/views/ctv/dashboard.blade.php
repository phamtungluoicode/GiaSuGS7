@extends('layouts.ctv')

@section('title', 'Thống kê - CTV')
@section('header', 'Thống kê')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Số gia sư chờ duyệt --}}
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-yellow-100 rounded-lg p-3">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Số gia sư chờ duyệt</p>
                <p class="text-3xl font-bold text-gray-900">{{ number_format($pendingCount) }}</p>
            </div>
        </div>
    </div>

    {{-- Số gia sư đã duyệt --}}
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-green-100 rounded-lg p-3">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Số gia sư đã duyệt</p>
                <p class="text-3xl font-bold text-gray-900">{{ number_format($approvedCount) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

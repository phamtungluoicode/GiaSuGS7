@extends('layouts.app')

@section('title', 'Chi tiết thuê gia sư')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Chi tiết thuê gia sư</h1>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Thông tin gia sư --}}
            <div class="md:col-span-2">
                <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Thông tin gia sư</h2>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Họ tên</p>
                <p class="text-lg text-gray-900">{{ $job->teacher->name ?? 'N/A' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Số điện thoại</p>
                <p class="text-lg text-gray-900">{{ $job->teacher->phone ?? 'N/A' }}</p>
            </div>

            {{-- Thông tin công việc --}}
            <div class="md:col-span-2 mt-4">
                <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Thông tin công việc</h2>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Môn học</p>
                <p class="text-lg text-gray-900">{{ $job->subjectModel->name ?? $job->subject }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Lớp</p>
                <p class="text-lg text-gray-900">{{ $job->classLevel->class ?? $job->class }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Trạng thái</p>
                <p class="text-lg">
                    @if($job->status == 0)
                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Chờ xác nhận</span>
                    @elseif($job->status == 1)
                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Đã xác nhận</span>
                    @elseif($job->status == 2)
                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Từ chối</span>
                    @else
                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">{{ $job->status }}</span>
                    @endif
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Ngày tạo</p>
                <p class="text-lg text-gray-900">{{ $job->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-500">Mô tả</p>
                <p class="text-lg text-gray-900">{{ $job->description ?? 'Không có mô tả' }}</p>
            </div>
        </div>

        {{-- Hành động --}}
        <div class="mt-6 flex items-center gap-4 pt-4 border-t border-gray-200">
            <a href="{{ route('user.history') }}" class="inline-flex items-center bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Quay lại
            </a>

            @if($job->teacher)
                <a href="{{ route('tutors.show', $job->teacher->id) }}" class="inline-flex items-center bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition font-medium">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Xem gia sư
                </a>
            @endif
        </div>
    </div>
</div>
@endsection

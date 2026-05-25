@extends('layouts.admin')

@section('title', 'Chi tiết công việc - Admin')
@section('header', 'Chi tiết công việc')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Thông tin người thuê --}}
            <div class="md:col-span-2">
                <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">Thông tin người thuê</h3>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Họ tên người thuê</p>
                <p class="text-lg text-gray-900">{{ $job->user->name ?? 'N/A' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Email người thuê</p>
                <p class="text-lg text-gray-900">{{ $job->user->email ?? 'N/A' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Số điện thoại người thuê</p>
                <p class="text-lg text-gray-900">{{ $job->user->phone ?? 'N/A' }}</p>
            </div>

            {{-- Thông tin gia sư --}}
            <div class="md:col-span-2 mt-4">
                <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">Thông tin gia sư</h3>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Họ tên gia sư</p>
                <p class="text-lg text-gray-900">{{ $job->teacher->name ?? 'N/A' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Email gia sư</p>
                <p class="text-lg text-gray-900">{{ $job->teacher->email ?? 'N/A' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Số điện thoại gia sư</p>
                <p class="text-lg text-gray-900">{{ $job->teacher->phone ?? 'N/A' }}</p>
            </div>

            {{-- Thông tin công việc --}}
            <div class="md:col-span-2 mt-4">
                <h3 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-2 mb-4">Thông tin công việc</h3>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Môn học</p>
                <p class="text-lg text-gray-900">@php
                                    $subjectModel = \App\Models\Subject::find($job->subject);
                                @endphp
                                {{ $subjectModel->name ?? $job->subject }}</p>
            </div>
            <!-- {{ $job->subjectModel->name ?? 'N/A' }} -->
            <div>
                <p class="text-sm font-medium text-gray-500">Lớp</p>
                <p class="text-lg text-gray-900">@php
                                    $classModel = \App\Models\ClassLevel::find($job->class);
                                @endphp
                                {{ $classModel->class ?? $job->class }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Trạng thái</p>
                <p class="text-lg">
                    @if($job->status == 0)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Chờ xác nhận</span>
                    @elseif($job->status == 1)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Đã xác nhận</span>
                    @elseif($job->status == 2)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Từ chối</span>
                    @else
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">{{ $job->status }}</span>
                    @endif
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Ngày tạo</p>
                <p class="text-lg text-gray-900">{{ $job->created_at->format('d/m/Y H:i') }}</p>
            </div>

            {{-- Mô tả --}}
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-500">Mô tả</p>
                <p class="text-lg text-gray-900">{{ $job->description ?? 'Không có mô tả' }}</p>
            </div>
        </div>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.jobs.index') }}" class="inline-flex items-center bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Quay lại
            </a>
        </div>
    </div>
</div>
@endsection

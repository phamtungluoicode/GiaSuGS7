@extends('layouts.admin')

@section('title', 'Chi tiết người dùng - Admin')
@section('header', 'Chi tiết người dùng')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    {{-- Khối 1: Thông tin cá nhân gia sư --}}
    <div class="bg-white rounded-lg shadow p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Avatar --}}
            <div class="md:col-span-2 flex justify-center">
                @if($user->avatar)
                <img src="{{ Str::startsWith($user->avatar, ['http://', 'https://']) ? $user->avatar : asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-32 h-32 rounded-full object-cover border-4 border-indigo-200">
                @else
                <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                @endif
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Họ tên</p>
                <p class="text-lg text-gray-900">{{ $user->name }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Email</p>
                <p class="text-lg text-gray-900">{{ $user->email }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Số điện thoại</p>
                <p class="text-lg text-gray-900">{{ $user->phone ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Giới tính</p>
                <p class="text-lg text-gray-900">
                    @if($user->gender == 'male') Nam
                    @elseif($user->gender == 'female') Nữ
                    @else Chưa cập nhật
                    @endif
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Ngày sinh</p>
                <p class="text-lg text-gray-900">{{ $user->date_of_birth ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Địa chỉ</p>
                <p class="text-lg text-gray-900">{{ $user->address ?? 'Chưa cập nhật' }}</p>
            </div>
        </div>
    </div>

    {{-- Khối 2: Danh sách lịch sử thuê gia sư (Hired Jobs) --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            Danh gia sư đã thuê
        </h3>

        <div class="overflow-x-auto border border-gray-200 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-700 font-medium">
                    <tr>
                        <th class="px-4 py-3 text-left">Gia sư</th>
                        <th class="px-4 py-3 text-left">Môn học & Lớp</th>
                        <th class="px-4 py-3 text-left">Mô tả chi tiết</th>
                        <th class="px-4 py-3 text-left">Trạng thái</th>
                        <th class="px-4 py-3 text-left">Ngày tạo</th>
                        <th class="px-4 py-3 text-left">Xem chi tiết</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600 bg-white">
                    @forelse($jobs as $job)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $job->teacher->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3">
                            <span class="block text-xs font-semibold text-indigo-600 uppercase"> @php
                                $subjectModel = \App\Models\Subject::find($job->subject);
                                @endphp
                                {{ $subjectModel->name ?? $job->subject }}</span>
                            <span class="text-gray-900">
                                @php
                                $classModel = \App\Models\ClassLevel::find($job->class);
                                @endphp
                                {{ $classModel->class ?? $job->class }}
                            </span>
                        </td>
                        <td class="px-4 py-3 max-w-xs truncate" title="{{ $job->description }}">
                            {{ $job->description }}
                        </td>
                        <td class="px-4 py-3">
                            @if($job->status == 0)
                            <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Chờ xác nhận</span>
                            @elseif($job->status == 1)
                            <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full bg-green-100 text-green-800">Đã xác nhận</span>
                            @elseif($job->status == 2)
                            <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full bg-red-100 text-red-800">Đã hủy</span>
                            @else
                            <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full bg-gray-100 text-gray-800">Không rõ</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-400">
                            {{ \Carbon\Carbon::parse($job->created_at)->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.jobs.show', $job->id) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded hover:bg-blue-700 transition">
                                Xem
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-400 bg-gray-50 italic">
                            Gia sư này chưa có lượt thuê nào hệ thống ghi nhận.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            Danh sách FeedBack của người thuê
        </h3>

        <div class="overflow-x-auto border border-gray-200 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-700 font-medium">
                    <tr>
                        <th class="px-4 py-3 text-left">Gia sư</th>
                        <th class="px-4 py-3 text-left">Điểm</th>
                        <th class="px-4 py-3 text-left">Nội Dung</th>
                        <th class="px-4 py-3 text-left">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-600 bg-white">
                    @forelse($feedbackTeacher as $feedback)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $feedback->teacher->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center">
                                <span class="font-semibold text-yellow-600">{{ $feedback->point }}</span>
                                <svg class="w-4 h-4 text-yellow-400 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                        </td>
                        <td class="px-4 py-3 max-w-xs truncate" title="{{ $job->description }}">
                            {{ $feedback->description }}
                        </td>
                        <td class="px-4 py-3 text-xs text-gray-400">
                            {{ \Carbon\Carbon::parse($feedback->created_at)->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-400 bg-gray-50 italic">
                            Gia sư này chưa có lượt thuê nào hệ thống ghi nhận.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Khối 3: Các nút hành động (Đặt dưới cùng để thuận tiện thao tác sau khi xem hết) --}}
    <div class="flex items-center gap-4 bg-white p-4 rounded-lg shadow">
        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Quay lại
        </a>
        <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Sửa thông tin
        </a>
    </div>
</div>
</div>
@endsection
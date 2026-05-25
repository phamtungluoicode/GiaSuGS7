@extends('layouts.admin')

@section('title', 'Chi tiết gia sư - Admin')
@section('header', 'Chi tiết gia sư')

@section('content')
<div class="max-w-4xl mx-auto">
    @if($teacher->approver || $teacher->assign_user)
        <div class="mb-4 flex justify-end">
            <div class="inline-flex items-center gap-2 bg-indigo-50 border border-indigo-200 text-indigo-700 text-xs px-3 py-1.5 rounded-full">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>
                    Duyệt bởi:
                    <strong>{{ $teacher->approver->name ?? $teacher->assign_user }}</strong>
                    @if($teacher->approver && $teacher->approver->role)
                        <span class="text-indigo-500">({{ $teacher->approver->role }})</span>
                    @endif
                    @if($teacher->time_accept)
                        <span class="text-indigo-500">· {{ \Carbon\Carbon::parse($teacher->time_accept)->format('d/m/Y H:i') }}</span>
                    @endif
                </span>
            </div>
        </div>
    @endif
    <div class="bg-white rounded-lg shadow p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Avatar --}}
            <div class="md:col-span-2 flex justify-center">
                @if($teacher->avatar)
                    <img src="{{ Str::startsWith($teacher->avatar, ['http://', 'https://']) ? $teacher->avatar : asset('storage/' . $teacher->avatar) }}" alt="Avatar" class="w-32 h-32 rounded-full object-cover border-4 border-indigo-200">
                @else
                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                @endif
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Họ tên</p>
                <p class="text-lg text-gray-900">{{ $teacher->name }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Email</p>
                <p class="text-lg text-gray-900">{{ $teacher->email }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Số điện thoại</p>
                <p class="text-lg text-gray-900">{{ $teacher->phone ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Giới tính</p>
                <p class="text-lg text-gray-900">
                    @if($teacher->gender == 'male') Nam
                    @elseif($teacher->gender == 'female') Nữ
                    @else Chưa cập nhật
                    @endif
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Ngày sinh</p>
                <p class="text-lg text-gray-900">{{ $teacher->date_of_birth ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Địa chỉ</p>
                <p class="text-lg text-gray-900">{{ $teacher->address ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Số CCCD</p>
                <p class="text-lg text-gray-900">{{ $teacher->Citizen_card ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Trình độ học vấn</p>
                <p class="text-lg text-gray-900">{{ $teacher->education_level ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Trường học</p>
                <p class="text-lg text-gray-900">{{ $teacher->school->name ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Kinh nghiệm</p>
                <p class="text-lg text-gray-900">{{ $teacher->exp ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Quận / Huyện</p>
                <p class="text-lg text-gray-900">{{ $teacher->district->name ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Mức lương</p>
                <p class="text-lg text-gray-900">{{ $teacher->rankSalary->name ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Môn học</p>
                <p class="text-lg text-gray-900">@if($teacher->subjects->count() > 0)
                                    {{ $teacher->subjects->pluck('name')->join(', ') }}
                                @else
                                    Chưa cập nhật
                                @endif</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Khối lớp</p>
                <p class="text-lg text-gray-900">@if($teacher->classLevels->count() > 0)
                                    {{ $teacher->classLevels->pluck('class')->join(', ') }}
                                @else
                                    Chưa cập nhật
                                @endif</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Ca học</p>
                <p class="text-lg text-gray-900">{{ $teacher->timeSlot->name ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Trạng thái</p>
                <p class="text-lg">
                    @if($teacher->status == 1)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Hoạt động</span>
                    @else
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Khóa</span>
                    @endif
                </p>
            </div>

            {{-- Mô tả --}}
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-500">Mô tả</p>
                <p class="text-lg text-gray-900">{{ $teacher->description ?? 'Chưa cập nhật' }}</p>
            </div>

            {{-- Chứng chỉ --}}
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-500 mb-2">Chứng chỉ</p>
                @if($teacher->Certificate)
                    @if(Str::endsWith($teacher->Certificate, '.pdf'))
                        <a href="{{ asset('storage/' . $teacher->Certificate) }}" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            Xem chứng chỉ (PDF)
                        </a>
                    @else
                        <img src="{{ asset('storage/' . $teacher->Certificate) }}" alt="Chứng chỉ" class="max-w-md rounded-lg border border-gray-200">
                    @endif
                @else
                    <p class="text-lg text-gray-900">Chưa cập nhật</p>
                @endif
            </div>
        </div>

        <div class="mt-6 flex items-center gap-4">
            <a href="{{ route('admin.teachers.index') }}" class="inline-flex items-center bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Quay lại
            </a>
            <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="inline-flex items-center bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                Sửa thông tin
            </a>
        </div>
    </div>
</div>
@endsection

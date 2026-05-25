@extends('layouts.app')

@section('title', 'Thông tin cá nhân - Gia sư')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Thông tin cá nhân</h1>
        <a href="{{ route('teacher.profile.edit') }}"
           class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Sửa thông tin
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        {{-- Trạng thái & Coin --}}
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <span class="text-sm font-medium text-gray-500">Trạng thái:</span>
                @if($user->status == 1)
                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Đã duyệt</span>
                @else
                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Chờ duyệt</span>
                @endif
            </div>
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.736 6.979C9.208 6.193 9.696 6 10 6c.304 0 .792.193 1.264.979a1 1 0 001.715-1.029C12.279 4.784 11.232 4 10 4s-2.279.784-2.979 1.95c-.285.475-.507 1-.67 1.55H6a1 1 0 000 2h.013a9.358 9.358 0 000 1H6a1 1 0 100 2h.351c.163.55.385 1.075.67 1.55C7.721 15.216 8.768 16 10 16s2.279-.784 2.979-1.95a1 1 0 10-1.715-1.029C10.792 13.807 10.304 14 10 14c-.304 0-.792-.193-1.264-.979a5.68 5.68 0 01-.421-.521H10a1 1 0 100-2H7.938a7.357 7.357 0 010-1H10a1 1 0 100-2H8.315c.163-.18.304-.362.421-.521z"/>
                </svg>
                <span class="text-lg font-bold text-gray-900">{{ number_format($user->coin ?? 0) }} coin</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Avatar --}}
            <div class="md:col-span-2 flex justify-center">
                @if($user->avatar)
                    <img src="{{ Str::startsWith($user->avatar, ['http://', 'https://']) ? $user->avatar : asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-32 h-32 rounded-full object-cover border-4 border-indigo-200">
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
                <p class="text-lg text-gray-900">
                    {{ $user->date_of_birth ? $user->date_of_birth->format('d/m/Y') : 'Chưa cập nhật' }}
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Địa chỉ</p>
                <p class="text-lg text-gray-900">{{ $user->address ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Trình độ học vấn</p>
                <p class="text-lg text-gray-900">{{ $user->education_level ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Trường học</p>
                <p class="text-lg text-gray-900">{{ $user->school->name ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Kinh nghiệm</p>
                <p class="text-lg text-gray-900">{{ $user->exp ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Quận / Huyện</p>
                <p class="text-lg text-gray-900">{{ $user->district->name ?? 'Chưa cập nhật' }}</p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Mức lương</p>
                <p class="text-lg text-gray-900">
                    @php
                        $salary = \App\Models\RankSalary::find($user->salary_id);
                    @endphp
                    {{ $salary->name ?? 'Chưa cập nhật' }}
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Môn học</p>
                <p class="text-lg text-gray-900">
                    @if($user->subjects->count() > 0)
                        {{ $user->subjects->pluck('name')->join(', ') }}
                    @else
                        Chưa cập nhật
                    @endif
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Khối lớp</p>
                <p class="text-lg text-gray-900">
                    @if($user->classLevels->count() > 0)
                        {{ $user->classLevels->pluck('class')->join(', ') }}
                    @else
                        Chưa cập nhật
                    @endif
                </p>
            </div>

            <div>
                <p class="text-sm font-medium text-gray-500">Ca học</p>
                <p class="text-lg text-gray-900">
                    @php
                        $timeSlot = \App\Models\TimeSlot::find($user->time_tutor_id);
                    @endphp
                    {{ $timeSlot->name ?? 'Chưa cập nhật' }}
                </p>
            </div>

            {{-- Mô tả --}}
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-500">Mô tả bản thân</p>
                <p class="text-lg text-gray-900">{{ $user->description ?? 'Chưa cập nhật' }}</p>
            </div>

            {{-- Chứng chỉ --}}
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-500 mb-2">Chứng chỉ</p>
                @if($user->Certificate)
                    @if(Str::endsWith($user->Certificate, '.pdf'))
                        <a href="{{ asset('storage/' . $user->Certificate) }}" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            Xem chứng chỉ (PDF)
                        </a>
                    @else
                        <img src="{{ asset('storage/' . $user->Certificate) }}" alt="Chứng chỉ" class="max-w-md rounded-lg border border-gray-200">
                    @endif
                @else
                    <p class="text-lg text-gray-900">Chưa cập nhật</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

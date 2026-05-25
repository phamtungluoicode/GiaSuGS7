@extends('layouts.app')

@section('title', $teacher->name . ' - Chi tiết gia sư')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Back link --}}
    <div class="mb-6">
        <a href="{{ route('tutors.index') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700 transition-colors font-medium text-sm">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Quay lại danh sách
        </a>
    </div>

    {{-- Teacher Detail Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
        {{-- Top accent bar --}}
        <div class="h-1.5 bg-gradient-to-r from-primary-500 via-primary-600 to-accent-500"></div>
        <div class="p-6 md:p-8">
            <div class="flex flex-col md:flex-row gap-8">
                {{-- Avatar Section --}}
                <div class="flex-shrink-0 flex flex-col items-center">
                    @if($teacher->avatar)
                        <img src="{{ Str::startsWith($teacher->avatar, ['http://', 'https://']) ? $teacher->avatar : asset('storage/' . $teacher->avatar) }}" alt="{{ $teacher->name }}"
                             class="w-36 h-36 rounded-2xl object-cover border-3 border-primary-100 shadow-lg">
                    @else
                        <div class="w-36 h-36 rounded-2xl bg-gradient-to-br from-primary-100 to-primary-50 flex items-center justify-center shadow-lg">
                            <span class="text-5xl font-bold text-primary-600">{{ mb_substr($teacher->name, 0, 1) }}</span>
                        </div>
                    @endif

                    {{-- Average Rating --}}
                    <div class="mt-4 flex items-center">
                        @php
                            $avg = $averageRating ? round($averageRating, 1) : 0;
                        @endphp
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($avg))
                                <svg class="w-5 h-5 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @else
                                <svg class="w-5 h-5 text-stone-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endif
                        @endfor
                        <span class="ml-2 text-sm font-medium text-stone-600">{{ $avg > 0 ? $avg . '/5' : 'Chưa có đánh giá' }}</span>
                    </div>

                    {{-- Action Buttons --}}
                    @auth
                        @if(Auth::user()->role == 'user')
                            <div class="mt-4 flex flex-col gap-2 w-full">
                                <a href="{{ route('user.hire.form', $teacher->id) }}"
                                   class="inline-flex items-center justify-center px-6 py-2.5 bg-primary-600 text-white font-medium rounded-xl hover:bg-primary-700 transition-all duration-200 shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Thuê gia sư
                                </a>
                                <a href="{{ route('user.feedback.create', $teacher->id) }}"
                                   class="inline-flex items-center justify-center px-6 py-2.5 bg-accent-500 text-white font-medium rounded-xl hover:bg-accent-600 transition-all duration-200 shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                    Đánh giá
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>

                {{-- Detail Info --}}
                <div class="flex-grow">
                    <h1 class="text-2xl font-bold font-heading text-stone-900 mb-4">{{ $teacher->name }}</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @if(isset($hasConfirmedConnection) && $hasConfirmedConnection)
                        <div class="p-3 rounded-xl bg-stone-50/50">
                            <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-1">Email</p>
                            <p class="text-stone-800 text-sm">{{ $teacher->email }}</p>
                        </div>
                        @endif

                        <div class="p-3 rounded-xl bg-stone-50/50">
                            <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-1">Kinh nghiệm</p>
                            <p class="text-stone-800 text-sm">{{ $teacher->exp ?? 'Chưa cập nhật' }}</p>
                        </div>

                        <div class="p-3 rounded-xl bg-stone-50/50">
                            <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-1">Trình độ học vấn</p>
                            <p class="text-stone-800 text-sm">{{ $teacher->education_level ?? 'Chưa cập nhật' }}</p>
                        </div>

                        <div class="p-3 rounded-xl bg-stone-50/50">
                            <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-1">Môn học</p>
                            <p class="text-stone-800 text-sm">
                                @if($teacher->subjects->count() > 0)
                                    {{ $teacher->subjects->pluck('name')->join(', ') }}
                                @else
                                    Chưa cập nhật
                                @endif
                            </p>
                        </div>

                        <div class="p-3 rounded-xl bg-stone-50/50">
                            <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-1">Khối lớp</p>
                            <p class="text-stone-800 text-sm">
                                @if($teacher->classLevels->count() > 0)
                                    {{ $teacher->classLevels->pluck('class')->join(', ') }}
                                @else
                                    Chưa cập nhật
                                @endif
                            </p>
                        </div>

                        <div class="p-3 rounded-xl bg-stone-50/50">
                            <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-1">Ca học</p>
                            <p class="text-stone-800 text-sm">
                                @php
                                    $timeSlot = \App\Models\TimeSlot::find($teacher->time_tutor_id);
                                @endphp
                                {{ $timeSlot->name ?? 'Chưa cập nhật' }}
                            </p>
                        </div>

                        <div class="p-3 rounded-xl bg-stone-50/50">
                            <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-1">Quận / Huyện</p>
                            <p class="text-stone-800 text-sm">{{ $teacher->district->name ?? 'Chưa cập nhật' }}</p>
                        </div>

                        <div class="p-3 rounded-xl bg-stone-50/50">
                            <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-1">Mức lương</p>
                            <p class="text-stone-800 text-sm">
                                @php
                                    $salary = \App\Models\RankSalary::find($teacher->salary_id);
                                @endphp
                                {{ $salary->name ?? 'Chưa cập nhật' }}
                            </p>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="mt-6 p-4 rounded-xl bg-primary-50/30 border border-primary-100/50">
                        <p class="text-xs font-medium text-stone-400 uppercase tracking-wider mb-2">Mô tả</p>
                        <p class="text-stone-700 leading-relaxed text-sm">{{ $teacher->description ?? 'Chưa có mô tả.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Feedback Section --}}
    <div class="mt-8">
        <h2 class="text-xl font-bold font-heading text-stone-900 mb-4">Đánh giá từ học viên ({{ $feedbacks->count() }})</h2>

        @if($feedbacks->count() > 0)
            <div class="space-y-4">
                @foreach($feedbacks as $feedback)
                    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-100 to-primary-50 flex items-center justify-center flex-shrink-0">
                                    <span class="text-sm font-semibold text-primary-600">{{ mb_substr($feedback->sender->name ?? 'A', 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="font-medium text-stone-900 text-sm">{{ $feedback->sender->name ?? 'Ẩn danh' }}</p>
                                    <div class="flex items-center mt-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $feedback->point)
                                                <svg class="w-3.5 h-3.5 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @else
                                                <svg class="w-3.5 h-3.5 text-stone-200" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs text-stone-400 font-medium">{{ $feedback->created_at->format('d/m/Y') }}</span>
                        </div>
                        <p class="mt-3 text-stone-600 leading-relaxed text-sm pl-13">{{ $feedback->description }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-8 text-center">
                <p class="text-stone-500">Chưa có đánh giá nào.</p>
            </div>
        @endif
    </div>
</div>
@endsection

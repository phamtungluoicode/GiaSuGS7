@extends('layouts.app')

@section('title', 'Tìm kiếm gia sư - GS7')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold font-heading text-stone-900">Tìm kiếm gia sư</h1>
        <p class="text-stone-500 mt-1">Tìm thấy <span class="font-semibold text-primary-600">{{ $teachers->total() }}</span> gia sư</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        {{-- Left Sidebar: Filter --}}
        <div class="w-full lg:w-80 flex-shrink-0">
            <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-6 sticky top-24">
                <h2 class="text-lg font-semibold font-heading text-stone-900 mb-4">Bộ lọc tìm kiếm</h2>

                <form method="GET" action="{{ route('tutors.search') }}">
                    {{-- Môn học --}}
                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-stone-600 mb-1.5">Môn học</label>
                        <select name="subject" id="subject"
                                class="w-full border border-stone-200 rounded-xl px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm bg-stone-50/50 hover:border-stone-300 transition-colors">
                            <option value="">-- Tất cả --</option>
                            @foreach($subjects as $subj)
                                <option value="{{ $subj->id }}" {{ request('subject') == $subj->id ? 'selected' : '' }}>{{ $subj->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Khối lớp --}}
                    <div class="mb-4">
                        <label for="class_id" class="block text-sm font-medium text-stone-600 mb-1.5">Khối lớp</label>
                        <select name="class_id" id="class_id"
                                class="w-full border border-stone-200 rounded-xl px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm bg-stone-50/50 hover:border-stone-300 transition-colors">
                            <option value="">-- Tất cả --</option>
                            @foreach($classLevels as $cl)
                                <option value="{{ $cl->id }}" {{ request('class_id') == $cl->id ? 'selected' : '' }}>{{ $cl->class }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Quận / Huyện --}}
                    <div class="mb-4">
                        <label for="DistrictID" class="block text-sm font-medium text-stone-600 mb-1.5">Quận / Huyện</label>
                        <select name="DistrictID" id="DistrictID"
                                class="w-full border border-stone-200 rounded-xl px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm bg-stone-50/50 hover:border-stone-300 transition-colors">
                            <option value="">-- Tất cả --</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ request('DistrictID') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Ca học --}}
                    <div class="mb-4">
                        <label for="time_tutor_id" class="block text-sm font-medium text-stone-600 mb-1.5">Ca học</label>
                        <select name="time_tutor_id" id="time_tutor_id"
                                class="w-full border border-stone-200 rounded-xl px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm bg-stone-50/50 hover:border-stone-300 transition-colors">
                            <option value="">-- Tất cả --</option>
                            @foreach($timeSlots as $slot)
                                <option value="{{ $slot->id }}" {{ request('time_tutor_id') == $slot->id ? 'selected' : '' }}>{{ $slot->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Mức lương --}}
                    <div class="mb-4">
                        <label for="salary_id" class="block text-sm font-medium text-stone-600 mb-1.5">Mức lương</label>
                        <select name="salary_id" id="salary_id"
                                class="w-full border border-stone-200 rounded-xl px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm bg-stone-50/50 hover:border-stone-300 transition-colors">
                            <option value="">-- Tất cả --</option>
                            @foreach($rankSalaries as $salary)
                                <option value="{{ $salary->id }}" {{ request('salary_id') == $salary->id ? 'selected' : '' }}>{{ $salary->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Từ khóa --}}
                    <div class="mb-5">
                        <label for="search" class="block text-sm font-medium text-stone-600 mb-1.5">Từ khóa</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                               placeholder="Nhập tên, mô tả..."
                               class="w-full border border-stone-200 rounded-xl px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm bg-stone-50/50 hover:border-stone-300 transition-colors">
                    </div>

                    <button type="submit"
                            class="w-full bg-gradient-to-r from-primary-600 to-primary-700 text-white px-4 py-2.5 rounded-xl hover:from-primary-700 hover:to-primary-800 transition-all duration-300 font-medium text-sm shadow-md shadow-primary-200/50 hover:shadow-lg">
                        Tìm kiếm
                    </button>

                    @if(request()->hasAny(['subject', 'class_id', 'DistrictID', 'time_tutor_id', 'salary_id', 'search']))
                        <a href="{{ route('tutors.index') }}"
                           class="block text-center mt-2.5 text-sm text-stone-500 hover:text-primary-600 transition-colors">
                            Xóa bộ lọc
                        </a>
                    @endif
                </form>
            </div>
        </div>

        {{-- Right Content: Tutor Cards --}}
        <div class="flex-grow">
            @if($teachers->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($teachers as $teacher)
                        <div class="bg-white rounded-2xl shadow-sm border border-stone-100 hover:shadow-lg hover:shadow-primary-100/30 hover:border-primary-100 transition-all duration-300 overflow-hidden group hover:-translate-y-0.5">
                            {{-- Colored top bar --}}
                            <div class="h-1 bg-gradient-to-r from-primary-500 to-primary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="p-6">
                                {{-- Avatar --}}
                                <div class="flex justify-center mb-4">
                                    @if($teacher->avatar)
                                        <img src="{{ Str::startsWith($teacher->avatar, ['http://', 'https://']) ? $teacher->avatar : asset('storage/' . $teacher->avatar) }}" alt="{{ $teacher->name }}"
                                             class="w-20 h-20 rounded-2xl object-cover border-2 border-primary-100 group-hover:border-primary-200 transition-colors">
                                    @else
                                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-primary-100 to-primary-50 flex items-center justify-center">
                                            <span class="text-2xl font-bold text-primary-600">{{ mb_substr($teacher->name, 0, 1) }}</span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Name --}}
                                <h3 class="text-lg font-semibold text-stone-900 text-center mb-2">{{ $teacher->name }}</h3>

                                {{-- Subject --}}
                                <div class="text-center mb-2 flex flex-wrap justify-center gap-1">
                                    @if($teacher->subjects->count() > 0)
                                        @foreach($teacher->subjects as $subj)
                                            <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full bg-primary-50 text-primary-700 border border-primary-100">{{ $subj->name }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                {{-- Rating --}}
                                <div class="flex items-center justify-center mb-3">
                                    @php
                                        $avgRating = \App\Models\Feedback::where('id_teacher', $teacher->id)->avg('point');
                                        $avgRating = $avgRating ? round($avgRating, 1) : 0;
                                        $ratingCount = \App\Models\Feedback::where('id_teacher', $teacher->id)->count();
                                    @endphp
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($avgRating))
                                                <svg class="w-4 h-4 text-accent-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @else
                                                <svg class="w-4 h-4 text-stone-200" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                        <span class="ml-1.5 text-sm text-stone-500">({{ $ratingCount }})</span>
                                    </div>
                                </div>

                                {{-- Salary --}}
                                <div class="text-center mb-4">
                                    @php
                                        $salaryModel = \App\Models\RankSalary::find($teacher->salary_id);
                                    @endphp
                                    <span class="text-sm text-stone-500">{{ $salaryModel->name ?? 'Chưa cập nhật' }}</span>
                                </div>

                                {{-- Action --}}
                                <div class="text-center">
                                    <a href="{{ route('tutors.show', $teacher->id) }}"
                                       class="inline-flex items-center px-5 py-2 bg-primary-600 text-white text-sm font-medium rounded-xl hover:bg-primary-700 transition-all duration-200 shadow-sm hover:shadow-md">
                                        Xem chi tiết
                                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $teachers->links() }}
                </div>
            @else
                <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-12 text-center">
                    <svg class="w-16 h-16 text-stone-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <h3 class="text-lg font-medium font-heading text-stone-900 mb-2">Không tìm thấy gia sư</h3>
                    <p class="text-stone-500">Vui lòng thử lại với bộ lọc khác.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

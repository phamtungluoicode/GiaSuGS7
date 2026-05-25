@extends('layouts.app')

@section('title', 'Thuê gia sư - ' . $teacher->name)

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <a href="{{ route('tutors.show', $teacher->id) }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 transition">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Quay lại
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6 md:p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Thuê gia sư</h1>

        {{-- Teacher Info --}}
        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-200">
            @if($teacher->avatar)
                <img src="{{ Str::startsWith($teacher->avatar, ['http://', 'https://']) ? $teacher->avatar : asset('storage/' . $teacher->avatar) }}" alt="{{ $teacher->name }}"
                     class="w-16 h-16 rounded-full object-cover border-2 border-indigo-200">
            @else
                <div class="w-16 h-16 rounded-full bg-indigo-100 flex items-center justify-center">
                    <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            @endif
            <div>
                <h2 class="text-lg font-semibold text-gray-900">{{ $teacher->name }}</h2>
                <p class="text-sm text-gray-500">Gia sư</p>
            </div>
        </div>

        {{-- Price Info --}}
        <div class="bg-indigo-50 rounded-lg p-4 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Chi phí thuê</p>
                    <p class="text-2xl font-bold text-indigo-600">100 coin</p>
                </div>
                <div class="text-right">
                    <p class="text-sm font-medium text-gray-600">Số dư hiện tại</p>
                    <p class="text-2xl font-bold {{ Auth::user()->coin >= 100 ? 'text-green-600' : 'text-red-600' }}">
                        {{ number_format(Auth::user()->coin ?? 0) }} coin
                    </p>
                </div>
            </div>
            @if(Auth::user()->coin < 100)
                <div class="mt-3 p-3 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm text-red-700">Số dư không đủ. Vui lòng <a href="/payment/deposit" class="font-medium underline">nạp thêm coin</a> trước khi thuê.</p>
                </div>
            @endif
        </div>

        {{-- Hire Form --}}
        <form method="POST" action="{{ route('user.hire', $teacher->id) }}">
            @csrf

            {{-- Subject --}}
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Môn học <span class="text-red-500">*</span></label>
                @if($teacher->subjects->count() > 0)
                    @if($teacher->subjects->count() == 1)
                        <input type="hidden" name="subject" value="{{ $teacher->subjects->first()->id }}">
                        <input type="text" value="{{ $teacher->subjects->first()->name }}" disabled
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-gray-700">
                    @else
                        <select name="subject" id="subject" required
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">-- Chọn môn học --</option>
                            @foreach($teacher->subjects as $subj)
                                <option value="{{ $subj->id }}" {{ old('subject') == $subj->id ? 'selected' : '' }}>{{ $subj->name }}</option>
                            @endforeach
                        </select>
                    @endif
                @else
                    <input type="text" value="Chưa cập nhật" disabled
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-gray-500">
                @endif
                @error('subject')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Class --}}
            <div class="mb-4">
                <label for="class" class="block text-sm font-medium text-gray-700 mb-1">Khối lớp <span class="text-red-500">*</span></label>
                @if($teacher->classLevels->count() > 0)
                    @if($teacher->classLevels->count() == 1)
                        <input type="hidden" name="class" value="{{ $teacher->classLevels->first()->id }}">
                        <input type="text" value="{{ $teacher->classLevels->first()->class }}" disabled
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-gray-700">
                    @else
                        <select name="class" id="class" required
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">-- Chọn khối lớp --</option>
                            @foreach($teacher->classLevels as $cl)
                                <option value="{{ $cl->id }}" {{ old('class') == $cl->id ? 'selected' : '' }}>{{ $cl->class }}</option>
                            @endforeach
                        </select>
                    @endif
                @else
                    <input type="text" value="Chưa cập nhật" disabled
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-gray-500">
                @endif
                @error('class')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Mô tả yêu cầu</label>
                <textarea name="description" id="description" rows="4"
                          placeholder="Mô tả yêu cầu của bạn..."
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Terms --}}
            <div class="mb-6">
                <label class="flex items-start gap-2">
                    <input type="checkbox" required
                           class="mt-1 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="text-sm text-gray-600">Tôi đồng ý với <a href="{{ route('terms') }}" target="_blank" class="text-indigo-600 hover:underline">điều khoản sử dụng</a> của hệ thống. Chi phí 100 coin sẽ được trừ từ tài khoản của bạn.</span>
                </label>
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition font-medium text-lg">
                Thuê gia sư
            </button>
        </form>
    </div>
</div>
@endsection

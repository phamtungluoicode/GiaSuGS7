@extends('layouts.admin')

@section('title', 'Sửa khối lớp - Admin')
@section('header', 'Cập nhật khối lớp')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.class-levels.update', $classLevel->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="class" class="block text-sm font-medium text-gray-700 mb-1">Khối lớp</label>
                <input type="text" name="class" id="class" value="{{ old('class', $classLevel->class) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('class') border-red-500 @enderror">
                @error('class')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex items-center gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                    Cập nhật
                </button>
                <a href="{{ route('admin.class-levels.index') }}" class="text-gray-600 hover:text-gray-800 transition">Hủy</a>
            </div>
        </form>
    </div>
</div>
@endsection

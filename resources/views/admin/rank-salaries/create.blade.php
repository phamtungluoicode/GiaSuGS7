@extends('layouts.admin')

@section('title', 'Thêm mức lương - Admin')
@section('header', 'Thêm mức lương mới')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.rank-salaries.store') }}">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Mức lương</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex items-center gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                    Tạo mức lương
                </button>
                <a href="{{ route('admin.rank-salaries.index') }}" class="text-gray-600 hover:text-gray-800 transition">Hủy</a>
            </div>
        </form>
    </div>
</div>
@endsection

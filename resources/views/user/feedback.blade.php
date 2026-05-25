@extends('layouts.app')

@section('title', 'Đánh giá gia sư - ' . $teacher->name)

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
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Đánh giá gia sư</h1>

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

        {{-- Feedback Form --}}
        <form method="POST" action="{{ route('user.feedback.store', $teacher->id) }}">
            @csrf

            {{-- Rating Stars --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-3">Điểm đánh giá <span class="text-red-500">*</span></label>
                <div class="flex items-center gap-1" id="star-rating">
                    @for($i = 1; $i <= 5; $i++)
                        <label class="cursor-pointer">
                            <input type="radio" name="point" value="{{ $i }}" class="sr-only peer" {{ old('point') == $i ? 'checked' : '' }}>
                            <svg class="w-10 h-10 text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-400 transition star-icon"
                                 fill="currentColor" viewBox="0 0 20 20" data-value="{{ $i }}">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </label>
                    @endfor
                    <span class="ml-3 text-sm text-gray-500" id="rating-text">Chọn điểm đánh giá</span>
                </div>
                @error('point')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Nhận xét <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="5"
                          placeholder="Chia sẻ trải nghiệm của bạn với gia sư này..."
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition font-medium text-lg">
                Gửi đánh giá
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-icon');
        const radios = document.querySelectorAll('input[name="point"]');
        const ratingText = document.getElementById('rating-text');
        const labels = ['', 'Rất tệ', 'Tệ', 'Bình thường', 'Tốt', 'Rất tốt'];

        stars.forEach(function(star) {
            star.addEventListener('click', function() {
                const value = parseInt(this.getAttribute('data-value'));
                stars.forEach(function(s, index) {
                    if (index < value) {
                        s.classList.remove('text-gray-300');
                        s.classList.add('text-yellow-400');
                    } else {
                        s.classList.remove('text-yellow-400');
                        s.classList.add('text-gray-300');
                    }
                });
                radios[value - 1].checked = true;
                ratingText.textContent = value + '/5 - ' + labels[value];
            });

            star.addEventListener('mouseenter', function() {
                const value = parseInt(this.getAttribute('data-value'));
                stars.forEach(function(s, index) {
                    if (index < value) {
                        s.classList.remove('text-gray-300');
                        s.classList.add('text-yellow-400');
                    } else {
                        s.classList.remove('text-yellow-400');
                        s.classList.add('text-gray-300');
                    }
                });
            });
        });

        document.getElementById('star-rating').addEventListener('mouseleave', function() {
            const checked = document.querySelector('input[name="point"]:checked');
            const checkedValue = checked ? parseInt(checked.value) : 0;
            stars.forEach(function(s, index) {
                if (index < checkedValue) {
                    s.classList.remove('text-gray-300');
                    s.classList.add('text-yellow-400');
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-300');
                }
            });
        });
    });
</script>
@endpush

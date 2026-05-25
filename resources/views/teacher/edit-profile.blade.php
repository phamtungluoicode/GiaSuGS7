@extends('layouts.app')

@section('title', 'Sửa thông tin - Gia sư')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Cập nhật thông tin cá nhân</h1>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('teacher.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Avatar hiện tại --}}
                <div class="md:col-span-2 flex justify-center">
                    @if($user->avatar)
                        <img src="{{ Str::startsWith($user->avatar, ['http://', 'https://']) ? $user->avatar : asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-24 h-24 rounded-full object-cover border-4 border-indigo-200">
                    @else
                        <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                {{-- Avatar upload --}}
                <div>
                    <label for="avatar" class="block text-sm font-medium text-gray-700 mb-1">Ảnh đại diện</label>
                    <input type="file" name="avatar" id="avatar" accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('avatar') border-red-500 @enderror">
                    @error('avatar')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Certificate upload --}}
                <div>
                    <label for="Certificate" class="block text-sm font-medium text-gray-700 mb-1">Chứng chỉ</label>
                    @if($user->Certificate)
                        <div class="mb-2">
                            @if(Str::endsWith($user->Certificate, '.pdf'))
                                <a href="{{ asset('storage/' . $user->Certificate) }}" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                    Xem chứng chỉ (PDF)
                                </a>
                            @else
                                <img src="{{ asset('storage/' . $user->Certificate) }}" alt="Chứng chỉ hiện tại" class="h-20 rounded border border-gray-200">
                            @endif
                        </div>
                    @endif
                    <input type="file" name="Certificate" id="Certificate"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('Certificate') border-red-500 @enderror">
                    @error('Certificate')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Họ tên --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ tên</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Số điện thoại --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('phone') border-red-500 @enderror">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Giới tính --}}
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Giới tính</label>
                    <select name="gender" id="gender"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('gender') border-red-500 @enderror">
                        <option value="">-- Chọn giới tính --</option>
                        <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Nam</option>
                        <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Nữ</option>
                    </select>
                    @error('gender')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Ngày sinh --}}
                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">Ngày sinh</label>
                    <input type="date" name="date_of_birth" id="date_of_birth"
                           value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : '') }}"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('date_of_birth') border-red-500 @enderror">
                    @error('date_of_birth')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Địa chỉ --}}
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                    <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('address') border-red-500 @enderror">
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Trình độ học vấn --}}
                <div>
                    <label for="education_level" class="block text-sm font-medium text-gray-700 mb-1">Trình độ học vấn</label>
                    <input type="text" name="education_level" id="education_level" value="{{ old('education_level', $user->education_level) }}"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('education_level') border-red-500 @enderror">
                    @error('education_level')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Trường học --}}
                <div>
                    <label for="school_id" class="block text-sm font-medium text-gray-700 mb-1">Trường học</label>
                    <select name="school_id" id="school_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('school_id') border-red-500 @enderror">
                        <option value="">-- Chọn trường --</option>
                        @foreach($schools as $school)
                            <option value="{{ $school->id }}" {{ old('school_id', $user->school_id) == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                        @endforeach
                    </select>
                    @error('school_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kinh nghiệm --}}
                <div>
                    <label for="exp" class="block text-sm font-medium text-gray-700 mb-1">Kinh nghiệm</label>
                    <input type="text" name="exp" id="exp" value="{{ old('exp', $user->exp) }}"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('exp') border-red-500 @enderror">
                    @error('exp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Quận/Huyện --}}
                <div>
                    <label for="DistrictID" class="block text-sm font-medium text-gray-700 mb-1">Quận / Huyện</label>
                    <select name="DistrictID" id="DistrictID"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('DistrictID') border-red-500 @enderror">
                        <option value="">-- Chọn quận/huyện --</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}" {{ old('DistrictID', $user->DistrictID) == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                        @endforeach
                    </select>
                    @error('DistrictID')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Mức lương --}}
                <div>
                    <label for="salary_id" class="block text-sm font-medium text-gray-700 mb-1">Mức lương</label>
                    <select name="salary_id" id="salary_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('salary_id') border-red-500 @enderror">
                        <option value="">-- Chọn mức lương --</option>
                        @foreach($rankSalaries as $salary)
                            <option value="{{ $salary->id }}" {{ old('salary_id', $user->salary_id) == $salary->id ? 'selected' : '' }}>{{ $salary->name }}</option>
                        @endforeach
                    </select>
                    @error('salary_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Môn học (chọn nhiều) --}}
                <div>
                    <label for="subjects" class="block text-sm font-medium text-gray-700 mb-1">Môn học <span class="text-xs text-gray-400">(giữ Ctrl để chọn nhiều)</span></label>
                    <select name="subjects[]" id="subjects" multiple size="4"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('subjects') border-red-500 @enderror">
                        @php $selectedSubjects = old('subjects', $user->subjects->pluck('id')->toArray()); @endphp
                        @foreach($subjects as $subj)
                            <option value="{{ $subj->id }}" {{ in_array($subj->id, $selectedSubjects) ? 'selected' : '' }}>{{ $subj->name }}</option>
                        @endforeach
                    </select>
                    @error('subjects')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Khối lớp (chọn nhiều) --}}
                <div>
                    <label for="class_ids" class="block text-sm font-medium text-gray-700 mb-1">Khối lớp <span class="text-xs text-gray-400">(giữ Ctrl để chọn nhiều)</span></label>
                    <select name="class_ids[]" id="class_ids" multiple size="4"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('class_ids') border-red-500 @enderror">
                        @php $selectedClasses = old('class_ids', $user->classLevels->pluck('id')->toArray()); @endphp
                        @foreach($classLevels as $classLevel)
                            <option value="{{ $classLevel->id }}" {{ in_array($classLevel->id, $selectedClasses) ? 'selected' : '' }}>{{ $classLevel->class }}</option>
                        @endforeach
                    </select>
                    @error('class_ids')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Ca học --}}
                <div>
                    <label for="time_tutor_id" class="block text-sm font-medium text-gray-700 mb-1">Ca học</label>
                    <select name="time_tutor_id" id="time_tutor_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('time_tutor_id') border-red-500 @enderror">
                        <option value="">-- Chọn ca học --</option>
                        @foreach($timeSlots as $slot)
                            <option value="{{ $slot->id }}" {{ old('time_tutor_id', $user->time_tutor_id) == $slot->id ? 'selected' : '' }}>{{ $slot->name }}</option>
                        @endforeach
                    </select>
                    @error('time_tutor_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Mô tả --}}
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Mô tả bản thân</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description', $user->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex items-center gap-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                    Cập nhật thông tin
                </button>
                <a href="{{ route('teacher.profile') }}" class="text-gray-600 hover:text-gray-800 transition">Hủy</a>
            </div>
        </form>
    </div>
</div>
@endsection

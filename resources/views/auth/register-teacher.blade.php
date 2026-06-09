@extends('layouts.guest')

@section('title', 'Đăng ký gia sư - GS7')
@section('container-width', 'max-w-3xl')

@section('content')
<div class="bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Đăng ký gia sư</h2>

    <form method="POST" action="{{ route('register.teacher.submit') }}" enctype="multipart/form-data">
        @csrf

        {{-- ===== THONG TIN CA NHAN ===== --}}
        <h3 class="text-lg font-semibold text-gray-700 mb-4 border-b border-gray-200 pb-2">Thông tin cá nhân</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="Nguyễn Văn A">
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="email@example.com">
                @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>

                <div class="relative">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 pr-14 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder="Tối thiểu 6 ký tự">

                    <button
                        type="button"
                        onclick="togglePassword('password', this)"
                        class="absolute inset-y-0 right-3 flex items-center text-sm text-gray-500 hover:text-indigo-600">
                        Hiện
                    </button>
                </div>

                @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Confirmation --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Xác nhận mật khẩu</label>

                <div class="relative">
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 pr-14 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder="Nhập lại mật khẩu">

                    <button
                        type="button"
                        onclick="togglePassword('password_confirmation', this)"
                        class="absolute inset-y-0 right-3 flex items-center text-sm text-gray-500 hover:text-indigo-600">
                        Hiện
                    </button>
                </div>
            </div>

            {{-- Phone --}}
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="0912345678">
                @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gender --}}
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Giới tính</label>
                <select
                    id="gender"
                    name="gender"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition bg-white">
                    <option value="">-- Chọn giới tính --</option>
                    <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                    <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                </select>
                @error('gender')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Date of Birth --}}
            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">Ngày sinh</label>
                <input
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    value="{{ old('date_of_birth') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                @error('date_of_birth')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address --}}
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                <input
                    type="text"
                    id="address"
                    name="address"
                    value="{{ old('address') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="Nhập địa chỉ">
                @error('address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- ===== THONG TIN GIA SU ===== --}}
        <h3 class="text-lg font-semibold text-gray-700 mb-4 mt-6 border-b border-gray-200 pb-2">Thông tin gia sư</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Citizen Card --}}
            <div>
                <label for="Citizen_card" class="block text-sm font-medium text-gray-700 mb-1">Số CCCD / CMND</label>
                <input
                    type="text"
                    id="Citizen_card"
                    name="Citizen_card"
                    value="{{ old('Citizen_card') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="Nhập số CCCD">
                @error('Citizen_card')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Education Level --}}
            <div>
                <label for="education_level" class="block text-sm font-medium text-gray-700 mb-1">Trình độ học vấn</label>
                <input
                    type="text"
                    id="education_level"
                    name="education_level"
                    value="{{ old('education_level') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="VD: Đại học, Thạc sĩ, Tiến sĩ">
                @error('education_level')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- School --}}
            <div>
                <label for="school_id" class="block text-sm font-medium text-gray-700 mb-1">Trường học</label>
                <select
                    id="school_id"
                    name="school_id"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition bg-white">
                    <option value="">-- Chọn trường --</option>
                    @foreach ($schools as $school)
                    <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>
                        {{ $school->name }}
                    </option>
                    @endforeach
                </select>
                @error('school_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Experience --}}
            <div>
                <label for="exp" class="block text-sm font-medium text-gray-700 mb-1">Kinh nghiệm</label>
                <input
                    type="text"
                    id="exp"
                    name="exp"
                    value="{{ old('exp') }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    placeholder="VD: 2 năm dạy kèm">
                @error('exp')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- District --}}
            <div>
                <label for="DistrictID" class="block text-sm font-medium text-gray-700 mb-1">Khu vực dạy</label>
                <select
                    id="DistrictID"
                    name="DistrictID"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition bg-white">
                    <option value="">-- Chọn quận/huyện --</option>
                    @foreach ($districts as $district)
                    <option value="{{ $district->id }}" {{ old('DistrictID') == $district->id ? 'selected' : '' }}>
                        {{ $district->name }}
                    </option>
                    @endforeach
                </select>
                @error('DistrictID')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Salary Range --}}
            <div>
                <label for="salary_id" class="block text-sm font-medium text-gray-700 mb-1">Mức lương mong muốn</label>
                <select
                    id="salary_id"
                    name="salary_id"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition bg-white">
                    <option value="">-- Chọn mức lương --</option>
                    @foreach ($rankSalaries as $salary)
                    <option value="{{ $salary->id }}" {{ old('salary_id') == $salary->id ? 'selected' : '' }}>
                        {{ $salary->name }}
                    </option>
                    @endforeach
                </select>
                @error('salary_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Subject (chọn nhiều) --}}
            <div>
                <label for="subjects" class="block text-sm font-medium text-gray-700 mb-1">Môn dạy <span class="text-xs text-gray-400">(giữ Ctrl để chọn nhiều)</span></label>
                <select
                    id="subjects"
                    name="subjects[]"
                    multiple
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition bg-white"
                    size="4">
                    @foreach ($subjects as $subj)
                    <option value="{{ $subj->id }}" {{ is_array(old('subjects')) && in_array($subj->id, old('subjects')) ? 'selected' : '' }}>
                        {{ $subj->name }}
                    </option>
                    @endforeach
                </select>
                @error('subjects')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @error('subjects.*')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Class Level (chọn nhiều) --}}
            <div>
                <label for="class_ids" class="block text-sm font-medium text-gray-700 mb-1">Lớp dạy <span class="text-xs text-gray-400">(giữ Ctrl để chọn nhiều)</span></label>
                <select
                    id="class_ids"
                    name="class_ids[]"
                    multiple
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition bg-white"
                    size="4">
                    @foreach ($classLevels as $classLevel)
                    <option value="{{ $classLevel->id }}" {{ is_array(old('class_ids')) && in_array($classLevel->id, old('class_ids')) ? 'selected' : '' }}>
                        {{ $classLevel->class }}
                    </option>
                    @endforeach
                </select>
                @error('class_ids')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @error('class_ids.*')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Time Slot --}}
            <div>
                <label for="time_tutor_id" class="block text-sm font-medium text-gray-700 mb-1">Thời gian dạy</label>
                <select
                    id="time_tutor_id"
                    name="time_tutor_id"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition bg-white">
                    <option value="">-- Chọn thời gian --</option>
                    @foreach ($timeSlots as $slot)
                    <option value="{{ $slot->id }}" {{ old('time_tutor_id') == $slot->id ? 'selected' : '' }}>
                        {{ $slot->name }}
                    </option>
                    @endforeach
                </select>
                @error('time_tutor_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Certificate Upload --}}
            <div>
                <label for="Certificate" class="block text-sm font-medium text-gray-700 mb-1">Bằng cấp / Chứng chỉ</label>
                <input
                    type="file"
                    id="Certificate"
                    name="Certificate"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition">
                @error('Certificate')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Description - full width --}}
        <div class="mt-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Giới thiệu bản thân</label>
            <textarea
                id="description"
                name="description"
                rows="3"
                class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition resize-y"
                placeholder="Mô tả ngắn về bản thân và phương pháp giảng dạy">{{ old('description') }}</textarea>
            @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit --}}
        <button
            type="submit"
            class="w-full mt-6 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-4 rounded-lg transition text-sm">
            Đăng ký gia sư
        </button>
    </form>

    {{-- Login Link --}}
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Đã có tài khoản?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-medium hover:underline">
                Đăng nhập
            </a>
        </p>
    </div>
</div>
<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);

        if (input.type === 'password') {
            input.type = 'text';
            button.textContent = 'Ẩn';
        } else {
            input.type = 'password';
            button.textContent = 'Hiện';
        }
    }
</script>
@endsection
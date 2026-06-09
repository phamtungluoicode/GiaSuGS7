<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassLevel;
use App\Models\District;
use App\Models\RankSalary;
use App\Models\School;
use App\Models\Subject;
use App\Models\TimeSlot;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\RegisterTeacherRequest;
use Illuminate\Http\Request;
use App\Mail\WelcomeRegistrationMail;
use App\Services\TelegramService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showRegisterUserForm()
    {
        return view('auth.register-user');
    }

    public function showRegisterTeacherForm()
    {
        $schools = School::all();
        $subjects = Subject::all();
        $classLevels = ClassLevel::all();
        $timeSlots = TimeSlot::all();
        $rankSalaries = RankSalary::all();
        $districts = District::all();

        return view('auth.register-teacher', compact(
            'schools', 'subjects', 'classLevels', 'timeSlots', 'rankSalaries', 'districts'
        ));
    }

    public function registerUser(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'role' => 'user',
            'status' => 1,
            'coin' => '0',
        ]);

        Mail::to($user->email)->send(new WelcomeRegistrationMail([
            'name' => $user->name,
            'email' => $user->email,
            'role' => 'user',
        ]));

        app(TelegramService::class)->notifyNewRegistration($user->name, $user->email, 'user', $user->phone);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng kiểm tra email và đăng nhập.');
    }

    public function registerTeacher(RegisterTeacherRequest $request)
    {
        $certificatePath = null;
        if ($request->hasFile('Certificate')) {
            $certificatePath = $request->file('Certificate')->store('uploads/certificates', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'role' => 'teacher',
            'status' => 0,
            'coin' => '0',
            'Citizen_card' => $request->Citizen_card,
            'education_level' => $request->education_level,
            'school_id' => $request->school_id,
            'exp' => $request->exp,
            'description' => $request->description,
            'DistrictID' => $request->DistrictID,
            'salary_id' => $request->salary_id,
            'time_tutor_id' => $request->time_tutor_id,
            'Certificate' => $certificatePath,
        ]);

        if ($request->subjects) {
            $user->subjects()->sync($request->subjects);
        }
        if ($request->class_ids) {
            $user->classLevels()->sync($request->class_ids);
        }

        Mail::to($user->email)->send(new WelcomeRegistrationMail([
            'name' => $user->name,
            'email' => $user->email,
            'role' => 'teacher',
        ]));

        app(TelegramService::class)->notifyNewRegistration($user->name, $user->email, 'teacher');

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng kiểm tra email. Tài khoản của bạn đang chờ duyệt.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'ctv') {
                return redirect()->route('ctv.dashboard');
            } elseif ($user->role === 'teacher') {
                return redirect()->route('teacher.profile');
            }

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function getGoogleSignInUrl()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                $user->update(['google_id' => $googleUser->getId()]);
            } else {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => Hash::make(uniqid()),
                    'role' => 'user',
                    'status' => 1,
                    'coin' => '0',
                ]);
            }
        }

        Auth::login($user);

        return redirect()->route('home');
    }
}

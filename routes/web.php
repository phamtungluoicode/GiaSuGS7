<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassLevelController;
use App\Http\Controllers\ConnectManageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactManageController;
use App\Http\Controllers\CTVManageController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\FeedbackManageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RankSalaryController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Liên hệ
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Điều khoản
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

// Auth - Đăng ký, Đăng nhập
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register/user', [AuthController::class, 'showRegisterUserForm'])->name('register.user');
    Route::post('/register/user', [AuthController::class, 'registerUser'])->name('register.user.submit');

    Route::get('/register/teacher', [AuthController::class, 'showRegisterTeacherForm'])->name('register.teacher');
    Route::post('/register/teacher', [AuthController::class, 'registerTeacher'])->name('register.teacher.submit');

    // Quên mật khẩu
    Route::get('/forgot-password', [ResetPasswordController::class, 'showForgotForm'])->name('password.forgot');
    Route::post('/forgot-password', [ResetPasswordController::class, 'sendMail'])->name('password.send');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');

    // Google OAuth
    Route::get('/auth/google', [AuthController::class, 'getGoogleSignInUrl'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'loginCallback'])->name('auth.google.callback');
});

// Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Đổi mật khẩu (cần đăng nhập)
Route::middleware('auth')->group(function () {
    Route::get('/change-password', [ResetPasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ResetPasswordController::class, 'changePassword'])->name('password.change.submit');
});

// Thanh toán (cần đăng nhập)
Route::middleware('auth')->prefix('payment')->name('payment.')->group(function () {
    Route::get('/deposit', [\App\Http\Controllers\TransactionController::class, 'showDepositForm'])->name('deposit.form');
    Route::post('/deposit', [\App\Http\Controllers\TransactionController::class, 'deposit'])->name('deposit');
    Route::get('/callback', [\App\Http\Controllers\TransactionController::class, 'depositCallback'])->name('callback');
    Route::get('/balance', [\App\Http\Controllers\TransactionController::class, 'balance'])->name('balance');
    Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'transactionHistory'])->name('transactions');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');

    // Quản lý gia sư
    Route::resource('teachers', TeacherController::class);

    // Quản lý người dùng
    Route::resource('users', UserController::class)->except(['show']);

    // Quản lý môn học
    Route::resource('subjects', SubjectController::class)->except(['show']);

    // Quản lý khối lớp
    Route::resource('class-levels', ClassLevelController::class)->except(['show']);

    // Quản lý ca học
    Route::resource('timeslots', TimeslotController::class)->except(['show']);

    // Quản lý mức lương
    Route::resource('rank-salaries', RankSalaryController::class)->except(['show']);

    // Phê duyệt gia sư
    Route::get('/approvals', [ApprovalController::class, 'index'])->name('approvals.index');
    Route::get('/approvals/{id}', [ApprovalController::class, 'show'])->name('approvals.show');
    Route::post('/approvals/{id}/approve', [ApprovalController::class, 'approve'])->name('approvals.approve');
    Route::post('/approvals/{id}/reject', [ApprovalController::class, 'reject'])->name('approvals.reject');

    // Quản lý CTV
    Route::resource('ctvs', CTVManageController::class)->except(['show']);

    // Quản lý công việc
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

    // Quản lý nhận xét
    Route::get('/feedbacks', [FeedbackManageController::class, 'index'])->name('feedbacks.index');
    Route::delete('/feedbacks/{id}', [FeedbackManageController::class, 'destroy'])->name('feedbacks.destroy');

    // Quản lý kết nối
    Route::get('/connects', [ConnectManageController::class, 'index'])->name('connects.index');

    // Quản lý liên hệ
    Route::get('/contacts', [ContactManageController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{id}', [ContactManageController::class, 'destroy'])->name('contacts.destroy');
});

// Tìm kiếm gia sư
Route::get('/tutors', [\App\Http\Controllers\SearchController::class, 'index'])->name('tutors.index');
Route::get('/tutors/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('tutors.search');
Route::get('/tutors/{id}', [\App\Http\Controllers\SearchController::class, 'show'])->name('tutors.show');

// User routes
Route::middleware(['auth', 'role.user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [\App\Http\Controllers\User\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('profile.update');

    Route::get('/history', [\App\Http\Controllers\User\HistoryController::class, 'index'])->name('history');
    Route::get('/history/{id}', [\App\Http\Controllers\User\HistoryController::class, 'show'])->name('history.show');

    Route::get('/connects', [\App\Http\Controllers\User\ConnectController::class, 'index'])->name('connects.index');
    Route::post('/connects/{id}/confirm', [\App\Http\Controllers\User\ConnectController::class, 'confirm'])->name('connects.confirm');
    Route::post('/connects/{id}/deny', [\App\Http\Controllers\User\ConnectController::class, 'deny'])->name('connects.deny');
});

// Thuê gia sư (cần đăng nhập và là user)
Route::middleware(['auth', 'role.user'])->group(function () {
    Route::get('/hire/{teacherId}', [\App\Http\Controllers\User\HireController::class, 'showHireForm'])->name('user.hire.form');
    Route::post('/hire/{teacherId}', [\App\Http\Controllers\User\HireController::class, 'hire'])->name('user.hire');

    Route::get('/feedback/{teacherId}', [\App\Http\Controllers\User\FeedbackController::class, 'create'])->name('user.feedback.create');
    Route::post('/feedback/{teacherId}', [\App\Http\Controllers\User\FeedbackController::class, 'store'])->name('user.feedback.store');
});

// CTV routes
Route::middleware(['auth', 'ctv'])->prefix('ctv')->name('ctv.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CTV\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/approvals', [\App\Http\Controllers\CTV\ApprovalController::class, 'index'])->name('approvals.index');
    Route::get('/approvals/{id}', [\App\Http\Controllers\CTV\ApprovalController::class, 'show'])->name('approvals.show');
    Route::post('/approvals/{id}/approve', [\App\Http\Controllers\CTV\ApprovalController::class, 'approve'])->name('approvals.approve');
    Route::post('/approvals/{id}/reject', [\App\Http\Controllers\CTV\ApprovalController::class, 'reject'])->name('approvals.reject');
});

// Teacher routes
Route::middleware(['auth', 'teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\Teacher\ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [\App\Http\Controllers\Teacher\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\Teacher\ProfileController::class, 'update'])->name('profile.update');

    Route::get('/jobs', [\App\Http\Controllers\Teacher\JobHistoryController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [\App\Http\Controllers\Teacher\JobHistoryController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{id}/accept', [\App\Http\Controllers\Teacher\JobHistoryController::class, 'accept'])->name('jobs.accept');
    Route::post('/jobs/{id}/reject', [\App\Http\Controllers\Teacher\JobHistoryController::class, 'reject'])->name('jobs.reject');

    Route::get('/connects', [\App\Http\Controllers\Teacher\ConnectController::class, 'index'])->name('connects.index');
    Route::post('/connects/{id}/confirm', [\App\Http\Controllers\Teacher\ConnectController::class, 'confirm'])->name('connects.confirm');

    Route::get('/feedbacks', [\App\Http\Controllers\Teacher\FeedbackViewController::class, 'index'])->name('feedbacks.index');
});

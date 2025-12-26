<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController\AboutAdminController;
use App\Http\Controllers\AdminController\AdminLoginController;
use App\Http\Controllers\AdminController\ContactInfoController;
use App\Http\Controllers\AdminController\ContactMessageController;
use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\AdminController\DiagnosisLogController;
use App\Http\Controllers\AdminController\DiagnosisReportController;
use App\Http\Controllers\AdminController\DoctorAdminController;
use App\Http\Controllers\AdminController\MissionController;
use App\Http\Controllers\AdminController\ProcessController;
use App\Http\Controllers\AdminController\RoleController;
use App\Http\Controllers\AdminController\SettingController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\AdminController\ValueController;
use App\Http\Controllers\AdminController\WorkController;
use App\Http\Controllers\AdminController\PatientsController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ================================
//        Admin Auth Routes (بدون صلاحيات)
// ================================
Route::get('/login-admin', [AdminLoginController::class, 'index'])->name('admin-login');
Route::post('/login-admin', [AdminLoginController::class, 'login'])->name('admin-login.submit');

Route::post('/logout-admin', function () {
    Auth::logout();
    return redirect()->route('admin-login');
})->name('admin.logout');

// ================================
//        Admin Panel Routes
// ================================
Route::middleware(['is_admin'])->group(function () {

    // Dashboard & Settings
    Route::get('panel', [DashboardController::class, 'index'])->middleware('permission:dashboard')->name('dashboard');

    Route::get('setting', [SettingController::class, 'index'])->middleware('permission:setting')->name('setting');

    // Roles
    Route::get('/roles', [RoleController::class, 'index'])->middleware('permission:roles.index')->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->middleware('permission:roles.create')->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->middleware('permission:roles.store')->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->middleware('permission:roles.edit')->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->middleware('permission:roles.update')->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->middleware('permission:roles.destroy')->name('roles.destroy');

    // Users
    Route::get('/users', [UserController::class, 'index'])->middleware('permission:users.list')->name('users.list');
    Route::get('/users/create', [UserController::class, 'add'])->middleware('permission:users.add')->name('users.add');
    Route::post('/users', [UserController::class, 'store'])->middleware('permission:users.store')->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('permission:users.edit')->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->middleware('permission:users.update')->name('users.update');


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/about', [AboutAdminController::class, 'index'])->middleware('permission:about.index')->name('about.index');
        Route::get('/about/create', [AboutAdminController::class, 'create'])->middleware('permission:about.create')->name('about.create');
        Route::post('/about', [AboutAdminController::class, 'store'])->middleware('permission:about.store')->name('about.store');
        Route::get('/about/{about}/edit', [AboutAdminController::class, 'edit'])->middleware('permission:about.edit')->name('about.edit');
        Route::put('/about/{about}', [AboutAdminController::class, 'update'])->middleware('permission:about.update')->name('about.update');
        Route::delete('/about/{about}', [AboutAdminController::class, 'destroy'])->middleware('permission:about.destroy')->name('about.destroy');
    });

    Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
        Route::get('/values', [ValueController::class, 'index'])->middleware('permission:value.index')->name('value.index');
        Route::get('/values/create', [ValueController::class, 'create'])->middleware('permission:value.create')->name('value.create');
        Route::post('/values', [ValueController::class, 'store'])->middleware('permission:value.store')->name('value.store');
        Route::get('/values/{value}/edit', [ValueController::class, 'edit'])->middleware('permission:value.edit')->name('value.edit');
        Route::put('/values/{value}', [ValueController::class, 'update'])->middleware('permission:value.update')->name('value.update');
        Route::delete('/values/{value}', [ValueController::class, 'destroy'])->middleware('permission:value.destroy')->name('value.destroy');
    });


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/mission', [MissionController::class, 'index'])->middleware('permission:mission.index')->name('mission.index');
        Route::get('/mission/create', [MissionController::class, 'create'])->middleware('permission:mission.create')->name('mission.create');
        Route::post('/mission', [MissionController::class, 'store'])->middleware('permission:mission.store')->name('mission.store');
        Route::get('/mission/{mission}/edit', [MissionController::class, 'edit'])->middleware('permission:mission.edit')->name('mission.edit');
        Route::put('/mission/{mission}', [MissionController::class, 'update'])->middleware('permission:mission.update')->name('mission.update');
        Route::delete('/mission/{mission}', [MissionController::class, 'destroy'])->middleware('permission:mission.destroy')->name('mission.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/work', [WorkController::class, 'index'])->middleware('permission:work.index')->name('work.index');
        Route::get('/work/create', [WorkController::class, 'create'])->middleware('permission:work.create')->name('work.create');
        Route::post('/work', [WorkController::class, 'store'])->middleware('permission:work.store')->name('work.store');
        Route::get('/work/{work}/edit', [WorkController::class, 'edit'])->middleware('permission:work.edit')->name('work.edit');
        Route::put('/work/{work}', [WorkController::class, 'update'])->middleware('permission:work.update')->name('work.update');
        Route::delete('/work/{work}', [WorkController::class, 'destroy'])->middleware('permission:work.destroy')->name('work.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/contact-info', [ContactInfoController::class, 'index'])->middleware('permission:contact.index')->name('contact.index');
        Route::get('/contact-info/create', [ContactInfoController::class, 'create'])->middleware('permission:contact.create')->name('contact.create');
        Route::post('/contact-info', [ContactInfoController::class, 'store'])->middleware('permission:contact.store')->name('contact.store');
        Route::get('/contact-info/{contact}/edit', [ContactInfoController::class, 'edit'])->middleware('permission:contact.edit')->name('contact.edit');
        Route::put('/contact-info/{contact}', [ContactInfoController::class, 'update'])->middleware('permission:contact.update')->name('contact.update');
        Route::delete('/contact-info/{contact}', [ContactInfoController::class, 'destroy'])->middleware('permission:contact.destroy')->name('contact.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
    // Contact Messages (الجديد)
        Route::get('messages', [ContactMessageController::class, 'index'])->middleware('permission:contact-messages.index')->name('messages.index');
        Route::get('messages/{id}', [ContactMessageController::class, 'show'])->middleware('permission:contact-messages.show')->name('messages.show');
        Route::delete('messages/{id}', [ContactMessageController::class, 'destroy'])->middleware('permission:contact-messages.destroy')->name('messages.destroy');
    });
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/process', [ProcessController::class, 'index'])->middleware('permission:process.index')->name('process.index');
        Route::get('/process/create', [ProcessController::class, 'create'])->middleware('permission:process.create')->name('process.create');
        Route::post('/process', [ProcessController::class, 'store'])->middleware('permission:process.store')->name('process.store');
        Route::get('/process/{process}/edit', [ProcessController::class, 'edit'])->middleware('permission:process.edit')->name('process.edit');
        Route::put('/process/{process}', [ProcessController::class, 'update'])->middleware('permission:process.update')->name('process.update');
        Route::delete('/process/{process}', [ProcessController::class, 'destroy'])->middleware('permission:process.destroy')->name('process.destroy');
    });


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/doctors', [DoctorAdminController::class, 'index'])->middleware('permission:doctors.index')->name('doctors.index');
        Route::get('/doctors/create', [DoctorAdminController::class, 'create'])->middleware('permission:doctors.create')->name('doctors.create');
        Route::post('/doctors', [DoctorAdminController::class, 'store'])->middleware('permission:doctors.store')->name('doctors.store');
        Route::get('/doctors/{doctor}/edit', [DoctorAdminController::class, 'edit'])->middleware('permission:doctors.edit')->name('doctors.edit');
        Route::put('/doctors/{doctor}', [DoctorAdminController::class, 'update'])->middleware('permission:doctors.update')->name('doctors.update');
        Route::delete('/doctors/{doctor}', [DoctorAdminController::class, 'destroy'])->middleware('permission:doctors.destroy')->name('doctors.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
    
        // -------- AI Diagnosis Reports --------
        Route::get('/diagnosis/reports', [DiagnosisReportController::class, 'index'])
            ->middleware('permission:diagnosis-reports.index')
            ->name('diagnosis.reports.index');
    });

    Route::get('/admin/patients', [PatientsController::class,'index'])->name('admin.patients.index');

}); // 👈 مهم: إغلاق مجموعة الـ middleware




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/diagnosis/new', [DiagnosisController::class, 'index'])->name('diagnosis.new');
Route::post('/diagnosis/analyze', [DiagnosisController::class, 'analyze'])->name('diagnosis.result');


Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
Route::get('/doctors/{doctor}', [DoctorController::class, 'show'])->name('doctors.show');


Route::prefix('patient')->name('patient.')->group(function () {

    Route::middleware('guest:patient')->group(function () {
        Route::get('/login', [PatientAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [PatientAuthController::class, 'login'])->name('login.post');

        Route::get('/register', [PatientAuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [PatientAuthController::class, 'register'])->name('register.post');
    });

    Route::middleware('auth:patient')->group(function () {
        Route::post('/logout', [PatientAuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', function () {
            return view('patient.dashboard');
        })->name('dashboard');
    });
});
Route::get('/media/{path}', function (string $path) {
    $disk = Storage::disk('public'); // storage/app/public

    abort_unless($disk->exists($path), 404);

    $mime = $disk->mimeType($path) ?? 'application/octet-stream';

    return response($disk->get($path), 200)
        ->header('Content-Type', $mime)
        ->header('Cache-Control', 'public, max-age=31536000');
})->where('path', '.*')->name('media.public');


require __DIR__ . '/auth.php';

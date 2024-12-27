<?php
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\SuperAdminDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApprovalsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::resource('leaves', LeaveController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'super-admin' => redirect()->route('superadmin.dashboard'),
            default => redirect()->route('employee.dashboard'),
        };
    })->name('dashboard');

    Route::middleware('role:employee')->get('/employee', [EmployeeDashboardController::class, 'index'])->name('employee.dashboard');
    Route::middleware('role:admin')->get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::middleware('role:super-admin')->get('/superadmin', [SuperAdminDashboardController::class, 'index'])->name('superadmin.dashboard');
    
Route::middleware('role:super-admin')->get('/approvals',[ApprovalsController::class, 'index'])->name('approvals.index');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

// LeaveTypes – “index” is open to all authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('leave-types', [LeaveTypeController::class, 'index'])
        ->name('leave-types.index');
});

// Admin & super-admin for the rest of the LeaveType resource
Route::middleware(['auth', 'role:admin,super-admin'])->group(function () {
    Route::resource('leave-types', LeaveTypeController::class)->except(['index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Models\Certificate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ParticipantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('setting/{setting}', [SettingController::class, 'edit'])->name('setting-view');
    Route::patch('setting/{setting}/patch', [SettingController::class, 'update'])->name('setting-update');

    Route::get('participant/index', [CertificateController::class, 'index'])->name('participant-index');
    Route::get('participant/create', [CertificateController::class, 'create'])->name('participant-create');
    Route::get('participant/store', [CertificateController::class, 'store'])->name('participant-store');
    Route::get('participant/{certificate}/edit', [CertificateController::class, 'edit'])->name('participant-edit');
    Route::get('participant/{certificate}/update', [CertificateController::class, 'update'])->name('participant-update');
    Route::get('participant/{certificate}/remove', [CertificateController::class, 'remove'])->name('participant-remove');
    Route::get('participant/{certificate}/pdf', [CertificateController::class, 'PDFDownload'])->name('participant-print');
});
Route::get('/', [CertificateController::class, 'home'])->name('home');
Route::get('/search', [CertificateController::class, 'search'])->name('certificate-search');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

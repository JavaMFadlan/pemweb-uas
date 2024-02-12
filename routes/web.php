<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// dump(Auth::routes());
Auth::routes();



// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second middleware...
//     });

//     Route::get('/user/profile', function () {
//         // Uses first & second middleware...
//     });
// });
Route::get('/admin/home',[PasienController::class, 'index'])->name('admin.home');

Route::prefix('pasien')->group(function () {

    Route::get('/', [PasienController::class, 'index'])->name('pasien.index');
    Route::post('/datatables', [PasienController::class, 'datatables'])->name('pasien.datatables');
    Route::get('/create', [PasienController::class, 'create'])->name('pasien.create');
    Route::get('/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::get('/destroy/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
    Route::get('/show/{id}', [PasienController::class, 'show'])->name('pasien.show');
    Route::get('/update/{id?}', [PasienController::class, 'update'])->name('pasien.update');
    Route::post('/store', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/test-list', [PasienController::class, 'test_list'])->name('pasien.test_list');
});

<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

route::middleware(['guest'])->group(function () {

    route::get('/', [SesiController::class, 'index'])->name('login');
    route::post('/', [SesiController::class, 'login']);
});

route::get('/home', function () {
    return redirect('/admin');
});


route::middleware(['auth'])->group(function () {

    route::get('/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    route::get('/petugas', [AdminController::class, 'petugas'])->middleware('userAkses:petugas');

    route::get('/logout', [SesiController::class, 'logout']);
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// route produk
route::get('/produk', [ProdukController::class, 'index']);
route::get('/produk-create', [ProdukController::class, 'create']);
route::post('/produk-store', [ProdukController::class, 'store']);
route::get('/del-produk/{id}', [ProdukController::class, 'destroy']);
route::get('/edit-produk-{id}', [ProdukController::class, 'edit']);
route::post('/update-produk/{id}', [ProdukController::class, 'update']);


// route users

Route::get('/users', [UserController::class, 'index'])->name('users.index');
route::get('/users-edit-{id}', [UserController::class, 'edit']);
route::post('/users-update-{id}', [UserController::class, 'update']);
route::get('/users-delete-{id}', [UserController::class, 'destroy']);

Route::get('/pelanggan', [PelangganController::class, 'index']);
route::get('/pelanggan-create', [PelangganController::class, 'create']);
route::get('/pelanggan-edit-{id}', [PelangganController::class, 'edit']);
route::post('/pelanggan-update-{id}', [PelangganController::class, 'update']);
route::get('/pelanggan-delete-{id}', [PelangganController::class, 'destroy']);
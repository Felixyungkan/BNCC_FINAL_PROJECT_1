<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => function ($request, $next) {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return $next($request);
}], function () {
    Route::get('/', [BarangController::class, 'index'])->name('barangs.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barangs.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barangs.store');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barangs.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barangs.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barangs.destroy');   
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


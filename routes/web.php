<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnionCouncilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/unionCouncil', [UnionCouncilController::class, 'index'])->name('UnionCouncil.index');
    Route::post('/unionCouncil/store', [UnionCouncilController::class, 'store'])->name('UnionCouncil.store');
    Route::get('/unionCouncil/create', [UnionCouncilController::class, 'create'])->name('UnionCouncil.create');
    Route::get('/unionCouncil/show/{id}', [UnionCouncilController::class, 'show'])->name('UnionCouncil.show');
    Route::get('/unionCouncil/edit/{id}', [UnionCouncilController::class, 'edit'])->name('UnionCouncil.edit');
    Route::patch('/unionCouncil/{id}', [UnionCouncilController::class, 'update'])->name('UnionCouncil.update');
    Route::delete('/unionCouncil/{id}', [UnionCouncilController::class, 'destroy'])->name('UnionCouncil.destroy');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.polio-workers');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.polio-worker.store');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.polio-worker.create');
    Route::get('/admin/show/{id}', [AdminController::class, 'show'])->name('admin.polio-worker.show');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.polio-worker.edit');
    Route::patch('/admin/{id}', [AdminController::class, 'update'])->name('admin.polio-worker.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.polio-worker.destroy');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('polio-workers', [AdminController::class, 'polio_workers'])->name('admin.polio-workers.index');
    Route::get('union-councils/{unionCouncilId}/assign-polio-workers', [UnionCouncilController::class, 'assignPolioWorkers'])
        ->name('admin.union_council.assign');
    Route::post('union-councils/{unionCouncilId}/assign-polio-workers', [UnionCouncilController::class, 'storeAssignedPolioWorkers'])
        ->name('admin.union_council.assign.store');
});

require __DIR__.'/auth.php';

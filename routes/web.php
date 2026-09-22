<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FichaMedicaController;
use Illuminate\Support\Facades\Route;

// Redireciona a página inicial direto para o Login
Route::get('/', function () {
    return redirect()->route('login');
});

// Área Pública (Lida pela Tag NFC)
Route::get('/ficha/{uuid}', [FichaMedicaController::class, 'showPublic'])->name('fichas.public');

Route::get('/dashboard', function () {
    // Buscar as fichas do usuário logado para mostrar no painel
    $fichas = auth()->user()->fichasMedicas;
    return view('dashboard', compact('fichas'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de Gestão de Fichas Médicas
    Route::get('/fichas/criar', [FichaMedicaController::class, 'create'])->name('fichas.create');
    Route::post('/fichas', [FichaMedicaController::class, 'store'])->name('fichas.store');
    Route::get('/fichas/{id}/editar', [FichaMedicaController::class, 'edit'])->name('fichas.edit');
    Route::put('/fichas/{id}', [FichaMedicaController::class, 'update'])->name('fichas.update');
    Route::delete('/fichas/{id}', [FichaMedicaController::class, 'destroy'])->name('fichas.destroy');
    
    // Rota para Configurar NFC
    Route::get('/fichas/{id}/nfc', [FichaMedicaController::class, 'nfc'])->name('fichas.nfc');
});

require __DIR__.'/auth.php';

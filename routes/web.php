<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Generate PDF
Route::get('generatePDF', [HomeController::class, 'generatePdf'])->name('generatePdf');
Route::post('/pdf', [HomeController::class, 'showPdf'])->name('pdf.show');
Route::get('files', [DocumentController::class, 'index'])->name('files');
Route::post('file/upload', [DocumentController::class, 'upload'])->name('file.upload');
Route::get('datatables', [ContactController::class, 'index'])->name('dataTables');
Route::post('import', [ContactController::class, 'import'])->name('data.import');
Route::get('export', [ContactController::class, 'export'])->name('data.export');
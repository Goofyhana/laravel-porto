<?php
use App\Http\Controllers\Admin\AdminContactsController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminCertificateController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\homeController;

Route::resource('pages', PageController::class);
Route::get('/', function () {
    return view('welcome');
});

Route::resource('home', homeController::class);

Route::get('/dashboard', function () {
    return view('dashboard');  
})->middleware(['auth', 'verified'])->name('dashboard');



Route::resource('/admin/dashboard/skill', AdminCertificateController::class);
Route::get('/admin/dashboard/skill', [AdminController::class, 'index'])->middleware('auth','admin');
Route::get('/admin/dashboard/skill/', [AdminSkillController::class, 'index'])->name('skill.index');
Route::get('/admin/dashboard/skill/create', [AdminSkillController::class, 'create'])->name('skill.create');
Route::post('/admin/dashboard/skill/store', [AdminSkillController::class, 'store'])->name('skill.store');
Route::get('/skill/{id}/edit', [AdminSkillController::class, 'edit'])->name('skill.edit');
Route::put('/skill/{id}', [AdminSkillController::class, 'update'])->name('skill.update');
Route::delete('/skill/{id}', [AdminSkillController::class, 'destroy'])->name('skill.destroy');

Route::resource('/admin/dashboard/certificate', AdminCertificateController::class);
Route::get('/admin/dashboard/certificate/', [AdminController::class, 'index'])->middleware('auth','admin');
Route::get('/admin/dashboard/certificate/', [AdminCertificateController::class, 'index'])->name('certificate.index');
Route::get('/admin/dashboard/certificate/create', [AdminCertificateController::class, 'create'])->name('certificate.create');
Route::post('/admin/dashboard/certificate/store', [AdminCertificateController::class, 'store'])->name('certificate.store');
Route::get('/certificate/{id}/edit', [AdminCertificateController::class, 'edit'])->name('certificate.edit');
Route::put('/certificate/{id}', [AdminCertificateController::class, 'update'])->name('certificate.update');
Route::delete('/certificate/{id}', [AdminCertificateController::class, 'destroy'])->name('certificate.destroy');


Route::resource('/admin/dashboard/project', AdminProjectController::class);
Route::get('/admin/dashboard/project/', [AdminController::class, 'index'])->middleware('auth','admin');
Route::get('/admin/dashboard/project/', [AdminProjectController::class, 'index'])->name('project.index');
Route::get('/admin/dashboard/project/create', [AdminProjectController::class, 'create'])->name('project.create');
Route::post('/admin/dashboard/project/store', [AdminProjectController::class, 'store'])->name('project.store');
Route::get('/project/{id}/edit', [AdminProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/{id}', [AdminProjectController::class, 'update'])->name('project.update');
Route::delete('admin/project/{id}', [AdminProjectController::class, 'destroy'])->name('project.destroy');

Route::resource('/admin/dashboard/contact', AdminContactsController::class);
Route::get('/admin/dashboard/contact/', [AdminController::class, 'index'])->middleware('auth','admin');
Route::get('/admin/dashboard/contact/', [AdminContactsController::class, 'index'])->name('contact.index');
Route::get('/admin/dashboard/contact/create', [AdminContactsController::class, 'create'])->name('contact.create');
Route::post('/admin/dashboard/contact/store', [AdminContactsController::class, 'store'])->name('contact.store');
Route::get('/contact/{id}/edit', [AdminContactsController::class, 'edit'])->name('contact.edit');
Route::put('/contact/{id}', [AdminContactsController::class, 'update'])->name('contact.update');
Route::delete('admin/contact/{id}', [AdminContactsController::class, 'destroy'])->name('contact.destroy');
require __DIR__.'/auth.php';


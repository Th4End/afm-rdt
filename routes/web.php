<?php
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultationController;
//redirection vers la page d'acceuil
Route::get('/', function () {
    return view('acceuil');
})->name('acceuil');
//redirection vers la page de connexion
Route::get('connexion', function(){
    return view('/auth/login');
})->name('connexion');
//redirection vers la page de creation de compte
Route::get('register',function(){
    return view('/auth/register');
})->name('register');
//route pour la view message 
Route::get('message',function(){
    return view('message');
})->name('message');

Route::get('/message', [MessageController::class, 'create'])->name('message.create');
Route::post('/message', [MessageController::class, 'store'])->name('message.store');
//route vers le dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//route vers le profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route vers la consultation des messages de la base de données 
/*Route::get('consulter',function(){
    return view('consulter');
})->name('consulter');*/
Route::get('/messages', [ConsultationController::class, 'index'])->name('consulter');
Route::get('/admin/consulter', function () {
    // Cette route ne sera accessible que par les administrateurs
})->middleware(['auth', 'admin']);


require __DIR__.'/auth.php';

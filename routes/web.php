<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'homepage'])->name('homepage');

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.redirect');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();

    $user = App\Models\User::updateOrCreate([
        'google_id' => $user->getId(),
    ], [
        'nickname' => $user->getNickname(),
        'name' => $user->getName(),
        'email' => $user->getEmail(),
        'avatar' => $user->getAvatar(),
        'google_token' => $user->token,
        'google_refresh_token' => $user->refreshToken,
        'google_expires_in' => $user->expiresIn,
    ]);

    Illuminate\Support\Facades\Auth::login($user, true);

    return redirect('/');
})->name('auth.callback');

Route::get('/upload', [PostController::class, 'create'])->middleware(['auth'])->name('upload');
Route::post('/upload', [PostController::class, 'store'])->middleware('auth')->name('posts.store');
Route::get('/p/{post}', [PostController::class, 'show'])->name('posts.show');

Route::view('/about', 'about')->name('about');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/disclaimer', 'disclaimer')->name('disclaimer');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';

// ffmpeg -i test.mp4 -vf scale=460:-1 -b:v 0 -crf 30 -pass 1 -an -f webm -y /dev/null && ffmpeg -i test.mp4 -vf scale=460:-1 -b:v 0 -crf 30 -pass 2 testa.webm

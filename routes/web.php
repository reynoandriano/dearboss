<?php

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

Route::get('/', function () {
    $posts = [];
    for ($i = 1; $i <= 24; $i++) {
        $posts[] = [
            'id' => $i,
            'image' => '/images/' . $i . '.webp',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do 
eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
officia deserunt mollit anim id est laborum.',
            'loading' => ($i <= 5) ? 'eager' : 'lazy'
        ];
    }

    return view('homepage', compact('posts'));
});

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

    Illuminate\Support\Facades\Auth::login($user);

    return redirect('/');
})->name('auth.callback');

Route::get('/upload', function () {
    return 'upload';
})->middleware(['auth'])->name('upload');

Route::view('/about', 'about');
Route::view('/privacy', 'privacy');
Route::view('/terms', 'terms');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\Admin\AdminArtistController;
use App\Http\Controllers\Admin\AdminContractController;
use App\Http\Controllers\artist\AlbumController;
use App\Http\Controllers\artist\ArtistController;
use App\Http\Controllers\artist\EventController;
use App\Http\Controllers\artist\TrackController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/start-selling', [FrontendController::class, 'startSelling'])->name('start-selling');
Route::get('/explore', [FrontendController::class, 'explore'])->name('explore');
Route::get('/creator-tools', [FrontendController::class, 'creatorTools'])->name('creator-tools');
Route::get('/feeds', [FrontendController::class, 'feeds'])->name('feeds');
Route::get('/tracks', [FrontendController::class, 'tracks'])->name('tracks');
Route::get('/trending', [FrontendController::class, 'trending'])->name('trending');
Route::get('/feature', [FrontendController::class, 'feature'])->name('feature');
Route::get('/most-liked', [FrontendController::class, 'mostLiked'])->name('most-liked');
Route::get('/subscription', [FrontendController::class, 'subscription'])->name('subscription');
// Route::get('/sign-up', [FrontendController::class, 'signUp'])->name('sign-up');
// Route::get('/sign-in', [FrontendController::class, 'signIn'])->name('sign-in');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('login/{provider}', [SocialController::class, 'redirectToProvider'])->name('social.login');
Route::get('login/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:artist'])->prefix('artist')->name('artist.')->group(function () {
    Route::get('/dashboard', [ArtistController::class, 'index'])->name('dashboard');

    // Profile Update
    Route::put('/profile/update', [ProfileController::class, 'artistupdate'])->name('profile.update');

    Route::resource('events', EventController::class);
    Route::resource('albums', AlbumController::class);
    Route::resource('tracks', TrackController::class);

    Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/tracks/{id}/stream', [TrackController::class, 'stream'])->name('tracks.stream');

});

Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [ArtistController::class, 'index'])->name('dashboard');

    // Profile Update
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Other artist-specific routes...
});


// Admin routes
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('artists', AdminArtistController::class);
    Route::post('artists/{user}/suspend', [AdminArtistController::class, 'suspend'])->name('artists.toggle');
    Route::resource('contracts', AdminContractController::class);

    Route::get('/track-approvals', [TrackController::class, 'Appindex'])->name('admin.track-approvals.index');
    Route::get('/track-show/{id}', [TrackController::class, 'show'])->name('admin.track-approvals.show');
    Route::delete('/track-delete/{id}', [TrackController::class, 'destroy'])->name('admin.track-approvals.delete');
    Route::post('/track-approvals/{id}/approve', [TrackController::class, 'approve'])->name('admin.track-approvals.approve');
    Route::post('/track-approvals/{id}/reject', [TrackController::class, 'reject'])->name('admin.track-approvals.reject');
});

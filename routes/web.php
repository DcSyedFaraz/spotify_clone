<?php

use App\Http\Controllers\Admin\AdminArtistController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCaseController;
use App\Http\Controllers\Admin\AdminContractController;
use App\Http\Controllers\Admin\SupportTicketAdminController;
use App\Http\Controllers\artist\AlbumController;
use App\Http\Controllers\artist\ArtistCaseController;
use App\Http\Controllers\artist\ArtistController;
use App\Http\Controllers\artist\EventController;
use App\Http\Controllers\artist\SupportTicketController;
use App\Http\Controllers\artist\TrackController;
use App\Http\Controllers\artist\TransparencyReportController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LikedSongController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoyaltyController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::any('/stripe/webhook', [PaymentController::class, 'handleStripeWebhook']);

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/start-selling', [FrontendController::class, 'startSelling'])->name('start-selling')->middleware('check_subscription');
Route::get('/explore', [FrontendController::class, 'explore'])->name('explore');
Route::get('/creator-tools', [FrontendController::class, 'creatorTools'])->name('creator-tools');
Route::get('/feeds', [FrontendController::class, 'feeds'])->name('feeds');
Route::get('/tracks', [FrontendController::class, 'tracks'])->name('tracks');
Route::get('/trending', [FrontendController::class, 'trending'])->name('trending');
Route::get('/feature', [FrontendController::class, 'feature'])->name('feature');
Route::get('/most-liked', [FrontendController::class, 'mostLiked'])->name('most-liked');

Route::get('/news-blog', [FrontendController::class, 'blog'])->name('news-blog');
Route::get('/news-blog/{id}', [FrontendController::class, 'showBlogDetail'])->name('blog.show');
Route::get('/music-events', [FrontendController::class, 'music'])->name('music-events');
Route::get('/merch-list', [FrontendController::class, 'playlist'])->name('merch.list');
Route::get('/artists-list', [FrontendController::class, 'artist'])->name('artists.list');
Route::get('/artist/details/{id}', [FrontendController::class, 'showArtistDetail'])->name('artists.details');

Route::get('/subscription', [PaymentController::class, 'index'])->name('subscription.index');

Route::get('login/{provider}', [SocialController::class, 'redirectToProvider'])->name('social.login');
Route::get('login/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

Route::middleware('auth')->group(function () {
    Route::post('/subscription/{plan}', [PaymentController::class, 'show'])->name('subscription.show');
    Route::post('/subscription', [PaymentController::class, 'subscription'])->name('subscription.create');
});

Route::middleware(['auth', 'check_subscription'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/track/{trackId}', [TrackController::class, 'getTrack'])->name('track.play');
    Route::get('/playlist/{playlistId}/tracks', [PlaylistController::class, 'getPlaylistTracks'])->name('playlist.tracks');
    Route::get('/album/{albumId}/tracks', [AlbumController::class, 'getAlbumTracks'])->name('album.tracks');
    Route::get('/artist/{artistId}/tracks', [ArtistController::class, 'getArtistTracks'])->name('artist.tracks');
    Route::get('/track/{trackId}/play', [TrackController::class, 'trackPlay'])->name('track.show');

    Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
    Route::get('/playlists/{playlist}', [PlaylistController::class, 'show'])->name('playlists.show');
    Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
    Route::post('/playlists/{playlist}/tracks', [PlaylistController::class, 'addTrack'])->name('playlists.addTrack');

    Route::post('/liked-songs/store', [LikedSongController::class, 'store'])->name('liked-songs.store');
    Route::post('/liked-songs/remove', [LikedSongController::class, 'destroy'])->name('liked-songs.remove');
    Route::get('/liked-songs', [LikedSongController::class, 'getLikedSongs'])->name('liked-songs.index');

});


Route::middleware(['auth', 'role:artist'])->prefix('artist')->name('artist.')->group(function () {
    Route::get('/dashboard', [ArtistController::class, 'index'])->name('dashboard');

    // Profile Update
    Route::put('/profile/update', [ProfileController::class, 'artistupdate'])->name('profile.update');

    Route::resource('events', EventController::class);
    Route::resource('albums', AlbumController::class);
    Route::resource('tracks', TrackController::class);
    Route::resource('support', SupportTicketController::class);

    Route::post('/support/{id}/respond', [SupportTicketController::class, 'respond'])->name('support.respond');
    Route::post('/support/{id}/close', [SupportTicketController::class, 'close'])->name('support.close');
    // Transparency Reports
    Route::get('/reports', [TransparencyReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/download', [TransparencyReportController::class, 'download'])->name('reports.download');

    Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/tracks/{id}/stream', [TrackController::class, 'stream'])->name('tracks.stream');

    Route::get('cases', [ArtistCaseController::class, 'index'])->name('cases.index');
    Route::get('cases/{case}', [ArtistCaseController::class, 'show'])->name('cases.show');
    Route::post('cases/{case}/respond', [ArtistCaseController::class, 'respond'])->name('cases.respond');

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
    Route::resource('cases', AdminCaseController::class);
    Route::resource('support', SupportTicketAdminController::class);
    Route::resource('plans', PlanController::class);
    Route::resource('blogs', AdminBlogController::class);

    Route::post('/support/{id}/respond', [SupportTicketAdminController::class, 'respond'])->name('support.respond');
    Route::post('/support/{id}/close', [SupportTicketAdminController::class, 'close'])->name('support.close');
    Route::get('/royalties', [RoyaltyController::class, 'index'])->name('admin.royalties.index');

    Route::get('/track-approvals', [TrackController::class, 'Appindex'])->name('admin.track-approvals.index');
    Route::get('/track-show/{id}', [TrackController::class, 'show'])->name('admin.track-approvals.show');
    Route::delete('/track-delete/{id}', [TrackController::class, 'destroy'])->name('admin.track-approvals.delete');
    Route::post('/track-approvals/{id}/approve', [TrackController::class, 'approve'])->name('admin.track-approvals.approve');
    Route::post('/track-approvals/{id}/reject', [TrackController::class, 'reject'])->name('admin.track-approvals.reject');
    Route::put('/admin/tracks/{track}', [TrackController::class, 'admin_update'])->name('admin.track.update');

});

<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PeerRating\PeerRatingController;
use App\Http\Controllers\PeerRating\SectionHeadRatingController;


Route::get('/peer-rating-2022', [PeerRatingController::class, 'index']);
Route::post('/peer-rating-2022', [PeerRatingController::class, 'create_department']);

Route::get('/peer-rating-2022/{department_id}/files', [PeerRatingController::class, 'files']);

# Peer Rating
Route::get('/peer-rating-2022/{department_id}/peer-ratings', [PeerRatingController::class, 'file_peer_ratings'])->middleware(['auth']);
Route::post('/peer-rating-2022/{department_id}/peer-ratings', [PeerRatingController::class, 'file_peer_ratings_create_office'])->middleware(['auth']);

Route::get('/peer-rating-2022/{department_id}/peer-rating/{office_id}/peers', [PeerRatingController::class, 'file_peers'])->middleware(['auth'])->name('peers');
Route::post('/peer-rating-2022/{department_id}/peer-rating/{office_id}/peers', [PeerRatingController::class, 'file_peers_add_peer'])->middleware(['auth']);
Route::delete('/peer-rating-2022/{department_id}/peer-rating/{office_id}/peers/{id}', [PeerRatingController::class, 'file_peers_remove_peer'])->middleware(['auth'])->name('peer.destroy');

Route::get('/peer-rating-2022/{department_id}/peer-rating/{office_id}/peers/{peer_id}', [PeerRatingController::class, 'file_peer_rating'])->middleware(['auth']);
Route::post('/peer-rating-2022/{department_id}/peer-rating/{office_id}/peers/{peer_id}', [PeerRatingController::class, 'file_peer_rating_create'])->middleware(['auth']);


# Section Head Rating
Route::get('/peer-rating-2022/{department_id}/section-head-ratings', [SectionHeadRatingController::class, 'index']);
Route::post('/peer-rating-2022/{department_id}/section-head-ratings', [SectionHeadRatingController::class, 'create']);

Route::get('/peer-rating-2022/{department_id}/section-head-rating/{section_id}', [SectionHeadRatingController::class, 'section_head_rating'])->name('section_head_rating');
Route::post('/peer-rating-2022/{department_id}/section-head-rating/{section_id}', [SectionHeadRatingController::class, 'section_head_rating_add_peer']);
Route::delete('/peer-rating-2022/{department_id}/section-head-rating/{section_id}/{id}', [SectionHeadRatingController::class, 'section_head_rating_remove_peer']);
Route::patch('/peer-rating-2022/{department_id}/section-head-rating/{section_id}', [SectionHeadRatingController::class, 'section_head_rating_save']);

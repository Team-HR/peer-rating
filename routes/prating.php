<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PeerRatingController;

Route::get('/peer-rating-2022', [PeerRatingController::class, 'index']);
Route::post('/peer-rating-2022', [PeerRatingController::class, 'create_department']);
Route::get('/peer-rating-2022/{department_id}/files', [PeerRatingController::class, 'files']);
Route::get('/peer-rating-2022/{department_id}/peer-ratings', [PeerRatingController::class, 'file_peer_ratings'])->middleware(['auth']);
Route::post('/peer-rating-2022/{department_id}/peer-ratings', [PeerRatingController::class, 'file_peer_ratings_create_office'])->middleware(['auth']);
Route::get('/peer-rating-2022/{department_id}/peer-rating/{office_id}/peers', [PeerRatingController::class, 'file_peers'])->middleware(['auth']);
Route::post('/peer-rating-2022/{department_id}/peer-rating/{office_id}/peers', [PeerRatingController::class, 'file_peers_add_peer'])->middleware(['auth']);
Route::get('/peer-rating-2022/{department_id}/peer-rating/{office_id}/peer/{peer_id}', [PeerRatingController::class, 'file_peer_rating'])->middleware(['auth']);


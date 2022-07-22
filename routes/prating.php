<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PeerRatingController;

Route::get('/peer-rating-2022',[PeerRatingController::class,'index']);
Route::get('/peer-rating-2022/{department_id}/offices',[PeerRatingController::class,'offices']);


Route::post('/peer-rating-2022', [PeerRatingController::class,'create_department']);
Route::post('/peer-rating-2022/{department_id}/offices',[PeerRatingController::class,'create_office']);

Route::get('/peer-rating-2022/{department_id}/files',[PeerRatingController::class,'files']);
Route::get('/peer-rating-2022/{department_id}/peer-rating',[PeerRatingController::class, 'file_peer_rating'])->middleware(['auth']);
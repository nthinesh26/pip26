<?php
// Approval or Managing Control routs

use App\Http\Controllers\ManagePIPController;

Route::prefix('/portal/admin')->middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/local_com/fetch-data/{id}', [ManagePIPController::class, 'fetchLocalCom']);
});
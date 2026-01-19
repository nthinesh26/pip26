<?php

use App\Http\Controllers\TranslateController;

Route::prefix('portal')->middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/translator', [TranslateController::class, 'index']);

    Route::post('/translate/post/phrase', [TranslateController::class, 'postTranslation']);
});
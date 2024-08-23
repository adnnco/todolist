<?php

use App\Http\Controllers\Api\LabelController;
use App\Http\Controllers\Api\TaskController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/**
 * Route to generate a Sanctum token.
 *
 * Validates the request and checks the user's credentials.
 * If the credentials are correct, a new token is created and returned.
 *
 * @param  Request  $request  The incoming request instance.
 * @return string The generated plain text token.
 *
 * @throws ValidationException If the provided credentials are incorrect.
 */
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

/**
 * Group of routes that require Sanctum authentication.
 *
 * These routes are prefixed with 'api' and use the 'auth:sanctum' middleware.
 */
Route::middleware('auth:sanctum')
    ->prefix('api')
    ->group(function () {
        Route::apiResources([
            'tasks' => TaskController::class,
            'labels' => LabelController::class,
        ]);
    });

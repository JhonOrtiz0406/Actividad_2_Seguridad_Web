<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     * @throws ValidationException
     */
    public function store(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        //Validacion del Request
        $request->authenticate();

        //Validacion de que no esten expiradas las credenciales
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        }

        return response()->json(['message' => 'Login exitoso']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}

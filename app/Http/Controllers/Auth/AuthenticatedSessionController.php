<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            // Validar los datos de entrada
            $validated = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'min:8'],
            ]);

            // Intentar autenticar al usuario
            if (!Auth::attempt($validated)) {
                return response()->json(['message' => 'Credenciales inválidas'], 401);
            }

            // Si la autenticación es exitosa
            return response()->json(['message' => 'Inicio de sesión exitoso'], 200);

        } catch (ValidationException $e) {
            // Capturar y devolver errores de validación
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // Capturar cualquier otro error durante el login
            return response()->json([
                'message' => 'Ocurrió un error al iniciar sesión',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

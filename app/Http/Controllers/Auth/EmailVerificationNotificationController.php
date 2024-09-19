<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            // Validar los datos de entrada para el login
            $validated = $request->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,}$/'],
            ]);

            // Intentar autenticación del usuario
            if (!Auth::attempt($validated)) {
                return response()->json(['message' => 'Credenciales inválidas'], 401);
            }

            // Si la autenticación es exitosa
            return response()->json(['message' => 'Inicio de sesión exitoso'], 200);

        } catch (ValidationException $e) {
            // Captura los errores de validación
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // Captura cualquier otro error durante el login
            return response()->json([
                'message' => 'Ocurrió un error al iniciar sesión',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

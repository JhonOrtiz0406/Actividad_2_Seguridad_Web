<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Maneja una solicitud de registro entrante.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            // Validar los datos entrantes
            $validated  = $request->validate([
                'name' => ['required', 'string', 'min:2', 'max:20', 'regex:/^[a-zA-Z]+$/'],
                'lastname' => ['required', 'string', 'min:2', 'max:40', 'regex:/^[a-zA-Z]+$/'],
                'dni' => ['required', 'regex:/^[0-9]{8}[A-Za-z]$/'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,}$/'],
                'phone' => ['nullable', 'regex:/^\+?[0-9]{9,12}$/'],
                'country' => ['nullable', 'string'],
                'about' => ['nullable', 'string', 'min:20', 'max:250'],
            ]);

            // Crear el usuario
            $user = User::create([
                'name' => $validated['name'],
                'lastname' => $validated['lastname'],
                'dni' => $validated['dni'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'],
                'country' => $validated['country'],
                'about' => $validated['about'],
            ]);

            // Respuesta de éxito
            return response()->json(['message' => 'Usuario registrado correctamente'], 200);

        } catch (ValidationException $e) {
            // Captura cualquier error de validación
            return response()->json([
                'message' => 'Error de validación',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // Captura cualquier otro error durante el registro
            return response()->json([
                'message' => 'Ocurrió un error al registrar el usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

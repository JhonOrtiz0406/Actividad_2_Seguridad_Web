<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:20', 'regex:/^[a-zA-Z]+$/'],
            'lastname' => ['required', 'string', 'min:2', 'max:40', 'regex:/^[a-zA-Z]+$/'],
            'dni' => ['required', 'regex:/^[0-9]{8}[A-Za-z]$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d@$!%*?&]{8,}$/'],
            'phone' => ['nullable', 'regex:/^\+?[0-9]{9,12}$/'],
            'country' => ['nullable', 'string'],
            'about' => ['nullable', 'string', 'min:20', 'max:250'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'dni' => $request->dni,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Usuario registrado correctamente']);
    }
}

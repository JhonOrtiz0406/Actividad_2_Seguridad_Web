<?php

return [

    // Reglas de validación para login y registro
    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'email'                => 'El campo :attribute debe ser una dirección de correo válida.',
    'required'             => 'El campo :attribute es obligatorio.',
    'string'               => 'El campo :attribute debe ser una cadena de texto.',
    'min'                  => [
        'string'  => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'max'                  => [
        'string'  => 'El campo :attribute no debe tener más de :max caracteres.',
    ],
    'regex'                => 'El formato del campo :attribute es inválido.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'unique'               => 'El campo :attribute ya ha sido tomado.',
    'numeric'              => 'El campo :attribute debe ser un número.',

    // Traducción de atributos (para mostrar nombres personalizados)
    'attributes' => [
        'name' => 'nombre',
        'lastname' => 'apellido',
        'dni' => 'DNI',
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'password_confirmation' => 'confirmación de contraseña',
        'phone' => 'teléfono',
        'country' => 'país',
        'about' => 'acerca de',
    ],

];

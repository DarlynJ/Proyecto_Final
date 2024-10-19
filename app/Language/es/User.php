<?php
return [
    'email' => [
        'is_unique' => 'Ese correo electrónico ya está registrado'
    ],
    'password_confirmation' =>[
        'required'=> 'Por favor, repita la contraseña ',
        'matches' => 'Por favor, repita la contraseña nuevamente'
    ]
];
<?php

namespace App\Models;

use App\Libraries\Token;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = [
        'name', 'email', 'password', 'activation_hash', 'reset_hash', 'reset_expires_at'
    ];
    protected $returnType = 'App\Entities\User';
    protected $useTimestamps = true;

    // Reglas de validación
    protected $validationRules = [
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[6]',
        'password_confirmation' => 'required|matches[password]'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'El email ya está registrado.'
        ],
        'password_confirmation' => [
            'required' => 'Debes confirmar tu contraseña.',
            'matches' => 'Las contraseñas no coinciden.'
        ]
    ];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    // Hash de la contraseña antes de insertar/actualizar
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);
        }
        return $data;
    }

    // Buscar usuario por email
    public function findByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    // Deshabilitar validación de contraseña
    public function disablePasswordValidation()
    {
        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }

    // Activar usuario mediante token
    public function activateByToken($token)
    {
        $token = new Token($token);
        $token_hash = $token->getHash();
        $user = $this->where('activation_hash', $token_hash)->first();

        if ($user !== null) {
            $user->activate();
            $this->protect(false)->save($user);
        }
    }

    // Obtener usuario por token de reseteo de contraseña
    public function getUserForPasswordReset($token)
    {
        $token = new Token($token);
        $token_hash = $token->getHash();
        $user = $this->where('reset_hash', $token_hash)->first();

        if ($user) {
            if ($user->reset_expires_at < date('Y-m-d H:i:s')) {
                $user = null;  // El token ha expirado
            }
        }

        return $user;
    }

    // Insertar hash de reseteo
    public function insertResetHash($userId, $resetHash)
    {
        // Si ya existe el reset_hash, generar uno nuevo
        while ($this->where('reset_hash', $resetHash)->first()) {
            $resetHash = bin2hex(random_bytes(16));
        }

        // Datos a actualizar
        $data = [
            'reset_hash' => $resetHash,
            'reset_expires_at' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ];

        // Realizar la actualización
        if ($this->update($userId, $data)) {
            return true;  // Éxito
        } else {
            // Capturar el error de la base de datos si falla la actualización
            $error = $this->db->error();
            return 'Error en la actualización: ' . $error['message'];
        }
    }

    public function createUser($data)
    {
    // Verifica si los datos están en el formato correcto
    $this->insert($data);
    return $this->insertID(); // Devuelve el ID del usuario recién creado
    }

    

}

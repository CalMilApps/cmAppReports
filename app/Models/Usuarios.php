<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios extends Model
{
    protected $table = 't_user';
    protected $allowedFields = ['usuario', 'password', 'email','role' ];

    public function obtenerRolPorUsuario($usuario)
    {
        $usuario = $this->where('usuario', $usuario)->first(); // Obtener los datos del usuario
        if ($usuario) {
            return $usuario; // Devolver los datos del usuario
        } else {
            return null; // Devolver nulo si no se encuentra el usuario
        }
    }

    public function obtenerEmailPorUsuario($email)
    {
        $email = $this->where('email', $email)->first(); // Obtener los datos del usuario
        if ($email) {
            return $email; // Devolver los datos del usuario
        } else {
            return null; // Devolver nulo si no se encuentra el usuario
        }
    }
    
}

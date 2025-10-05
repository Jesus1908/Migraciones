<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nombre'     => 'Administrador',
                'email'      => 'admin@miapp.com',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'avatar'     => null,
                'rol'        => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nombre'     => 'Usuario Prueba',
                'email'      => 'usuario@miapp.com',
                'password'   => password_hash('usuario123', PASSWORD_DEFAULT),
                'avatar'     => 'default.jpg',
                'rol'        => 'usuario',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nombre'     => 'Juan Pérez',
                'email'      => 'juan@miapp.com',
                'password'   => password_hash('juan123', PASSWORD_DEFAULT),
                'avatar'     => null,
                'rol'        => 'usuario',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insertar datos en la tabla usuarios
        $this->db->table('usuarios')->insertBatch($data);
    }
}

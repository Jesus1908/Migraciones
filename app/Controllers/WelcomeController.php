<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class WelcomeController extends BaseController
{
    protected $usuarioModel;
    protected $session;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
        $this->session = \Config\Services::session();
    }

    public function bienvenida()
    {
        if (!$this->session->get('user_id')) {
            return redirect()->to('/identificacion/iniciar-sesion')
                ->with('error', 'Debes iniciar sesión para acceder a esta página');
        }

        $data = [
            'user' => [
                'id' => $this->session->get('user_id'),
                'name' => $this->session->get('user_name'),
                'email' => $this->session->get('user_email'),
                'avatar' => $this->session->get('user_avatar'),
                'role' => $this->session->get('user_role')
            ]
        ];

        return view('welcome', $data);
    }


}

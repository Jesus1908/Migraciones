<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class IdentificacionController extends BaseController
{
    protected $usuarioModel;
    protected $session;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
        $this->session = \Config\Services::session();
    }

    public function iniciarSesion()
    {
        if ($this->session->get('user_id')) {
            return redirect()->to('/welcome');
        }

        return view('auth/login');
    }

    public function procesarInicioSesion()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->usuarioModel->verifyCredentials($email, $password);

        if ($user) {
            $this->session->set([
                'user_id' => $user['id'],
                'user_name' => $user['nombre'],
                'user_email' => $user['email'],
                'user_avatar' => $user['avatar'],
                'user_role' => $user['rol']
            ]);

            return redirect()->to('/welcome')
                ->with('success', '¡Bienvenido, ' . $user['nombre'] . '!');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Credenciales incorrectas');
        }
    }

    public function registrarse()
    {
        if ($this->session->get('user_id')) {
            return redirect()->to('/welcome');
        }

        return view('auth/register');
    }

    public function procesarRegistro()
    {
        $rules = [
            'nombre' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
            'rol' => 'required|in_list[admin,usuario]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'rol' => $this->request->getPost('rol')
        ];

        $avatarFile = $this->request->getFile('avatar');
        if ($avatarFile && $avatarFile->isValid() && !$avatarFile->hasMoved()) {
            $newName = $avatarFile->getRandomName();
            $avatarFile->move(ROOTPATH . 'public/images/users', $newName);
            $data['avatar'] = $newName;
        } else {
            $data['avatar'] = 'default.jpg';
        }

        if ($this->usuarioModel->insert($data)) {
            return redirect()->to('/identificacion/iniciar-sesion')
                ->with('success', 'Usuario registrado exitosamente. Puedes iniciar sesión.');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error al registrar usuario');
        }
    }


    public function cerrarSesion()
    {
        $this->session->destroy();
        return redirect()->to('/identificacion/iniciar-sesion')
            ->with('success', 'Sesión cerrada exitosamente');
    }
}

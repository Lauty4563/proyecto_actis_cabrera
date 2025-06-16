<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Verifica si el usuario está logueado y es administrador
        if (!$session->get('login') || $session->get('perfil_id') != 2) {
            return redirect()->to('/')->with('mensaje_error', 'Acceso restringido: solo administradores');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se usa por ahora
    }
}

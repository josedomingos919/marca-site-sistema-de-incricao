<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuxController extends Controller
{
    public static function getAdminRoutes($id)
    {
        $routes = [
            'insc' => [
                'title' => 'Inscrição',
                'icon' => 'fas fa-users',
                'path' => '/dashboard',
            ],
            'insc_list' => [
                'title' => 'Listar Inscrições',
                'icon' => 'fas fa-table',
                'path' => '/dashboard/inscricao/listar',
            ],
            'cour' => [
                'title' => 'Curso',
                'icon' => 'fas fa-book',
                'path' => '/dashboard/cursos',
            ],
            'cour_list' => [
                'title' => 'Listar Cursos',
                'icon' => 'fas fa-table',
                'path' => '/dashboard/cursos/listar',
            ],
            'user' => [
                'title' => 'Usuário',
                'icon' => 'fas fa-users',
                'path' => '/dashboard/usuarios',
            ],
            'user_list' => [
                'title' => 'Listar Usuários',
                'icon' => 'fas fa-table',
                'path' => '/dashboard/usuarios/listar',
            ],
        ];

        $routes[$id]['active'] = 'active';

        return $routes;
    }
}

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
                'path' => '../inscricao/listar',
            ],
            'cour' => [
                'title' => 'Curso',
                'icon' => 'fas fa-book',
                'path' => '../cursos',
            ],
            'cour_list' => [
                'title' => 'Listar Cursos',
                'icon' => 'fas fa-table',
                'path' => '../cursos/listar',
            ],
            'user' => [
                'title' => 'Usuário',
                'icon' => 'fas fa-users',
                'path' => '../usuarios',
            ],
            'user_list' => [
                'title' => 'Listar Usuários',
                'icon' => 'fas fa-table',
                'path' => '../usuarios/listar',
            ],
        ];

        $routes[$id]['active'] = 'active';

        return $routes;
    }
}

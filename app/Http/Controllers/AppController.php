<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Controllers\AuxController;

class AppController extends Controller
{
    //
    public function index()
    {
        return view('login/index');
    }

    public function getDashBoard()
    {
        $cursos = Course::all();

        return view('dashboard/index', [
            'breadcrumbs' => 'Inscrição  /  Adicionar',
            'icon' => 'fas fa-users',
            'routes' => AuxController::getAdminRoutes('insc'),
            'courses' => $cursos,
        ]);
    }
}

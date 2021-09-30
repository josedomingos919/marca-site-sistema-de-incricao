<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Subscription;
use App\Http\Controllers\AuxController;

class AppController extends Controller
{
    //
    public function index()
    {
        return view('login/index');
    }

    public function getDashBoard(Request $request)
    {
        // return $request->id;
        $cursos = Course::all();

        $data = Subscription::where('id', '=', '1')->first();
        $data['password'] = decrypt($data->password);

        return $data;
        return view('dashboard/index', [
            'data' => $user,
            'breadcrumbs' => 'Inscrição  /  Adicionar',
            'icon' => 'fas fa-users',
            'routes' => AuxController::getAdminRoutes('insc'),
            'courses' => $cursos,
        ]);
    }
}

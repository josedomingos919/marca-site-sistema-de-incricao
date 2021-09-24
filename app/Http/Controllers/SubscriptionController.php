<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Http\Controllers\AuxController;

class SubscriptionController extends Controller
{
    public function add(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'type' => 'required|string',
            'cpf' => 'required|string',
            'address' => 'required|string',
            'company' => 'required|string',
            'phone_number' => 'required|string',
            'cell_phone' => 'required|string',
            'courses_id' => 'required|string',
        ]);

        $result = Subscription::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'type' => $fields['type'],
            'cpf' => $fields['cpf'],
            'address' => $fields['address'],
            'company' => $fields['company'],
            'phone_number' => $fields['phone_number'],
            'cell_phone' => $fields['cell_phone'],
            'courses_id' => $fields['courses_id'],
        ]);

        return response(
            [
                'status' => true,
                'data' => $result,
            ],
            202
        );
    }

    public function all(Request $request)
    {
        $result = Subscription::all();

        return view('subscriptions/list', [
            'breadcrumbs' => 'Inscrição  /  Listar',
            'icon' => 'fas fa-users',
            'routes' => AuxController::getAdminRoutes('insc_list'),
            'subscriptions' => $result,
        ]);
    }
}

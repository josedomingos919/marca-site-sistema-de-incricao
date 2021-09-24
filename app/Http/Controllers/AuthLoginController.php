<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\Guard;

class AuthLoginController extends Controller
{
    //

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'type' => 'required|string',
        ]);

        $userResponse = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'type' => $fields['type'],
        ]);

        $response = [
            'user' => $userResponse,
        ];

        return response($response, 201);
    }

    public function update(Request $request)
    {
        $fields = $request->validate([
            'id' => 'required|string',
        ]);

        $user = User::find($fields['id']);

        if (!$user) {
            return response('User not found', 204);
        }

        if (!empty($request->email)) {
            $fields = $request->validate([
                'email' => 'required|string|unique:users,email',
            ]);

            $user->email = $fields['email'];
        }

        if (!empty($request->password)) {
            $fields = $request->validate([
                'password' => 'required|string|confirmed',
            ]);

            $user->password = bcrypt($fields['password']);
        }

        if (!empty($request->name)) {
            $fields = $request->validate([
                'name' => 'required|string',
            ]);

            $user->name = $fields['name'];
        }

        if (!empty($request->type)) {
            $fields = $request->validate([
                'type' => 'required|string',
            ]);

            $user->type = $fields['type'];
        }

        $result = $user->save();

        return response(['result' => true], 205);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response(
                [
                    'message' => ['The provided credentials are incorrect.'],
                ],
                401
            );
        }

        $token = $user->createToken('appToken')->plainTextToken;

        $response = [
            'token' => $token,
            'user' => $user,
        ];

        return response($response, 202);
    }

    public function logOut()
    {
        $user = new \User();

        return [
            'result' => $user->tokens()->delete(),
        ];
    }
}

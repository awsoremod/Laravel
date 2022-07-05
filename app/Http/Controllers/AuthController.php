<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(UserRequest $request) // TO DO делать в конце авторизацию
    {
        $request->validated();
        $created_user = User::create([
            "login" => $request->login,
            "password" => bcrypt($request->password),
            "role_id" => 1 // non filling, default 1
        ]);
        $created_user->save();
        return response()->json([
            'message' => 'Вы успешно зарегистрированы'
        ], 200);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Неверно указан пароль',
                'errors' => 'Unauthorised'
            ], 401);
        }

        /** @var User $user */
        $user =  Auth::user();
        $role_id = $user->role_id;
        switch ($role_id) {
            case 2:
                $token =  $user->createToken(config('app.name'), ['admin']);
                break;
            default:
                $token =  $user->createToken(config('app.name'));
                break;
        }

        $token->token->expires_at = Carbon::now()->addDay();

        $token->token->save();

        return response()->json([
            'role_id' => $role_id,
            'token_type' => 'Bearer',
            'token' => $token->accessToken,
            'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Вы успешно вышли из системы',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data["password"] = bcrypt($data["password"]);
        $user = User::create($data);
        return new UserResource($user);
    }
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only("email", "password");
        if (!$token = auth()->attempt($credentials)) {
            abort(401, 'Não autorizado');
        }
        return response()->json([
            'data' => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ]);
    }
    public function update(UpdateUserRequest $request)
    {
        if (!$request->user()){
            abort(401, 'Não autorizado');
        }
        $user = $request->user();

        $data = $request->validated();

        $user->update($data);

        return response()->json(['message' => 'Usuário atualizado com sucesso']);
    }
    public function get(Request $request)
    {
        if (!$request->user()){
            abort(401, 'Não autorizado');
        }
        return $request->user();
    }
}

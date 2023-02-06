<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function entrar(Request $request)
    {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                // 'device_name' => 'required',
            ]);
        
            $user = User::where('email', $request->email)->first();
        
            if (! $user || ! Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Usuário ou senha invalido.'],
                ]);
            }
            return response()->json(['usuario'=> ['nome'=> $user->name, 'foto'=>$user->foto],'token' => $user->createToken('api')->plainTextToken],200);
            // $credentials = $request->validate([
            //     'email' => ['required', 'email'],
            //     'password' => ['required'],
            // ]);
    
            // if (Auth::attempt($credentials)) {

            //     $request->session()->regenerate();

            //     return response()->json(['msg'=>'Usuário(a) logado com sucesso!','token'=> $request], 200);
            //     // return redirect()->intended('dashboard');
            // }
    
            // return back()->withErrors([
            //     'email' => 'The provided credentials do not match our records.',
            // ]);
        
            
    }

    public function sair(Request $request)
    {
        // $user->tokens()->where('id', $tokenId)->delete();
        if($request->user()->currentAccessToken()->delete()){
            return response()->json(['msg'=>'Usuário(a) deslogado com sucesso!'], 200);
        }
        
        return response()->json(['msg'=>'Erro ao deslogar o(a) usuário(a)!'], 200);
    }
}

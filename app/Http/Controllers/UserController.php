<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return response()->json(['data'=>$users]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'usuario inexistente'], 400);
        }

        return response()->json(['success' => true, 'messages' => $user], 200);
    }

    public function layout()
    {
        return view('user.addUser');
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
        ]);

        $validador = Validator::make($data, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password'=>'required',
        ]);

        if($validador->fails()){
            return response()->json(['message' => $validador->messages()]);
        }

        $data ['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect(route('log'));

        return response()->json(['message'=> 'Usuario  '. $request->nome.' adicionado com sucesso']);
    }

    public function update(Request $request, $id)
    {
        $validador = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|string',
            'password_confirmation' => 'required_with:password|same:password|min:6',
        ]);

        if($validador->fails()){
            return response()->json(['message' => $validador->messages()]);
            // return view('book.store')->with('mensagem', $validador->messages());
        }

        User::find($id)->update($request->all());
        return response()->json(['message'=> 'O Usuario '. $request->name.' Editado com sucesso']);
        // return view('book.index');

    }

    public function destroy()
    {
        $user = Auth::user();

        User::find(Auth::id())->delete();

        return response()->json(['message' => 'Usuario ' .$user->name. ' Excluido com sucesso']);
    }


}

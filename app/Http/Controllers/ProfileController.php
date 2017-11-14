<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function profile($username)
    {
        $user = User::whereUsername($username)->first(); //Primeira forma
//        $user = User::where('username',$username); //Segunda forma
//        $user = User::where('username','=',$username); //Terceira forma
//        dd($user); //Mostra o relatorio da classe que retorna este objecto
        return view('user.profile',compact('user'));

    }



}

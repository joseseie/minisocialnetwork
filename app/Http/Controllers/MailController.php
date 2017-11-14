<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages = Message::orderBy('created_at', 'DESC')
                    ->where('receiver_user_id',Auth::id())
                    ->get();

        return view('mail.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('mail.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'sender_user_id' => 'required',
            'receiver_user_id' => 'required',
            'assunto' => 'required|min:5|max:50',
            'content' => 'required|min:10|max:500',
        ]);

//        dd($request->all());
        Message::create($request->all());



        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messagem = Message::find($id);
        $messagem->state = true;
        $messagem->save();
        return view('mail.show',compact('messagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $messagem = Message::find($id);
        $users = User::all();

        return view('mail.responder',compact('messagem','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "<h1>update(Request request, id)</h1>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "<h1>destroy(id)</h1>";
    }
}

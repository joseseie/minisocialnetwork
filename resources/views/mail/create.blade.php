@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4  col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h2>Envio de emails</h2>
                </div>

                <div class="panel-body">
                    <form action="/mail" method="POST">
                        {{csrf_field()}}

                        <input type="hidden" name="from_user_id" value="{{Auth::user()->id}}">

                        <div class="form-group">
                            <label for="post_on">User</label>
                            <select name="for_user_id" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" title=" {{ $user->email }}  ">{{ $user->name }}</option>
                            @endforeach

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="post_on">Assunto</label>
                            <input type="text" name="assunto" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="content">Messagem</label>
                            <textarea name="content" rows="4" class="form-control"></textarea>

                        </div>

                        <input type="submit" value="Enviar" class="fa fa-mail btn btn-success pull-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
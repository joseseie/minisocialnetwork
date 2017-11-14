@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4  col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h2>Resposta de emails</h2>
                    <br>
                    <div class="alert alert-info">
                        <p> {{ $messagem->content }}</p>
                    </div>
                </div>

                <div class="panel-body">
                    <form action="/mail" method="POST">
                        {{csrf_field()}}

                        <input type="hidden" name="sender_user_id" value="{{Auth::user()->id}}">

                        <div class="form-group{{ $errors->has('receiver_user_id') ? ' has-error' : '' }}">
                            <label for="post_on">User</label>
                            <select name="receiver_user_id" class="form-control">

                                <option value="{{ $messagem->user_sender->id }}" title=" {{ $messagem->user_sender->email }}  ">{{ $messagem->user_sender->name }}</option>

                            </select>
                            @if ($errors->has('receiver_user_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('receiver_user_id') }}</strong>
                                    </span>
                            @endif


                        </div>

                        <div class="form-group{{ $errors->has('assunto') ? ' has-error' : '' }}">
                            <label for="assunto">Assunto</label>

                            {{--<div class="col-md-6">--}}
                                @if($errors->has('assunto'))
                                    <input type="text" name="assunto" class="form-control" value="{{ old('assunto') }}">
                                @else
                                    <input type="text" name="assunto" class="form-control" value="{{ $messagem->assunto }}">
                                @endif

                                @if ($errors->has('assunto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('assunto') }}</strong>
                                    </span>
                                @endif
                            {{--</div>--}}
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content">Messagem</label>
                            <textarea name="content" rows="4" class="form-control" value="{{ old('assunto') }}"></textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <input type="submit" value="Enviar" class="fa fa-mail btn btn-success pull-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
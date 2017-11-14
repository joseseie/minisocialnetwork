@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8  col-md-offset-2">
        <div class="box">

            <div class="box-header">
                <div class="row">
                    <h3 class="box-title col-md-5">Enviado para mim</h3>
                    <a href="{{ route('mail.index') }}" class="btn btn-sm btn-primary pull-right col-md-2">Voltar</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding text-center">

                <div class="alert alert-success">

                    <h5>Assunto: {{ $messagem->assunto }}</h5>
                    <p>Mensagem de: {{ $messagem->user_sender->name }}</p>
                    <p>Data: {{ $messagem->created_at }}</p>

                    <div class="alert alert-info">
                        <br>
                        <p> {{ $messagem->content }} </p>
                        <br>
                    </div>

                </div>

            </div>

            <div class="box-footer">
                {{--mail.edit--}}
                {{--<a href="mail/{{ $messagem->id }}/edit" class="btn btn-sm btn-success pull-right col-md-2 pull-right">Responder</a>--}}
                <a href="{{ route('mail.edit',['id'=>$messagem->id]) }}" class="btn btn-sm btn-success pull-right col-md-2 pull-right">Responder</a>

            </div>

        </div>
    </div>
</div>
@endsection
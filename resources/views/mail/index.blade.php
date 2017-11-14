@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8  col-md-offset-2">
    <div class="box">

    <div class="box-header">
        <div class="row">
            <h3 class="box-title col-md-5">Emails recebidos</h3>
            <a href="mail/create" class="btn btn-sm btn-success pull-right col-md-2">Criar novo</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th style="width: 10px">ID</th>
                <th>Denominacao</th>
                <th>Data de Cadastro</th>
                <th>Utilizador</th>
                <th>Estado</th>
                <th style="width: 40px">Percent</th>
            </tr>
            {{--{{  dd(count($articles)) }}--}}
            @if(isset($messages)  && count($messages) > 0)
                @forelse($messages as $message)
                    {{ dd($message) }}
                <tr>
                    <td>{{{  $message->id }}}</td>
                    <td>
                            <span class="name_edit" style="cursor: pointer">
                               {{--{{$curso->nome}}--}}
                                {{ $message->getShortestContent() }}
                               </span>
                                    <i class="fa fa-pencil"></i>
                            </span>
                    </td>
                    <td>{{ $message->created_at }}</td>
                    <td>{{ $message->user->name }}</td>
                    <td class="td">
                        {{--@if($curso->deleted_at)--}}
                        <span class="label label-danger">Removido</span>
                        {{--@endif--}}
                    </td>

                    <td><span class="badge bg-red">{{rand(10,100)}}%</span></td>
                </tr>
            @endforeach
                @endif

            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    {{--@else--}}
    {{--<h4 class="text-center"><i class="icon fa fa-info-circle text-warning"></i> Ainda nao ha Faculdades cadastradas.</h4>--}}
    {{--@endif--}}

</div>
    </div>
</div>
    @endsection
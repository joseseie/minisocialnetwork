@extends('layouts.app')

<div class="box">

    <div class="box-header">
        <h3 class="box-title">Cursos</h3>
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

            {{--@foreach($cursos as $curso)--}}
            <tr>
                <td>1</td>
                <td>
                        <span class="name_edit" style="cursor: pointer">
                           {{--{{$curso->nome}}--}}
                            Meu curso
                           </span>
                                <i class="fa fa-pencil"></i>
                        </span>
                </td>
                <td>horas aqui</td>
                <td>Nome do user</td>
                <td class="td">
                    {{--@if($curso->deleted_at)--}}
                    <span class="label label-danger">Removido</span>
                    {{--@elseif($curso->estado->id == 3)--}}
                    {{--<span class="label label-success">{{$curso->estado->nome}}</span>--}}
                    {{--@else--}}
                    {{--<span class="label {{$curso->estado->label}}">{{$curso->estado->nome}}</span>--}}
                    {{--<span class="label label-success confirmar_c"--}}
                          {{--data-c_id="{{$curso->id}}"--}}
                          {{--title="Confirmar esses dados."--}}
                          {{--style="margin-left: 0px; cursor: pointer;">--}}
                                                        {{--<i class="fa fa-check"></i>--}}
                                                    {{--</span>--}}
                    {{--@endif--}}
                </td>

                <td><span class="badge bg-red">{{rand(10,100)}}%</span></td>
            </tr>
            {{--@endforeach--}}

            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
    {{--@else--}}
    {{--<h4 class="text-center"><i class="icon fa fa-info-circle text-warning"></i> Ainda nao ha Faculdades cadastradas.</h4>--}}
    {{--@endif--}}

</div>
@extends('layouts.app')

@section('content')
    <div class="row">
         <div class="col-md-4  col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="">Article by Jose Seie </span>

                        <small>
                            <a href="/articles/{{$article->id}}/edit">Edit</a>
                        </small>

                        <span class="pull-right">
                            {{$article->created_at->diffForHumans()}}
                        </span>

                    </div>

                    <div class="panel-body">

                        {{$article->content}}

                    </div>
                </div>
            </div>

    </div>

@endsection
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

                        <input type="hidden" name="sender_user_id" value="{{Auth::user()->id}}">
{{--                        <p>{{ old("receiver_user_id") }}</p>--}}
                        <div class="form-group{{ $errors->has('receiver_user_ids') ? ' has-error' : '' }}">
                            <label for="assunto">Emails, separe com virgula(,)</label>

                            <input type="text" name="receiver_user_ids" class="form-control" value="{{ old('receiver_user_ids') }}">

                            @if ($errors->has('receiver_user_ids'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('receiver_user_ids') }}</strong>
                                    </span>
                            @endif
                            {{--</div>--}}
                        </div>

                        {{--<div class="form-group{{ $errors->has('receiver_user_id') ? ' has-error' : '' }}">--}}
                            {{--<label for="post_on">User</label>--}}
                            {{--<select name="receiver_user_id" id="receiver_user_id" multiple class="form-control">--}}

                                {{--@foreach($users as $user)--}}
                                    {{--<option value="{{ $user->id }}" title=" {{ $user->email }} ">--}}
                                        {{--{{ $user->name }}--}}
                                    {{--</option>--}}
                                {{--@endforeach--}}

                            {{--</select>--}}
                            {{--@if ($errors->has('receiver_user_id'))--}}
                                {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('receiver_user_id') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        <div class="form-group{{ $errors->has('assunto') ? ' has-error' : '' }}">
                            <label for="assunto">Assunto</label>

                            {{--<div class="col-md-6">--}}

                                <input type="text" name="assunto" class="form-control" value="{{ old('assunto') }}">

                                @if ($errors->has('assunto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('assunto') }}</strong>
                                    </span>
                                @endif
                            {{--</div>--}}
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content">Messagem</label>
                            <input name="content" id="content" rows="4" class="form-control" value="{{ old('content') }}">
                            {{--<textarea name="content" id="content" rows="4" class="form-control"></textarea>--}}
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

<script>
    //                                $(function () {
    document.getElementById("receiver_user_id").selectedIndex = "{{ old("receiver_user_id") }}";
    //                                })
</script>
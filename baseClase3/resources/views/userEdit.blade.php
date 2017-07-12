@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(!empty($msg))
                    <div class="alert alert-success">
                        <p>{{ $msg }}</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('users.index') }}">
                            Usuarios
                        </a>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('users.update', ['user' => $user->id ]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre:</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Correo Electronico:</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('profile_id') ? ' has-error' : '' }}">
                                <label for="profile_id" class="col-md-4 control-label">Perfil:</label>

                                <div class="col-md-6">
                                    <select name="profile_id" id="profile_id" class="form-control">
                                        @foreach($profiles as $profile)
                                            @php($selected = '')
                                            @if($user->profile_id === $profile->id)
                                                @php($selected = "selected='true'")
                                            @endif
                                            <option value="{{ $profile->id }}" {{ $selected }}>{{ $profile->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('profile_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('profile_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

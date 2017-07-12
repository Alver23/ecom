@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(!empty(session('msg')))
                    <div class="alert alert-{{ session('msgType') }}">
                        <p>{{ session('msg') }}</p>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('users/create') }}" class="btn btn-primary">
                        Crear Usuario
                    </a>
                </div>

                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Perfil
                                </th>
                                <th>
                                    Accion
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->profile->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', ['users' => $user->id]) }}" class="btn btn-primary">
                                            Editar
                                        </a>
                                        <form action="{{ route('users.destroy', ['users' => $user->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger" type="submit">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
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
                    <table>
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
                                    {{ $user->email }}
                                </td>
                                <td>
                                    <a href="{{ route('profiles.edit', ['profiles' => $profile['id']]) }}" class="btn btn-primary">
                                        Editar
                                    </a>
                                    <form action="{{ route('profiles.destroy', ['profiles' => $profile['id']]) }}" method="post">
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
@endsection
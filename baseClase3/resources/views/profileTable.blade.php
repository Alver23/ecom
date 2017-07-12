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
                <a href="{{ url('profiles/create') }}" class="btn btn-primary">
                    Crear Perfil
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
                                Descripcion
                            </th>
                            <th>
                                Accion
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profiles as $profile)
                            <tr>
                                <td>
                                    {{ $profile['name'] }}
                                </td>
                                <td>
                                    {{ $profile['description'] }}
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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
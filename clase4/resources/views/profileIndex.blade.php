<a href="{{ url('profiles/create') }}">
    Crear Perfil
</a>
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
                    {{ $profile->name }}
                </td>
                <td>
                    {{ $profile->description }}
                </td>
                <td>
                    <a href="{{ url('profiles') }}/{{ $profile->id }}/edit">Editar</a>
                    <form action="{{ url('profiles') }}/{{ $profile->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ url('users/create') }}">
    Crear Usuario
</a>
@if(!empty($users))
    <table>
        <thead>
            <tr>
                <th>
                    Nombres
                </th>
                <th>
                    Correo Electronico
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
                        <form action="{{ url('users') }}/{{ $user->id }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
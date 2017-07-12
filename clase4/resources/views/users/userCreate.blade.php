<form action="{{ url('users') }}" method="post">
    {{ csrf_field() }}
    <label for="name">Nombre:</label>
    <input type="text" name="name">
    <label for="name">Correo</label>
    <input type="email" name="email">
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password">
    <button type="submit">Guardar</button>
</form>
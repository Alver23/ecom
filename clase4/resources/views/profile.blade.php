<form action="{{ url('profiles') }}" method="post">
    {{ csrf_field() }}
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name">
    <label for="description">Descripcion</label>
    <textarea name="description" id="description" cols="10" rows="5"></textarea>
    <button type="submit">Guardar</button>
</form>
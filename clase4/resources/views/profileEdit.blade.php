<form action="{{ url('profiles') }}/{{ $profile->id }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="{{ $profile->name }}">
    <label for="description">Descripcion</label>
    <textarea name="description" id="description" cols="10" rows="5">{{ $profile->description }}</textarea>
    <button type="submit">Actualizar</button>
</form>
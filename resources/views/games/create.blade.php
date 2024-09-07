<!DOCTYPE html>
<html>

<head>
  <title>Agregar Juego</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Agrega Bootstrap para estilos rápidos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2>Agregar Nuevo Juego</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
      </ul>
    </div>
  @endif

    <form action="{{ route('games.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="nombre">Nombre del Juego:</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
      </div>
      <div class="form-group">
        <label for="genero">Genero del Juego:</label>
        <input type="text" name="genero" class="form-control" value="{{ old('genero') }}" required>
      </div>
      <div class="form-group">
        <label for="plataforma">Plataforma:</label>
        <input type="text" name="plataforma" class="form-control" value="{{ old('plataforma') }}" required>
      </div>
      <div class="form-group mt-3">
        <label for="anio_lanzamiento">Año de Lanzamiento:</label>
        <input type="number" name="anio_lanzamiento" class="form-control" value="{{ old('anio_lanzamiento') }}"
          required>
      </div>
      <div class="form-group">
        <label for="pelicula">Pelicula:</label>
        <select name="pelicula" class="form-control" required>
          <option value="">Selecciona una opción</option>
          <option value="si">Si</option>
          <option value="no">NO</option>
        </select>
        <!-- <input type="text" name="pelicula" class="form-control" value="{{ old('pelicula') }}" required> -->
      </div>
      <div class="form-group mt-3">
        <label for="empresa">Empresa:</label>
        <input type="text" name="empresa" class="form-control" value="{{ old('empresa') }}" required>
      </div>
      <button type="submit" class="btn btn-success mt-4">Agregar</button>
      <a href="{{ route('games.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
  </div>
</body>

</html>
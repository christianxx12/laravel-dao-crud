<!DOCTYPE html>
<html>
<head>
    <title>Lista de Juegos</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Agrega Bootstrap para estilos rápidos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Juegos</h2>

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

    @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

    <a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Agregar Juego</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-secondary mb-3 float-end">Cerrar Sesión</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre del Juego</th>
                <th>Año de Lanzamiento</th>
                <th>Empresa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
        <tr>
          <td>{{ $game->nombre }}</td>
          <td>{{ $game->anio_lanzamiento }}</td>
          <td>{{ $game->empresa }}</td>
          <td>
            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este juego?')">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
            @if($games->isEmpty())
        <tr>
          <td colspan="4" class="text-center">No hay juegos registrados.</td>
        </tr>
      @endif
        </tbody>
    </table>
</div>
</body>
</html>

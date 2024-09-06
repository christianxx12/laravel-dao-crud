<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\GameDAOInterface;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    protected $gameDAO;

    public function __construct(GameDAOInterface $gameDAO)
    {
        $this->gameDAO = $gameDAO;
    }

    // Mostrar todos los juegos
    public function index()
    {
        $games = $this->gameDAO->getAllGames();
        return view('games.index', compact('games'));
    }

    // Mostrar el formulario para crear un nuevo juego
    public function create()
    {
        return view('games.create');
    }

    // Almacenar un nuevo juego
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'anio_lanzamiento' => 'required|digits:4|integer|min:1950|max:' . (date('Y') + 1),
            'empresa' => 'required|string|max:255',
        ]);

        $this->gameDAO->createGame($data);

        return redirect()->route('games.index')->with('success', 'Juego agregado correctamente.');
    }

    // Mostrar el formulario para editar un juego
    public function edit($id)
    {
        $game = $this->gameDAO->getGameById($id);
        if (!$game) {
            return redirect()->route('games.index')->with('error', 'Juego no encontrado.');
        }
        return view('games.edit', compact('game'));
    }

    // Actualizar un juego
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'anio_lanzamiento' => 'required|digits:4|integer|min:1950|max:' . (date('Y') + 1),
            'empresa' => 'required|string|max:255',
        ]);

        $updated = $this->gameDAO->updateGame($id, $data);
        if ($updated) {
            return redirect()->route('games.index')->with('success', 'Juego actualizado correctamente.');
        }
        return redirect()->route('games.index')->with('error', 'Error al actualizar el juego.');
    }

    // Eliminar un juego
    public function destroy($id)
    {
        $deleted = $this->gameDAO->deleteGame($id);
        if ($deleted) {
            return redirect()->route('games.index')->with('success', 'Juego eliminado correctamente.');
        }
        return redirect()->route('games.index')->with('error', 'Error al eliminar el juego.');
    }
}

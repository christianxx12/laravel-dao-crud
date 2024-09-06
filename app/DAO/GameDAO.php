<?php

namespace App\DAO;

use App\Models\Game;

class GameDAO implements GameDAOInterface
{
    public function getAllGames()
    {
        return Game::all();
    }

    public function getGameById($id)
    {
        return Game::find($id);
    }

    public function createGame(array $data)
    {
        return Game::create($data);
    }

    public function updateGame($id, array $data)
    {
        $game = Game::find($id);
        if ($game) {
            $game->update($data);
            return $game;
        }
        return null;
    }

    public function deleteGame($id)
    {
        $game = Game::find($id);
        if ($game) {
            $game->delete();
            return true;
        }
        return false;
    }
}

<?php

namespace App\DAO;

use App\Models\Game;

interface GameDAOInterface
{
    public function getAllGames();
    public function getGameById($id);
    public function createGame(array $data);
    public function updateGame($id, array $data);
    public function deleteGame($id);
}

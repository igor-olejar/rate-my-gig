<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function findByNameOrTown(string $searchTerm): Collection
    {
        return DB::table('users')
        ->join('uk_towns', 'users.town', '=', 'uk_towns.id')
        ->select('users.name', 'uk_towns.name AS town', 'uk_towns.county')
        ->where('users.name', 'like', '%' . $searchTerm . '%')
        ->orWhere('uk_towns.name', 'like', '%' . $searchTerm . '%')
        ->orderBy('users.name')
        ->get();
    }
}
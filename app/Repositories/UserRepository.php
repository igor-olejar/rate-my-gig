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
        ->leftJoin('ratings', 'users.id', '=', 'ratings.user_id')
        ->select('users.id', 'users.name', 'uk_towns.name AS town', 'uk_towns.county')
        ->selectRaw('ROUND(AVG(ratings.rating), 1) as avg_rating')
        ->where('users.name', 'like', '%' . $searchTerm . '%')
        ->orWhere('uk_towns.name', 'like', '%' . $searchTerm . '%')
        ->orderBy('users.name')
        ->groupBy('users.id')
        ->get();
    }
}

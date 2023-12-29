<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function findByNameOrTown(string $searchTerm): void; //Collection;
}

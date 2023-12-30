<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(private UserRepositoryInterface $userRepository) {}

    public function search(Request $request)
    {
        $users = $this->userRepository->findByNameOrTown($request->search_term);

        return view("search_results", [
            'users' => $users,
            'search_term' => $request->search_term,
        ]);
    }
}

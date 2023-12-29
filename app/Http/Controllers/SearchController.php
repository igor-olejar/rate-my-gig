<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(private UserRepositoryInterface $userRepository){}

    public function search(Request $request)
    {
        dd('here');
    }
}

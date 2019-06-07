<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\UserRepository;

use Illuminate\Support\Arr;

class UserController extends Controller
{
    public $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        return json_encode($this->userRepo->getAll());
    }

    public function view($id)
    {
        $users = $this->userRepo->getAll();

        $user = Arr::first($users, function ($value, $key) {
            return $users['id'] == $id;
        });
    }
}

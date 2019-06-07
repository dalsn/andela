<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use App\Repository\PostRepository;

class UserController extends Controller
{
    public $postRepo;

    public function __construct(UserRepository $userRepo, PostRepository $postRepo)
    {
        $this->userRepo = $userRepo;
        $this->postRepo = $postRepo;
    }

    public function index()
    {
        return response()->json($this->userRepo->getAll());
    }

    public function view($id)
    {
        $user = $this->userRepo->get($id);
        $user['posts'] = $this->postRepo->getUserPosts($id);

        return response()->json($user);
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\PostRepository;

class PostController extends Controller
{
    public $postRepo;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function index()
    {
        return response()->json($this->postRepo->getAll());
    }

    public function view($id)
    {
        $post = $this->postRepo->get($id);

        return response()->json($post);
    }
}

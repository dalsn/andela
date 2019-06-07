<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;

class PostController extends Controller
{
    public $postRepo;
    public $commentRepo;

    public function __construct(PostRepository $postRepo, CommentRepository $commentRepo)
    {
        $this->postRepo = $postRepo;
        $this->commentRepo = $commentRepo;
    }

    public function index()
    {
        return response()->json($this->postRepo->getAll());
    }

    public function view($id)
    {
        $post = $this->postRepo->get($id);
        $post['comments'] = $this->commentRepo->getPostComments($id);

        return response()->json($post);
    }
}

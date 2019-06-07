<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;

class CommentController extends Controller
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
        return response()->json($this->commentRepo->getAll());
    }

    public function view($id)
    {
        $comment = $this->commentRepo->get($id);
        $comment['post'] = $this->postRepo->get($comment['postId']);

        return response()->json($comment);
    }
}

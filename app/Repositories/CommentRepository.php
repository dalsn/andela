<?php

namespace App\Repositories;

use Illuminate\Support\Arr;

class CommentRepository extends ApiRepository
{
    public function __construct($endpoint = "https://jsonplaceholder.typicode.com/comments")
    {
        parent::__construct($endpoint);
    }

    public function getPostComments($postId)
    {
        $comments = $this->getAll();

        return array_filter($comments, function($comment, $key) use ($postId) {
            return $comment['postId'] == $postId;
        }, ARRAY_FILTER_USE_BOTH);
    }

}
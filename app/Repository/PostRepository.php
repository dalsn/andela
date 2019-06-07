<?php

namespace App\Repository;

use Illuminate\Support\Arr;

class PostRepository extends ApiRepository
{
    public function __construct($endpoint = "https://jsonplaceholder.typicode.com/posts")
    {
        parent::__construct($endpoint);
    }

    public function getUserPosts($userId)
    {
        $posts = $this->getAll();

        return array_filter($posts, function($post, $key) use ($userId) {
            return $post['userId'] == $userId;
        }, ARRAY_FILTER_USE_BOTH);
    }

}
<?php

namespace App\Repositories;

class UserRepository extends ApiRepository
{
    public function __construct($endpoint = "https://jsonplaceholder.typicode.com/users")
    {
        parent::__construct($endpoint);
    }

}
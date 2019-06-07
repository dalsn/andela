<?php

namespace App\Repository;

class UserRepository extends ApiRepository
{
    public function __construct($endpoint = "https://jsonplaceholder.typicode.com/users")
    {
        parent::__construct($endpoint);
    }

}
<?php

namespace App\Repositories;

interface RepositoryInterface 
{
    public function getAll();

    public function get($id);
}
<?php


namespace App\Services;


use App\Repositories\UserRepository;

class UserService
{

    public $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository=$repository;
    }

}

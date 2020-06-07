<?php


namespace App\Services;


use App\Http\Requests\UserCreateRequest;
use App\Models\Name;
use App\Models\User;
use App\Repositories\Interfaces\NameRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;

class UserService
{

    public $repository;
    public $nameRepository;

    public function __construct(UserRepositoryInterface $repository,NameRepositoryInterface $nameRepository)
    {
        $this->repository=$repository;
        $this->nameRepository=$nameRepository;
    }

    public function create(UserCreateRequest $request):User
    {
        $user=User::create($request);
        $user=$this->repository->create($user);
        $name=Name::create($request,$user->id);
        $this->nameRepository->save($name);
        return $user;
    }

}

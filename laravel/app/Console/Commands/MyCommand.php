<?php

namespace App\Console\Commands;

use App\Exceptions\NotFindException;
use App\Exceptions\NotSaveException;
use App\Models\User;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Console\Command;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This create admin user';

    private $userRepository;
    private $rolesRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository,RoleRepositoryInterface $roleRepository)
    {
        parent::__construct();
        $this->userRepository=$userRepository;
        $this->rolesRepository=$roleRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email=$this->ask('Enter email');
        $password=$this->secret('Enter password');
        try{
            $userNew=new User(['email'=>$email,'password'=>$password]);
            $user=$this->userRepository->create($userNew);
            $this->info($user->id);
            $this->rolesRepository->addRoles($user);
            $this->info('User register');
        }catch (NotSaveException $e){
            $this->error($e->getMessage());
        }catch (NotFindException $e){
            $this->error($e->getMessage());
        }


    }
}

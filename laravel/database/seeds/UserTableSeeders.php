<?php

use App\Model\User;
use Illuminate\Database\Seeder;
class UserTableSeeders extends Seeder
{
    public function run(){
        return factory(User::class,50)->create();
    }
}

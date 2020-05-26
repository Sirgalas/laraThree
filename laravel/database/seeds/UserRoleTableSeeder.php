<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(UserRole::class,150)->create();
    }
}

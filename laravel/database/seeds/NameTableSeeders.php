<?php
use Illuminate\Database\Seeder;
use App\Model\Name;

class NameTableSeeders extends Seeder
{
    public function run(){
        return factory(Name::class,50)->create();
    }
}

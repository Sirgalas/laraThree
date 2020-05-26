<?php

use App\Models\File;
use Illuminate\Database\Seeder;

class FileTableSeeders extends Seeder
{
    public function run(){
        return factory(File::class,50)->create();
    }
}

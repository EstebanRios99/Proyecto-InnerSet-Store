<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(CategorieTableSeeder::class);
        $this->call(UserTableSeeder::class);
        //$this->call(ProductTableSeeder::class);
        //$this->call(RequestTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}

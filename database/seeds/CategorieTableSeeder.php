<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        //$faker = \Faker\Factory::create();
        $cat=array('Lacteos y Huevos','Frutas, Verduras y Legumbres','Carnes y Embutidos','Bebidas','Limpieza','Aceites', 'Granos', 'Dulces', 'Panadería y Pastas' );
        for ($i = 0; $i < 9; $i++) {
            Category::create([
                'name' => $cat[$i]
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Motori', 'name_en'=>'Motors','name_es'=>'Motores',],
            ['name' => 'Informatica', 'name_en'=>'Informatics','name_es'=>'Informatica',],
            ['name' => 'Elettrodomestici', 'name_en'=>'Home appliances','name_es'=>'Electrodomesticos',],
            ['name' => 'Giochi', 'name_en'=>'Games','name_es'=>'Juegos',],
            ['name' => 'Sport', 'name_en'=>'Sport','name_es'=>'Deporte',],
            ['name' => 'Arredamento', 'name_en'=>'Furniture','name_es'=>'Muebles',],
            ['name' => 'Musica', 'name_en'=>'Music','name_es'=>'Musica',],
            ['name' => 'Abbigliamento', 'name_en'=>'Clothing','name_es'=>'Ropa',],
            ['name' => 'Libri', 'name_en'=>'Books','name_es'=>'Libros',],
            ['name' => 'Telefonia', 'name_en'=>'Smartphones','name_es'=>'Telefonia',],
        ];
        
        foreach($categories as $category){
            Category::create([
                'name' => $category['name'],
                'name_en' => $category['name_en'],
                'name_es' => $category['name_es'],
            ]);
        }
    }
}

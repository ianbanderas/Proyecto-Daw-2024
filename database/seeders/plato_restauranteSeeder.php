<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class plato_restauranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<12;$i++) {
        DB::table("plato_restaurante")->insert([
            "idPla" => $faker->numberBetween(1,10),
            "idRes" => $faker->numberBetween(1,10),
            "valoracion" => $faker->numberBetween(1,10),
            "comentario" => $faker->word(),
        ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['name'=>'Budi','gender'=>'male','status_family'=>'Kepala keluarga'],
            ['name'=>'Dedi','gender'=>'male','parent'=>'1','status_family'=>'Orang tua'],
            ['name'=>'Dodi','gender'=>'male','parent'=>'1','status_family'=>'Orang tua'],
            ['name'=>'Dede','gender'=>'female','parent'=>'1','status_family'=>'Orang tua'],
            ['name'=>'Dewi','gender'=>'female','parent'=>'1','status_family'=>'Bibi'],
            ['name'=>'Feri','gender'=>'male','parent'=>'2','status_family'=>'Anak'],
            ['name'=>'Farah','gender'=>'female','parent'=>'2','status_family'=>'Anak'],
            ['name'=>'Gugus','gender'=>'male','parent'=>'3','status_family'=>'Anak'],
            ['name'=>'Candi','gender'=>'female','parent'=>'3','status_family'=>'Anak'],
            ['name'=>'Hani','gender'=>'female','parent'=>'4','status_family'=>'Anak'],
            ['name'=>'Hana','gender'=>'female','parent'=>'4','status_family'=>'Anak']
        ])->each(function($data){
            Family::create($data);
        });
    }
}

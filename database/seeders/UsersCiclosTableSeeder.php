<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use App\Models\UserCiclos;
use App\Models\UsersCiclos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersCiclosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCiclos::truncate();
        $users= DB::table('users')->get();

        foreach($users as $user){
            $ciclos=Ciclo::find(rand(Ciclo::count()));
            DB::table('users_ciclos')->insert([
                'user_id'=> $user->id,
                'ciclo_id'=> fake()->randomNumber()
            ]);
        }

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administradores')->truncate();
        $usuarios = DB::table('users')->get();
        $administradores = $usuarios->random(5);
        foreach ($administradores as $administrador) {
            DB::table('administradores')->insert([
                'user_id' => $administrador->id
            ]);
        }
    }
}

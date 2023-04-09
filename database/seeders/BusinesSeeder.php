<?php

namespace Database\Seeders;

use App\Models\Busines;
use Illuminate\Database\Seeder;

class BusinesSeeder extends Seeder
{
    public function run()
    {
        Busines::create([
            'name' => 'Mi Negocio',
            'description' => 'Empresa de venta de productos',
            'email' => 'mi.negocio@gmail.com',
            'address' => 'Calle 123',
            'nic' => '123456',
            'logo' => 'image'
        ]);
    }
}

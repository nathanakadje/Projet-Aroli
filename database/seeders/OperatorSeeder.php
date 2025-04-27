<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Operator;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $operators = ['Orange', 'MTN', 'Moov', 'Free', 'CelTIS'];

        foreach ($operators as $name) {
            Operator::create(['name' => $name]);
    }
}
}
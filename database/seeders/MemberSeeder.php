<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Member::firstOrCreate(['name' => 'Andi']);

        Member::firstOrCreate(['name' => 'Budi']);

        Member::firstOrCreate(['name' => 'Citra']);

        Member::firstOrCreate(['name' => 'Dewi']);

        Member::firstOrCreate(['name' => 'Eko']);

        Member::firstOrCreate(['name' => 'Fajar']);
    }
}

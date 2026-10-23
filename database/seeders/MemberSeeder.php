<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
    {
        Member::create([
            'name' => 'Andi',
        ]);

        Member::create([
            'name' => 'Budi',
        ]);

        Member::create([
            'name' => 'Citra',
        ]);

        Member::create([
            'name' => 'Dewi',
        ]);

        Member::create([
            'name' => 'Eko',
        ]);

        Member::create([
            'name' => 'Fajar',
        ]);
    }
}

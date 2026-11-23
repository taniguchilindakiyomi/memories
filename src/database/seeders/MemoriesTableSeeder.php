<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Memory;

class MemoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Memory::create([
        'date' => '2026-09-30',
        'title' => 'LIVE配信',
        'content' => '本日は23:00に配信をしました🎤',
        'image' => null,
        ]);

        Memory::create([
        'date' => '2026-09-26',
        'title' => 'ミュージックサーカス',
        'content' => '本日はミュージックサーカスのお仕事でした🎪',
        'image' => null,
        ]);
    }
}

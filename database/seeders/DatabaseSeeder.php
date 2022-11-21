<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Spending;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importSpending();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
    public function importSpending()
    {
        $spending = new Spending();
        $spending->category = 'Đồ Chơi Của Bé';
        $spending->date = '2022-11-14';
        $spending->price = '110000';
        $spending->note = 'aaaaaaaaaaaaaaccccccc';
        $spending->save();

        $spending = new Spending();
        $spending->category = 'Áo Quần';
        $spending->date = '2022-11-14';
        $spending->price = '120000';
        $spending->note = 'aaaaaaaaaaaaaaccccccc';
        $spending->save();

        $spending = new Spending();
        $spending->category = 'Áo Quần';
        $spending->date = '2022-11-14';
        $spending->price = '10000';
        $spending->note = 'aaaaaaaaaaaaaaccccccc';
        $spending->save();

        $spending = new Spending();
        $spending->category = 'Thức Ăn';
        $spending->date = '2022-11-14';
        $spending->price = '1110000';
        $spending->note = 'aaaaaaaaaaaaaaccccccc';
        $spending->save();
    }
}

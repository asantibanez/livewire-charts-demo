<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Expense::factory(10)->create();
    }
}

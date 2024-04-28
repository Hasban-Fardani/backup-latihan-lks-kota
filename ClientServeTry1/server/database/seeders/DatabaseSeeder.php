<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Sparepart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin1',
            'email' => 'admin@webtech.id',
        ]);

        User::factory()->create([
            'name' => 'admin2',
            'email' => 'admin2@webtech.id',
        ]);

        User::factory()->create([
            'name' => 'admin3',
            'email' => 'admin3@webtech.id',
        ]);

        Category::factory(10)->create();
        Sparepart::factory(30)->create();
        Customer::factory(30)->create();
        Transaction::factory(50)->create();
        TransactionDetail::factory(150)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Seeder;

class BusinessesTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Business::firstOrCreate(
                [
                    'user_id' => $user->id,
                ],
                [
                    'tariff_percentage' => 0,
                    'name' => $user->first_name . ' Business',
                    'phone' => '255700000' . str_pad($user->id, 3, '0', STR_PAD_LEFT),
                    'email' => $user->email,
                    'tin' => 'TIN-' . str_pad($user->id, 6, '0', STR_PAD_LEFT),
                    'category' => 'General',
                    'logo' => null,
                    'token' => null,
                    'balance' => 0,
                    'actual_balance' => 0,
                    'status' => 'active',
                ]
            );
        }
    }
}
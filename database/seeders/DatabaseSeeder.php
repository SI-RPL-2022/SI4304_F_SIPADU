<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@sipadu.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
            'created_at' => Carbon::now()
        ]);

        User::create([
            'name' => 'teknisi1',
            'username' => 'teknisi1',
            'email' => 'teknisi1@sipadu.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
            'created_at' => Carbon::now()
        ]);

        User::create([
            'name' => 'teknisi2',
            'username' => 'teknisi2',
            'email' => 'teknisi2@sipadu.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
            'created_at' => Carbon::now()
        ]);

        User::create([
            'name' => 'user1',
            'username' => 'user1',
            'email' => 'user1@sipadu.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now()
        ]);

        User::create([
            'name' => 'user2',
            'username' => 'user2',
            'email' => 'user2@sipadu.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'created_at' => Carbon::now()
        ]);
        
    }
}

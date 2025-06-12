<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CafeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds for cafe users.
     */
    public function run(): void
    {
        // إنشاء مستخدمين للكافيه
        $cafeUsers = [
            [
                'name' => 'كافيه الأول',
                'email' => 'cafe1@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'كافيه الثاني',
                'email' => 'cafe2@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($cafeUsers as $userData) {
            // التحقق من عدم وجود المستخدم بالفعل
            $existingUser = User::where('email', $userData['email'])->first();
            if (!$existingUser) {
                User::create($userData);
            }
        }

        $this->command->info('تم إنشاء مستخدمي الكافيه بنجاح!');
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin ecom.com',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin9090'),
                'status' => 'verified',
                'role' => 'admin'
            ],
            [
                'name' => 'Vendor ecom.com',
                'email' => 'vendor@mail.com',
                'password' => Hash::make('vendor9090'),
                'status' => 'verified',
                'role' => 'vendor'
            ],
            [
                'name' => 'Customer ecom.com',
                'email' => 'customer@mail.com',
                'password' => Hash::make('customer9090'),
                'status' => 'verified',
                'role' => 'customer'
            ]
        ];


        foreach($users as $user_data) {
            $user = User::where('email', $user_data['email'])->first();

            if(!$user) {
                $user = new User();
                $user->fill($user_data);
                $user->save();
            }
        }


    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
      /**
     * The name of the database connection that should be used.
     *
     * @var string|null
     */
    protected $connection = 'mysql-320a61c5-webhost036-e2fc.a.aivencloud.com';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'nurul',
            'email'=>'nurulkhafidoh100@gmail.com',
            'password'=>Hash::make('123456')
        ]);
    }
}

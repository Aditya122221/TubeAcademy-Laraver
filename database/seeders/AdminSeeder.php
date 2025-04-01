<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminModel;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$password = Hash::make('123456');

        $adminRecords = [
            ["Registration_ID" => 12, 'fName'=>'admin', 'lName'=> 'Two']
        ];
    }
}

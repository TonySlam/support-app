<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            DB::table('catagories')->insert([
                'category_name' => 'Sales',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('catagories')->insert([
                'category_name' => 'Accounts',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('catagories')->insert([
                'category_name' => 'IT',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);


    }
}

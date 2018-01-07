<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('receipts')->insert([
            'description'=>'0000001',
            'created_at'=>date('Y-m-d H:i:s'),
            ]);
        
    	DB::table('categories')->insert([
    		'description'=>'Raw Materials - Wood',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('categories')->insert([
    		'description'=>'Raw Materials - Glass',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('categories')->insert([
    		'description'=>'Raw Materials - Paint',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('categories')->insert([
    		'description'=>'Raw Materials - Paper',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('categories')->insert([
    		'description'=>'Finished Product',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

        DB::table('branches')->insert([
            'description'=>'All',
            'address'=>'All access',
            'created_at'=>date('Y-m-d H:i:s'),
            ]);

    	DB::table('branches')->insert([
    		'description'=>'Harrison Plaza',
    		'address'=>'G/F Adriatico Wing, Harrison Plaza, Ermita, Manila',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('branches')->insert([
    		'description'=>'Glorietta 4',
    		'address'=>'3/F Glorietta 4, Ayala Center, Makati City, 1224',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('branches')->insert([
    		'description'=>'SM Megamall',
    		'address'=>'4/F Building A, SM Megamall, EDSA, Madaluyong City',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('branches')->insert([
    		'description'=>'SM Southmall',
    		'address'=>'2/F SM Southmall, Alabang-Zapote Road, Las Pinas City',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('branches')->insert([
    		'description'=>'Sunvar Plaza',
    		'address'=>'G/F Sunvar Plaza Building, Pasay Road cor. Amorsolo, San Lorenzo Village, Makati City',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('suppliers')->insert([
    		'description'=>'Philippine Timberex Corporation',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('suppliers')->insert([
    		'description'=>'Filtra Timber Trading Warehouse',
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    	DB::table('users')->insert([
    		'name'=>'Admin Webmaster',
    		'email'=>'admin@webmaster.com',
            'role'=>'Admin',
            'branch_id'=>1,
    		'password'=>bcrypt('123Qwe1!'),
    		'created_at'=>date('Y-m-d H:i:s'),
    		]);

    }
}

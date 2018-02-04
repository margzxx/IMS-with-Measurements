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
          'address'=>'Eastwood City',
          'contact_number'=>'09111111111',
          'details'=>'A supplier of wood',
          'created_at'=>date('Y-m-d H:i:s'),
          ]);

        DB::table('suppliers')->insert([
            'description'=>'Easy Wood Products',
            'address'=>'Quezon City',
            'contact_number'=>'961-41-85',
            'details'=>'A supplier of easy woods',
            'created_at'=>date('Y-m-d H:i:s'),
            ]);       

        DB::table('suppliers')->insert([
            'description'=>'LPM Construction Supply and Wood Corp',
            'address'=>'Manila City',
            'contact_number'=>'525 6547',
            'details'=>'Local Supplier',
            'created_at'=>date('Y-m-d H:i:s'),
            ]);

        DB::table('suppliers')->insert([
          'description'=>'Filtra Timber Trading Warehouse',
          'address'=>'Makati City',
          'contact_number'=>'09222222222',
          'details'=>'A supplier of wood',
          'created_at'=>date('Y-m-d H:i:s'),
          ]);

        DB::table('suppliers')->insert([
            'description'=>'KCC World Philippines',
            'address'=>'Pasig City',
            'contact_number'=>'570 5164',
            'details'=>'Building Materials Store',
            'created_at'=>date('Y-m-d H:i:s'),
            ]);

        DB::table('suppliers')->insert([
            'description'=>'Sampaloc Lumber Hardware & Construction Supply',
            'address'=>'Sampaloc, Manila City',
            'contact_number'=>'09485951192',
            'details'=>'Sampaloc Hardware and Construction Supplier',
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

        DB::table('items')->insert([
            'sku'=>'WOOD0001',
            'name'=>'Wood Narra',
            'description'=>'Strong Narra Wood',
            'category_id'=>1,
            'supplier_id'=>1,
            'branch_id'=>1,
            'price'=>100,
            'size'=>'10x10',
            'unit'=>'ft',
            'file'=>'assets/files/UploadedItems/1517755465.jpg',

            ]);

 DB::table('items')->insert([
            'sku'=>'GLASS0001',
            'name'=>'Clear Glass',
            'description'=>'Clear Glass',
            'category_id'=>2,
            'supplier_id'=>2,
            'branch_id'=>1,
            'price'=>100,
            'size'=>'36x48',
            'unit'=>'inches',
            'file'=>'assets/files/UploadedItems/1517755555.jpg',

            ]);



 DB::table('items')->insert([
            'sku'=>'GLASS0002',
            'name'=>'Faded Glass',
            'description'=>'Faded Strong Glass',
            'category_id'=>2,
            'supplier_id'=>2,
            'branch_id'=>1,
            'price'=>100,
            'size'=>'36x48',
            'unit'=>'inches',
            'file'=>'assets/files/UploadedItems/1517755555.jpg',

            ]);

    }


}

<?php

use Illuminate\Database\Seeder;
use Gifter\Retailer;

class GiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $retailer_id = Retailer::where('name','=','Best Buy')->pluck('id')->first();

        DB::table('gifts')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Playstation 4 Pro',
            'price' => 399.00,
            'url' => 'http://www.bestbuy.com/site/sony-playstation-4-pro-console/5388900.p',
            'image' => 'http://pisces.bbystatic.com/image2/BestBuy_US/images/products/5388/5388900_sd.jpg',
            'retailer_id' => $retailer_id,
            'purchased' => false,
            'user_id' => 1,
        ]);

        $retailer_id = Retailer::where('name','=','Walmart')->pluck('id')->first();

        DB::table('gifts')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'LEGO Star Wars Millennium Falcon',
            'price' => 104.99,
            'url' => 'https://www.walmart.com/ip/LEGO-Star-Wars-Millennium-Falcon-75105/45064378',
            'image' => 'https://ll-us-i5.wal.co/asr/18a6e567-7a35-429d-9674-8e3afd4def7b_1.634e747546d359b65cabfe382aff73c5.jpeg',
            'retailer_id' => $retailer_id,
            'purchased' => false,
            'user_id' => 1,
        ]);

        $retailer_id = Retailer::where('name','=','Amazon')->pluck('id')->first();

        DB::table('gifts')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'The Death of Superman Paperback',
            'price' => 10.03,
            'url' => 'https://www.amazon.com/Death-Superman-Dan-Jurgens/dp/1401241824',
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/511hrvW6EeL.jpg',
            'retailer_id' => $retailer_id,
            'purchased' => false,
            'user_id' => 1,
        ]);
    }
}

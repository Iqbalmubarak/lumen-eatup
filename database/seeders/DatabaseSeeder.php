<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                [
                  'first_name' => 'Muhammad Iqbal',
                  'last_name' => 'Mubarak',
                  'email' => 'iqbalmubarak212@gmail.com',
                  'password' => Hash::make('123456'),
                  'no_hp' => '0853043715'
                ]
            ]);


        DB::table('types')->insert([
                ['name' => 'Japanesse Food'],
                ['name' => 'Dessert'],
                ['name' => 'Coffee'],
                ['name' => 'Pastry'],
                ['name' => 'Korean Food'],
                ['name' => 'Fast Food']
            ]);

         DB::table('restaurants')->insert([
           [
            'type_id' => '1',
            'name' => 'Kedai Mie Ramen & Sushi',
            'address' => 'Jalan Batang Kampar',
            'latitude' => '-0.9438888888888889',
            'longtitude' => '100.35583333333332',
            'avatar' => '@drawable/japanese1',
            'status' => '1',
            'rating' => '4.5'
          ],
          [
            'type_id' => '1',
            'name' => 'Sushi R&R',
            'address' => 'Jalan Purus',
            'latitude' => '-0.9413888888888889',
            'longtitude' => '100.35416666666666',
            'avatar' => '@drawable/japanese2',
            'status' => '1',
            'rating' => '4.7'
          ],
          [
            'type_id' => '5',
            'name' => 'Gomawo korean food',
            'address' => 'Jalan S.Parman',
            'latitude' => '-0.9311111111111111',
            'longtitude' => '100.41472222222222',
            'avatar' => '@drawable/korean1',
            'status' => '1',
            'rating' => '3.8'
          ],
          [
            'type_id' => '1',
            'name' => 'Ichiban Sushi',
            'address' => 'Jalan Khatib',
            'latitude' => '-0.9125',
            'longtitude' => '100.35722222222222',
            'avatar' => '@drawable/japanese3',
            'status' => '1',
            'rating' => '4.2'
          ],
          [
            'type_id' => '5',
            'name' => 'Pocajjang Padang',
            'address' => 'Jalan Batang Kampar',
            'latitude' => '-0.9338888888888889',
            'longtitude' => '100.36333333333333',
            'avatar' => '@drawable/korean2',
            'status' => '1',
            'rating' => '4.5'
          ],
          [
            'type_id' => '3',
            'name' => 'Janji Jiwa',
            'address' => 'Jalan Batang Arau',
            'latitude' => '-0.9636111111111111',
            'longtitude' => '100.36083333333333',
            'avatar' => '@drawable/coffee2',
            'status' => '1',
            'rating' => '3.8'
          ],
          [
            'type_id' => '2',
            'name' => 'Ngulik Gelato Ice Cream',
            'address' => 'Jalan pondok',
            'latitude' => '-0.9583333333333333',
            'longtitude' => '100.36527777777778',
            'avatar' => '@drawable/dessert3',
            'status' => '1',
            'rating' => '4.2'
          ],
          [
            'type_id' => '3',
            'name' => 'Foresthree',
            'address' => 'Jalan nipah',
            'latitude' => '-0.9633333333333333',
            'longtitude' => '100.36166666666666',
            'avatar' => '@drawable/coffee3',
            'status' => '1',
            'rating' => '4.5'
          ],
          [
            'type_id' => '4',
            'name' => 'Bread Talk',
            'address' => 'Basko Mall',
            'latitude' => '-0.9016666666666667',
            'longtitude' => '100.35083333333333',
            'avatar' => '@drawable/pastry2',
            'status' => '1',
            'rating' => '3.8'
          ],
          [
            'type_id' => '4',
            'name' => 'RotiO',
            'address' => 'Jalan Siteba',
            'latitude' => '-0.8966666666666666',
            'longtitude' => '100.36666666666666',
            'avatar' => '@drawable/pastry1',
            'status' => '1',
            'rating' => '3.8'
          ],
          [
            'type_id' => '6',
            'name' => 'McD',
            'address' => 'Jalan Khatib Sulaiman',
            'latitude' => '-0.9116666666666667',
            'longtitude' => '100.35583333333332',
            'avatar' => '@drawable/fastfood1',
            'status' => '1',
            'rating' => '4.2'
          ],
          [
            'type_id' => '2',
            'name' => 'Daily Scoop Gelato',
            'address' => 'Jalan nipah',
            'latitude' => '-0.9586111111111111',
            'longtitude' => '100.36083333333333',
            'avatar' => '@drawable/dessert1',
            'status' => '1',
            'rating' => '4.5'
          ],
          [
            'type_id' => '6',
            'name' => 'KFC',
            'address' => 'Jalan Veteran',
            'latitude' => '-0.9422222222222222',
            'longtitude' => '100.35416666666666',
            'avatar' => '@drawable/fastfood2',
            'status' => '1',
            'rating' => '4.5'
          ]



            ]);

        DB::table('favorite_restaurants')->insert([
                [
                  'restaurant_id' => 3,
                  'user_id' => 1
                ]
            ]);

        
       DB::table('menus')->insert([
              [
               'restaurant_id' => '11',
               'name' => 'Chicken Muffin',
               'notes' => 'Muffin hangat dilapis saus mayonais dengan daging ayam olahan yang digoreng dengan sempurna',
               'price' => '25000',
               'avatar' => '@drawable/chickenmuffin'
             ],
             [
              'restaurant_id' => '11',
              'name' => 'Chicken Wrap',
              'notes' => 'Paduan daging ayam asap, scrambled egg, dan keju gurih dalam balutan tortilla yang lembut',
              'price' => '18000',
              'avatar' => '@drawable/wrap'
             ],
             [
              'restaurant_id' => '11',
              'name' => 'McSpicy',
              'notes' => 'Burger dengan daging paha ayam goreng yang empuk, renyah dan pedas',
              'price' => '22000',
              'avatar' => '@drawable/mcspicy'
             ]

            ]);


      

    }
}

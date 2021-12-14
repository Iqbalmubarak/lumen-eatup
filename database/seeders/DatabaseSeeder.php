<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

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
            'avatar' => '@drawable/japanese1',
            'status' => '1',
            'rating' => '4.5'
          ],
          [
            'type_id' => '1',
            'name' => 'Sushi R&R',
            'address' => 'Jalan Purus',
            'avatar' => '@drawable/japanese2',
            'status' => '1',
            'rating' => '4.7'
          ],
          [
            'type_id' => '5',
            'name' => 'Gomawo korean food',
            'address' => 'Jalan S.Parman',
            'avatar' => '@drawable/korean1',
            'status' => '1',
            'rating' => '3.8'
          ],
          [
            'type_id' => '1',
            'name' => 'Ichiban Sushi',
            'address' => 'Jalan Khatib',
            'avatar' => '@drawable/japanese3',
            'status' => '1',
            'rating' => '4.2'
          ],
          [
            'type_id' => '5',
            'name' => 'Pocajjang Padang',
            'address' => 'Jalan Batang Kampar',
            'avatar' => '@drawable/korean2',
            'status' => '1',
            'rating' => '4.5'
          ],
          [
            'type_id' => '3',
            'name' => 'Janji Jiwa',
            'address' => 'Jalan S.Parman',
            'avatar' => '@drawable/coffee2',
            'status' => '1',
            'rating' => '3.8'
          ],
          [
            'type_id' => '2',
            'name' => 'Gelato Ice Cream',
            'address' => 'Jalan pondok',
            'avatar' => '@drawable/dessert3',
            'status' => '1',
            'rating' => '4.2'
          ],
          [
            'type_id' => '3',
            'name' => 'Foresthree',
            'address' => 'Jalan nipah',
            'avatar' => '@drawable/coffee3',
            'status' => '1',
            'rating' => '4.5'
          ],
          [
            'type_id' => '4',
            'name' => 'Bread Talk',
            'address' => 'Basko Mall',
            'avatar' => '@drawable/pastry2',
            'status' => '1',
            'rating' => '3.8'
          ],
          [
            'type_id' => '4',
            'name' => 'RotiO',
            'address' => 'Jalan Siteba',
            'avatar' => '@drawable/pastry1',
            'status' => '1',
            'rating' => '3.8'
          ],
          [
            'type_id' => '6',
            'name' => 'McD',
            'address' => 'Jalan A. Yani',
            'avatar' => '@drawable/fastfood1',
            'status' => '1',
            'rating' => '4.2'
          ],
          [
            'type_id' => '2',
            'name' => 'Ice Cream ku',
            'address' => 'Jalan nipah',
            'avatar' => '@drawable/dessert1',
            'status' => '1',
            'rating' => '4.5'
          ],
          [
            'type_id' => '6',
            'name' => 'KFC',
            'address' => 'Jalan ByPass',
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

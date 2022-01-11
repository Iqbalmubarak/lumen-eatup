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
            'rating' => '0.0'
          ],
          [
            'type_id' => '1',
            'name' => 'Sushi R&R',
            'address' => 'Jalan Purus',
            'latitude' => '-0.9413888888888889',
            'longtitude' => '100.35416666666666',
            'avatar' => '@drawable/japanese2',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '5',
            'name' => 'Gomawo korean food',
            'address' => 'Jalan S.Parman',
            'latitude' => '-0.9311111111111111',
            'longtitude' => '100.41472222222222',
            'avatar' => '@drawable/korean1',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '1',
            'name' => 'Ichiban Sushi',
            'address' => 'Jalan Khatib',
            'latitude' => '-0.9125',
            'longtitude' => '100.35722222222222',
            'avatar' => '@drawable/japanese3',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '5',
            'name' => 'Pocajjang Padang',
            'address' => 'Jalan Batang Kampar',
            'latitude' => '-0.9338888888888889',
            'longtitude' => '100.36333333333333',
            'avatar' => '@drawable/korean2',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '3',
            'name' => 'Janji Jiwa',
            'address' => 'Jalan Batang Arau',
            'latitude' => '-0.9636111111111111',
            'longtitude' => '100.36083333333333',
            'avatar' => '@drawable/coffee2',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '2',
            'name' => 'Ngulik Gelato Ice Cream',
            'address' => 'Jalan pondok',
            'latitude' => '-0.9583333333333333',
            'longtitude' => '100.36527777777778',
            'avatar' => '@drawable/dessert3',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '3',
            'name' => 'Foresthree',
            'address' => 'Jalan nipah',
            'latitude' => '-0.9633333333333333',
            'longtitude' => '100.36166666666666',
            'avatar' => '@drawable/coffee3',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '4',
            'name' => 'Bread Talk',
            'address' => 'Basko Mall',
            'latitude' => '-0.9016666666666667',
            'longtitude' => '100.35083333333333',
            'avatar' => '@drawable/pastry2',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '4',
            'name' => 'RotiO',
            'address' => 'Jalan Siteba',
            'latitude' => '-0.8966666666666666',
            'longtitude' => '100.36666666666666',
            'avatar' => '@drawable/pastry1',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '6',
            'name' => 'McD',
            'address' => 'Jalan Khatib Sulaiman',
            'latitude' => '-0.9116666666666667',
            'longtitude' => '100.35583333333332',
            'avatar' => '@drawable/fastfood1',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '2',
            'name' => 'Daily Scoop Gelato',
            'address' => 'Jalan nipah',
            'latitude' => '-0.9586111111111111',
            'longtitude' => '100.36083333333333',
            'avatar' => '@drawable/dessert1',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '6',
            'name' => 'KFC',
            'address' => 'Jalan Veteran',
            'latitude' => '-0.9422222222222222',
            'longtitude' => '100.35416666666666',
            'avatar' => '@drawable/fastfood2',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '3',
            'name' => 'Parewa Coffee',
            'address' => 'Jalan M. Hatta',
            'latitude' => '-0.92389',
            'longtitude' => '100.44083',
            'avatar' => '@drawable/coffee3',
            'status' => '1',
            'rating' => '0.0'
          ],
          [
            'type_id' => '6',
            'name' => 'GB Express Pauh',
            'address' => 'Jalan Dr. Moh. Hatta, Kapala Koto',
            'latitude' => '-0.92583',
            'longtitude' => '100.43556',
            'avatar' => '@drawable/fastfood2',
            'status' => '1',
            'rating' => '0.0'
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
             ],
             [
              'restaurant_id' => '1',
              'name' => 'Ramen Special',
              'notes' => 'Mie khas jepang dengan telur rebus',
              'price' => '18000',
              'avatar' => '@drawable/ramen'
             ],
             [
              'restaurant_id' => '1',
              'name' => 'Udon Curry',
              'notes' => 'Mi khas jepang',
              'price' => '25000',
              'avatar' => '@drawable/udon'
             ],
             [
              'restaurant_id' => '2',
              'name' => 'Salmon Nigiri',
              'notes' => 'Irisan ikan salmon',
              'price' => '28000',
              'avatar' => '@drawable/salmon'
             ],
             [
              'restaurant_id' => '2',
              'name' => 'Tuna Nigiri',
              'notes' => 'Irisan ikan tuna',
              'price' => '25000',
              'avatar' => '@drawable/tuna'
             ],
             [
              'restaurant_id' => '3',
              'name' => 'jajangmyeon',
              'notes' => 'Mie dengan saus pasta kacang kedelai hitam yang populer di Korea',
              'price' => '35000',
              'avatar' => '@drawable/jajangmyeon'
             ],
             [
              'restaurant_id' => '3',
              'name' => 'Japchae',
              'notes' => 'Sohun (dang myeon) yang dicampur dengan berbagai jenis sayuran dan daging sapi',
              'price' => '18000',
              'avatar' => '@drawable/japchae'
             ],
             [
              'restaurant_id' => '4',
              'name' => 'Ichiban Sushi Attack',
              'notes' => 'Gabungan berbagai sushi khas icihiban',
              'price' => '120000',
              'avatar' => '@drawable/sushi'
             ],
             [
              'restaurant_id' => '4',
              'name' => 'Gyoza',
              'notes' => 'Dumpling khas Jepang yang bisa diisi dengan campuran daging ayam',
              'price' => '15000',
              'avatar' => '@drawable/gyoza'
             ],
             [
              'restaurant_id' => '5',
              'name' => 'Premium Beef',
              'notes' => 'Minuman(Lemon Tea/Blackcurrant)',
              'price' => '99000',
              'avatar' => '@drawable/premium'
             ],
             [
              'restaurant_id' => '5',
              'name' => 'Wagyu Beef',
              'notes' => 'Minuman(Lemon Tea/Blackcurrant)',
              'price' => '129000',
              'avatar' => '@drawable/wagyu'
             ],
             [
              'restaurant_id' => '6',
              'name' => 'Caramel Machiato',
              'notes' => 'Espresso yang dicampur dengan sirup vanilla yang creamy',
              'price' => '22000',
              'avatar' => '@drawable/caramel'
             ],
             [
              'restaurant_id' => '6',
              'name' => 'Vanilla Latte',
              'notes' => 'Espresso short serta creamy susu dan sirup vanilla',
              'price' => '22000',
              'avatar' => '@drawable/vanilla'
             ],
             [
              'restaurant_id' => '6',
              'name' => 'Tuna Mayo Toast',
              'notes' => 'Toast dengan isi tuna dan mayo',
              'price' => '28000',
              'avatar' => '@drawable/toast'
             ],
             [
              'restaurant_id' => '7',
              'name' => 'Es Krim Gelato Cone 1 Rasa',
              'notes' => 'Rasa hazelnut coklat, vanilla, matcha, dll',
              'price' => '20000',
              'avatar' => '@drawable/cone'
             ],
             [
              'restaurant_id' => '7',
              'name' => 'Es Krim Gelato Cone 2 Rasa',
              'notes' => 'Rasa hazelnut coklat, vanilla, matcha, dll',
              'price' => '25000',
              'avatar' => '@drawable/eskrim'
             ],
             [
              'restaurant_id' => '8',
              'name' => 'Oreo Cookies & Cream',
              'notes' => 'Perpaduan antara oreo, cookies dan cream',
              'price' => '25000',
              'avatar' => '@drawable/oreo'
             ],
             [
              'restaurant_id' => '8',
              'name' => 'Es Kopi Susu',
              'notes' => 'Es kopi susu signature',
              'price' => '18000',
              'avatar' => '@drawable/susu'
             ],
             [
              'restaurant_id' => '9',
              'name' => 'Red Velvet Slice',
              'notes' => 'Potongan kue red velvet ala breadtalk',
              'price' => '27000',
              'avatar' => '@drawable/redvelvet'
             ],
             [
              'restaurant_id' => '9',
              'name' => 'Tiramisu Slice',
              'notes' => 'Potongan kue tiramisu ala breadtalk',
              'price' => '21000',
              'avatar' => '@drawable/tiramisu'
             ],
             [
              'restaurant_id' => '10',
              'name' => 'Roti O',
              'notes' => 'Roti khas roti o',
              'price' => '12000',
              'avatar' => '@drawable/rotio'
             ],
             [
              'restaurant_id' => '10',
              'name' => 'Beef Pastry Roti O',
              'notes' => 'Beef pastry khas roti o',
              'price' => '20000',
              'avatar' => '@drawable/beefpastry'
             ],
             [
              'restaurant_id' => '12',
              'name' => 'Gelato 1 Rasa',
              'notes' => 'Rasa hazelnut coklat, vanilla, matcha, dll',
              'price' => '25000',
              'avatar' => '@drawable/rasaa'
             ],
             [
              'restaurant_id' => '12',
              'name' => 'Gelato 2 Rasa',
              'notes' => 'Rasa hazelnut coklat, vanilla, matcha, dll',
              'price' => '30000',
              'avatar' => '@drawable/rasa2'
             ],
             [
              'restaurant_id' => '13',
              'name' => 'Zuper Box KFC',
              'notes' => '1 Zuper Krunch, 1 ayam goreng, satu porsi nasi, dan satu mocha float',
              'price' => '40000',
              'avatar' => '@drawable/box'
             ],
             [
              'restaurant_id' => '13',
              'name' => 'Zuper Krunch',
              'notes' => 'Zuper lembut bunnya, Zuper renyah dagingnya, Zuper Krunch pastinya',
              'price' => '20000',
              'avatar' => '@drawable/burger'
             ],
             [
              'restaurant_id' => '14',
              'name' => 'Kopi susu hot',
              'notes' => 'Kopi susu hangat ala parewa coffee',
              'price' => '20000',
              'avatar' => '@drawable/parewa1'
             ],
             [
              'restaurant_id' => '14',
              'name' => 'Es Kopi Susu',
              'notes' => 'Es kopi susu signature',
              'price' => '18000',
              'avatar' => '@drawable/parewa2'
             ]

            ]);


      

    }
}

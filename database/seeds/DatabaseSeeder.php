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
       //  $this->call(UsersTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call( DiscountTypeTableSeeder::class);
        $this->call(PlaceTableSeeder::class);
        $this->call(PriceTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(SpaceTableSeeder::class);
        $this->call( BookingfactStatusTableSeeder::class);
        $this->call(TestSeed::class);
    }
}
